<?php


namespace App\Service;


use App\Infrastructure\StudentServiceInterface;
use App\Infrastructure\ValidationServiceInterface;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentService implements StudentServiceInterface
{
    private  $studentRepository;
    private $courseRepository;
    private $responseBuilderService;
    private  $validationService;

    public function __construct(CourseRepositoryInterface $courseRepository, StudentRepositoryInterface $studentRepository, ResponseBuilderService $responseBuilderService, ValidationServiceInterface $validationService )
    {
        $this->courseRepository = $courseRepository;
        $this->studentRepository = $studentRepository;
        $this->responseBuilderService = $responseBuilderService;
        $this->validationService = $validationService;
    }

    public function addStudent($studentId, $limit)
    {
        if($studentId === null){
            return $this->responseBuilderService->respondWithNotFound("student Id is required", 200);
        }

        if($limit === null){
            return $this->responseBuilderService->respondWithNotFound("course registration limit for student is required", 200);
        }


        if(intval($limit) === 0){
            return $this->responseBuilderService->respondWithError("student registration limit is not a valid integer or is 0", 200);
        }
        $result = $this->studentRepository->addStudent($studentId, $limit);

        if($result['status']){
            return $this->responseBuilderService->respondWithSuccess($result['data'], 200);
        }else{
            return $this->responseBuilderService->respondWithNotFound($result['error'], 200);
        }
    }


    public function enrolStudent($studentId, $courseKey)
    {
        // TODO: Implement enrolStudent() method.
    }

    public function dropStudent($studentId, $courseKey)
    {
        // TODO: Implement dropStudent() method.
    }

    public function isStudentLimitExceeded($student)
    {
        // TODO: Implement isStudentLimitExceeded() method.
    }

    public function getAllStudent()
    {
        // TODO: Implement getAllStudent() method.
    }
}
