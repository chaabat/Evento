<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [

        'id',
        'titre',
        'date',
        'statut',
        'nombrePlace',
        'user_id',
        'evenement_id'


    ];
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
