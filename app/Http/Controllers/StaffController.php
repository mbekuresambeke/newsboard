<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Response;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');

    }

    public function index(){

        $staffs = User::all();

        return view('auth.staff', compact('staffs'));
    }

    public function store(Request $request){

        try{

            if (User::create(['name' => $request->name, 'email' => $request->email,
                'phone_number' => $request->mobile,
                'password' => bcrypt($request->password),
                'role' => $request->role, 'department' => $request->department]))

            {
                flash('Staff Successfully Added!', 'success');
            };

        }catch (Exception $exception){

            abort(500, 'Oops something went wrong!');

        }

        return back();
    }

    public function remove($id)
    {

        try {

            if ($id == 1)
            {
                flash('This user can not be deleted!', 'warning');

                return redirect()->back();

            }elseif (Auth::id() == $id){

                flash('You can not remove yourself!', 'warning');

                return redirect()->back();
            }

            elseif (User::find($id)->delete()){

                flash('Staff successfully removed!', 'danger');

            }

        }catch (Exception $exception)
        {
            abort(500, 'Oops something went wrong!');
        }
        return back();
    }

    public function edit(Request $request)
    {
        if ($request->ajax()){

            $staff = User::find($request->id);

            return Response::json($staff);
        }else{
            return abort(500);
        }
    }

    public function update(Request $request)
    {

        $staff = User::find($request->id);

        try{
            if ($staff->update($request->only('name', 'email', 'mobile','role', 'department')))
            {

                flash('Staff successfully updated!', 'warning');

            }
            else{
                abort(500);
            }

        }catch (Exception $e){
            abort(500, 'Oops something went wrong!');
        }
        return back();
    }
}
