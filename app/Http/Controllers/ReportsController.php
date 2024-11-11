<?php

namespace App\Http\Controllers;

use App\Models\Birth_Certificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function report_birth(Request $request)
    {
        $query = DB::table('birth__certificates')
            ->leftJoin('fathers', 'fathers.father_id', '=', 'birth__certificates.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', '=', 'birth__certificates.mother_id')
            ->leftJoin('villages', 'villages.id', '=', 'birth__certificates.village_id')
            ->leftJoin('districts', 'districts.dis_id', '=', 'birth__certificates.dis_id')
            ->leftJoin('communes', 'communes.commune_id', '=', 'birth__certificates.commune_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'birth__certificates.province_id')
            ->select(
                'birth__certificates.*',
                'fathers.fname_kh as fatherName_kh',
                'fathers.lname_kh as fatherLname_kh',
                'mothers.fname_kh as motherName_kh',
                'mothers.lname_kh as motherLname_kh',
                'villages.*',
                'communes.*',
                'provinces.*',
                'districts.*'
            );
    
        if ($request->filled('bstatus')) {
            $query->where('birth__certificates.bstatus', $request->input('bstatus'));
        }
    
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('birth__certificates.created_At', [
                Carbon::parse($request->from_date)->startOfDay(),
                Carbon::parse($request->to_date)->endOfDay(),
            ]);
        }
    
        $count = (clone $query)->where("birth__certificates.bstatus", '=', '3')->count();
        $count_undo = (clone $query)->where("birth__certificates.bstatus", '=', '1')->count();
        $countFamily = (clone $query)->count(); 
    
        $query_birth = $query->get();
    
        return view('reports.birthReport', compact('query_birth', 'count', 'count_undo', 'countFamily'));
    }
    
    

}
