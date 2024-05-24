<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PromotionNotification extends Notification
{
    use Queueable;
    protected $name;
    protected $date_debut;
    protected $date_fin;
    protected $details_promo;




    /**
     * Create a new notification instance.
     */
    public function __construct($name,$date_debut,$date_fin,$details_promo)
    {
        $this->name= $name;
        $this->date_debut= $date_debut;
        $this->date_fin = $date_fin;
        $this->details_promo= $details_promo;




    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
   public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Promotion chez " . $this->name)
                    ->line("L'établissement " . $this->name . " fait une promotion du : " . $this->date_debut . " au " . $this->date_fin . ". Voici les détails de la promotion : " . $this->details_promo)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
