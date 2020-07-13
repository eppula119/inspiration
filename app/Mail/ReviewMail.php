<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewMail extends Mailable
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
    public function __construct($name, $text)
    {
        // 引数で受け取ったデータを変数にセット
        $this->title = sprintf('%sさんからレビューが投稿されました。', $name);
        $this->text = sprintf('タイトルが、%sのアイディア', $text);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('firstdouga@gmail.com')->subject($this->title)->text('inspiration/emails/review_email')->with(['text' => $this->text]);
    }
}
