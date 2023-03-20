<?php

namespace App\Services\Feedbacks\FeedbackSave;

use App\Services\Feedbacks\FeedbackSave\SandInterface;

class SandToFileService implements SandInterface
{
    /**
     * @param array $data
     * 
     * @return bool
     */
    public function send(array $data): bool
    {
        $email = $data['email'];
        $phone = $data['phone'];
        $text = $data['text'];

        $string = "email:  $email, phone: $phone, text: $text \n";

        file_put_contents(storage_path('/app/public/feedback.txt'),  $string, FILE_APPEND | LOCK_EX);
        return true;
    }
}
