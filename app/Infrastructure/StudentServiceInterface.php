<?php
namespace App\Infrastructure;

interface StudentServiceInterface{

    public function addStudent($studentId, $limit);
    public function enrolStudent($studentId, $courseKey);
    public function dropStudent($studentId, $courseKey);
    public function isStudentLimitExceeded($student);
    public function getAllStudent();
}
