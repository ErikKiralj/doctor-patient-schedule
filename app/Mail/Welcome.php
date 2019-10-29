<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Doctor;
use DB;

class Welcome extends Mailable
{


    use Queueable, SerializesModels;
    public $doctor;
    public $data;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Doctor $doctor, $data)
    {
        $this->build($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   

        return $this->view('emails.welcome', compact('data'));
    }
}
