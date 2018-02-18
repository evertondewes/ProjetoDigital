<?php

namespace ProjetoDigital\Http\Requests;

use ProjetoDigital\Models\User;
use ProjetoDigital\Models\Role;
use ProjetoDigital\Models\Person;
use ProjetoDigital\Models\Address;
use ProjetoDigital\Models\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];

        if ($this->hasAnyDataOf('people')) {
            $rules += config('validation.rules.people');
        }

        if ($this->hasAnyDataOf('addresses')) {
            $rules += config('validation.rules.addresses');
        }

        if ($this->hasAnyDataOf('phone_numbers')) {
            $rules += config('validation.rules.phone_numbers');
        }

        $rules += config('validation.rules.users');

        return $rules;
    }

    protected function hasAnyDataOf($table)
    {
        return $this->hasAny(
            ...array_keys(config("validation.rules.{$table}"))
        );
    }

    public function persist()
    {
        if ($this->hasAnyDataOf('people')) {
            $person = $this->createPerson();

            if ($this->hasAnyDataOf('addresses')) {
                $this->createAddress($person->id);
            }

            if ($this->hasAnyDataOf('phone_numbers')) {
                $this->createPhoneNumber($person->id);
            }
        }

        $role = $this->normalizeRole($person ?? null);

        return $this->createUser([
            'email' => isset($person) ? $person->email : 'email@temporario.com',
            'role_id' => Role::where('name', $role)->first()->id,
            'person_id' => isset($person) ? $person->id : null,
        ]);
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

    protected function normalizeRole($person)
    {
        if ($this->has('access')) {
            return $this->input('access');
        }

        if ($person) {
            return $person->crea_cau ? 'responsavel_tecnico' : 'cliente';
        }

        return 'cliente';
    }
}
