<?php

class Jobs extends Database{
	function getAll(){
		$this->query("SELECT jobs.*, categories.name AS cat_n FROM jobs
						INNER JOIN categories ON jobs.cat_id = categories.id
						ORDER BY post_date DESC
		");
		return $this->result_set();
	}

	function getSingle($q){
		$this->query($q);
		return $this->result_single();
	}
}


?>