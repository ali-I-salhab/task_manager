<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{protected $table="tasks";
   protected $fillable = ['tit','des','prio'];
}
//  php artisan make:model -m
// we her create both model and migration file e
// after that we detect fields and migrate
// with the following command
// php artisan migrate
// php artisan make:model -m -c,
