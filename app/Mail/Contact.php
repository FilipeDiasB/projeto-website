<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    private $data;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->data['reply_email'], $this->data['reply_name'])
            ->to(env('EMAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->from(env('EMAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->subject('Novo Contato', $this->data['subject'])
                        ->markdown('contact.email', [
                            'reply_name' => $this->data['reply_name'],
                            'reply_email' => $this->data['reply_email'],
                            'subject' => $this->data['subject'],
                            'message' => $this->data['message']
                        ]);
    }
}
