<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'photo'
    ];


    public function list()
    {
        return $this->hasMany(Tour::class);
    }
}