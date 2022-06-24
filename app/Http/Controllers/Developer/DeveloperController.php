<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Mail\confirmProfile;
use App\Mail\postSimilar;
use App\Models\ApplyList;
use App\Models\Experience;
use App\Models\KeywordKills;
use App\Models\Notify;
use App\Models\Profile;
use App\Models\Recruitment;
use App\Models\StatisticAplly;
use App\Models\User;
use App\Notifications\recruitmentNotify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Money\Money;

class DeveloperController extends Controller
{
    public function userId(){
        return User::find(Auth::id());
    }

    public function testMailAuto(){

        $apply_list=ApplyList::with('recruitment','user')->orderBy('id','desc')
            ->first();
//                dd($apply_list->recruitment->kills);


//        for ($i = 0; $i < count($apply_list); $i++){
            $kills=explode(',',$apply_list->recruitment->kills);
//             dd($kills);
            $post_similar=Recruitment::where(function ($query) use ($kills,$apply_list){
                for ($i=0;$i< count($kills);$i++) {
                    $query->orWhere('kills','like','%'.$kills[$i].'%')
                        ->Where('id', '<>',$apply_list->recruitment_id)
                        ->Where('status', 1)
                        ->Where('created_at','>',$apply_list->created_at);
                }
            })->get();
        dd($post_similar);


            if (count($post_similar) > 1){
                $mailable=new postSimilar($apply_list->user,$apply_list->recruitment->kills,$post_similar);
                Mail::to($apply_list->email)->queue($mailable);
            }


//        }
        return true;
    }

    public function index(){
        $user=$this->userId();

//        dd($user->notifications);
        $users_employer=User::where('account_type',3)->get();
        $date_now=Carbon::now()->toDateString();
        $posts=Recruitment::with('user')->where([['expire','>',$date_now],['status',1]])
            ->orderBy('created_at','DESC')
            ->paginate(6);

        return view('developer.index')->with(compact('posts','users_employer','user'));
    }

    public function showAccount(){
        $account_id=Auth::user()->id;
        $account=User::find($account_id);

        $user=$this->userId();

        return view('developer.account')->with(compact('account','user'));
    }

    public function account(Request $request){
        $data=$request->validate(
            [
                'name' => [''],
                'image' => [''],
            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'file.file'=> 'Đây không phải là file',
                'file.lt'=> 'Dung lượng file phải ít 1 MB',
            ]);

        $account=$this->userId();

        $account->name=$data['name'];

        $get_image=$request->image;
        $path='img/account/';

        if ($get_image){
            if (file_exists($path.$account->image)){
                unlink($path.$account->image);
            }

            $get_name_image=$get_image->getClientOriginalName();

            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $account->image=$new_image;
        }else{
            $account->image=$account->image;
        }

        $account->save();

        return redirect()->back()->with('success','Cập nhập thành công');
    }

    public function post_info($slug){
        $user=$this->userId();

        $post=Recruitment::with('user')->where('slug_title',$slug)->first();
        $kills=explode(',',$post->kills);

        $posts_same=Recruitment::with('user')
            ->where(function ($query) use ($kills,$post){
            for ($i=0;$i< count($kills);$i++) {
                $query->orWhere('kills','like','%'.$kills[$i].'%')
                    ->where('id','<>',$post->id)
                    ->where([['expire','>',Carbon::now()->toDateString()],['status',1]]);
            }
        })->orderBy('created_at','DESC')->get();

        if (Auth::user() != null){
            $user_id=Auth::user()->id;

            $profiles=Profile::where('user_id',$user_id)->orderBy('id','DESC')->get();
            $apply=ApplyList::where('user_id',$user_id)->where('recruitment_id',$post->id)->where('status',0)->first();

            return view('developer.post_info')->with(compact('post','kills','posts_same','profiles','apply','user'));
        }else{
            return view('developer.post_info')->with(compact('post','kills','posts_same','user'));

        }
    }

