<?php


namespace App\Repositories;


use App\model\Waitlist;
use App\Repositories\Contracts\WaitListRepositoryInterface;

class WaitListRepository implements WaitListRepositoryInterface
{

    public function getStudentTotalWaitListCount($studentId)
    {

       return Waitlist::where('student_id', $studentId)->get()->count();

    }

    public function addStudentToWaitList($studentId, $courseId)
    {
        // TODO: Implement addStudentToWaitList() method.

        try{
            $waitList = new Waitlist();
            $waitList->course_id = $courseId;
            $waitList->student_id = $studentId;
            $waitList->save();
            return $waitList;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }


    }
}
