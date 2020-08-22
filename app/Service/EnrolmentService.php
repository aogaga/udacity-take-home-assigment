<?php


namespace App\Service;


use App\model\Enrolment;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\EnrolmentServiceInterface;
use App\Repositories\Contracts\StudentRepositoryInterface;
use App\Repositories\Contracts\WaitListRepositoryInterface;
use App\Repositories\EnrolmentRepository;

class EnrolmentService implements EnrolmentServiceInterface
{

    private $studentRepository;
    private $courseRepository;
    private $enrolmentRepository;
    private $waitListRepository;

    public function __construct( EnrolmentRepository $enrolmentRepository,StudentRepositoryInterface $studentRepository, CourseRepositoryInterface $courseRepository, WaitListRepositoryInterface $waitListRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->courseRepository = $courseRepository;
        $this->enrolmentRepository = $enrolmentRepository;
        $this->waitListRepository = $waitListRepository;
    }

    public function enrolStudentInCourse($studentId, $courseId)
    {
        $student = $this->studentRepository->getStudent($studentId);
        $course = $this->courseRepository->getCourse($courseId);


        if($student === null){
            return  null;
        }

        if($course === null){
            return null;
        }

        $totalStudentEnrolment = $this->enrolmentRepository->getTotalEnrolmentByStudent($studentId);

        $studentWaitList = $this->waitListRepository->getStudentTotalWaitListCount($studentId);

        if($student->limit >  ($totalStudentEnrolment + $studentWaitList)){

            if($student->limit - $totalStudentEnrolment === 1){
                $this->enrolmentRepository->enrolStudentInCourse($studentId, $courseId);
            }

          //  $this->waitListRepository

        }

    }
}
