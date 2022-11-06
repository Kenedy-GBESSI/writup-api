<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title','summary','picture_url'];
    public function users(){
        return $this->belongsToMany(User::class,'user_book');
    }
    public function chapters(){
        return $this->hasMany(Chapter::class);
    }
}
