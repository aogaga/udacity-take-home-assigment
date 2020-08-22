<?php
namespace App\Infrastructure;

interface CourseServiceInterface{
    public function addCourse($courseKey, $limit);
    public function isCourseLimitExceeded($courseKey);
    public function enrollStudents($studentId, $courseKey);
}