    public function search(Request $request){
        $user=$this->userId();
        $date_now=Carbon::now()->toDateString();

        $key=$request->key;
        $select=$request->level;

        if ($key){
            $posts=Recruitment::with('user')
                ->orwhere('kills','like','%'.$key.'%')
                ->orwhere('name_company','like','%'.$key.'%')
                ->orwhere('title','like','%'.$key.'%')
                ->where([['expire','>',$date_now],['status',1]])
                ->orderBy('created_at','DESC')->get();
        }

        if ($select !== "Chọn cấp bậc"){
            $posts=Recruitment::with('user')
                ->where('level','like','%'.$select.'%')
                ->where([['expire','>',$date_now],['status',1]])
                ->orderBy('created_at','DESC')->get();
        }

        return view('developer.search')->with(compact('posts','user'));
    }

    public function search_high(Request $request){
        $key=$request->key;

        if ($key){
            $keywords=KeywordKills::where('name','like','%'.$key.'%')->orderBy('id','DESC')->get();

            $output='<ul style="display: block; max-height: 145px;overflow-y: scroll">';

            foreach ($keywords as $item){
                $output.='
                    <li class="keysword-list" style="padding: 5px"><a>'.$item->name.'</a></li>

                ';
            }
            $output.='</ul>';
            echo $output;
        }
    }

    public function getMorePost(Request $request){
        $date_now=Carbon::now()->toDateString();

        if ($request->ajax()){
            $posts=Recruitment::with('user')->where([['expire','>',$date_now],['status',1]])
                ->orderBy('created_at','DESC')
                ->paginate(6);
            return view('developer.posts-more')->with(compact('posts'))->render();
        }
    }

    public function save_post(){
        $user=$this->userId();

        return view('developer.save_post')->with(compact('user'));
    }

    public function listRecruitment(){
        $user=$this->userId();

        return view('developer.recruitment_list')->with(compact('user'));
    }

    public function apply(Request $request){

        $data=$request->validate(
            [
                'recruitment_id' => ['required'],
                'user_id' => [],
                'name' => ['required'],
                'email'=>['required','email'],
                'phone_number'=>['required','numeric','min:11'],
                'document'=>[],
                'file'=>[],
                'status'=>[],
            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email sai định dạng',
                'phone_number.required'=>'Vui lòng nhập số điện thoại',
                'phone_number.numeric'=> 'Số điện thoại định dạng là số',
                'phone_number.min'=> 'Số điện thoại ít nhất là 10 ký tự',
            ]
        );

        $apply=new ApplyList();
        $apply->recruitment_id=$data['recruitment_id'];
        $apply->name=$data['name'];
        $apply->email=$data['email'];
        $apply->phone_number=$data['phone_number'];
        $apply->status=$data['status'];
        $apply->created_at=Carbon::now('Asia/Ho_Chi_Minh');

        $file=$request->file;
        $document=$request->document;
        if ($request->user_id != null){
            $apply->user_id=$data['user_id'];
        }
        if ($document){
            $apply->linkCV=$data['document'];
        }
        if($file){
            $path='pdf-cv/';
            $get_name_cv=$file->getClientOriginalName();

            $name_cv=current(explode('.',$get_name_cv));
            $new_cv=$name_cv.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_cv);

            $apply->linkCV=$new_cv;
        }

        $apply->save();

        //        Gửi Mail
        $user_developer=$this->userId();
        $post=Recruitment::find($request->recruitment_id);

        $mailable=new confirmProfile($user_developer,$post);
        Mail::to($user_developer->email)->queue($mailable);

//        Gửi thông báo
        $desc=$request->name." đã ứng tuyển vào tin tuyển dụng của bạn";
        $employer_id=User::where('id',(int)$request->employer_id)->first('id');

        Notification::send($employer_id, new recruitmentNotify($desc));

//        Thống kê
        $statisticapply=StatisticAplly::where('date_apply',Carbon::now()->toDateString())
            ->where('recruitment_id',$data['recruitment_id'])
            ->first();

        if (isset($statisticapply)){
            $statisticPost=StatisticAplly::find($statisticapply->id);
            $statisticPost->quantity_apply+=1;
            $statisticPost->save();
        }else{
            $statistic=new StatisticAplly();
            $statistic->recruitment_id=$data['recruitment_id'];
            $statistic->date_apply=Carbon::now()->toDateString();
            $statistic->quantity_apply=1;
            $statistic->quantity_browsing=0;
            $statistic->save();
        }

        return redirect()->back()->with('success');
    }

    public function removeNotify(Request $request){
        $id_notify=$request->id;
        $user=User::find($id_notify);

        $user->notifications()->delete();

        return redirect()->back();
    }
}
