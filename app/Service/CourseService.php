<?php


namespace App\Service;


use App\Infrastructure\CourseServiceInterface;
use App\Infrastructure\ResponseBuilderServiceInterface;
use App\Repositories\Contracts\CourseRepositoryInterface;

class CourseService implements CourseServiceInterface
{
   private  $courseRepository;
   private $responseBuilderService;
    public function __construct( CourseRepositoryInterface $courseRepository, ResponseBuilderServiceInterface $responseBuilderService)
    {
        $this->courseRepository = $courseRepository;
        $this->responseBuilderService = $responseBuilderService;
    }

    public function addCourse($courseKey, $limit)
    {
        if($courseKey === null){
            return $this->responseBuilderService->respondWithNotFound("course key is very much required", 200);
        }


        if($limit === null){
            return $this->responseBuilderService->respondWithNotFound("course limit is required", 200);
        }


        if(intval($limit) === 0){
            return $this->responseBuilderService->respondWithError("course limit is not a valid integer or is 0", 200);
        }
        $result = $this->courseRepository->addCourse($courseKey, $limit);

        if($result['status']){
            return $this->responseBuilderService->respondWithSuccess($result['data'], 200);
        }else{
            return $this->responseBuilderService->respondWithError($result['error'], 200);
        }
    }

    public function isCourseLimitExceeded($courseKey)
    {
        // TODO: Implement isCourseLimitExceeded() method.
    }

    public function enrollStudents($studentId, $courseKey)
    {
        // TODO: Implement enrollStudents() method.
    }
}
