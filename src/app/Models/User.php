<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
    * Comprueba si tiene rol administrador
    * 
    * @return boolean
    */
    public function isAdmin() : boolean
    {
        return $this->role === 'admin';
    }

    public static function roles() : array
    {
        return [
            'user' => 'Usuario',
            'admin' => 'Administrador',
        ];
    }

    public static function rules($userId = null)
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $userId,
            'password' => 'required|min:8',
            'role' => 'required'
        ];
    }

    public function esCliente()
    {
        return $this->rol === 'cliente';
    }

    public function esTaller()
    {
        return $this->rol === 'taller';
    }

}
