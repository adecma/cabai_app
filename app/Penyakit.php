<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    public function gejalas(){
    	return $this->belongsToMany('App\Gejala')
    		->withPivot('bobot')
    		->withTimestamps();
    }

    public function scopeSearch($query, $q) {
    	$query->where('name', 'like', '%' . $q . '%');
    }
}
