<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;


    protected $fillable = [
        'docket_number',
        'date_filed',
        'cabinet',
        'nature',
        'petitioners',
        'lessor',
        'lessee',
        'location',
        'date_alhc',
        'area',
        'crops',
        'counsel',
        'name',
        'file_path'
    ];



    public function scopeSearch($query, $term){
        $term = "%$term%";
        $query->where(function($query) use ($term){
            $query->where('docket_number', 'like', $term)
                  ->orWhere('cabinet', 'like', $term)
                  ->orWhere('petitioners', 'like', $term)
                  ->orWhere('lessor', 'like', $term)
                  ->orWhere('lessee', 'like', $term)
                  ->orWhere('location', 'like', $term);
        });
    }


    public function file(){
        return $this->hasMany(File::class);
    }
}
