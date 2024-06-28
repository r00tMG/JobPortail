<?php

namespace App\Mail;

use App\Models\Candidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmploiCandidatureEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Candidature 
     */
    public $candidature;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Candidature $candidature)
    {
        $this->candidature = $candidature;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('employeur@employeur.com', 'Employeur')
                    ->markdown('emails.emplois.candidature');
    }
}
