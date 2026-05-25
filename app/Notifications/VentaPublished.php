<?php

namespace App\Notifications;

use App\Models\Venta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VentaPublished extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected Venta $venta)
    {
        //
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
        $url = url('/ventas/' . $this->venta->id);
        return (new MailMessage)
            ->greeting('Buen día')
            ->line('Has publicado una nueva venta')
            ->line('Descripción: ' . $this->venta->descripcion)
            ->line('Precio: $' . number_format($this->venta->precio, 2))
            ->action('Ver venta', $url)
            ->line('Gracias por usar la app!');
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
