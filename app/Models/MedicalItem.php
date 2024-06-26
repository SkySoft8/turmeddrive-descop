<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MedicalItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'medical_items';
    protected $guarded = false;
}
