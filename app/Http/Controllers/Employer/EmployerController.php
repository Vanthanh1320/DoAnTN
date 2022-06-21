<?php

namespace App\Http\Controllers\Employer;

use App\Exports\ApplyExport;
use App\Http\Controllers\Controller;
use App\Mail\confirmProfile;
use App\Models\ApplyList;
use App\Models\Recruitment;
use App\Models\StatisticAplly;
use App\Models\User;
use App\Notifications\browsingNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;

class EmployerController extends Controller
{

    public function userId(){
        return User::find(Auth::id());
    }

    public function index(){
        if (Auth::check()){
            $user=$this->userId();

            return view('employer.index')->with(compact('user'));
        }

        return redirect()->route('show-login-emp');
    }

    public function removeNotify(Request $request){
        $id_notify=$request->id;
        $user=User::find($id_notify);

        $user->notifications()->delete();

        return redirect()->back();
    }

    public function showAccount(){
        $user=$this->userId();

        return view('employer.account')->with(compact('user'));
    }

    public function showCandidate(){
        $user=User::find(Auth::id());
        $post=Recruitment::where('user_id',Auth::id())->get();

        if (count($post) > 0){
            $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
                for ($i=0;$i< count($post);$i++){
                    $query->orWhere('recruitment_id',$post[$i]->id);
                }

            })->get();

