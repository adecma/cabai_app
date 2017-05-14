<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    public function penyakits(){
    	return $this->belongsToMany('App\Penyakit')
    		->withPivot('bobot')
    		->withTimestamps();
    }

    public function scopeSearch($query, $q) {
    	$query->where('name', 'like', '%' . $q . '%');
    }
}
