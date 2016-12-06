<?php

	class siswa{
		private $db;

		public function siswa()
		{
			$this ->db = new DBClass();
		}

		public function readAllSiswa()
		{
			$query = "SELECT * from siswa a join nationality b ON a.id_nationality = b.id_nationality ";
			return $this->db->getRows($query);
		}

		public function readSiswa($id)
		{
			$query="SELECT * from siswa a join nationality b ON a.id_nationality = b.id_nationality where id_siswa=".$id;
			return $this->db->getRows($query);
		}

		public function createsiswa($id_nationality, $nis, $full_name, $email, $ff)
		{
			$query ="Insert into siswa (id_nationality, nis, full_name, email, foto)
			values('$id_nationality','$nis','$full_name','$email','$ff')";
			$this->db->putRows($query);
		}

		
		public function updateSiswa($id, $data)
		{
			$name = $data['input_name'];
			$email = $data['input_email'];
			$nation = $data['input_nationality'];
			$foto = $data['foto'];

			$query = "update siswa set full_name='$name', email='$email', foto='$foto' ";
			if($nation > 0)
				$query.= ", id_nationality = '$nation'";
				$query.= " where id_siswa = $id";
				$this->db->putRows($query);
		}
		

		public function deletesiswa($id)
		{
			$sql = "Delete from siswa where id_siswa=$id";
			$this->db->putRows($sql);
		}

	}

?>

