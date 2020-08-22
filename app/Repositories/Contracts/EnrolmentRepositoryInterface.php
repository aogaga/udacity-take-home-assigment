<?php


namespace App\Repositories\Contracts;


use App\model\Enrolment;

interface EnrolmentRepositoryInterface
{
    public function  getTotalEnrolmentByStudent($studentId);
    public function getTotalCourseEnrolment($courseId);
    public function enrolStudentInCourse($studentId, $courseId);
    public function dropStudentFromCourse($studentId, $courseId);
    public function getEnrolment($studentId, $courseId);
}
