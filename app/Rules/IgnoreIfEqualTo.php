<?php

namespace ProjetoDigital\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class IgnoreIfEqualTo implements Rule
{
    protected $value;
    protected $table;

    /**
     * Create a new rule instance.
     *
     * @param $value
     * @param $table
     */
    public function __construct($value, $table)
    {
        $this->value = $value;
        $this->table = $table;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->value === $value ||
            DB::table($this->table)->where($attribute, $value)->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O dado do campo :attribute já está sendo usado por outro usuário!';
    }
}
