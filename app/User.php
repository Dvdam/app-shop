<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use App\Cart;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Previamente definimos la relacion entre usuarios y cart Donde un usuario puede tenere varios carritos
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    


    // // DEfinimos un acceso para el campo cart_id 
    // public function getCartIdAttribute()
    // {
    //     // Buscamos el carito que este activo
    //     $cart = $this->carts()->where('status','Active')->first();
    //     // Si existe alguna concidencia
    //     if ($cart)
    //         return $cart->id;

    //     // Si el usuario no tiene ninngun carrito activo, le creamos uno

    //     // else
    //     $cart = new Cart();
    //     $cart->status = 'Active';
    //     $cart->user_id = $this->id;
    //     $cart->save();

    //     return $cart->id;
    // }
    // DEfinimos un acceso para el campo cart Activo
    public function getCartAttribute()
    {
        // Buscamos el carito que este activo
        $cart = $this->carts()->where('status','Active')->first();
        // Si existe alguna concidencia
        if ($cart)
            return $cart;

        // Si el usuario no tiene ninngun carrito activo, le creamos uno

        // else
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart;
    }

}
