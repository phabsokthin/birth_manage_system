<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villages = Village::with('commune')->get();
        $communes = Commune::all();
        return view('village.index', compact('villages', 'communes'));
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
        Village::create([
            'commune_id' => $request->input('commune_id'),
            'village_code' => $request->input('village_code'),
            'village_en_name' => $request->input('village_en_name'),
            'village_kh_name' => $request->input('village_kh_name'),
            'status' => 0,
            // 'user_id' => $userId,
            'user_id' => $request->input('user_id', 1),
        ]);

        return redirect()->route('village.index')->with('success', 'Village created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $village_id)
    {
        $villages = Village::findOrFail($village_id);
        $communes = Commune::all();
        return view('village.show', compact('village', 'communes'));
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
    public function update(Request $request, string $village_id)
    {
        $village = Village::findOrFail($village_id);

        $village->update([
            'commune_id' => $request->input('commune_id'),
            'village_code' => $request->input('village_code'),
            'village_en_name' => $request->input('village_en_name'),
            'village_kh_name' => $request->input('village_kh_name'),
            'status' => $village->status,
            'user_id' => $request->input('user_id', $village->user_id),
        ]);

        // Redirect back with success message
        return redirect()->route('village.index')->with('success', 'Village updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $village_id)
    {
        $villages = Village::findOrFail($village_id);
        $villages->delete();

        return redirect()->route('village.index')->with('success', 'Village deleted successfully!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            Village::destroy($ids);
            return redirect()->back()->with('success', 'Selected villages deleted successfully.');
        }
        return redirect()->back()->with('error', 'No villages selected for deletion.');
    }
}
