<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [
        'commune_id',
        'village_code',
        'village_en_name',
        'village_kh_name',
        'status',
        'user_id',
    ];


    public function commune()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'commune_id');
    }

  
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
