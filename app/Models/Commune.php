<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $primaryKey = 'commune_id';

    protected $fillable = [
        'dis_id',
        'commune_code',
        'commune_en_name',
        'commune_kh_name',
        'status',
        'user_id',
    ];

    // Relationships

    // Define the relationship to the 'District' model (Assuming there's a District model)
    public function district()
    {
        return $this->belongsTo(District::class, 'dis_id', 'dis_id');
    }

    // Define the relationship to the 'User' model (who created the commune)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
