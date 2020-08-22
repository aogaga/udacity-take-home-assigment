<?php

namespace App\Http\Controllers;

use App\Infrastructure\EnrolmentServiceInterface;
use App\Infrastructure\StudentServiceInterface;
use App\Infrastructure\WaitListServiceInterface;
use Illuminate\Http\Request;


class StudentController extends BaseApiController
{

    private $studentService;
    private $enrolmentService;

    function __construct(Request $request, StudentServiceInterface  $studentService, EnrolmentServiceInterface $enrolmentService)
    {
        parent::__construct($request);
        $this->studentService = $studentService;
        $this->enrolmentService = $enrolmentService;

    }

    function index(){
        return $this->studentService->getAllStudent();
    }

    function add(){
        $studentId = $this->request->get('id');
        $limit = $this->request->get('limit');
        return $this->studentService->addStudent($studentId, $limit);

    }
    function enrol($student_id){
      return  $this->request->get('course_key') . " /". $student_id;

      $key =  $this->request->get('course_key');

      $this->enrolmentService->enrolStudentInCourse($student_id, $key);

    }

    function drop(){
        return  $this->request->get('course_key');
    }

}
