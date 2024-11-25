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
        $mother = Mother::all();
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
            ->leftJoin('fathers', 'fathers.father_id', '=', 'birth__certificates.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', '=', 'birth__certificates.mother_id')
            ->leftJoin('villages as fv', 'fv.id', '=', 'fathers.village_id') // Father's village
            ->leftJoin('communes as fc', 'fc.commune_id', '=', 'fathers.commune_id') // Father's commune
            ->leftJoin('districts as fd', 'fd.dis_id', '=', 'fathers.dis_id') // Father's district
            ->leftJoin('provinces as fp', 'fp.province_id', '=', 'fathers.province_id') // Father's province
            ->leftJoin('villages as mv', 'mv.id', '=', 'mothers.village_id') // Mother's village
            ->leftJoin('communes as mc', 'mc.commune_id', '=', 'mothers.commune_id') // Mother's commune
            ->leftJoin('districts as md', 'md.dis_id', '=', 'mothers.dis_id') // Mother's district
            ->leftJoin('provinces as mp', 'mp.province_id', '=', 'mothers.province_id') // Mother's province
            ->leftJoin('villages', 'villages.id', '=', 'birth__certificates.village_id')
            ->leftJoin('districts', 'districts.dis_id', '=', 'birth__certificates.dis_id')
            ->leftJoin('communes', 'communes.commune_id', '=', 'birth__certificates.commune_id')
            ->leftJoin('provinces', 'provinces.province_id', '=', 'birth__certificates.province_id')
            ->where('birth__certificates.birth_id', $id)
            ->select(
                'birth__certificates.*',
                // Father details
                'fathers.fname_kh as father_name_kh',
                'fathers.lname_kh as father_last_name_kh',
                'fathers.nationality as father_nationality',
                'fathers.fname_en as father_first_name_en',
                'fathers.lname_en as father_last_name_en',
                'fathers.day as father_birth_day',
                'fathers.month as father_birth_month',
                'fathers.year as father_birth_year',
                'fv.village_kh_name as father_village',
                'fc.commune_kh_name as father_commune',
                'fd.district_kh_name as father_district',
                'fp.province_kh_name as father_province',
                // Mother details
                'mothers.fname_kh as mother_name_kh',
                'mothers.lname_kh as mother_last_name_kh',
                'mothers.nationality as mother_nationality',
                'mothers.fname_en as mother_first_name_en',
                'mothers.lname_en as mother_last_name_en',
                'mothers.day as mother_birth_day',
                'mothers.month as mother_birth_month',
                'mothers.year as mother_birth_year',
                'mv.village_kh_name as mother_village',
                'mc.commune_kh_name as mother_commune',
                'md.district_kh_name as mother_district',
                'mp.province_kh_name as mother_province',
                // Birth location details
                'villages.village_kh_name as birth_village',
                'communes.commune_kh_name as birth_commune',
                'districts.district_kh_name as birth_district',
                'provinces.province_kh_name as birth_province'
            )
            ->first();

        // Pass the data to the view
        return view('birthCertificate.printCertificate', compact('births'));
    }
}


// <h1>Birth Certificate</h1>
// <p>Father: {{ $birth->father_name_kh }} {{ $birth->father_last_name_kh }}</p>
// <p>Father's Address: {{ $birth->father_village }}, {{ $birth->father_commune }}, {{ $birth->father_district }}, {{ $birth->father_province }}</p>
// <p>Mother: {{ $birth->mother_name_kh }} {{ $birth->mother_last_name_kh }}</p>
// <p>Mother's Address: {{ $birth->mother_village }}, {{ $birth->mother_commune }}, {{ $birth->mother_district }}, {{ $birth->mother_province }}</p>
// <p>Birthplace: {{ $birth->birth_village }}, {{ $birth->birth_commune }}, {{ $birth->birth_district }}, {{ $birth->birth_province }}</p>
