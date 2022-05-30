<?php

namespace App\Http\Controllers\Employer;

use App\Exports\ApplyExport;
use App\Http\Controllers\Controller;
use App\Models\ApplyList;
use App\Models\Recruitment;
use App\Models\User;
use App\Notifications\browsingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Notification;

class EmployerController extends Controller
{
    public function index(){
        if (Auth::check()){
            $post=Recruitment::where('user_id',Auth::id())->get();

            $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
                for ($i=0;$i< count($post);$i++){
                    $query->orWhere('recruitment_id',$post[$i]->id);
                }

            })->get();


            return view('employer.index')->with(compact('post','candidates'));
        }

        return redirect()->route('show-login-emp');
    }

    public function showAccount(){
        $account_id=Auth::user()->id;
        $account=User::find($account_id);
//        dd($account);
        return view('employer.account')->with(compact('account'));
    }

    public function showCandidate(){
        $post=Recruitment::where('user_id',Auth::id())->get();

        $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
            for ($i=0;$i< count($post);$i++){
                $query->orWhere('recruitment_id',$post[$i]->id);
            }

        })->get();


        return view('employer.apply')->with(compact('candidates'));
    }

    public function showStatistic(){
        return view('employer.statistic');
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

        $account_id=Auth::user()->id;
        $account=User::find($account_id);

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
        $id=$request->id;
        $user_developer=$request->user_developer;
        $value=$request->value;

        $image_employer=Auth::user()->image;
//        dd($image_employer);

        $user_notification=User::where('id',$user_developer)->first();
//        dd($user_notification);

        $apply=ApplyList::find($id);
        $apply->status=$value;
        $apply->save();


        if ($value === '1'){
            $desc='Hồ sơ của bạn đã được duyệt';
            Notification::send($user_notification, new browsingNotification($id,$image_employer,$desc));
        }
        return response()->json(['success']);
    }

    public function searchCandidate(Request $request){
        $keyword=$request->keyword;

//        if ($keyword){
            $candidates=ApplyList::with('recruitment')
                ->where('name','like','%'.$keyword.'%')
                ->orderBy('id','DESC')
                ->get();
//        }


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

    public function exportExcel()
    {
        $post=Recruitment::where('user_id',Auth::id())->get();

        $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
            for ($i=0;$i< count($post);$i++){
                $query->orWhere('recruitment_id',$post[$i]->id);
            }

        })->get();
//        dd($post);
//        return Excel::download(new ApplyExport, 'apply_list.xlsx');


        return (new ApplyExport)->download('apply_list.xlsx');
//        return Excel::download(new ApplyExport, 'apply_list.xlsx');
    }
}
