<?php



namespace App\Infrastructure;

interface EnrolmentServiceInterface
{
    public function enrolStudentInCourse($studentId, $courseId);
}
