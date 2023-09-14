<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = '21312089_aditya';

    protected $fillable = ['npm', 'nama', 'alamat'];
}
