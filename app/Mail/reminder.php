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
    return $this->subject('Info Lowongan')
                ->view('emails.reminder')
                ->with(
                [
                'nama' => 'Pelamar Tangguh',
                'intro' => 'Melalui email ini kami ingin mengirimkan penawaran lowongan terbaru yang sesuai dengan jurusan yang Anda minati .',
                'content' => $this->isi,
                'closing' => 'Demikian email penawaran dari kami  Atas perhatian dari Bapak/Ibu kami ucapkan terima kasih.',
                'website' => 'www.simbkk.com',
                ]);
    }
}
