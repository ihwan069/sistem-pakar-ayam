<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds_role extends Model
{
    use HasFactory;
    
    protected $table = 'ds_rules';
    
    protected $fillable = [
        'id_problem',
        'id_evidence',
        'cf'
    ];

    public $timestamps = false;

    public function hypothesis()
    {
        return $this->belongsTo(Ds_hypothesis::class, 'id_problem', 'id');
    }

    public function evidence()
    {
        return $this->belongsTo(Ds_evidence::class, 'id_evidence', 'id');
    }
}
