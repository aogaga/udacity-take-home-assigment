<?php


namespace App\Repositories\Contracts;


interface WaitListRepositoryInterface
{
    public function getStudentTotalWaitListCount($studentId);
    public function addStudentToWaitList($studentId, $courseId);
}
