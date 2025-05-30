<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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

    public static function roles() : array
    {
        return [
            'cliente' => 'Cliente',
            'taller' => 'Taller',
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

    public function isCliente()
    {
        return $this->role === 'cliente';
    }

    public function isTaller()
    {
        return $this->role === 'taller';
    }

    public function citas()
    {
        return $this->hasMany(Cita::class,'cliente_id');
    }

}
