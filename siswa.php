<h1>Daftar Siswa</h1>

<?php

	require_once('lib/DBClass.php');
	require_once('lib/m_siswa.php');
	require_once('lib/age.php');
	

	$siswa = new siswa();
	$HitungAge = new CountAge();
	$data = $siswa->readAllSiswa();

	$djgn  = $siswa->createsiswa('12345','B45','Jhon','jhon@hotmail.com','Null');

	
	/*
	print '<pre>';
	print_r($data);
	print '</pre>';
	*/
?>

<body>
	<table border="1">
	<th>No</th>
	<th>ID Siswa</th>
	<th>Nama Siswa</th>
	<th>Tanggal Lahir</th>
	<th>Umur</th>
	<th>Kebangsaan</th>
	<th></th>
	<th></th>
	<th></th>
	<tr>
		<?php
			$i = 0;	
			foreach ($data as $key):
				$i++;
		?>
	</tr>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $key['id_siswa']?></td>
			<td><?php echo $key['full_name']?></td>
			<td><?php echo $key['date_ob']?></td>
			<td>
				<?php 
				$tanggal = $key['date_ob'];

				if($tanggal != '0000-00-00' || $tanggal != '')
				{
					$exec = $HitungAge->yourAge($tanggal);
					echo $exec->y . "tahun ".$exec->m. " bulan ".$exec->d."hari";				
				}
				else
				{	
					echo "Data lahir Tidak Valid";
				}			
				
			?>
			</td>
			<td><?php echo $key['nationality']?></td>
			<td><a href="d_siswa.php?id=<?php echo $key['id_siswa']?>">Detail</td>
			<td><a href="u_siswa.php?id=<?php echo $key['id_siswa']?>">Edit</td>
			<td><a href="del_siswa.php?a=<?php echo $key['id_siswa']?>">Hapus</td> 
		</tr>
	<?php endforeach?>
	</table>
</body>
