<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentChapter extends Model
{
    protected $fillable = [
        'document_id', 'user_id', 'ch_chapter_title', 'id_chapter_title', 'number_words', 'ch_text', 'id_text', 'status'
    ];

    public function document()
    {
        return $this->belongsTo('Document');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
