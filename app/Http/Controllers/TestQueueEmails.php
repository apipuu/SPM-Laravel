<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\TestQueueEmails;
use App\Jobs\TestSendEmail;
use App\Mail\TestHelloEmail;

class TestQueueEmails extends Controller
{
     public function sendTestEmails()
    {
        $emailJobs = new TestSendEmail();
        $this->dispatch($emailJobs);
    }
}
