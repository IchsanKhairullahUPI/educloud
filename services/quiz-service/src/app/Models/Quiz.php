<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\QuizQuestion;

class Quiz extends Model
{
    protected $fillable = [
        'title', 'description', 'duration_minutes', 'created_by'
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}