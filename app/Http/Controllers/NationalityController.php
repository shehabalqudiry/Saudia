<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{

    public function index()
    {
        $data['nationalities'] = Nationality::all();
        return view('admin.nationality.index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'key'     => 'required',
        ]);

        Nationality::create($request->all());

        return redirect()->back()->with('success', 'تم اضافة البيانات بنجاح');
    }

    public function update(Request $request, Nationality $nationality)
    {
        $request->validate([
            'name' => 'required',
            'key'  => 'required',
        ]);

        $nationality->update($request->all());

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    public function destroy(Nationality $nationality)
    {
        $nationality->delete();
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
