<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $first_name;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name)
    {
        $this->first_name = $first_name;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        

        return $this->from('info@studify.au')->subject('Mail from Studify')
                    ->view('emails.myTestMail');
    }
}