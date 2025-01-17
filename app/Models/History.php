<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'hypothesis_id',
        'name',
        'description',
        'value',
    ];

    public function hypothesis(){
        return $this->belongsTo(Hypothesis::class);
    }
    
}
