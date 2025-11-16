<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'created_by'    => $this->created_by,
            'subject_id'    => $this->subject_id,
            'difficulty'    => $this->difficulty,
            'type'          => $this->type,
            'question_text' => $this->question_text,
            'options'       => $this->options,
            'answer'        => $this->answer,
            'created_at'    => $this->created_at,
        ];
    }
}
