<?php

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	$id = $_GET['a'];

	if(!is_numeric($id))
	{
		exit('Access forbidden');
	}

	$siswa = new siswa();
	$data = $siswa->deletesiswa($id);


	if(empty($data))
	{
		echo "Data Berhasil dihapus";
	}
?>

<br />
<a href="siswa.php">Kembali</a>