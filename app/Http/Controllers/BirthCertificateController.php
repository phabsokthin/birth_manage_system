<?php

namespace App\Http\Controllers;

use App\Models\Birth_Certificate;
use App\Models\Commune;
use App\Models\District;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BirthCertificateController extends Controller
{
    public function index()
    {
        $births = Birth_Certificate::all();
        $province = Province::all();
        
        return view('birthCertificate.certificateTab', compact('province', 'births'));
    }

    
    public function getDistrictsByProvince($provinceId)
    {
        $districts = DB::table('districts')
            ->join('provinces', 'provinces.province_id', '=', 'districts.province_id')
            ->select('*')
            ->where('provinces.province_kh_name', $provinceId)
            ->get();
    
        return response()->json($districts);
    }
    public function getCommunesByDistrict($districtId)
    {
        //$communes = Commune::where('dis_id', $districtId)->get();
       // return response()->json($communes);
       $communes = DB::table('communes')
       ->join('districts', 'districts.dis_id', '=', 'communes.dis_id')
       ->select('*') // Avoid selecting all fields to reduce ambiguity
       ->where('districts.district_kh_name', $districtId)
       ->get();

   if ($communes->isEmpty()) {
       return response()->json(['error' => 'No communes found for the given district.'], 404);
   }

   return response()->json($communes);
    }
    public function getVillageByCommune($villageId)
    {
        // $villages = Village::where('commune_id', $villageId)->get();
        // return response()->json($villages);
        $villages=DB::table('villages')
        ->join('communes', 'communes.commune_id','=', 'villages.commune_id')
        ->select('*')
        ->where('communes.commune_kh_name', $villageId)
        ->get();
        return response()->json($villages);
    }
    public function create(Request $request)
    {
        $birth = new Birth_Certificate();

        // Assign birth certificate details
        $birth->province = $request->province;
        $birth->district = $request->district;
        $birth->commune = $request->commune;
        $birth->birth_no = $request->birth_no;
        $birth->birth_note = $request->birth_note;
        $birth->note_day = $request->note_day;
        $birth->note_month = $request->note_month;
        $birth->note_year = $request->note_year;

        // Baby details
        $birth->ba_fname_kh = $request->ba_fname_kh;
        $birth->ba_lname_kh = $request->ba_lname_kh;
        $birth->ba_fname_en = $request->ba_fname_en;
        $birth->ba_lname_en = $request->ba_lname_en;
        $birth->ba_gender = $request->ba_gender;
        $birth->ba_nationality = $request->ba_nationality;
        $birth->ba_day = $request->ba_day;
        $birth->ba_month = $request->ba_month;
        $birth->ba_year = $request->ba_year;
        $birth->ba_province = $request->ba_province;
        $birth->ba_district = $request->ba_district;
        $birth->ba_commune = $request->ba_commune;
        $birth->ba_village = $request->ba_village;
        $birth->ba_country = $request->ba_country;

        // Father details
        $birth->fa_fname_kh = $request->fa_fname_kh;
        $birth->fa_lname_kh = $request->fa_lname_kh;
        $birth->fa_fname_en = $request->fa_fname_en;
        $birth->fa_lname_en = $request->fa_lname_en;
        $birth->fa_nationality = $request->fa_nationality;
        $birth->fa_day = $request->fa_day;
        $birth->fa_month = $request->fa_month;
        $birth->fa_year = $request->fa_year;
        $birth->fa_province = $request->fa_province;
        $birth->fa_district = $request->fa_district;
        $birth->fa_commune = $request->fa_commune;
        $birth->fa_village = $request->fa_village;
        $birth->fa_country = $request->fa_country;

        // Mother details
        $birth->mo_fname_kh = $request->mo_fname_kh;
        $birth->mo_lname_kh = $request->mo_lname_kh;
        $birth->mo_fname_en = $request->mo_fname_en;
        $birth->mo_lname_en = $request->mo_lname_en;
        $birth->mo_nationality = $request->mo_nationality;
        $birth->mo_day = $request->mo_day;
        $birth->mo_month = $request->mo_month;
        $birth->mo_year = $request->mo_year;
        $birth->mo_province = $request->mo_province;
        $birth->mo_district = $request->mo_district;
        $birth->mo_commune = $request->mo_commune;
        $birth->mo_village = $request->mo_village;
        $birth->mo_country = $request->mo_country;

        // Baby's living address
        $birth->stay_province = $request->stay_province;
        $birth->stay_district = $request->stay_district;
        $birth->stay_commune = $request->stay_commune;
        $birth->stay_village = $request->stay_village;
        $birth->stay_country = $request->stay_country;

        // Place and start details
        $birth->place_start = $request->place_start;
        $birth->sta_day = $request->sta_day;
        $birth->sta_month = $request->sta_month;
        $birth->sta_year = $request->sta_year;

        // User ID
        $birth->user_id = $request->user_id ?? 1;

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('YmHis') . '.' . $extension;
            $request->file('photo')->move(public_path('upload/'), $filename);
            $birth->photo = $filename;
        }

        $birth->save();

        return redirect()->route('tab.birthcertificate')->with('success', 'Birth certificate created successfully.');
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
