<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TagihanEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pemesanan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pemesanan)
    {
        $this->pemesanan = $pemesanan;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gudang-rsud.ulin@gmail.com')
            ->view('invoice')
            ->with(
                [
                    'nama' => 'Admin Gudang RSUD Ulin',
                    'unit' => $this->pemesanan->unit->nama_unit,
                ])
            ->attach(public_path('/invoice') . '/invoice-' . $this->pemesanan->id . '.' . 'pdf', [
                'as' => $this->pemesanan->id . '.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
