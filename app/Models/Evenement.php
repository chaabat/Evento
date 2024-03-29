<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Evenement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'titre',
        'description',
        'date',
        'lieu',
        'price',
        'picture',
        'totalPlaces',
        'mode',
        'statut',
        'user_id',
        'categorie_id'

    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
