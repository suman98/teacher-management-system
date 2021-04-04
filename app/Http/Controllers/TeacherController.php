<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Nationality;
use App\Models\Teacher;
use App\Models\TeacherCourses;
use DB;
use Excel;
use  App\Exports\TeacherExports;
class TeacherController extends Controller
{
	protected $teacher;

	public function __construct(Teacher $teacher){


		$this->teachers = $teacher;
	}
    

	public function index()
	{

		$teachers = $this->teachers->with('faculty','getNation')->orderBy('id','desc')->paginate(30);

		return view('home',compact('teachers'));
	}


	public function create()
	{


		$nationality = Nationality::select('name','id')->orderBy('name')->get();
		$faculty = Faculty::select('name','id')->get();
		return view('teachers.create',compact('nationality','faculty'));


	}

	public function store(Request $request)
	{

		$request->validate($this->teachers->getValidateRule());
		
		$attributes = $request->all();
		
		DB::beginTransaction();
		
		$teacher = $this->teachers->create($attributes);

		$teacherCourses = [];

		foreach($request->courses_id as $key=>$value){
			$teacherCourses [] = ['teacher_id'=>$teacher->id,'courses_id'=>$value];
		}

		if(!empty($teacherCourses)){

			TeacherCourses::insert($teacherCourses);
		}


		DB::commit();
		
		return redirect('/home');


	}



	public function get_courses_by_faculty($id)
	{

		$courses  = Course::select('name','id')->where('faculty_id',$id)->get();

		return ['courses'=>$courses];
	} 


	public function csv_download($type)
	{

		return Excel::download(new TeacherExports, "teachers.{$type}");
	}


}
