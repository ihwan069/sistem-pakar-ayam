<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds_result extends Model
{
    use HasFactory;
    
    protected $table = 'ds_results';

    protected $fillable = ['penyakit', 'description', 'solution',  'kepercayaan'];

    protected $primaryKey = 'id';

}
