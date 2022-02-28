<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'id_title', 'ch_title', 'note', 'number_chapter', 'number_chapter_done', 'cost_of_translate'
    ];

    public function chapter()
    {
        return $this->hasMany('DocumentChapter');
    }
}
