<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\reservation;

class User extends Model
{
    // Assign user and fill it with fields name
    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = [
        "UserName",
        "FirstName",
        "LastName",
        "Password",
        "Email",
        "BirthDate",
        "Type"
    ];

    // one to many relationship
    public function reservation(){

        return $this->hasMany(reservation::class);
        
    }


}
