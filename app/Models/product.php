<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'unit', 'unitPrice', 'category', 'image_url', 'description', 'user_id'];

    public function getCategory(){
        if($this->category == 'Meat') return 'FRESH MEAT';
        elseif($this->category == 'Vegetable') return 'FRESH VEGETABLE';
        elseif($this->category == 'Fish') return 'FRESH FISH';
        else return ucfirst($this->category);
    }

    public function scopeFilter($query, array $filters){
       //null coalesce operator in laravel 
       // same as isset($filter['search'])
        if($filters['search'] ?? false){
            $query->where('name', 'like','%'. $filters['search'].'%')
            ->orWhere('category', 'like','%'. $filters['search'].'%')
            ->orWhere('description', 'like','%'. $filters['search'].'%');
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');

    }
    
}
