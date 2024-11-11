<?php

namespace App\Http\Controllers;

use App\Models\Birth_Certificate;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BirthCertificateController extends Controller
{
    public function index()
    {
        $province = Province::all();
        $father = Father::all();
        $births = DB::table('birth__certificates')
            ->leftJoin('fathers', 'fathers.father_id', "=", 'birth__certificates.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', "=", "birth__certificates.mother_id")
            ->leftJoin('villages', 'villages.id', "=", "birth__certificates.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "birth__certificates.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "birth__certificates.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "birth__certificates.province_id")
            ->select(
                'birth__certificates.*',
                'fathers.fname_kh as fatherName_kh',
                'fathers.lname_kh as lfatherName_kh',
                'mothers.fname_kh as fmotherName_kh',
                'mothers.lname_kh as lmotherName_kh',
                'villages.*',
                'communes.*',
                'provinces.*',
                'districts.*'
            )->get();
        return view('birthCertificate.certificateTab', compact('province', 'births'));
    }


    public function getFathers()
    {
        $fathers = DB::table('fathers')
        ->leftJoin('villages', 'villages.id', "=", "fathers.village_id")
        ->leftJoin('districts', 'districts.dis_id', "=", "fathers.dis_id")
        ->leftJoin('communes', 'communes.commune_id', "=", "fathers.commune_id")
        ->leftJoin('provinces', "provinces.province_id", "=", "fathers.province_id")
        ->orderBy('fathers.father_id', 'desc')
        ->select('*')->get();
        return response()->json($fathers);
    }


    public function getMothers()
    {
        // $mothers = Mother::orderBy('mother_id', 'desc')->get();
        $mothers = DB::table('mothers')
            ->leftJoin('villages', 'villages.id', "=", "mothers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "mothers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "mothers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "mothers.province_id")
            ->orderBy('mothers.mother_id', 'desc')
            ->select('*')->get();
            
        return response()->json($mothers);
    }

    public function getFatherDetails($id)
    {
        // $father = Father::find($id);
        $father = DB::table('fathers')
            ->leftJoin('villages', 'villages.id', "=", "fathers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "fathers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "fathers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "fathers.province_id")
            ->where('father_id', $id)
            ->select('*')->first();

        if ($father) {
            return response()->json($father);
        } else {
            return response()->json(['message' => 'Father not found'], 404);
        }
    }

    public function getMotherDetails($id)
    {
        // $mother = Mother::find($id);

        $mother = DB::table('mothers')
            ->leftJoin('villages', 'villages.id', "=", "mothers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "mothers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "mothers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "mothers.province_id")
            ->where('mother_id', $id)
            ->select('*')->first();
        if ($mother) {
            return response()->json($mother);
        } else {
            return response()->json(['message' => 'Mother not found'], 404);
        }
    }


    public function create(Request $request)
    {

        $birth = new Birth_Certificate();
        $birth->birth_no = $request->birth_no;
        $birth->fname_kh = $request->fname_kh;
        $birth->lname_kh = $request->lname_kh;
        $birth->fname_en = $request->fname_en;
        $birth->lname_en = $request->lname_en;
        $birth->gender = $request->gender;
        $birth->phones = $request->phones;
        $birth->nationality = $request->national;
        $birth->day = $request->day;
        $birth->bstatus = $request->bstatus;
        $birth->month = $request->selected_month;
        $birth->year = $request->selected_year;
        $birth->job_title = $request->job_title;
        $birth->father_id = $request->selected_father;
        $birth->mother_id = $request->selected_mother;
        $birth->village_id = $request->selected_village;
        $birth->dis_id = $request->selected_district;
        $birth->commune_id = $request->selected_commune;
        $birth->province_id = $request->province;
        $birth->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('YmHis') . '.' . $extension;
            $request->file('photo')->move(public_path('upload/'), $filename);
            $birth->photo = $filename;
        } else {
            $birth->photo = $request->photo;
        }

        $birth->save();

        return redirect()->route('tab.birthcertificate')->with('success', 'បានរក្សាទុកដោយជោគជ័យ');
    }


    public function delete_birth($id)
    {

        $birth = Birth_Certificate::where('birth_id', $id)->first();

        if ($birth) {
            if (!empty($birth->photo)) {
                $photoPath = public_path('upload/' . $birth->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $birth->delete();
            return redirect()->back()->with('delete', 'Successfully deleted');
        }

        return redirect()->back()->with('error', 'Father not found');
    }

    public function get_birth_certificate_Id($id)
    {
        $province = Province::all();
        $births = DB::table('birth__certificates')
            ->leftJoin('fathers', 'fathers.father_id', "=", 'birth__certificates.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', "=", "birth__certificates.mother_id")
            ->leftJoin('villages', 'villages.id', "=", "birth__certificates.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "birth__certificates.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "birth__certificates.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "birth__certificates.province_id")
            ->where("birth__certificates.birth_id", $id)
            ->select(
                'birth__certificates.*',
                'fathers.fname_kh as fatherName_kh',
                'fathers.lname_kh as lfatherName_kh',
                'mothers.fname_kh as fmotherName_kh',
                'mothers.lname_kh as lmotherName_kh',
                'villages.*',
                'communes.*',
                'provinces.*',
                'districts.*'
            )->first();

        return view('birthCertificate.updateCertificate', compact('births', 'province'));
    }

    public function update_birth_certificate(Request $request, $id)
    {
        $birth = Birth_Certificate::where('birth_id', $id)->first();
        $birth->birth_no = $request->birth_no;
        $birth->fname_kh = $request->fname_kh;
        $birth->lname_kh = $request->lname_kh;
        $birth->fname_en = $request->fname_en;
        $birth->lname_en = $request->lname_en;
        $birth->gender = $request->gender;
        $birth->phones = $request->phones;
        $birth->nationality = $request->national;
        $birth->day = $request->day;
        $birth->bstatus = $request->bstatus;
        $birth->month = $request->selected_month;
        $birth->year = $request->selected_year;
        $birth->job_title = $request->job_title;
        $birth->father_id = $request->selected_father;
        $birth->mother_id = $request->selected_mother;
        $birth->village_id = $request->selected_village;
        $birth->dis_id = $request->selected_district;
        $birth->commune_id = $request->selected_commune;
        $birth->province_id = $request->province;
        $birth->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $destination = "upload/" . $birth->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $birth->photo = $filename;
        } else {
            $birth->photo = $request->photo;
        }

        $birth->update();

        return redirect()->route('tab.birthcertificate')->with('update', 'បានរក្សាទុកដោយជោគជ័យ');
    }


    public function print_birth_certificate()
    {
        return view('birthCertificate.printCertificate');
    }

    public function print_village_certificate_id($id)
    {
        $births = DB::table('birth__certificates')
            ->leftJoin('fathers', 'fathers.father_id', "=", 'birth__certificates.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', "=", "birth__certificates.mother_id")
            ->leftJoin('villages', 'villages.id', "=", "birth__certificates.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "birth__certificates.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "birth__certificates.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "birth__certificates.province_id")
            ->where("birth_id", $id)
            ->select(
                'birth__certificates.*',
                'fathers.fname_kh as fatherName_kh',
                'fathers.lname_kh as lfatherName_kh',
                'fathers.nationality as fnation',
                'fathers.fname_en as ffnameEn',
                'fathers.lname_en as flnameEn',
                'fathers.day as fday',
                'fathers.month as fmonth',
                'fathers.year as fyear',
                'villages.village_kh_name as fvillage_kh',
                'communes.commune_kh_name as fcommune_kh',
                'districts.district_kh_name as fdistrict_kh',
                'provinces.province_kh_name as fprovince_kh',
                'mothers.fname_kh as fmotherName_kh',
                'mothers.lname_kh as lmotherName_kh',
                'mothers.nationality as mnation',
                'mothers.fname_en as mfnameEn',
                'mothers.lname_en as mlnameEn',
                'mothers.day as mday',
                'mothers.month as mmonth',
                'mothers.year as myear',

                'villages.*',
                'communes.*',
                'provinces.*',
                'districts.*'
            )->first();

        return view('birthCertificate.printCertificate', compact('births'));
    }
}
