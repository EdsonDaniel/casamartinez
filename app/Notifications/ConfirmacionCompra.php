<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Pedido;
class ConfirmacionCompra extends Notification
{
    use Queueable;
    public $productos;
    public $usuario;
    public $url;
    public $total;
    public $costo_envio;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($prods, $nombre, $url_pedido, $tot, $envio)
    {
        $this->productos = $prods;
        $this->usuario   = $nombre;
        $this->url = $url_pedido;
        $this->total = $tot;
        $this->costo_envio = $envio;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$data = ['productos' => $productos, 'nombre' => $nombre, 'url' => $url];

        return ((new MailMessage)
                        ->greeting('¡Hola '.$this->usuario.'!')
                        ->line('Comenzaremos a preparar tu pedido y te haremos saber en cuanto lo tengamos listo y lo hallamos enviado.')
                        ->line('También te compartiremos el número de rastreo de tu paquete para que puedas estar informado sobre su seguimiento.')

                        ->action('Ver pedido', url($this->url))
                        ->line('¡Gracias por comprar en Casa Martínez!')
                        ->markdown('mail.compras.compraExitosa', 
                            ['productos' => $this->productos,
                             'costo_envio' => $this->costo_envio,
                             'total' => $this->total,
                             'url' => $this->url
                        ])
                    );

        /*return (new MailMessage)
                    ->greeting('Gracias por tu compra')
                    ->line('The introduction to the notification.')
                    ->action('Ver pedido', url('/'))
                    ->line('Thank you for using our application!');*/
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
