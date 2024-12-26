<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes'; // Set the table name
    protected $primaryKey = 'id'; // Set the primary key
    public $incrementing = true; // Ensure primary key is auto-incrementing
    public $timestamps = true; // Enable timestamps

    protected $fillable = ['title', 'user_id']; // Allow these fields

    public function questions()
    {
        return $this->hasMany(Question::class, 'idquiz', 'id'); // Define relationship to questions
    }
}

