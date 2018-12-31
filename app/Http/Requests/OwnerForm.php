<?php

namespace ProjetoDigital\Http\Requests;

use Exception;
use Auth;
use ProjetoDigital\Facades\Rules;
use ProjetoDigital\Models\Project;
use ProjetoDigital\Facades\People;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class OwnerForm extends FormRequest
{
    use PersistsRegistrationData;

    public function authorize()
    {
        return auth()->user()->isTechnicalManager();
    }

    public function rules()
    {
        return Rules::people();
    }

    public function persist()
    {
        try {
            DB::beginTransaction();

            $person = $this->createPerson();
            $this->createAddress($person->id);
            $this->createPhoneNumber($person->id);

            DB::commit();

            return $person;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }
}
