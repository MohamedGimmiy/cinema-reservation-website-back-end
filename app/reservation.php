<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{

    protected $table = 'reservations';
    public $timestamps = false;
    
    protected $fillable = [
        "reservationId",
        "UserName"
    ];

    // one to many inverse relationship
    public function user(){
        return $this->belongsTo(User::class);
    }

    // many to many relationship
    public function movie(){
        return $this->belongsToMany(Movie::class);
    }
}
