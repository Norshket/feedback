<?php

namespace App\Services\Feedbacks\FeedbackSave;

use App\Feedbacks\Feedback;
use App\Services\Feedbacks\FeedbackSave\SandInterface;

class SandToDBService implements SandInterface
{
    /**
     * @param array $data
     * 
     * @return bool
     */
    public function send(array $data): bool
    {
        Feedback::create($data);
        return true;
    }
}
