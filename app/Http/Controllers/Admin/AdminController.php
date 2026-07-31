<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index()
    {

        $admins = Admin::paginate(20)->withQueryString();

        return view(
            'admin.admins.index',
            compact('admins')
        );

    }


    public function create()
    {

        return view(
            'admin.admins.create'
        );

    }


    public function store(Request $request)
    {

        Admin::create([

            'full_name' => $request->full_name,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
            'status'    => $request->status,

        ]);


        return redirect()
            ->route('admin.admins.index');

    }

    public function edit(Admin $admin)
    {


        return view(
            'admin.admins.edit',
            compact('admin')
        );

    }

    public function update(Request $request, Admin $admin)
    {

        $data = $request->only([
            'name',
            'email',
        ]);


        if ($request->filled('password')) {

            $data['password'] = bcrypt(
                $request->password
            );

        }

        $admin->update($data);


        return redirect()
            ->route('admin.admins.index');


    }

    public function destroy(Admin $admin)
    {


        $admin->delete();


        return redirect()
            ->route('admin.admins.index');


    }

}
