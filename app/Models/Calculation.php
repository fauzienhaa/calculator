<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'calculations';
    protected $fillable = [
        'id', 'operand1', 'operand2', 'result', 'operator'
    ];
}
