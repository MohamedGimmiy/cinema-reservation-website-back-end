<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\reservation;
use App\Screen;

class Movie extends Model
{
    // Assign user and fill it with fields name
    protected $table = 'movie';
    public $timestamps = false;

    protected $fillable = [
        "MovieID",
        "MovieName",
        "image",
        "description",
        "Gere",
        "Length"
    ];

    // many to many
    public function reservation(){
        return $this->belongsToMany(reservation::class);
    }

    public function screen(){
        return $this->belongsToMany(Screen::class);
    }



}
