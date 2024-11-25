<?php

namespace App\Http\Controllers;

use App\Models\Birth_Certificate;
use App\Models\Commune;
use App\Models\District;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Province;
use App\Models\Village;
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
   
    public function parentReport(Request $request) {
        $province = Province::all(); 
        $distrinct = District::all(); 
        $commune = Commune::all(); 
        $village = Village::all(); 
    
        $selectedProvince = $request->input('province');
        $selectedDistrict = $request->input('district');
        $selectedCommune = $request->input('commune');
        $selectedVillage = $request->input('village');
        $selectedStatus = $request->input('fstatus');
    
        // Build the query for fathers with filters
        $fathersQuery = DB::table('fathers')
            ->leftJoin('villages', 'villages.id', '=', 'fathers.village_id')
            ->leftJoin('districts', 'districts.dis_id', '=', 'fathers.dis_id')
            ->leftJoin('communes', 'communes.commune_id', '=', 'fathers.commune_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'fathers.province_id')
            ->select('*');
    
        // Apply filters
        if (!empty($selectedProvince)) {
            $fathersQuery->where('fathers.province_id', $selectedProvince);
        }
        if (!empty($selectedDistrict)) {
            $fathersQuery->where('fathers.dis_id', $selectedDistrict);
        }
        if (!empty($selectedCommune)) {
            $fathersQuery->where('fathers.commune_id', $selectedCommune);
        }
        if (!empty($selectedVillage)) {
            $fathersQuery->where('fathers.village_id', $selectedVillage);
        }
        if (!is_null($selectedStatus)) {
            $fathersQuery->where('fathers.fstatus', $selectedStatus);
        }
    
        $fathers = $fathersQuery->get();
        $count = $fathers->count();
    
        $countDiedQuery = Father::where('fstatus', '=', 0);
        $countAliveQuery = Father::where('fstatus', '=', 1);
    
        if (!empty($selectedProvince)) {
            $countDiedQuery->where('province_id', $selectedProvince);
            $countAliveQuery->where('province_id', $selectedProvince);
        }
        if (!empty($selectedDistrict)) {
            $countDiedQuery->where('dis_id', $selectedDistrict);
            $countAliveQuery->where('dis_id', $selectedDistrict);
        }
        if (!empty($selectedCommune)) {
            $countDiedQuery->where('commune_id', $selectedCommune);
            $countAliveQuery->where('commune_id', $selectedCommune);
        }
        if (!empty($selectedVillage)) {
            $countDiedQuery->where('village_id', $selectedVillage);
            $countAliveQuery->where('village_id', $selectedVillage);
        }
    
        $count_died = $countDiedQuery->count();
        $count_alive = $countAliveQuery->count();
    
        return view('reports.parentReport', compact('province', 'distrinct', 'commune', 'village', 'fathers', 'selectedProvince', 'selectedDistrict', 'selectedCommune', 'selectedVillage', 'selectedStatus', 'count', 'count_died', 'count_alive'));
    }


    public function motherReport(Request $request) {
        $province = Province::all(); 
        $distrinct = District::all(); 
        $commune = Commune::all(); 
        $village = Village::all(); 
    
        $selectedProvince = $request->input('province');
        $selectedDistrict = $request->input('district');
        $selectedCommune = $request->input('commune');
        $selectedVillage = $request->input('village');
        $selectedStatus = $request->input('mstatus');
    
        // Build the query for fathers with filters
        $motherQuery = DB::table('mothers')
            ->leftJoin('villages', 'villages.id', '=', 'mothers.village_id')
            ->leftJoin('districts', 'districts.dis_id', '=', 'mothers.dis_id')
            ->leftJoin('communes', 'communes.commune_id', '=', 'mothers.commune_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'mothers.province_id')
            ->select('*');
    
        // Apply filters
        if (!empty($selectedProvince)) {
            $motherQuery->where('mothers.province_id', $selectedProvince);
        }
        if (!empty($selectedDistrict)) {
            $motherQuery->where('mothers.dis_id', $selectedDistrict);
        }
        if (!empty($selectedCommune)) {
            $motherQuery->where('mothers.commune_id', $selectedCommune);
        }
        if (!empty($selectedVillage)) {
            $motherQuery->where('mothers.village_id', $selectedVillage);
        }
        if (!is_null($selectedStatus)) {
            $motherQuery->where('mothers.mstatus', $selectedStatus);
        }
    
        $mothers = $motherQuery->get();
        $count = $mothers->count();
    
        $countDiedQuery = Mother::where('mstatus', '=', 0);
        $countAliveQuery = Mother::where('mstatus', '=', 1);
    
        if (!empty($selectedProvince)) {
            $countDiedQuery->where('province_id', $selectedProvince);
            $countAliveQuery->where('province_id', $selectedProvince);
        }
        if (!empty($selectedDistrict)) {
            $countDiedQuery->where('dis_id', $selectedDistrict);
            $countAliveQuery->where('dis_id', $selectedDistrict);
        }
        if (!empty($selectedCommune)) {
            $countDiedQuery->where('commune_id', $selectedCommune);
            $countAliveQuery->where('commune_id', $selectedCommune);
        }
        if (!empty($selectedVillage)) {
            $countDiedQuery->where('village_id', $selectedVillage);
            $countAliveQuery->where('village_id', $selectedVillage);
        }
    
        $count_died = $countDiedQuery->count();
        $count_alive = $countAliveQuery->count();
       
        return view('reports.motherReport', compact('province', 'distrinct', 'commune', 'village', 'mothers', 'selectedProvince', 'selectedDistrict', 'selectedCommune', 'selectedVillage', 'selectedStatus', 'count', 'count_died', 'count_alive'));
    }
    
    public function report_copy_brith(Request $request)
    {
        $query = DB::table('copy_births')
            ->leftJoin('fathers', 'fathers.father_id', '=', 'copy_births.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', '=', 'copy_births.mother_id')
            ->leftJoin('villages', 'villages.id', '=', 'copy_births.village_id')
            ->leftJoin('districts', 'districts.dis_id', '=', 'copy_births.dis_id')
            ->leftJoin('communes', 'communes.commune_id', '=', 'copy_births.commune_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'copy_births.province_id')
            ->select(
                'copy_births.*',
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
            $query->where('copy_births.bstatus', $request->input('bstatus'));
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('copy_births.created_At', [
                Carbon::parse($request->from_date)->startOfDay(),
                Carbon::parse($request->to_date)->endOfDay(),
            ]);
        }

        $count = (clone $query)->where("copy_births.bstatus", '=', '3')->count();
        $count_undo = (clone $query)->where("copy_births.bstatus", '=', '1')->count();
        $countFamily = (clone $query)->count();

        $query_copy_birth = $query->get();

        return view('reports.copy_birht_report', compact('query_copy_birth', 'count', 'count_undo', 'countFamily'));
    }
}
