<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $primaryKey = 'idques';
    protected $fillable = ['id', 'idquiz', 'question', 'choice_1', 'choice_2', 'choice_3', 'choice_4', 'answer'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'idquiz', 'idquiz');  // Define relationship with Quiz
    }
}
