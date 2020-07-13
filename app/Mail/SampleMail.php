<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SampleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     // 引数で受け取る変数
     protected $title;
     protected $text;
     // コンストラクタ設定
    public function __construct($name, $text)
    {
        // 引数で受け取ったデータを変数にセット
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
        return $this->from('firstdouga@gmail.com')->subject($this->title)->text('inspiration/emails/buy_email')->with(['text' => $this->text]);
    }
}
