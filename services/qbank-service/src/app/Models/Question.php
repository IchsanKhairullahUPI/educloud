<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'subject_id',
        'difficulty',
        'type',
        'question_text',
        'options',
        'answer',
    ];

    protected $casts = [
        'options' => 'array',
    ];
}