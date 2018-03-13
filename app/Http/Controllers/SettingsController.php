<?php

namespace ProjetoDigital\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use ProjetoDigital\Models\PhoneNumber;
use ProjetoDigital\Models\User;
use ProjetoDigital\Repositories\Rules;

class SettingsController extends Controller
{
    public function show()
    {
        return view('settings.show', [
            'user' => auth()->user(),
        ]);
    }

    public function editEmail()
    {
        return view('settings.email', [
            'user' => auth()->user(),
        ]);
    }

    public function updateEmail()
    {
        $user = auth()->user();

        if (! Hash::check(request('password'), $user->password)) {
            return $this->dangerResponse('Senha incorreta! Tente novamente.');
        }

        $this->validate(request(), ['email' => $user->person->updateRule('email')]);

        $user->person->users()->update(request(['email']));
        $user->person->update(request(['email']));

        $this->alert('E-mail atualizado com sucesso!');

        return back();
    }

    public function editUsername()
    {
        return view('settings.username', [
            'user' => auth()->user(),
        ]);
    }

    public function updateUsername()
    {
        $user = auth()->user();

        if (! Hash::check(request('password'), $user->password)) {
            return $this->dangerResponse('Senha incorreta! Tente novamente.');
        }

        $this->validate(request(), ['username' => $user->updateRule('username')]);

        $user->update(request(['username']));

        $this->alert('Nome de usuário atualizado com sucesso!');

        return back();
    }

    public function editPassword()
    {
        return view('settings.password', [
            'user' => auth()->user(),
        ]);
    }

    public function updatePassword(Rules $rules)
    {
        $user = auth()->user();

        if (! Hash::check(request('current_password'), $user->password)) {
            return $this->dangerResponse('Senha atual incorreta! Tente novamente.');
        }

        $this->validate(request(), ['password' => $rules->table('users', 'password')]);

        $user->update(['password' => bcrypt(request('password'))]);

        $this->alert('Senha atualizada com sucesso!');

        return back();
    }

    public function editAddress()
    {
        return view('settings.address', [
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

        return view('settings.phone-numbers', compact('phoneNumbers'));
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
