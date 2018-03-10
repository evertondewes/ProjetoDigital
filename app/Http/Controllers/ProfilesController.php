<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use ProjetoDigital\Models\PhoneNumber;
use ProjetoDigital\Models\User;
use ProjetoDigital\Repositories\Rules;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('profiles.show', [
            'user' => auth()->user(),
        ]);
    }

    public function editEmail()
    {
        return view('profiles.email', [
            'user' => auth()->user(),
        ]);
    }

    public function updateEmail()
    {
        $user = auth()->user();

        $user->person->users()->update(request(['email']));
        $user->person->update(request(['email']));

        $this->alert('Email atualizado com sucesso!');

        return back();
    }

    public function editUsername()
    {
        return view('profiles.username', [
            'user' => auth()->user(),
        ]);
    }

    public function updateUsername()
    {
        $user = auth()->user();

        $this->validate(request(), ['username' => $user->updateRule('username')]);

        $user->update(request(['username']));

        $this->alert('Nome de usuário atualizado com sucesso!');

        return back();
    }

    public function editPassword()
    {
        return view('profiles.password', [
            'user' => auth()->user(),
        ]);
    }

    public function updatePassword(Rules $rules)
    {
        $user = auth()->user();

        if (! Hash::check(request('current_password'), $user->password)) {
            $this->alert('Senha atual incorreta! Tente novamente.', 'danger');

            return back();
        }

        $this->validate(request(), ['password' => $rules->table('users', 'password')]);

        $user->update(['password' => bcrypt(request('password'))]);

        $this->alert('Senha atualizada com sucesso!');

        return back();
    }

    public function editAddress()
    {
        return view('profiles.address', [
            'user' => auth()->user(),
        ]);
    }

    public function updateAddress(Rules $rules)
    {
        $user = auth()->user();

        $this->validate(request(), $rules->table('addresses'));

        $user->person->addresses()->create(request([
            'number', 'street', 'district', 'city_id',
        ]));

        $this->alert('Endereço atualizado com sucesso!');

        return back();
    }

    public function showPhoneNumbers()
    {
        $phoneNumbers = auth()->user()->person->phoneNumbers;

        return view('profiles.phone-numbers', compact('phoneNumbers'));
    }

    public function storePhoneNumber(Rules $rules)
    {
        $user = auth()->user();

        $this->validate(request(), $rules->table('phone_numbers'));

        $user->person->phoneNumbers()->create(request([
            'area_code', 'phone',
        ]));

        $this->alert('Telefone criado com sucesso!');

        return back();
    }

    public function destroyPhoneNumber(PhoneNumber $phoneNumber)
    {
        if (Gate::denies('delete-phone-number', $phoneNumber)) {
            abort(403);
        }

        $phoneNumber->delete();

        $this->alert('Telefone excluído com sucesso!');

        return back();
    }

    public function destroy()
    {
        auth()->user()->deactivate();

        auth()->logout();

        $this->alert('Você desativou sua conta com sucesso!');

        return redirect('/login');
    }
}
