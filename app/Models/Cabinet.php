<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    use HasFactory;

    protected $fillable = [
        'cab_number',
        'row1',
        'row2',
        'row3',
        'row4',
        'row5',
        'row6',
        'row7',
        'row8',
        'row9',
        'row10',
    ];
}
