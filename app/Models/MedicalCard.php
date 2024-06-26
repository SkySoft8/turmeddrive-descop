<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalCard extends Model
{

    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'medical_cards';
    protected $guarded = false;

    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
    public function getLogoUrlAttribute(){
        return url('storage/' . $this->logo);
    }


    public function medicalTags(){
        return $this->belongsToMany(MedicalTag::class, 'medical_card_tags','medical_card_id','medical_tag_id');
    }
 
    public function types(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
    public function districts(){
        return $this->belongsTo(District::class,'district_id','id');
    }
    public function republics(){
        return $this->belongsTo(Republic::class,'republic_id','id');
    }
    public function cities(){
        return $this->belongsTo(City::class,'city_id','id');
    }
}
