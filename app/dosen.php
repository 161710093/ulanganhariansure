<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = 'dosens'; 
    protected $fillable = array('nama','nipd','alamat');

  	public function mahasiswa()
    {
    	return $this->hasMany('App\mahasiswa','id_dosen');
    }
}
