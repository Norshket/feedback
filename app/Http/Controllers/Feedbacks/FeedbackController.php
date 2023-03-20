<?php

namespace App\Http\Controllers\Feedbacks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feedbacks\FeedbackRequest;
use App\Services\Feedbacks\FeedbackService;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{

    protected $service;

    public function __construct(FeedbackService $service)
    {
        $this->service = $service;
    }

    /**
     * @param FeedbackRequest $request
     * 
     * @return JsonResponse
     */
    public function send(FeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();
        return response()->json($this->service->send($data));
    }
}
