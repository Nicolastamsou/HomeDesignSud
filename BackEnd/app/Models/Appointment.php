<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';

    protected $fillable = [
        'user_id',
        'annonce_id',
        'date_heure',
        'statut',
        'paiement_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function announcement()
    {
        return $this->belongsTo(Announcement::class, 'annonce_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'paiement_id');
    }
}
