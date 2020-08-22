<?php
namespace App\Repositories\Contracts;


interface CourseRepositoryInterface
{
    public function addCourse($key, $limit);
    public function getCourse($key);
    public function getCourseLimit($key);
    public function deleteCourse($key);
    public function updateCourse($key);
    public function all();
}
