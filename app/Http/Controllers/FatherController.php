<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use App\Models\Commune;
use App\Models\District;
use App\Models\Father;
use App\Models\Province;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FatherController extends Controller
{
    public function index()
    {

        $village = Village::all();
        $fathers = DB::table('fathers')->get();
            // ->leftJoin('villages', 'villages.id', "=", "fathers.village_id")
            // ->leftJoin('districts', 'districts.dis_id', "=", "fathers.dis_id")
            // ->leftJoin('communes', 'communes.commune_id', "=", "fathers.commune_id")
            // ->leftJoin('provinces', "provinces.province_id", "=", "fathers.province_id")
            // ->select('*')->get();
        $province = Province::all();
        return view('father.fatherTab', compact('province','fathers'));
    }
    public function getDistrictsByProvince($provinceId)
    {
        //$districts = District::where('province_id', $provinceId)->get();
        $districts = DB::table('districts')
        ->join('provinces', 'provinces.province_id','=', 'districts.province_id')
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
       ->join('districts', 'districts.dis_id','=', 'communes.dis_id')
       ->select('*')
       ->where('districts.district_kh_name', $districtId)
       ->get();
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

        $father = new Father();
        $father->fname_kh = $request->fname_kh;
        $father->lname_kh = $request->lname_kh;
        $father->fname_en = $request->fname_en;
        $father->lname_en = $request->lname_en;
        $father->gender = $request->gender;
        $father->phones = $request->phones;
        $father->nationality = $request->national;
        $father->fstatus = $request->fstatus;
        $father->day = $request->day;
        $father->month = $request->selected_month;
        $father->year = $request->selected_year;
        $father->job_title = $request->job_title;
        $father->village_kh_name = $request->selected_village;
        $father->district_kh_name = $request->selected_district;
        $father->commune_kh_name = $request->selected_commune;
        $father->province_kh_name = $request->province;
        $father->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('YmHis') . '.' . $extension;
            $request->file('photo')->move(public_path('upload/'), $filename);
            $father->photo = $filename;
        } else {
            $father->photo = $request->photo;
        }

        $father->save();

        return redirect()->route('tab.father')->with('success', 'បានរក្សាទុកដោយជោគជ័យ');
    }

    public function delete_father($id)
    {

        //delete this code for operation permitted
        $father = Father::where('father_id', $id)->first();

        if ($father) {
            if (!empty($father->photo)) {
                $photoPath = public_path('upload/' . $father->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $father->delete();
            return redirect()->back()->with('delete', 'Successfully deleted');
        }

        return redirect()->back()->with('error', 'Father not found');

    }

    public function update($id){

        $province = Province::all();
        $father = DB::table('fathers')
            ->leftJoin('villages', 'villages.id', "=", "fathers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "fathers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "fathers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "fathers.province_id")
            ->where('father_id', $id)
            ->select('*')->first();
        return view('father.update',compact('father','province'));
    }


    public function update_father(Request $request, $id){
        $father = Father::where('father_id', $id)->first();
        $father->fname_kh = $request->fname_kh;
        $father->lname_kh = $request->lname_kh;
        $father->fname_en = $request->fname_en;
        $father->lname_en = $request->lname_en;
        $father->gender = $request->gender;
        $father->phones = $request->phones;
        $father->nationality = $request->national;
        $father->fstatus = $request->fstatus;
        $father->day = $request->day;
        $father->month = $request->selected_month;
        $father->year = $request->selected_year;
        $father->job_title = $request->job_title;
        $father->village_id = $request->selected_village;
        $father->dis_id = $request->selected_district;
        $father->commune_id = $request->selected_commune;
        $father->province_id = $request->province;
        $father->user_id = $request->user_id ?? 1;

        if($request->hasFile('photo')){
            $destination = "upload/" . $father->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $father->photo = $filename;
        }
        else{
            $father->photo = $request->photo;
        }
        $father->update();
        return redirect()->back()->with("update", "Update Success...");
    }


    public function view_details($id){
        $father = DB::table('fathers')
        ->leftJoin('villages', 'villages.id', "=", "fathers.village_id")
        ->leftJoin('districts', 'districts.dis_id', "=", "fathers.dis_id")
        ->leftJoin('communes', 'communes.commune_id', "=", "fathers.commune_id")
        ->leftJoin('provinces', "provinces.province_id", "=", "fathers.province_id")
        ->where('father_id', $id)
        ->select('*')->first();

        return view('father.viewDetail', compact('father'));
    }
}
