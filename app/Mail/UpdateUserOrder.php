<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Cart;

class UpdateUserOrder extends Mailable
{
    use Queueable, SerializesModels;
    // Creamos los atribuots publicos para acceder en el mail
    public $user;
    public $cart;


    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(User $user, Cart $cart)
     {
         //
         $this->user = $user;
         $this->cart = $cart;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->view('emails.user-order')->subject('Tu Pedido fue Actualizado');
    }
}
