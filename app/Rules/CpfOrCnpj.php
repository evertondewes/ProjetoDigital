<?php

namespace ProjetoDigital\Rules;

use Illuminate\Contracts\Validation\Rule;
use Respect\Validation\Validator as Respect;

class CpfOrCnpj implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Respect::cpf()->validate($value) ||
            Respect::cnpj()->validate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O campo :attribute deve ser um CPF ou CNPJ válido!';
    }
}
