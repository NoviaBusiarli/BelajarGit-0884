<?php

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');

	$id = $_GET['id'];

	if(!is_numeric($id))
	{
		exit('Access forbidden');
	}

	$siswa = new siswa();
	$data = $siswa->readSiswa($id);

	if(empty($data))
	{
		exit('Siswa is not found');
	}

	
	$dt = $data[0];

	/*
	print '<pre>';
	print_r($data);
	print '</pre>';
	*/

?>

<table border="=1">
	<tr>
		<td>No</td>
		<td><?php ?></td>
	</tr>
	<tr>
		<td>ID</td>
		<td><?php echo $dt['id_siswa']?></td>
	</tr>
	<tr>
		<td>Full Name</td>
		<td><?php echo $dt['full_name']?></td>
	</tr>
	<tr>
		<td>Date of Birth</td>
		<td><?php echo $dt['date_ob']?></td>
	</tr>
	<tr>
		<td>Usia</td>
		<td><?php echo $dt['']?></td>
	</tr>
	<tr>
		<td>NATIONALITY</td>
		<td><?php echo $dt['nationality']?></td>
	</tr>
</table>

<br />
<a href="siswa.php">Kembali</a>