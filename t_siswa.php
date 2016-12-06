<?php

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/m_nationality.php');

	$siswa = new siswa();
	$nation = new Nationality();
	$data_nation = $nation->readAllNationality();

	if (isset($_POST['kirim'])) {
		//print_r($_POST);
		$name = $_POST['in_nama'];
		$nis = $_POST['in_nis'];
		$email = $_POST['in_email'];
		$nat = $_POST['in_nation'];

		$Tambah = $siswa -> createsiswa($nat, $nis, $name, $email, '');
		echo "Data Siswa Berhasil ditambahkan <br /> <br />";
	}

?>



<h1>Tambah Data Siswa</h1>
<form action="t_siswa.php" method="POST">
	NIS: <br />
	<input type="text" name="in_nis"><br />
	Nama Lengkap: <br />
	<input type="text" name="in_nama"><br />
	Email : <br />
	<input type="email" name="in_email"><br	/>
	Kewarganegaraan: <br />
	<select name="in_nation">
		<option value="">--Pilih Negara--</option>
		<?php
			foreach ($data_nation as $n) : 
		?>
		<option value="<?php echo $n['id_nationality']?>">
			<?php echo $n['nationality']?>
		</option>
		<?php endforeach?>
	</select><br />
	<input type="submit" name="kirim" value="simpan">

</form>