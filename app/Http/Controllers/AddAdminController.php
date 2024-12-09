<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AddAdminController extends Controller
{
    public function add(Request $request)
    {

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password); 
        $admin->usertype = $request->usertype;


        $result = $admin->save();

   
        if ($result) {
            return redirect()->route('admin.employees')->with('success', 'Admin added successfully!');
        } else {
            return redirect()->route('admin.employees')->with('error', 'Failed to add admin.');
        }
    }

    public function list()
    {
        // Fetch only admins
        $admins = User::where('usertype', 'admin')->get();
        
        return view('admin.employees', ['admins' => $admins]);
    }

    public function delete($id)
    {
        $isDeleted = User::destroy($id);

        if ($isDeleted) {
            return redirect('/admin/employees')->with('success', 'Record deleted successfully.');
        } else {
            return redirect('/admin/employees')->with('error', 'Failed to delete the record.');
        }
    }
}
