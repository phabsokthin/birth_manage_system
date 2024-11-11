<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\District;
use Illuminate\Http\Request;

class CommunetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $communes = Commune::with('district')->get();
        $districts = District::all();
        return view('commune.index', compact('communes', 'districts'));
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
        Commune::create([
            'dis_id' => $request->input('dis_id'),
            'commune_code' => $request->input('commune_code'),
            'commune_en_name' => $request->input('commune_en_name'),
            'commune_kh_name' => $request->input('commune_kh_name'),
            'status' => $request->input('status'),
            // 'user_id' => $userId,
            'user_id' => $request->input('user_id', 1),
        ]);

        return redirect()->route('commune.index')->with('success', 'Commune created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $commune_id)
    {
        $communes = Commune::findOrFail($commune_id);
        $districts = District::all();
        return view('commune.show', compact('commune', 'districts'));
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
    public function update(Request $request, string $commune_id)
    {
        $commune = Commune::findOrFail($commune_id);

        // Update the commune with the new values
        $commune->update([
            'dis_id' => $request->input('dis_id'),
            'commune_code' => $request->input('commune_code'),
            'commune_en_name' => $request->input('commune_en_name'),
            'commune_kh_name' => $request->input('commune_kh_name'),
            'status' =>  $request->input('status'),
            'user_id' => $request->input('user_id', $commune->user_id),
        ]);

        // Redirect back with success message
        return redirect()->route('commune.index')->with('success', 'Commune updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $commune_id)
    {
        $communes = Commune::findOrFail($commune_id);
        $communes->delete();

        return redirect()->route('commune.index')->with('success', 'Commune deleted successfully!');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->input('ids');
        if ($ids) {
            Commune::destroy($ids);
            return redirect()->back()->with('success', 'Selected communes deleted successfully.');
        }
        return redirect()->back()->with('error', 'No communes selected for deletion.');
    }
}
