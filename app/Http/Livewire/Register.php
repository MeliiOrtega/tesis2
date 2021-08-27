<?php

namespace App\Http\Livewire;

use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{

public $name, $email, $password, $password_confirmation, $phone;
public $fecha, $cedula, $ocupacion, $direccion;

    /* public $form = [

        'email' => '',
        'name' => '',
        'password' => '',
        'password_confirmation' => '',
        'role' => '',
        'phone' => '',
        'fecha' => '',
        'cedula' => '',
        'ocupacion' => '',
        'direccion' => ''
    ]; */
    protected function rules (){
        return [
        'email' => 'required|string|email|max:255|unique:users',
        'name' => 'required',
        'password' =>['required', 'confirmed',
            'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
        ],
        'password_confirmation' => 'required',
        'phone' => 'required||regex:/^[0-9]{10}$/',
        'fecha' => 'required',
        'cedula' => 'required|regex:/^[0-9]{10}$/',
        'ocupacion' => 'required',
        'direccion' => 'required|'

        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submit(){

        $this->validate();
    /* public $this->validate([
        'form.email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'form.name' => 'required',
        'form.password' => ['required', 'confirmed', Password::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()],
        'form.phone' => ['required', 'min:10', 'max:10', 'integer'],
        'form.fecha' => 'required',
        'form.cedula' => ['required', 'min:10', 'max:10', 'integer'],
        'form.ocupacion' => 'required',
        'form.direccion' => 'required'
        ]); */
        $hashPass = Hash::make($this->password);

        $user = User::create([
        'email' => $this->email,
        'name' => $this->name,
        'password' =>$hashPass,
        'phone' => $this->phone,
        'role' => 'voluntario',
        'fecha' => $this->fecha,
        'cedula' => $this->cedula,
        'ocupacion' => $this->ocupacion,
        'direccion' => $this->direccion
        ]);
        if ($user) {
            $user->assignRole('voluntario');
            return redirect(route('login'));
        }


    }
    public function render()
    {
        return view('livewire.register');
    }
}
