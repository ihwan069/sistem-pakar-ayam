<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds_evidence extends Model
{
    use HasFactory;
    
    protected $table = 'ds_evidences';
    
    protected $fillable = [
        'code',
        'name',
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->hasMany(Ds_role::class, 'id_evidence', 'id');
    }
}
