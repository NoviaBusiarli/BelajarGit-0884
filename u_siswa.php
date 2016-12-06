<?php

	/*contoh komentar lagi*/
	/*--------------------*/

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/m_nationality.php');

	//$id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['in_nis'];
	$id = $_GET['id'];

	//if(!is_numeric($id) && !isset($_POST['kirim']))
	if (!is_numeric($id))
	{
		exit('Access forbidden');
	}

	$siswa = new siswa();
	$nation = new Nationality();
	$data_nation = $nation->readAllNationality();

	$data = $siswa->readsiswa($id);
	if(empty($data))
	{
		exit('Siswa is not Found');
	}

	$dt = $data[0];
?>

<br />
<a href="siswa.php">Kembali</a>

<h1>Edit Data Siswa</h1>
<form action="editsiswa.php" method="POST" enctype="multipart/form-data">
	NIS: <br />
	<input type="text"  readonly="true" value="<?php echo $dt['id_siswa']?>" name="in_nis"><br />
	Nama Lengkap: <br />
	<input type="text" value="<?php echo $dt['full_name']?>" name="in_nama"><br />
	Email : <br />
	<input type="email" value="<?php echo $dt['email']?>" name="in_email"><br	/>
	Kewarganegaraan: <br />
	<select name="in_nation">
		<option value="">--Pilih Negara--</option>
		<?php foreach ($data_nation as $n) : ?>
		<?php $s = ($dt['id_nationality'] == $n['id_nationality'])?"selected":"" ?>
		<option value="<?php echo $n['id_nationality']?>" <?php echo $s?>>
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach?>
	</select><br />
	Foto : <input type="file" name="in_foto" /> <br />
	<?php if(!empty($dt['foto'])):?>
		<img src="<?php  echo $dt['foto']?>" width="100">
	<?php endif?> <br />
	<input type="submit" name="kirim" value="simpan">
</form>
