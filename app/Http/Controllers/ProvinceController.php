<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $province = Province::all();
        return view('province.index', compact('province'));
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
        // $userId = auth()->id();
        Province::create([
            'p_code' => $request->input('p_code'),
            'province_en_name' => $request->input('province_en_name'),
            'province_kh_name' => $request->input('province_kh_name'),
            'modify_date' => $request->input('modify_date'),
            'status' => $request->input('status'),
            // 'user_id' => $userId,
            'user_id' => $request->input('user_id', 1),
        ]);

        return redirect()->route('province.index')->with('success', 'Province created successfully!');
        // return response()->json(['message' => 'Province created successfully!'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($province_id)
    {
        $province = Province::findOrFail($province_id);

        return view('province.show', compact('province'));
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
    public function update(Request $request, $province_id)
    {
        $province = Province::findOrFail($province_id);

        // Update the province details
        $province->update([
            'p_code' => $request->input('p_code'),
            'province_en_name' => $request->input('province_en_name'),
            'province_kh_name' => $request->input('province_kh_name'),
            'modify_date' => $request->input('modify_date'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id', 1),
        ]);

        return redirect()->route('province.index')->with('success', 'Province updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($province_id)
    {
        $province = Province::findOrFail($province_id);

        $province->delete();

        return redirect()->route('province.index')->with('success', 'Province deleted successfully!');
    }

    public function deleteall(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            Province::destroy($ids);
            return redirect()->back()->with('success', 'Selected provinces deleted successfully.');
        }
        return redirect()->back()->with('error', 'No provinces selected for deletion.');
    }

    // public function toggleStatus($province_id)
    // {
    //     $province = Province::find($province_id);

    //     if ($province) {

    //         $status = !$province->status;

    //         $province->update(['status' => $status]);

    //         return redirect()->route('province.index')->with('success', 'Status updated successfully');
    //     } else {
    //         return redirect()->route('province.index')->with('error', 'Province record not found');
    //     }
    // }
}
