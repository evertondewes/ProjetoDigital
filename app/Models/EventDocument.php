<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDocument extends Model
{
    use ModelTrait, SoftDeletes;

    protected $dates = ['deleted_at'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
