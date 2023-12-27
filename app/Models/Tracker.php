<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

//    protected $table = 'tracker';
//    public $timestamps = false;

    protected $fillable = [
        'public_id',
        'created_at',
        'updated_at',
    ];
}
