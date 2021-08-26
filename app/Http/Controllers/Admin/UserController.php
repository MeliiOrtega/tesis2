<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware('can:Leer usuarios')->only('index', 'show');
        $this->middleware('can:Editar usuarios')->only('edit', 'update');
        $this->middleware('can:Eliminar usuarios')->only('destroy');
    }

    public function index()
    {
        return view('admin.users.index');
    }


    public function edit(User $user)
    {
        $roles =Role::all();
        return view('admin.users.edit', compact('user', 'roles') );
    }

    public function update(Request $request, User $user)
    {

        $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.edit', $user);
        /* foreach ($request->roles as $rol) {
            if($rol == 'voluntario'){
                $user->update([
                    'role' => 'voluntario'
                ]);
                $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.edit', $user);
            }
            else{
                $user->update([
                    'role' => 'usuario'
                ]);
                $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.edit', $user);
            }
        } */

       /*  if ($request->name == 'voluntario') {

            $user->update([
                'role' => 'voluntario'
            ]);

            $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.edit', $user);
        } */
        /* elseif ($user->roles('voluntario')){

            $user->update([
                'role' => 'voluntario'
            ]);
           // $user->save();
            $user->roles()->sync($request->roles);
            return redirect()->route('admin.users.edit', $user);
        } */

    }

    public function show(User $user){
        $courses = Course::where('user_id',$user->id)->latest('id')->paginate();

        return view('admin.users.show', compact('user', 'courses'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('info', 'El usuario se ha eliminado');
    }


}
