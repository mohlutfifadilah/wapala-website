<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oprec extends Model
{
    use HasFactory;
    protected $table = 'oprec';

    protected $guarded = ['id'];

    public $timestamps = true;
}
