<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unit', 'unitPrice', 'category'];

    public function getCategory(){
        if($this->category == 'Meat') return 'FRESH MEAT';
        elseif($this->category == 'Vegetable') return 'FRESH VEGETABLE';
        elseif($this->category == 'Fish') return 'FRESH FISH';
        else return ucfirst($this->category);
    }
}
