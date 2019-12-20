<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class autoSendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $session_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='テスト', $text='テストです。')
    {
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.autoSend')
        ->text('emails.autoSend')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
        ]);
    }
}