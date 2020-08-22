<?php


namespace App\Repositories;


use App\model\Enrolment;
use App\Repositories\Contracts\EnrolmentRepositoryInterface;

class EnrolmentRepository implements EnrolmentRepositoryInterface
{

    public function getTotalEnrolmentByStudent($studentId)
    {
        return Enrolment::where('student_id', $studentId)->get()->count();
    }

    public function getTotalCourseEnrolment($courseId)
    {
        return Enrolment::where('course_id', $courseId)->get()->count();
    }

    public function enrolStudentInCourse($studentId, $courseId)
    {
        $enrolment = $this->getEnrolment($studentId, $courseId);
        if($enrolment === null){

            try{
                $enrolment = new Enrolment();
                $enrolment->student_id = $studentId;
                $enrolment->course_id = $courseId;
                $enrolment->save();
                return [
                    'data'=> $enrolment,
                    'status'=>true
                ];
            }catch (\Exception $e){
                return [
                    'error'=> $e->getMessage(),
                    'status'=>false
                ];
            }
        }

        return [
            'data'=> $enrolment,
            'status'=>true
        ];

    }

    public function dropStudentFromCourse($studentId, $courseId)
    {
        $enrolment = $this->getEnrolment($studentId, $courseId);
        if($enrolment === null){
            return [
                'error'=> "enrolment info does not exist",
                'status'=>false
            ];
        }else{
            try{
                return $enrolment->delete();

                return null;
            }catch (\Exception $e){

                return [
                    'error'=> $e->getMessage(),
                    'status'=>false
                ];
            }
        }
    }

    public function getEnrolment($studentId, $courseId)
    {
        $attributes = ['student_id'=> $studentId, 'course_id'=> $courseId];
        return Enrolment::where($attributes)->get()->first();
    }
}
