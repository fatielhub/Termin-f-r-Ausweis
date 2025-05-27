<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Precommande;

class NouvellePrecommande extends Notification
{
    use Queueable;

    public $precommande;

    public function __construct(Precommande $precommande)
    {
        $this->precommande = $precommande;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle précommande CNIE')
            ->greeting('Bonjour Admin,')
            ->line('Une nouvelle précommande a été soumise.')
            ->line('Nom: ' . $this->precommande->nom)
            ->line('Prénom: ' . $this->precommande->prenom)
            ->line('Centre: ' . optional($this->precommande->centre)->nom)
            ->line('Code de suivi: ' . $this->precommande->code_suivi)
            ->action('Voir dans l\'admin', url('/admin/precommandes'))
            ->line('Merci d\'utiliser la plateforme CNIE.');
    }
} 