<?php


namespace App\Repositories;


use App\Repositories\Contracts\StudentRepositoryInterface;
use App\Model\Student;

class StudentRepository implements StudentRepositoryInterface
{


    public function addStudent($studentId, $limit)
    {
       $student =  $this->getStudent($studentId);

       if($student === null){
           try{
               $student = new Student();
               $student->studentId = $studentId;
               $student->limit = $limit;
               $student->save();

               return [
                   'data'=> $student,
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
            'data'=> $student,
            'status'=>true
        ];
    }

    public function getStudent($studentId)
    {
        return Student::where('studentId', $studentId)->first();
    }

    public function enrolStudent($studentId, $courseKey)
    {
        // TODO: Implement enrolStudent() method.
    }

    public function deleteStudentEnrolment($studentId, $courseKey)
    {
        // TODO: Implement deleteStudentEnrolment() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getStudentEnrolmentLimit($studentId)
    {
        // TODO: Implement getStudentEnrolmentLimit() method.
    }
}
