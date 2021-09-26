<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{

    public function index()
    {
        $data['users'] = User::all();
        return view('admin.users.index')->with($data);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status'    => $request->status,
        ]);
        return redirect()->route('users.index');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'doctors.xlsx');
    }
    
    public function import(Request $request)
    {
        // dd($request->all());
        $file = $request->file('importUser')->path();
        Excel::import(new UsersImport, $file);

        return redirect()->route('users.index')->with('success', 'All good!');
    }
}
