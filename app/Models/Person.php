<?php

namespace ProjetoDigital\Models;

use Illuminate\Database\Eloquent\Model;
use Respect\Validation\Validator as Respect;

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
        return $this->belongsToMany(Project::class)->withTimestamps();
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

    public function getAddressAttribute()
    {
        return $this->addresses()->latest()->first();
    }

    public function getCpfCnpjAttribute($value)
    {
        $value = preg_replace('/\D+/', '', $value);

        $result = '';

        if (Respect::cpf()->validate($value)) {
            $result .= substr($value, 0, 3) . '.';
            $result .= substr($value, 3, 3) . '.';
            $result .= substr($value, 6, 3) . '-';
        } elseif (Respect::cnpj()->validate($value)) {
            $result .= substr($value, 0, 2) . '.';
            $result .= substr($value, 2, 3) . '.';
            $result .= substr($value, 5, 3) . '/';
            $result .= substr($value, 8, 4) . '-';
        }

        $result .= substr($value, -2);

        return $result;
    }
}
