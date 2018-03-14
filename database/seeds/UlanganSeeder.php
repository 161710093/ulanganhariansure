<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'Annisa Hafitria','nipd'=>'27022002','alamat'=>'Jln Moch Toha'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'jajang','nipd'=>'222','alamat'=>'Ranca kasiat'
        ));
        $this->command->info('Dosen Sudah Diisi !');


        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $elt = jurusan::create(array(
         	'nama_jurusan'=>'Multimedia'
         ));
        $this->command->info('Jurusan Telah Diisi !');


        $nisa = mahasiswa::create(array(
        'nama_mahasiswa'=> 'nisa','nis'=>'000021','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));
        $nico = mahasiswa::create(array(
        'nama_mahasiswa'=> 'nico','nis'=>'000012','id_dosen'=>$dosen2->id,'id_jurusan'=> $elt->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');


        wali::create(array(
        'nama'=>'Bpk.Jajang',
        'alamat'=>'rancamanyar',
        'id_mahasiswa'=>$nisa->id
        ));
        wali::create(array(
        'nama'=>'Bpk.Idoh',
        'alamat'=>'bandung caang',
        'id_mahasiswa'=>$nico->id
        ));

		$this->command->info('Wali Telah Diisi !');


		$ips = matkul::create(array('nama_matkul'=>'ips','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'78'));


		$nisa->matkul()->attach($ips->id);
        $nisa->matkul()->attach($kimia->id);
		$nico->matkul()->attach($kimia->id);
		$nisa->matkul()->attach($ips->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
