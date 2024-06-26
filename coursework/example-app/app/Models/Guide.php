<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
        'surname',
        'description',
        'photo',
        'id_region'
    ];
}
