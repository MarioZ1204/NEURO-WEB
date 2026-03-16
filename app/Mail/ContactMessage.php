<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $htmlContent;

    public function __construct($data, $htmlContent)
    {
        $this->data = $data;
        $this->htmlContent = $htmlContent;
    }

    public function build()
    {
        return $this
            ->subject('🔔 NUEVO FORMULARIO - ' . ucfirst($this->data['type']) . ' - ' . $this->data['subject'])
            ->html($this->htmlContent)
            ->replyTo($this->data['email'], $this->data['name']);
    }
}
