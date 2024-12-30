<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes'; 
    protected $primaryKey = 'id'; 
    public $incrementing = true; 
    public $timestamps = true; 

    protected $fillable = ['title', 'user_id']; 

    public function questions()
    {
        return $this->hasMany(Question::class, 'idquiz', 'id'); 
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'idquiz');
    }
}

