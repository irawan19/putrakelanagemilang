<?php

namespace App\Helpers;
use Auth;
use Datetime;
use URL;
use Str;

class General {


	//Notifikasi
		public static function pesanErrorForm($form_input='')
		{
			if($form_input != '')
				echo '<div class="errorform">'.$form_input.'</div>';
		}

		public static function pesanErrorFormFile($form_input='')
		{
			if($form_input != '')
				echo '<div class="errorformfile">'.$form_input.'</div>';
		}

		public static function pesanSuksesForm($form_input='')
		{
			if($form_input != '')
				echo '<div class="alert alert-success" role="alert">'.$form_input.'</div>';
		}

		public static function pesanFlashErrorForm($form_input = '')
		{
			if ($form_input != '')
				echo '<div class="alert alert-danger" role="alert">' . $form_input . '</div>';
		}

		public static function validForm($alert="")
		{
			if($alert != '')
				echo 'is-invalid';
		}
	//Notifikasi

	//Tombol
		public static function pencarian()
		{
			echo '<button class="btn btn-sm btn-primary" type="submit">
					<span class="cil-search"></span> Cari
				</button>';
		}

		public static function reset()
		{ 
			echo '<button class="btn btn-sm btn-danger resetbutton" type="button">
					<span class="cil-sync"></span> Reset
				</button>';
		}

		public static function simpan()
		{
			echo '<button class="btn btn-sm btn-success" type="submit" name="simpan" value="simpan">
					<span class="cil-plus"></span> Simpan
				</button>';
		}

		public static function simpankembali()
		{
			echo '<button class="btn btn-sm btn-success active" type="submit" name="simpan_kembali" value="simpan_kembali">
					<span class="cil-reload"></span> Simpan Kembali
				</button>';
		}

		public static function perbarui()
		{
			echo '<button class="btn btn-sm btn-primary" type="submit">
					<span class="cil-pencil"></span> Perbarui
				</button>';
		}

		public static function kembali($url_kembali='')
		{
			echo '<a class="btn btn-sm btn-danger" href="'.$url_kembali.'">
					<span class="cil-ban"></span> Kembali
				</a>';
		}

		public static function batal($url_kembali='')
		{
			echo '<a class="btn btn-sm btn-danger" href="'.$url_kembali.'">
					<span class="cil-ban"></span> Batal
				</a>';

		}

		public static function tambah($link = '')
		{
			echo  '<a href="' . URL($link) . '" class="btn btn-sm btn-success" style="color:#fff">
						<span class="cil-plus"></span> Tambah
					</a>';
		}

		public static function bacatombol($link = '')
		{
			echo '<a href="'.URL($link).'" class="btn btn-sm btn-warning">
						<span class="cil-book"></span> Baca
					</a';
		}

		public static function baca($link = '')
		{
			echo  '<a href="' . URL($link) . '" class="dropdown-item" style="color:orange">
						<span class="cil-book"></span> Baca
					</a>';
		}

		public static function edit($link = '')
		{
			echo  '<a href="' . URL($link) . '" class="dropdown-item" style="color:#3399ff">
						<span class="cil-pencil"></span> Edit
					</a>';
		}

		public static function hapus($link = '', $label = '')
		{
			echo  '<button type="button" class="dropdown-item showModalHapus" style="color:#e55353" data-link="' . URL($link) . '" data-nama="' . $label . '">
						<span class="cil-trash"></span> Hapus
					</button>';
		}
	//Tombol


	public static function potongText($text='',$jumlah)
	{
		return Str::limit(strip_tags($text),$jumlah);
	}

    public static function ubahDBKeTanggal($tanggal = '')
    {
    	$data_bulan 	= array('', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
    	$pecah_tanggal	= explode('-', $tanggal);
    	$bulan 			= '';
    	if ($tanggal != '0000-00-00') {
    		for ($x = 1; $x <= 12; $x++) {
    			if (intval($pecah_tanggal[1]) == $x) {
    				$bulan = $x;
    				break;
    			}
    		}
    		return $pecah_tanggal[2] . ' ' . $data_bulan[$bulan] . ' ' . $pecah_tanggal[0];
    	} else
    		return General::ubahDBKeTanggal(date('Y-m-d'));
    }

    public static function ubahTanggalKeDB($tanggal = '')
    {
    	if ($tanggal != '') {
    		$data_bulan 		= array('', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des');
    		$pecah_tanggal  	= explode(' ', $tanggal);
    		$bulan 				= '';
    		for ($x = 1; $x <= 12; $x++) {
    			if ($pecah_tanggal[1] == $data_bulan[$x]) {
    				$bulan = $x;
    				break;
    			}
    		}
    		if ($bulan < 10)
    			$bulan = '0' . $bulan;

    		$result = $pecah_tanggal[2] . '-' . $bulan . '-' . $pecah_tanggal[0];
    		return $result;
    	} else
    		return '';
    }

	public static function ubahDBKeTanggalwaktu($tanggal = '')
	{
		$tanggal_waktu = General::ubahDBKeTanggal(date('Y-m-d', strtotime($tanggal))) . ' ' . date('H:i:s', strtotime($tanggal));
		return $tanggal_waktu;
	}
		
	public static function sosialMedia()
	{
		$sosial_media_data = array(
			array(
				'nama' 	=> 'Facebook',
				'icon'	=> 'facebook'
			),
			array(
				'nama'	=> 'Youtube',
				'icon'	=> 'youtube'
			),
			array(
				'nama' 	=> 'Twitter',
				'icon'	=> 'twitter'
			),
			array(
				'nama' 	=> 'Instagram',
				'icon'	=> 'instagram'
			),
			array(
				'nama' 	=> 'Linkedin',
				'icon'	=> 'linkedin'
			),
			array(
				'nama' 	=> 'Tiktok',
				'icon'	=> 'tiktok'
			),
		);
		return $sosial_media_data;
	}

	public static function iconFontAwesome()
	{
		$sosial_media_data = array(
			array(
				'nama' 	=> 'Hospital',
				'icon'	=> 'hospital'
			),
			array(
				'nama'	=> 'Users',
				'icon'	=> 'user'
			),
			array(
				'nama'	=> 'Wrench',
				'icon'	=> 'wrench'
			),
			array(
				'nama'	=> 'Xray',
				'icon'	=> 'x-ray'
			),
			array(
				'nama'	=> 'Vials',
				'icon'	=> 'vials'
			),
			array(
				'nama'	=> 'User Cog',
				'icon'	=> 'user-cog'
			),
			array(
				'nama'	=> 'Universal Access',
				'icon'	=> 'universal-access'
			),
			array(
				'nama'	=> 'Tools',
				'icon'	=> 'tools'
			),
			array(
				'nama'	=> 'Calendar',
				'icon'	=> 'calendar'
			),
			array(
				'nama'	=> 'Building',
				'icon'	=> 'building'
			),
		);
		return $sosial_media_data;
	}
    
}