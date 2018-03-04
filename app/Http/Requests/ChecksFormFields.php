<?php

namespace ProjetoDigital\Http\Requests;

trait ChecksFormFields
{
    protected function hasAnyDataOf($table)
    {
        return $this->hasAny(
            ...array_keys(config("validation.rules.{$table}"))
        );
    }
}
