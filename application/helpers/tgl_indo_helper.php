<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

// if ( ! function_exists('tgl_indo'))
// {
// 	function tgl_indo2($tgl)
// 	{
// 		$pecah = explode("-",$tgl);
// 		$tanggal = $pecah[0];
// 		$bulan = bulan($pecah[1]);
// 		$tahun = $pecah[2];
// 		return $tanggal.' '.$bulan.' '.$tahun;
// 	}
// }

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "-01-";
				break;
			case 2:
				return "-02-";
				break;
			case 3:
				return "-03-";
				break;
			case 4:
				return "-04-";
				break;
			case 5:
				return "-05-";
				break;
			case 6:
				return "-06-";
				break;
			case 7:
				return "-07-";
				break;
			case 8:
				return "-08-";
				break;
			case 9:
				return "-09-";
				break;
			case 10:
				return "-10-";
				break;
			case 11:
				return "-11-";
				break;
			case 12:
				return "-12-";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if (! function_exists('timeago')) {
	function timeago($date) {
	   $timestamp = strtotime($date);	
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if (isset($date)) {
		   	if($currentTime >= $timestamp) {
				$diff     = time()- $timestamp;
				for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
				$diff = $diff / $length[$i];
				}

				$diff = round($diff);
				return $diff . " " . $strTime[$i] . "(s) ago ";
		   	}
	   }
	   else {
	   	return "tidak ada data";
	   }
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		// $waktu = array(	365*24*60*60	=> "tahun",
		// 				30*24*60*60		=> "bulan",
		// 				7*24*60*60		=> "minggu",
		// 				24*60*60		=> "hari",
		// 				60*60			=> "jam",
		// 				60				=> "menit",
		// 				1				=> "detik"
		// 			);

		$waktu = array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik"
					);

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}

function seperate($string) {
	return $hasil = str_replace(',', ', ', $string);

}
