<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $primaryKey = 'province_id';
    protected $fillable = [
        'p_code',
        'province_en_name',
        'province_kh_name',
        'modify_date',
        'status',
        'user_id'
    ];

    // Define any relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
