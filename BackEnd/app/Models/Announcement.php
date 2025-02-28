<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcement';

    protected $fillable = [
        'titre',
        'description',
        'type',
        'prix',
        'createur_id'
    ];

    public function createur()
    {
        return $this->belongsTo(User::class, 'createur_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'annonce_id');
    }
}
