<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use ModelTrait;

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function save(array $options = array())
    {
        if(empty($this->created_by)) {
            $this->created_by = auth()->id();
        }
        return parent::save($options);
    }
}
