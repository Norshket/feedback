<?php

namespace App\Services\Feedbacks;

use App\Services\Feedbacks\FeedbackSave\SandInterface;
use App\Services\Feedbacks\FeedbackSave\SandToDBService;
use App\Services\Feedbacks\FeedbackSave\SandToFileService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FeedbackService
{
    /**
     * @return SandInterface
     */
    private function getInstance(): SandInterface
    {
        if ($this->checkDBConnection()) {
            return new SandToDBService();
        }
        return new SandToFileService();
    }


    /**
     * @param array $data
     * 
     * @return bool
     */
    public function send(array $data): bool
    {
        $service = $this->getInstance();
        return $service->send($data);
    }



    /**
     * проверяем подключение к базе данных
     * 
     * @return bool
     */
    public function checkDBConnection(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
