<?php


namespace App\Infrastructure;


interface WaitListServiceInterface
{
    public function addStudentToWaitList($studentId, $courseId);
    public function removeStudentFromWaitList($studentId, $courseId);
}
