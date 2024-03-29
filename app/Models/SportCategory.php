<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportCategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'sport_categories';
    protected $guarded = false;
}
