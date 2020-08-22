<?php

namespace App\Http\Controllers;

use App\Infrastructure\CourseServiceInterface;
use Illuminate\Http\Request;

class CourseController extends BaseApiController
{
    private $courseService;

    public function __construct(Request $request, CourseServiceInterface $courseService)
    {
        parent::__construct($request);
        $this->courseService  = $courseService;
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    function index(){

        $courseKey =$this->request->get('key') ;
        $courseLimit = $this->request->get('limit');
        return $this->courseService->addCourse($courseKey, $courseLimit);
    }

    function addCourse(){
    $key  = $this->request->get('key');
    }
}
