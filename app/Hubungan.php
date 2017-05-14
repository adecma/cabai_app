<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
	protected $table = 'gejala_penyakit';

    public function penyakit(){
    	return $this->belongsTo('App\Penyakit');
    }

    public function gejala(){
    	return $this->belongsTo('App\Gejala');
    }

    public function scopeSearch($query, $q) {
        $query->whereHas('penyakit', function($rule) use($q){
                $rule->where('name', 'like', '%' . $q . '%');
            })
            ->orWhereHas('gejala', function($rule) use($q){
                $rule->where('name', 'like', '%' . $q . '%');
            });
    }
}
