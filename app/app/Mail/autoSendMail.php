<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class autoSendMail extends Mailable
{
    use Queueable, SerializesModels;

    // 引数で受け取ったデータ用の変数
    protected $session_data;
    protected $title;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='テスト', $text='テストです', $session_data=['items' => [1,2,3,4,5], 'sum' => '1000000'])
    {
        // 引数で受け取ったデータを変数にセット
        $this->title = sprintf('%sさん、ありがとうございます。', $name);
        $this->text = $text;
        $this->session_data = $session_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // foreach ($this->session_data['items'] as $session_item){
        //     echo ($session_item->item_name);
        //     echo ($session_item->price . '円');
        // }

        return $this->view('emails.autoSend')
        ->text('emails.autoSend')
        ->subject($this->title)
        ->with([
            'text' => $this->text,
            'session_data' => $this->session_data,
        ]);
    }
}