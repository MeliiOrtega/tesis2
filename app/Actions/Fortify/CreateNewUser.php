<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\Rules\Password;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required', 'max:10', 'min:10'],
            'password' => ['required', 'confirmed', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],

            'password' => Hash::make($input['password']),
            'role' => 'usuario',
            'phone' => $input['phone'],
            'fecha' => $input['fecha']
        ]);

        $user->assignRole('usuario');
        return $user;

       /*  $role = $input['role'];
        if($role == 'voluntario'){
            $user->assignRole('voluntario');
            return $user;
        }
        elseif($role == 'usuario'){
            $user->assignRole('usuario');
            return $user;
        } */



    }
}
