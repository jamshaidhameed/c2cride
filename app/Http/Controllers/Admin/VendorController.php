<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::all();

        return view('admin.vendors.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate(
        [
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|max:255',
            'address'  => 'nullable',
            'status' => 'required|in:1,0'
        ]
        );

        Vendor::create([
            'name' => $request->input("name"),
            'company_name' => $request->input("company_name"),
            'contact' => $request->input("contact"),
            'email' => $request->input("email"),
            'address' => $request->input("address"),
            'status' => $request->input("status")
        ]);

        return response()->json(['success' => true,'message' => 'Vendor Informations Added Successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Vendor::where('id',$id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate(
        [
            'name' => 'required|max:255',
            'company_name' => 'required|max:255',
            'contact' => 'required|max:255',
            'email' => 'required|max:255',
            'address'  => 'nullable',
            'status' => 'required|in:1,0'
        ]
        );


         Vendor::where('id',$id)->update([
            'name' => $request->input("name"),
            'company_name' => $request->input("company_name"),
            'contact' => $request->input("contact"),
            'email' => $request->input("email"),
            'address' => $request->input("address"),
            'status' => $request->input("status")
        ]);

        return response()->json(['success' => true,'message' => 'Vendor Informations Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vendor::where('id',$id)->delete();

        return response()->json(['success' => true,'message' => 'Vendor Informations Deleted Successfully']);
    }
}
