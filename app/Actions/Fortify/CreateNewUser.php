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
            'password' => ['required', 'confirmed',
            'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'cedula' => 'required|regex:/^[0-9]{10}$/',
            /* 'ocupacion' => 'required', */
            'direccion' => 'required',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();


        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],

            'password' => Hash::make($input['password']),
            'role' =>  $input['role'],
            'phone' => $input['phone'],
            'fecha' => $input['fecha'],
            'cedula' => $input['cedula'],
            'ocupacion' => $input['ocupacion'],
            'direccion' => $input['direccion']
        ]);

       /*  $user->assignRole('usuario');
        return $user; */

        $role = $input['role'];
        if($role == 'voluntario'){
            $user->assignRole('voluntario');
            return $user;
        }
        elseif($role == 'usuario'){
            $user->assignRole('usuario');
            return $user;
        }



    }
}
