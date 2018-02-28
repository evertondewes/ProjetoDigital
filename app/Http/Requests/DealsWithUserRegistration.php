<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Address;
use ProjetoDigital\Models\PhoneNumber;

trait DealsWithUserRegistration
{
    protected function hasAnyDataOf($table)
    {
        return $this->hasAny(
            ...array_keys(config("validation.rules.{$table}"))
        );
    }

    protected function createPerson()
    {
        return Person::create(
            $this->only(['name', 'email', 'cpf_cnpj', 'crea_cau'])
        );
    }

    protected function createAddress($personId)
    {
        return Address::create($this->only([
            'number', 'street', 'district', 'city_id'
        ]) + ['person_id' => $personId]);
    }

    protected function createPhoneNumber($personId)
    {
        return PhoneNumber::create($this->only([
            'phone', 'area_code'
        ]) + ['person_id' => $personId]);
    }

    protected function createUser(array $additional = null)
    {
        $data = [
            'username' => $this->input('username'),
            'password' => bcrypt($this->input('password')),
        ];

        return is_null($additional)
            ? User::create($data)
            : User::create($data + $additional);
    }
}
