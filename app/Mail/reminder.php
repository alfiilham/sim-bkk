<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reminder extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $isi;
    public function __construct($isi)
    {
        $this->isi = $isi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    return $this->subject('test')
                ->view('emails.reminder')
                ->with(
                [
                'nama'=>'Loker Nih',
                'content' => $this->isi,
                'website' => 'www.simbkk.com',
                ]);
    }
}
