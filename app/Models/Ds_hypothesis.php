<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds_hypothesis extends Model
{
    use HasFactory;
    
    protected $table = 'ds_problems';
    
    protected $fillable = [
        'code',
        'name',
        'description',
        'solution'
    ];

    public $timestamps = false;

    public function roles()
    {
        return $this->hasMany(Ds_role::class, 'id_problem', 'id');
    }
}
