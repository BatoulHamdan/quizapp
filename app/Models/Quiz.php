<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $primaryKey = 'idquiz';
    protected $fillable = ['id', 'title', 'total'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'idquiz', 'idquiz');  // Define relationship with Question
    }
}
