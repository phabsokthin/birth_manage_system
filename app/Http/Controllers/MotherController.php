<?php

namespace App\Http\Controllers;

use App\Models\Mother;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MotherController extends Controller
{
    public function index(){

        $province = Province::all();
        $mothers = DB::table('mothers')
            ->leftJoin('villages', 'villages.id', "=", "mothers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "mothers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "mothers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "mothers.province_id")
            ->select('*')->get();
        return view('mother.motherTab', data: compact('province', "mothers"));
    }

    public function create(Request $request)
    {

        $mother = new Mother();
        $mother->fname_kh = $request->fname_kh;
        $mother->lname_kh = $request->lname_kh;
        $mother->fname_en = $request->fname_en;
        $mother->lname_en = $request->lname_en;
        $mother->gender = $request->gender;
        $mother->phones = $request->phones;
        $mother->nationality = $request->national;
        $mother->mstatus = $request->mstatus;
        $mother->day = $request->day;
        $mother->month = $request->selected_month;
        $mother->year = $request->selected_year;
        $mother->job_title = $request->job_title;
        $mother->village_id = $request->selected_village;
        $mother->dis_id = $request->selected_district;
        $mother->commune_id = $request->selected_commune;
        $mother->province_id = $request->province;
        $mother->user_id = $request->user_id ?? 1;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = date('YmHis') . '.' . $extension;
            $request->file('photo')->move(public_path('upload/'), $filename);
            $mother->photo = $filename;
        } else {
            $mother->photo = $request->photo;
        }

        $mother->save();

        return redirect()->route('tab.mother')->with('success', 'បានរក្សាទុកដោយជោគជ័យ');
    }


    public function delete_mother($id)
    {

        //delete this code for operation permitted
        $mother = Mother::where('mother_id', $id)->first();

        if ($mother) {
            if (!empty($mother->photo)) {
                $photoPath = public_path('upload/' . $mother->photo);
                if (file_exists($photoPath)) {
                    unlink($photoPath);
                }
            }

            $mother->delete();
            return redirect()->back()->with('delete', 'Successfully deleted');
        }

        return redirect()->back()->with('error', 'mother not found');

    }


    public function fetch_mother($id){
        $province = Province::all();
        $mother = DB::table('mothers')
            ->leftJoin('villages', 'villages.id', "=", "mothers.village_id")
            ->leftJoin('districts', 'districts.dis_id', "=", "mothers.dis_id")
            ->leftJoin('communes', 'communes.commune_id', "=", "mothers.commune_id")
            ->leftJoin('provinces', "provinces.province_id", "=", "mothers.province_id")
            ->where('mother_id', $id)
            ->select('*')->first();
        return view('mother.update',compact('mother','province'));
    }



    public function update_mother(Request $request, $id){
        $mother = Mother::where('mother_id', $id)->first();
        $mother->fname_kh = $request->fname_kh;
        $mother->lname_kh = $request->lname_kh;
        $mother->fname_en = $request->fname_en;
        $mother->lname_en = $request->lname_en;
        $mother->gender = $request->gender;
        $mother->phones = $request->phones;
        $mother->nationality = $request->national;
        $mother->mstatus = $request->mstatus;
        $mother->day = $request->day;
        $mother->month = $request->selected_month;
        $mother->year = $request->selected_year;
        $mother->job_title = $request->job_title;
        $mother->village_id = $request->selected_village;
        $mother->dis_id = $request->selected_district;
        $mother->commune_id = $request->selected_commune;
        $mother->province_id = $request->province;
        $mother->user_id = $request->user_id ?? 1;

        if($request->hasFile('photo')){
            $destination = "upload/" . $mother->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $mother->photo = $filename;
        }
        else{
            $mother->photo = $request->photo;
        }
        $mother->update();
        return redirect()->back()->with("update", "Update Success...");
    }

    public function view_details($id){
        $mother = DB::table('mothers')
        ->leftJoin('villages', 'villages.id', "=", "mothers.village_id")
        ->leftJoin('districts', 'districts.dis_id', "=", "mothers.dis_id")
        ->leftJoin('communes', 'communes.commune_id', "=", "mothers.commune_id")
        ->leftJoin('provinces', "provinces.province_id", "=", "mothers.province_id")
        ->where('mother_id', $id)
        ->select('*')->first();

        return view('mother.viewDetail', compact('mother'));
    }

}
