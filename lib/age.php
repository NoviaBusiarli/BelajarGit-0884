<?php

class CountAge{

	public $age;

	public function yourAge($age){
			$bday = new DateTime($age);
			$today = new DateTime();
			$diff = $today->diff($bday);
		return $diff;

		
	}
}

?>