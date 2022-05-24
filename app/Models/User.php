<?php

namespace App\Models;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'admin' => 'required',
        'password' => 'required|confirmed|min:6'
    ];

    static $messages = [
        'required' => 'El campo :attribute es obligatorio',
        'confirmed' => 'El campo :attribute no coincide.',
        'same' => 'El campo :attribute y :other deben ser iguales'
    ];

    static $customAttributes = [
        'name' => 'nombre'
    ];
    
    use HasApiTokens, HasFactory, Notifiable;
    public $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'admin',
        'password',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function receivesBroadcastNotificationsOn()
    {
        return 'users.'.$this->id;
    }
}
