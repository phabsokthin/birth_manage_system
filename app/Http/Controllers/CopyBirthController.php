<?php

namespace App\Http\Controllers;

use App\Models\CopyBirth;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CopyBirthController extends Controller
{
    public function index()
    {

        $copybirths = CopyBirth::all();
        $province= Province::all();

        return view('copybirhtcertificate.copycertificateTab', compact( 'province','copybirths'));
        
        // $province = Province::all();
        // $father = Father::all();
        // $mother = Mother::all();
        // $copybirths = DB::table('copy_births')
        //     ->leftJoin('fathers', 'fathers.father_id', "=", 'copy_births.father_id')
        //     ->leftJoin('mothers', 'mothers.mother_id', "=", "copy_births.mother_id")
        //     ->leftJoin('villages', 'villages.id', "=", "copy_births.village_id")
        //     ->leftJoin('districts', 'districts.dis_id', "=", "copy_births.dis_id")
        //     ->leftJoin('communes', 'communes.commune_id', "=", "copy_births.commune_id")
        //     ->leftJoin('provinces', "provinces.province_id", "=", "copy_births.province_id")
        //     ->select(
        //         'copy_births.*',
        //         'fathers.fname_kh as fatherName_kh',
        //         'fathers.lname_kh as lfatherName_kh',
        //         'mothers.fname_kh as fmotherName_kh',
        //         'mothers.lname_kh as lmotherName_kh',
        //         'villages.*',
        //         'communes.*',
        //         'provinces.*',
        //         'districts.*'
        //     )->get();
        // return view('copybirhtcertificate.copycertificateTab', compact('province', 'copybirths'));
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

        $copybirths = new CopyBirth();
        $copybirths->copy_no = $request->copy_no;
        $copybirths->copy_note = $request->copy_note;
        $copybirths->day_note = $request->day_note;
        $copybirths->month_note = $request->selected_month_note;
        $copybirths->year_note = $request->selected_year_note;
        $copybirths->fname_kh = $request->fname_kh;
        $copybirths->lname_kh = $request->lname_kh;
        $copybirths->fname_en = $request->fname_en;
        $copybirths->lname_en = $request->lname_en;
        $copybirths->gender = $request->gender;
        $copybirths->phones = $request->phones;
        $copybirths->nationality = $request->national;
        $copybirths->day = $request->day;
        $copybirths->bstatus = $request->bstatus;
        $copybirths->month = $request->selected_month;
        $copybirths->year = $request->selected_year;
        $copybirths->job_title = $request->job_title;
        $copybirths->father_id = $request->selected_father;
        $copybirths->mother_id = $request->selected_mother;
        $copybirths->village_id = $request->selected_village;
        $copybirths->dis_id = $request->selected_district;
        $copybirths->commune_id = $request->selected_commune;
        $copybirths->province_id = $request->province;
        $copybirths->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('YmHis') . '.' . $extension;
            $request->file('photo')->move(public_path('upload/'), $filename);
            $copybirths->photo = $filename;
        } else {
            $copybirths->photo = $request->photo;
        }

        $copybirths->save();

        return redirect()->route('copytab.birthcertificate')->with('success', 'បានរក្សាទុកដោយជោគជ័យ');
    }

    public function delete_copy_birth($id)
    {
        $copybirths = CopyBirth::where('copy_id', $id)->first();

        if ($copybirths) {
            if (!empty($birth->photo)) {
                $photoPath = public_path('upload/' . $copybirths->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $copybirths->delete();
            return redirect()->back()->with('delete', 'Successfully deleted');
        }
        return redirect()->back()->with('error', 'Father not found');
    }
    public function get_birth_certificate_Id($id)
    {
        $province = Province::all();
        $copybirths = DB::table('copy_births')
            ->leftJoin('fathers', 'fathers.father_id', "=", 'copy_births.father_id')
            ->leftJoin('mothers', 'mothers.mother_id', "=", "copy_births.mother_id")
            ->leftJoin('villages', 'villages.id', "=", "copy_births.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "copy_births.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "copy_births.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "copy_births.province_id")
            ->where("copy_births.copy_id", $id)
            ->select(
                'copy_births.*',
                'fathers.fname_kh as fatherName_kh',
                'fathers.lname_kh as lfatherName_kh',
                'mothers.fname_kh as fmotherName_kh',
                'mothers.lname_kh as lmotherName_kh',
                'villages.*',
                'communes.*',
                'provinces.*',
                'districts.*'
            )->first();

        return view('copybirhtcertificate.updateCertificate', compact('copybirths', 'province'));
    }

    public function update_copy_birth(Request $request, $id)
    {
        $copybirths = CopyBirth::where('copy_id', $id)->first();
        $copybirths->copy_no = $request->copy_no;
        $copybirths->copy_note = $request->copy_note;
        $copybirths->day_note = $request->day_note;
        $copybirths->month_note = $request->selected_month_note;
        $copybirths->year_note = $request->selected_year_note;
        $copybirths->fname_kh = $request->fname_kh;
        $copybirths->lname_kh = $request->lname_kh;
        $copybirths->fname_en = $request->fname_en;
        $copybirths->lname_en = $request->lname_en;
        $copybirths->gender = $request->gender;
        $copybirths->phones = $request->phones;
        $copybirths->nationality = $request->national;
        $copybirths->day = $request->day;
        $copybirths->bstatus = $request->bstatus;
        $copybirths->month = $request->selected_month;
        $copybirths->year = $request->selected_year;
        $copybirths->job_title = $request->job_title;
        $copybirths->father_id = $request->selected_father;
        $copybirths->mother_id = $request->selected_mother;
        $copybirths->village_id = $request->selected_village;
        $copybirths->dis_id = $request->selected_district;
        $copybirths->commune_id = $request->selected_commune;
        $copybirths->province_id = $request->province;
        $copybirths->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $destination = "upload/" . $copybirths->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $copybirths->photo = $filename;
        } else {
            $copybirths->photo = $request->photo;
        }

        $copybirths->update();

        return redirect()->route('copytab.birthcertificate')->with('update', 'បានរក្សាទុកដោយជោគជ័យ');
    }

    public function print_copy_birth()
    {
        return view('copybirhtcertificate.printCertificate');
    }

    public function print_copy_certificate_id($id)
    {
        $copybirths = DB::table('copy_births')
        ->leftJoin('fathers', 'fathers.father_id', '=', 'copy_births.father_id')
        ->leftJoin('mothers', 'mothers.mother_id', '=', 'copy_births.mother_id')
        ->leftJoin('villages as fv', 'fv.id', '=', 'fathers.village_id') // Father's village
        ->leftJoin('communes as fc', 'fc.commune_id', '=', 'fathers.commune_id') // Father's commune
        ->leftJoin('districts as fd', 'fd.dis_id', '=', 'fathers.dis_id') // Father's district
        ->leftJoin('provinces as fp', 'fp.province_id', '=', 'fathers.province_id') // Father's province
        ->leftJoin('villages as mv', 'mv.id', '=', 'mothers.village_id') // Mother's village
        ->leftJoin('communes as mc', 'mc.commune_id', '=', 'mothers.commune_id') // Mother's commune
        ->leftJoin('districts as md', 'md.dis_id', '=', 'mothers.dis_id') // Mother's district
        ->leftJoin('provinces as mp', 'mp.province_id', '=', 'mothers.province_id') // Mother's province
        ->leftJoin('villages', 'villages.id', '=', 'copy_births.village_id')
        ->leftJoin('districts', 'districts.dis_id', '=', 'copy_births.dis_id')
        ->leftJoin('communes', 'communes.commune_id', '=', 'copy_births.commune_id')
        ->leftJoin('provinces', 'provinces.province_id', '=', 'copy_births.province_id')
        ->where('copy_births.copy_id', $id)
        ->select(
            'copy_births.*',
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

        return view('copybirhtcertificate.printCertificate', compact('copybirths'));
    }

}
