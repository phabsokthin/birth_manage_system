<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $primaryKey = 'mother_id';

    use HasFactory;

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'dis_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
