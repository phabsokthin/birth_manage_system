<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $districts = District::with('province')->get();
        $province = Province::all();
        return view('district.index', compact('districts', 'province'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $province = Province::all();
        return view('district.modal.create', compact('province'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $userId = auth()->id();
        District::create([
            'dis_code' => $request->input('dis_code'),
            'province_id' => $request->input('province_id'),
            'district_en_name' => $request->input('district_en_name'),
            'district_kh_name' => $request->input('district_kh_name'),
            'status' => 0,
            // 'user_id' => $userId, 
            'user_id' => $request->input('user_id', 1),
        ]);

        return redirect()->route('district.index')->with('success', 'District created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $dis_id)
    {
        $districts = District::findOrFail($dis_id);
        $province = Province::all(); 
    
        return view('district.show', compact('districts', 'province'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dis_id)
    {
        $district = District::findOrFail($dis_id);
        $province = Province::all(); // Assuming you have a Province model to get all provinces
    
        return view('district.modal.update', compact('district', 'province'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $dis_id )
    {
        $districts = District::findOrFail($dis_id );

        // Update the district with the new values
        $districts->update([
            'dis_code' => $request->input('dis_code'),
            'province_id' => $request->input('province_id'),
            'district_en_name' => $request->input('district_en_name'),
            'district_kh_name' => $request->input('district_kh_name'),
            'status' => $districts->status, 
            'user_id' => $request->input('user_id', $districts->user_id), 
        ]);

        // Redirect back with success message
        return redirect()->route('district.index')->with('success', 'District updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dis_id)
    {
        $district = District::findOrFail($dis_id);

        $district->delete();

        return redirect()->route('district.index')->with('success', 'District deleted successfully!'); // Update route name
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            District::destroy($ids);
            return redirect()->back()->with('success', 'Selected districts deleted successfully.');
        }
        return redirect()->back()->with('error', 'No districts selected for deletion.');
    }
}
