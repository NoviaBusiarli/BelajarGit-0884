<?php

	/*Komentar Dari Server*/
	/**********************/
	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	//require_once('lib/m_nationality.php');

	if (!isset($_POST['kirim']))
	{
		exit('Access forbidden');
	}

	print_r($_POST['kirim']);

	$siswa = new siswa();


	$data['input_name'] = addslashes($_POST['in_nama']);
	$data['input_email'] = $_POST['in_email'];
	$data['input_nationality'] = $_POST['in_nation'];
	$data['foto'] ="img/".$_POST['in_nis'].".png";

	$siswa->updateSiswa($_POST['in_nis'], $data);

	//print_r($_FILES);
	if(!copy($_FILES['in_foto']['tmp_name'], 'img/'.$_POST['in_nis'].'.png'))
	{
		exit('Error Upload File');
	}
	echo "Data Siswa Berhasil di update <br />";
	echo "<a href='u_siswa.php?id=".$_POST['in_nis']."'> Detail Siswa </a>";
?>
