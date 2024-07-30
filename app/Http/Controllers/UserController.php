<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use function Laravel\Prompts\password;

class UserController extends Controller
{

    public  function __construct()
    {
//        Gate:$this->authorize('admin_control');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email|string|unique:users,email',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required|min:8|same:password'
        ]);
        User::create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findOrFail($id);

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::findOrFail($id);
        $data=$request->validate([
            'name'=>'required|string',
            'email'=>['required','email',Rule::unique('users')->ignore($user->id)],
            'password'=>'nullable|min:8|confirmed',
        ]);

        $data['password']=$request->has('password')?hash::make($request->password):$user->password;
        User::where('id',$id)->update($data);
        return redirect()->route('users.index');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public  function posts($id){
        $user=User::findOrFail($id);
        return view('users.posts',compact('user'));
    }

}
