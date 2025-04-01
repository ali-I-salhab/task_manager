<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
protected $guarded = [];
// Define an inverse one-to-one or many relationship
public function user(){
    echo "ddddddddddddddd";
    return $this->belongsTo(User::class);
}
}
