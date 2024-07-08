<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();

        return view('donors', compact('donors'));
    }

    public function create()
    {
        return view('create_donor');
    }

    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $donor = Donor::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'blood_group' => $request->blood_group,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imageName,



        ]);

        return redirect()->route('donor.index');
    }

    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        return view('update_donor', compact('donor'));
    }

    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);

        $donor->update([
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'image' => $imageName,

        ]);
    }

    public function destroy($id)
    {
        Donor::destroy($id);
        return redirect()->route('donor.index');
    }
    public function trash()
    {
        $donors = Donor::onlyTrashed()->paginate();
        return view('trash_donor', compact('donors'));
    }

    public function restore($id){
        $donors = Donor::onlyTrashed()->find($id);
        $donors->restore();
        return view('trash_donor', compact('donors'));


    }

    public function delete($id){
        $donors = Donor::onlyTrashed()->find($id);
        $donors->forceDelete();

        return view('trash_donor', compact('donors'));

    }

}
