<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Gate::denies('logged-in')){
            dd("no access allowed");

            }
        if(Gate::allows('is-super-admin')){
            return view('super-admin.users.index', ['users' => User::paginate(10)]);
        }



        /* unprotected rout for testing and creating and admin*/
       // return view('super-admin.users.index', ['users' => User::paginate(10)]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.users.create', ['roles'=> Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validatedData =  $request->validated();

       $user = User::create($validatedData);

       $user->roles()->sync($request->roles);
       $request->session()->flash('success', "You have Successfully Created a New User '".$user->name."'");

       return redirect(route('super-admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('super-admin.users.edit',
            [
                'roles'=> Role::all(),
                'user' => User::find($id)

            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            $request->session()->flash('error', 'User does not exist');
            return redirect(route('super-admin.users.index'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        $request->session()->flash('edited', 'You have successfully updated '.$user->name."'s Information");

        return redirect(route('super-admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        $request->session()->flash('deleted', 'You have Deleted a user');

        return redirect(route("super-admin.users.index"));
    }
}
