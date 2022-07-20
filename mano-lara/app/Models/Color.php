<?php

namespace App\Models;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public function animalDelete(){
        return $this->hasMany(Animal::class, 'color_id', 'id');
    }
}
