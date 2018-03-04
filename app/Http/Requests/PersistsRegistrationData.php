<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Address;
use ProjetoDigital\Models\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

trait PersistsRegistrationData
{
    protected function createPerson()
    {
        return Person::create(
            $this->request()->only(['name', 'email', 'cpf_cnpj', 'crea_cau'])
        );
    }

    protected function createAddress($personId)
    {
        return Address::create($this->request()->only([
            'number', 'street', 'district', 'city_id'
        ]) + ['person_id' => $personId]);
    }

    protected function createPhoneNumber($personId)
    {
        return PhoneNumber::create($this->request()->only([
            'phone', 'area_code'
        ]) + ['person_id' => $personId]);
    }

    protected function createUser(array $additional = null)
    {
        $data = [
            'username' => $this->request()->input('username'),
            'password' => bcrypt($this->request()->input('password')),
        ];

        return is_null($additional)
            ? User::create($data)
            : User::create($data + $additional);
    }

    protected function request()
    {
        return is_subclass_of($this, FormRequest::class) ? $this : request();
    }
}
