<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use ModelTrait;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function getFormattedAddressAttribute()
    {
        $address = $this->addresses()->latest()->first();

        return "{$address->street} {$address->number}, {$address->district}";
    }
}
