<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'hypothesis_id',
        'evidence_id',
        'value'
    ];

    public function hypothesis(){
        return $this->belongsTo(Hypothesis::class);
    }
    
    public function evidence(){
        return $this->belongsTo(Evidence::class);
    }

}
