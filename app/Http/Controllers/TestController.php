<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquents\TestRepository;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    protected $testRepository;
    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function getAllTest()
    {
        return $this->testRepository->getAllTest();
    }

    public function getTest($id)
    {
        Log::info('getTest id'.$id);
        return $this->testRepository->getTest($id);
    }

    public function createTest(Request $request)
    {
        $this->testRepository->createTest($request);
    }

    public function updateTest($id, Request $request)
    {
        $this->testRepository->updateTest($id, $request);
    }

    public function deleteTest(Request $request)
    {
        return $this->testRepository->deleteTest($request["id"]);
    }
}
