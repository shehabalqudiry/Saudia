<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Nationality;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $data['cities'] = City::all();
        $data['nationalities'] = Nationality::all();
        return view('admin.cities.index')->with($data);
    }


    public function create()
    {
        $data['nationalities'] = Nationality::all();
        return view('admin.cities.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nationality_id' => 'required',
        ]);

        City::create($request->all());

        return redirect()->back()->with('success', 'تم اضافة البيانات بنجاح');
    }

    public function edit(City $city)
    {
        $data['nationalities'] = Nationality::all();
        return view('admin.cities.edit', compact(['city', 'nationalities']));
    }


    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name' => 'required',
            'nationality_id' => 'required',
        ]);

        $city->update($data);
        return redirect()->back()->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->back()->with('success', 'تم حذف البيانات بنجاح');
    }
}
