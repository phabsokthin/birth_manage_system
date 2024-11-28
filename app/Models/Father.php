<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $primaryKey = 'father_id';

    use HasFactory;

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_kh_name');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_kh_name');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_kh_name');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_kh_name');
    }
}
