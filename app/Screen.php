<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;
class Screen extends Model
{
    // Assign user and fill it with fields name
    protected $table = 'screen';
    public $timestamps = false;

    protected $fillable = [
        "ScreenNumber",
        "MaxCol",
        "MaxRow"
    ];

    public function movie(){
        return $this->belongsToMany(Movie::class);
    }
}
