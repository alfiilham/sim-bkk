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
    private $instansi;
    private $type;
    public function __construct($isi,$instansi,$type)
    {
       $this->isi = $isi;
       $this->instansi = $instansi;
       $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->type == "info lowongan"){

            return $this->Subject('Info Lowongan')
                        ->view('emails.reminderInfoLowongan')
                        ->with(
                        [
                        'nama' => 'Pelamar Tangguh',
                        'intro' => 'Melalui email ini kami ingin menginfokan .',
                        'instansi' => 'info Lowongan dari '.$this->instansi,
                        'content' => $this->isi,
                        'closing' => 'Demikian email dari kami  Atas perhatian dari Bapak/Ibu kami ucapkan terima kasih.',
                        'website' => 'www.simbkk.com',
                        ]);
        }
        elseif($this->type == "lowongan diterima"){
            return $this->Subject('Lamaran Diterima')
                        ->view('emails.reminderLowonganDiterima')
                        ->with(
                        [
                        'nama' => 'Pelamar Tangguh',
                        'intro' => 'Melalui email ini kami ingin menginfokan .',
                        'instansi' => 'info Lamaran anda dari '.$this->instansi,
                        'content' => $this->isi,
                        'closing' => 'Demikian email dari kami  Atas perhatian dari Bapak/Ibu kami ucapkan terima kasih.',
                        'website' => 'www.simbkk.com',
                        ]);
        }
        elseif($this->type == "lowongan ditolak"){
            return $this->Subject('Lamaran Ditolak')
                        ->view('emails.reminderLowonganDiterima')
                        ->with(
                        [
                        'nama' => 'Pelamar Tangguh',
                        'intro' => 'Melalui email ini kami ingin menginfokan .',
                        'instansi' => 'info Lamaran anda dari '.$this->instansi,
                        'content' => $this->isi,
                        'closing' => 'Demikian email dari kami  Atas perhatian dari Bapak/Ibu kami ucapkan terima kasih.',
                        'website' => 'www.simbkk.com',
                        ]);
        }
    }
}
