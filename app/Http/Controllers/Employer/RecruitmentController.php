<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\ApplyList;
use App\Models\Recruitment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function GuzzleHttp\Promise\all;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userId(){
        return User::find(Auth::id());
    }

    public function index()
    {
        $user=$this->userId();
        $post=Recruitment::where('user_id',Auth::id())->get();

        $candidates=ApplyList::with('recruitment')->where(function ($query) use ($post){
            for ($i=0;$i< count($post);$i++){
                $query->orWhere('recruitment_id',$post[$i]->id);
            }

        })->paginate(2);
        return view('employer.manager_recruitment')->with(compact('post','candidates','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=$this->userId();

        return view('employer.create_recruitment')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data=$request->validate([
            'user_id'=>[''],
            'title'=>['required','string'],
            'name_company'=>[''],
            'position'=>['required','string'],
            'position_type'=>['required'],

            'level'=>['required','array'],
            'kills'=>['required','array'],
            'experience'=>['required'],
            'quantity'=>['required'],

            'salary_min'=>['required'],
            'salary_max'=>['required'],
            'expire'=>['required','date'],
            'address_work'=>['required'],

            'job_description'=>['required'],
            'job_requirements'=>['required'],
            'benefit'=>['required'],
            'status'=>['']
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'position.required'=>'Vui lòng nhập vị trí công việc',
            'position_type.required'=>'Vui lòng chọn thời gian làm việc',

            'level.required'=>'Vui lòng chọn cấp bậc',
            'kills.required'=>'Vui lòng chọn kỹ năng',
            'experience.required'=>'Vui lòng chọn kinh nghiệm',
            'quantity.required'=>'Vui lòng nhập số lượng',

            'salary_min.required'=>'Vui lòng nhập mức lương tối thiểu',
            'salary_max.required'=>'Vui lòng nhập mức lương tối đa',
            'exprie.required'=>'Vui lòng chọn hạn nộp',
            'address_work.required'=>'Vui lòng nhập địa chỉ làm việc',

            'job_description.required'=>'Vui lòng nhập mô tả công việc',
            'job_requirements.required'=>'Vui lòng nhập yêu cầu công việc',
            'benefit.required'=>'Vui lòng nhập chế độ đãi ngộ',
        ]);

        $level=implode(',',$request->level);
        $kills=implode(',',$request->kills);
//        dd(implode(',',$level));
        $post=new Recruitment();

        $post->user_id=$data['user_id'];
        $post->title=$data['title'];
        $post->slug_title=Str::slug($data['title'], '-');
        $post->name_company=$data['name_company'];
        $post->position=$data['position'];
        $post->position_type=$data['position_type'];
        $post->level=$level;
        $post->kills=$kills;
        $post->experience=$data['experience'];
        $post->quantity=$data['quantity'];
        $post->expire=$data['expire'];
        $post->address_work=$data['address_work'];
        $post->salary_min=$data['salary_min'];
        $post->salary_max=$data['salary_max'];
        $post->job_description=$data['job_description'];
        $post->job_requirements=$data['job_requirements'];
        $post->benefit=$data['benefit'];
        $post->status=$data['status'];
        $post->created_at=Carbon::now('Asia/Ho_Chi_Minh');

//        dd($post);
        $post->save();


        if ($post){
            return redirect()->back()->with('success','Tin tuyển dụng tạo thành công');
        }else{
            return redirect()->back()->with('error','Tin tuyển dụng tạo thất bại');
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=$this->userId();

        $array_level=['Intern','Fresher','Junior','Senior','Leader Developer','Mid-level Manager','Senior Leader'];
        $array_kills=['Python','Java','JavaScript','HTML/CSS','PHP','NodeJS','C#','C/C++','R','Ruby','VB.NET','Golang','Swift','Kotlin'];

        $post=Recruitment::where('id',$id)->first();

        $levels= explode(',',$post->level);
        $kills= explode(',',$post->kills);

        return view('employer.update_recruitment')->with(compact('user','post','levels','kills','array_level','array_kills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $data=$request->validate([
            'title'=>['required','string'],
            'position'=>['required','string'],
            'position_type'=>['required'],

            'level'=>['','array'],
            'kills'=>['','array'],
            'experience'=>['required'],
            'quantity'=>['required'],

            'salary_min'=>['required'],
            'salary_max'=>['required'],
            'expire'=>['required','date'],
            'address_work'=>['required'],

            'job_description'=>['required'],
            'job_requirements'=>['required'],
            'benefit'=>['required'],
        ],[
            'title.required'=>'Vui lòng nhập tiêu đề',
            'position.required'=>'Vui lòng nhập vị trí công việc',
            'position_type.required'=>'Vui lòng chọn thời gian làm việc',

//            'level.required'=>'Vui lòng chọn cấp bậc',
//            'kills.required'=>'Vui lòng chọn kỹ năng',
            'experience.required'=>'Vui lòng chọn kinh nghiệm',
            'quantity.required'=>'Vui lòng nhập số lượng',

            'salary_min.required'=>'Vui lòng nhập mức lương tối thiểu',
            'salary_max.required'=>'Vui lòng nhập mức lương tối đa',
            'exprie.required'=>'Vui lòng chọn hạn nộp',
            'address_work.required'=>'Vui lòng nhập địa chỉ làm việc',

            'job_description.required'=>'Vui lòng nhập mô tả công việc',
            'job_requirements.required'=>'Vui lòng nhập yêu cầu công việc',
            'benefit.required'=>'Vui lòng nhập chế độ đãi ngộ',
        ]);

        $post=Recruitment::find($id);

        $post->title=$data['title'];
        $post->position=$data['position'];
        $post->position_type=$data['position_type'];

        if ($request->level != null){
            $level=implode(',',$request->level);
            $post->level=$level;
        }

        if ($request->kills != null){
            $kills=implode(',',$request->kills);
            $post->kills=$kills;
        }

        $post->experience=$data['experience'];
        $post->quantity=$data['quantity'];
        $post->expire=$data['expire'];
        $post->address_work=$data['address_work'];
        $post->salary_min=$data['salary_min'];
        $post->salary_max=$data['salary_max'];
        $post->job_description=$data['job_description'];
        $post->job_requirements=$data['job_requirements'];
        $post->benefit=$data['benefit'];
        $post->updated_at=Carbon::now('Asia/Ho_Chi_Minh');

        $post->save();

        if ($post){
            return redirect()->back()->with('success','Cập nhập tin tuyển dụng thành công');
        }else{
            return redirect()->back()->with('error','Cập nhập thất bại');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Recruitment::find($id);
        $post->delete();

        if ($post){
            return redirect()->back()->with('success','Xóa thành công');
        }else{
            return redirect()->back()->with('error','Xóa thất bại');
        };
    }
}
