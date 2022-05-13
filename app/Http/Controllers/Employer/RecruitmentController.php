<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.create_recruitment');
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
            'job_benefit.required'=>'Vui lòng nhập chế độ đãi ngộ',
        ]);

        $level=implode(',',$request->level);
        $kills=implode(',',$request->kills);
//        dd(implode(',',$level));
        $post=new Recruitment();

        $post->user_id=$data['user_id'];
        $post->title=$data['title'];
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
        $array_level=['Intern','Fresher','Junior','Senior','Leader Developer','Mid-level Manager','Senior Leader'];
        $array_kills=['Python','Java','JavaScript','HTML/CSS','PHP','C#','C/C++','R','Ruby','VB.NET','Golang','Swift','Kotlin'];
        $post=Recruitment::where('id',$id)->first();
//        dd($post->kills);
        $levels= explode(',',$post->level);
        $kills= explode(',',$post->kills);
//        dd($levels);
        return view('employer.update_recruitment')->with(compact('post','levels','kills','array_level','array_kills'));
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
            'job_benefit.required'=>'Vui lòng nhập chế độ đãi ngộ',
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