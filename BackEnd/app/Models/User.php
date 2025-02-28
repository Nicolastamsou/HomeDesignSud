<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Model Utilisateur
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'telephone',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'createur_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'utilisateur_id');
    }
}
