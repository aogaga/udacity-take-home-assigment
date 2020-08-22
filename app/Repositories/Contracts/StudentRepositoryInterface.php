<?php


namespace App\Repositories\Contracts;


interface StudentRepositoryInterface
{
    public function addStudent($studentId, $limit);
    public function getStudent($studentId);
    public function enrolStudent($studentId, $courseKey);
    public function deleteStudentEnrolment($studentId, $courseKey);
    public function getStudentEnrolmentLimit($studentId);
    public function all();
}
