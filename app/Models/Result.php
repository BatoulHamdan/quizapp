<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';
    protected $primaryKey = 'id';
    protected $fillable = ['idquiz', 'name', 'result'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'idquiz', 'id');  
    }
}