            return view('employer.apply')->with(compact('candidates','user'));
        }

        return view('employer.apply')->with(compact('user'));
    }

    public function statusPost(Request $request){
        $id_post=$request->id_post;
        $value=$request->value;

        $post=Recruitment::find($id_post);
        $post->status=$value;
        $post->save();

        return redirect()->back();
    }

    public function deleteCandidate(Request $request){
        $apply=ApplyList::find($request->id);
        $apply->delete();

        if ($apply){
            return redirect()->back()->with('success','Xóa thành công');
        }else{
            return redirect()->back()->with('error','Xóa thất bại');
        };
    }

    public function showStatistic(){
        $user=$this->userId();

        $posts=Recruitment::where('user_id',Auth::user()->id)
            ->get();

        $apply_list=ApplyList::with('recruitment')->where('recruitment_id')
            ->get();

        $candidates=ApplyList::with('recruitment')->where(function ($query) use ($posts){
            for ($i=0;$i< count($posts);$i++){
                $query->orWhere('recruitment_id',$posts[$i]->id)->where('status',1);
            }
        })->get();

        $statisticApply=Recruitment::with('statistics')->where('user_id',Auth::user()->id)->get();

        return view('employer.statistic')->with(compact('posts','user','statisticApply'));
    }

    public function account(Request $request){

        $data=$request->validate(
            [
                'name' => [''],
                'image' => [''],
                'company' => [''],
                'website' => [''],
                'address' => [''],
                'phone_number' => [''],
            ],
            [
                'name.required'=> 'Vui lòng nhập họ tên',
                'file.file'=> 'Đây không phải là file',
                'file.lt'=> 'Dung lượng file phải ít 1 MB',
                'company.required'=> 'Vui lòng nhập tên công ty',
                'website.required'=> 'Vui lòng nhập địa chỉ website',
                'address.required'=> 'Vui lòng nhập địa chỉ',
                'phone_number.required'=> 'Vui lòng nhập số điện thoại',
            ]);

        $account=$this->userId();

        $account->name=$data['name'];
        $account->company=$data['company'];
        $account->website=$data['website'];
        $account->phone_number=$data['phone_number'];
        $account->address=$data['address'];

        $get_image=$request->image;

        if ($get_image != null){
            $path='empl/img/';
            if (file_exists($path.$account->image) && $account->image){
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

    public function statusCandidate(Request $request){
//        dd($request->all());
        $id=$request->id;
        $user_developer=$request->user_developer;
        $value=$request->value;

        $image_employer=Auth::user()->image;

        $user_notification=User::where('id',$user_developer)->first();

        $apply=ApplyList::find($id);
        $apply->status=$value;
        $apply->save();

//        dd($apply->recruitment_id);
//        Cập nhập thống kê
        $statisticApply=StatisticAplly::where('recruitment_id',$apply->recruitment_id)
            ->where('date_apply',Carbon::parse($apply->created_at)->toDateString())
            ->first();

        if (+$value === 1){
            $statisticApply->quantity_browsing+=1;
            $statisticApply->save();

            $desc='Hồ sơ của bạn đã được duyệt';
            Notification::send($user_notification, new browsingNotification($id,$image_employer,$desc));
        }else{
            $statisticApply->quantity_browsing-=1;
            $statisticApply->save();
        }

        return response()->json(['success']);
    }

    public function filterStatus(Request $request){
        $status=$request->status;

        $candidates=ApplyList::with('recruitment')
            ->where('status',$status)
            ->orderBy('id','DESC')
            ->get();

//            dd($candidates);

        $html='';
        foreach ($candidates as $key=>$item){
            $check=($item->status==1? 'checked':'');

            $time=\Carbon\Carbon::parse($item->created_at)->isoFormat('DD-MM-YYYY');
            $html .='
                      <tr class="align-top text-center">
                                   <td >'.$key++.'</td>
                                   <td >'.$item->recruitment->title.'</td>
                                   <td class="text-black">'.$item->name.'</td>
                                   <td>'.$item->email.'</td>
                                   <td>'.$item->phone_number.'</td>
                                   <td><a href="{{url(\'pdf-cv\').\'/\'.$item->linkCV}}" target="_blank">'.$item->linkCV.'</a></td>
                                   <td>'.$time.'</td>
                                   <td>
                                       <div class="form-check form-switch ">
                                           <input class="form-check-input text-center"  '.$check.'   data-id="'.$item->id.'" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                       </div>
                                   </td>
                      </tr>

            ';
        }

        return response()->json($html);
    }

    public function exportExcel(Request $request)
    {
        $status= +$request->status;

//        return (new ApplyExport)->download('apply_list.xlsx');
        return Excel::download(new ApplyExport($status), 'apply_list.xlsx');
    }

    public function statisticsCandidate(Request $request){
        $id_recruitment=$request->value;

        $now=Carbon::now()->toDateString();
        $yesterday=Carbon::yesterday()->toDateString();
        $sub7days=Carbon::now()->subDay(7)->toDateString();
        $start_lastmouth=Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $end_lastmouth=Carbon::now()->subMonth()->endOfMonth()->toDateString();

        switch ($request->timer){
            case 'ngayhomqua':
                $apply_list=StatisticAplly::where('recruitment_id',$id_recruitment)
                    ->whereBetween('date_apply',[$yesterday,$now])
                    ->get();
                break;
            case '7ngayqua':
                $apply_list=StatisticAplly::where('recruitment_id',$id_recruitment)
                    ->whereBetween('date_apply',[$sub7days,$now])
                    ->get();
                break;
            case 'thangtruoc':
                $apply_list=StatisticAplly::where('recruitment_id',$id_recruitment)
                    ->whereBetween('date_apply',[$start_lastmouth,$end_lastmouth])
                    ->get();
                break;
            default:
                $apply_list=[];
        }

        if(count($apply_list) >0){
            foreach ($apply_list as $key => $val){

                $chart_data[]=array(
                    'quantity_apply'=>$val->quantity_apply,
                    'quantity_browsing'=>$val->quantity_browsing,
                    'timer' => $val->date_apply
                );
            }
            echo $data=json_encode($chart_data);
        }else{
            echo $data=json_encode([]);
        }


//        return view('employer.statistic')->with(compact('profileBrowsing','profileNotBrowsing'));

    }

    public function sendMail(Request $request){
//        $user_developer=User::find($request->developer_id);
//        $post=Recruitment::find($request->post_id);
//
////        config([
////            'mail.default'=>'smtp',
////            'mail.mailers.smtp.hpst'=>'smtp.gmail.com',
////            'mail.mailers.smtp.port'=>587,
////            'mail.mailers.smtp.encryption'=>'tls',
////            'mail.mailers.smtp.username'=>'neolab@gmail.com',
////            'mail.mailers.smtp.password'=>null,
////            'mail.from.address'=>'neolab@gmail.com',
////            'mail.from.name'=>'neolab',
////        ]);
//
//        $mailable=new confirmProfile($user_developer,$post);
//
//        Mail::to($user_developer->email)->queue($mailable);
//        return true;

//        return view('employer.confirm_profile_mail');

    }
}
