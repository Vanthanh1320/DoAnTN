<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use PDF;
use Dompdf\Dompdf;

class ProfileController extends Controller
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

        $user_id=Auth::user()->id;
        $profiles=Profile::where('user_id','=',$user_id)->get();
        return view('developer.manager_cv')->with(compact('profiles','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=$this->userId();

        return view('developer.create_cv')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$request->validate([
            'user_id'=>[''],
            'title'=>['required','string'],
            'image'=>['required'],
            'name'=>['required','string'],
            'position'=>['required','string'],
            'email'=>['required','email'],
            'phone_number'=>['required','numeric','min:11'],
            'male'=>['required','string'],
            'dateOfBirth'=>['required','string'],
            'address'=>['required','string'],

            'introduce'=>['required'],

            'name_company.*'=>['required'],
            'start_time.*'=>['required'],
            'end_time.*'=>['required'],
            'job_position.*'=>['required'],
            'job_details.*'=>[''],

            'name_school.*'=>['required'],
            'start_year.*'=>['required'],
            'end_year.*'=>['required'],
            'degree.*'=>['required'],

            'name_project.*'=>['required'],
            'time_project.*'=>['required'],

        ],[
            'title.required'=>'Vui l??ng nh???p ti??u ?????',
            'image.required'=>'Vui l??ng nh???p ch???n ???nh',
            'name.required'=>'Vui l??ng nh???p h??? t??n',
            'position.required'=>'Vui l??ng nh???p v??? tr?? ???ng tuy???n',
            'email.required' => 'Vui l??ng nh???p email',
            'email.email' => 'Email sai ?????nh d???ng',
            'phone_number.required'=>'Vui l??ng nh???p s??? ??i???n tho???i',
            'phone_number.numeric'=> 'S??? ??i???n tho???i ?????nh d???ng l?? s???',
            'phone_number.min'=> 'S??? ??i???n tho???i ??t nh???t l?? 10 k?? t???',
            'male.required'=>'Vui l??ng ch???n gi???i t??nh',
            'dateOfBirth.required'=>'Vui l??ng ch???n ng??y sinh',
            'address.required'=>'Vui l??ng nh???p ?????a ch???',

            'introduce.required'=>'Vui l??ng nh???p gi???i thi???u b???n th??n',

            'name_company.*.required'=>'Vui l??ng nh???p t??n c??ng ty',
            'start_time.*.required'=>'Vui l??ng ch???n th???i gian b???t ?????u',
            'end_time.*.required'=>'Vui l??ng ch???n th???i gian k???t th??c',
            'job_position.*.required'=>'Vui l??ng v??? tr?? c??ng vi???c',

            'name_school.*.required'=>'Vui l??ng nh???p t??n tr?????ng',
            'start_year.*.required'=>'Vui l??ng ch???n th???i gian b???t ?????u',
            'end_year.*.required'=>'Vui l??ng ch???n th???i gian k???t th??c',
            'degree.*.required'=>'Vui l??ng nh???p ng??nh h???c',

            'name_project.*.required'=>'Vui l??ng nh???p t??n d??? ??n',
            'time_project.*.required'=>'Vui l??ng nh???p th???i gian d??? ??n',

        ]);

        $profile=new Profile();

        $profile->user_id=$data['user_id'];
        $profile->title=$data['title'];
        $profile->name=$data['name'];
        $profile->email=$data['email'];
        $profile->phone_number=$data['phone_number'];
        $profile->male=$data['male'];
        $profile->dateOfBirth=$data['dateOfBirth'];
        $profile->address=$data['address'];
        $profile->position=$data['position'];
        $profile->introduce=$data['introduce'];
        $profile->created_at=Carbon::now('Asia/Ho_Chi_Minh');

        $get_image=$request->image;

        $path='img/profile';
        $get_name_image=$get_image->getClientOriginalName();

        $name_image=current(explode('.',$get_name_image));
        $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $profile->image=$new_image;

        $profile->save();

        $this->addInfoDiffrence($request);

        return redirect()->back()->with('success','T???o h??? s?? th??nh c??ng');
    }

    public function addInfoDiffrence($request){

        $comapny=$request->name_company;
        $stime=$request->start_time;
        $etime=$request->end_time;
        $jpo=$request->job_position;
        $jde=$request->job_details;

        $profile_id=Profile::orderBy('id','DESC')->first();

        foreach ($comapny as $key => $items){
            $exp=new Experience();
            $exp->profile_id    =   $profile_id->id;
            $exp->name_company  =   $items;
            $exp->start_time    =   $stime[$key];
            $exp->end_time      =   $etime[$key];
            $exp->job_position  =   $jpo[$key];
            $exp->job_details   =   $jde[$key];

            $exp->save();
        }

        $school=$request->name_school;
        $syear=$request->start_year;
        $eyear=$request->end_year;
        $degree=$request->degree;

        foreach ($school as $key => $items){
            $edu=new Education();
            $edu->profile_id    =   $profile_id->id;
            $edu->name_school   =   $items;
            $edu->start_year    =   $syear[$key];
            $edu->end_year      =   $eyear[$key];
            $edu->degree        =   $degree[$key];

            $edu->save();
        }

        $name_pro=$request->name_project;
        $time_pro=$request->time_project;
        $intr_pro=$request->introduce_pro;

        foreach ($name_pro as $key => $items){
            $pro=new Project();
            $pro->profile_id      =   $profile_id->id;
            $pro->name_project    =   $items;
            $pro->time_project    =   $time_pro[$key];
            $pro->introduce_pro   =   $intr_pro[$key];

            $pro->save();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

        $profile=Profile::find($id);
        $experiences=Experience::where('profile_id','=',$id)->get();
        $educations=Education::where('profile_id','=',$id)->get();
        $projects=Project::where('profile_id','=',$id)->get();

        return view('developer.update_cv')->with(compact('profile','experiences','educations','projects','user'));
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
//        ddd($request->all());
        $data=$request->validate([
            'user_id'=>[''],
            'title'=>['required','string'],
            'image'=>[''],
            'name'=>['required','string'],
            'position'=>['required','string'],
            'email'=>['required','email'],
            'phone_number'=>['required','numeric','min:11'],
            'male'=>['required','string'],
            'dateOfBirth'=>['required','string'],
            'address'=>['required','string'],

            'introduce'=>['required'],

            'name_company.*'=>['required'],
            'start_time.*'=>['required'],
            'end_time.*'=>['required'],
            'job_position.*'=>['required'],
            'job_details'=>[''],

        ],[
            'title.required'=>'Vui l??ng nh???p ti??u ?????',
            'name.required'=>'Vui l??ng nh???p h??? t??n',
            'position.required'=>'Vui l??ng nh???p v??? tr?? ???ng tuy???n',
            'email.required' => 'Vui l??ng nh???p email',
            'email.email' => 'Email sai ?????nh d???ng',
            'phone_number.required'=>'Vui l??ng nh???p s??? ??i???n tho???i',
            'phone_number.numeric'=> 'S??? ??i???n tho???i ?????nh d???ng l?? s???',
            'phone_number.min'=> 'S??? ??i???n tho???i ??t nh???t l?? 10 k?? t???',
            'male.required'=>'Vui l??ng nh???p ch???n gi???i t??nh',
            'dateOfBirth.required'=>'Vui l??ng ch???n ng??y sinh',
            'address.required'=>'Vui l??ng nh???p ?????a ch???',
            'introduce.required'=>'Vui l??ng nh???p gi???i thi???u b???n th??n',

            'name_company.*.required'=>'Vui l??ng nh???p t??n c??ng ty',
            'start_time.*.required'=>'Vui l??ng nh???p th???i gian b???t ?????u',
            'end_time.*.required'=>'Vui l??ng nh???p th???i gian k???t th??c',
            'job_position.*.required'=>'Vui l??ng nh???p v??? tr?? c??ng vi???c',

        ]);

        $profile=Profile::find($id);

        $profile->user_id=$data['user_id'];
        $profile->title=$data['title'];
        $profile->name=$data['name'];
        $profile->email=$data['email'];
        $profile->phone_number=$data['phone_number'];
        $profile->male=$data['male'];
        $profile->dateOfBirth=$data['dateOfBirth'];
        $profile->address=$data['address'];
        $profile->position=$data['position'];
        $profile->introduce=$data['introduce'];
        $profile->updated_at=Carbon::now('Asia/Ho_Chi_Minh');

        $get_image=$request->image;
        $img_current=Profile::find($id);

        if($get_image != null){
            $path='img/profile/';
            if(file_exists($path.$profile->image) ){
                unlink($path.$profile->image);
            }

            $get_name_image=$get_image->getClientOriginalName();
            $name_image=current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);

            $profile->image=$new_image;
        }else{
            $profile->image=$img_current->image;
        }

        $profile->save();

        $this->updateInfoDiffrence($request,$id);

        return redirect()->back()->with('success','C???p nh???p th??nh c??ng');
    }

    public function updateInfoDiffrence($request,$id){
        $comapny=$request->name_company;
        $stime=$request->start_time;
        $etime=$request->end_time;
        $jpo=$request->job_position;
        $jde=$request->job_details;

        $school=$request->name_school;
        $syear=$request->start_year;
        $eyear=$request->end_year;
        $degree=$request->degree;

        $project=$request->name_project;
        $time_pro=$request->time_project;
        $intro=$request->introduce_pro;

        $exps=Experience::with('profile')->where('profile_id',$id)->get();
        $edus=Education::with('profile')->where('profile_id',$id)->get();
        $pros=Project::with('profile')->where('profile_id',$id)->get();

        if($comapny){
            foreach ($comapny as $key => $items){

                if (!isset($exps[$key]->name_company)){
                    $exp=new Experience();
                    $exp->profile_id    =   $id;
                    $exp->name_company  =   $comapny[$key];
                    $exp->start_time    =   $stime[$key];
                    $exp->end_time      =   $etime[$key];
                    $exp->job_position  =   $jpo[$key];
                    $exp->job_details   =   $jde[$key];

                    $exp->save();
                }else{

                    $exp = Experience::find($exps[$key]->id);
                    $exp->name_company = $items;
                    $exp->start_time = $stime[$key];
                    $exp->end_time = $etime[$key];
                    $exp->job_position = $jpo[$key];
                    $exp->job_details = $jde[$key];

                    $exp->save();
                }
            }
        }

        if($school){
            foreach ($school as $key => $items){

                if (!isset($edus[$key]->name_school)){
                    $edu=new Education();

                    $edu->profile_id    =   $id;
                    $edu->name_school   =   $school[$key];
                    $edu->start_year    =   $syear[$key];
                    $edu->end_year      =   $eyear[$key];
                    $edu->degree        =   $degree[$key];

                    $edu->save();
                }else{
                    $edu = Education::find($edus[$key]->id);

                    $edu->profile_id    =   $id;
                    $edu->name_school   =   $school[$key];
                    $edu->start_year    =   $syear[$key];
                    $edu->end_year      =   $eyear[$key];
                    $edu->degree        =   $degree[$key];

                    $edu->save();
                }
            }
        }

        if($project){
            foreach ($project as $key => $items){

                if (!isset($pros[$key]->name_project)){
                    $pro=new Project();

                    $pro->profile_id    =   $id;
                    $pro->name_project  =   $project[$key];
                    $pro->time_project  =   $time_pro[$key];
                    $pro->introduce_pro =   $intro[$key];

                    $pro->save();
                }else{
                    $pro = Project::find($pros[$key]->id);

                    $pro->profile_id    =   $id;
                    $pro->name_project  =   $project[$key];
                    $pro->time_project  =   $time_pro[$key];
                    $pro->introduce_pro =   $intro[$key];

                    $pro->save();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile=Profile::find($id);
        $path='img/profile/'.$profile->image;
        if(file_exists($path)){
            unlink($path);
        }

        Experience::with('profile')->where('profile_id',$id)->delete();
        Education::with('profile')->where('profile_id',$id)->delete();
        Project::with('profile')->where('profile_id',$id)->delete();

        $profile->delete();

        return redirect()->back();
    }

    public function deleteExp(Request $request){

        $id=$request->id;

        if ($request->number == 1){
            $exp=Experience::find($id);
            $exp->delete();
        }else if ($request->number == 2){
            $edu=Education::find($id);
            $edu->delete();
        }else{
            $pro=Project::find($id);
            $pro->delete();
        }

        return redirect()->back();
    }

//    T???o PDF
    public function print_profile($id){
        $profile=Profile::with('experience','project','education')->where('id',$id)->first();
        $exp=Experience::with('profile')->where('profile_id',$id)->get();
        $edu=Education::with('profile')->where('profile_id',$id)->get();
        $pro=Project::with('profile')->where('profile_id',$id)->get();


        $path=base_path('public/img/profile/'.$profile->image);
        $type=pathinfo($path,PATHINFO_EXTENSION);
        $data=file_get_contents($path);
        $pic='data:image/'.$type.';base64,'.base64_encode($data);

        $pdf=PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'DejaVu Sans','sans-serif'])
            ->loadView('developer.profile_pdf',compact('profile','exp','edu','pro','pic'));
        return $pdf->setPaper('a4')->save('pdf-cv/'.$profile->title.'.pdf')->stream($profile->title.'.pdf');
    }

}
