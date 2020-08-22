<?php


namespace App\Repositories;


use App\Model\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface
{

    public function addCourse($key, $limit)
    {
        $course = $this->getCourse($key);

        if($course === null){

            try{
                $course = new Course();
                $course->coursename = $key;
                $course->limit = $limit;
                $course->save();

                return [
                    'data'=> $course,
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
            'data'=> $course,
            'status'=>true
        ];

    }

    public function getCourse($key)
    {
        return Course::where('coursename', $key)->first();
    }

    public function getCourseLimit($key)
    {
       $course = $this->getCourse($key);
       return $course->courseLimit;
    }

    public function deleteCourse($key)
    {
        // TODO: Implement deleteCourse() method.
    }

    public function updateCourse($key)
    {
        // TODO: Implement updateCourse() method.
    }

    public function all()
    {

        return Course::all();
    }

}
