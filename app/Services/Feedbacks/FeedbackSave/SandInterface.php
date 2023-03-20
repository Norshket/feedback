<?php

namespace App\Services\Feedbacks\FeedbackSave;

interface SandInterface
{
    /**
     * send feedback
     * @param array $data
     * 
     * @return bool
     */
    public function send(array $data): bool;
}