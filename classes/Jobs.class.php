<?php

class Jobs extends Database{
	function getAllJobs(){
		$this->query("SELECT jobs.*, categories.name AS cat_n FROM jobs
						INNER JOIN categories ON jobs.cat_id = categories.id
						ORDER BY post_date DESC
		");
		return $this->result_set();
	}

	// Getting jobs based on specific category
	function getByCategory($cat){
		$this->query("SELECT jobs.*, categories.name AS cat_n FROM jobs
						INNER JOIN categories ON jobs.cat_id = categories.id
						WHERE jobs.cat_id = $cat
						ORDER BY post_date DESC
		");
		return $this->result_set();
	}

	// Creating new job
	function create($data){
		//Insert query
		$this->query("INSERT INTO jobs (cat_id, company, job_title, description, salary, location, user, email)
					  VALUES (:cat_id, :company, :job_title, :description, :salary, :location, :user, :email)
		");
		//bind values
		$this->bind(":cat_id", $data['cat_id']);
		$this->bind(":company", $data['company']);
		$this->bind(":job_title", $data['job_title']);
		$this->bind(":description", $data['description']);
		$this->bind(":salary", $data['salary']);
		$this->bind(":location", $data['location']);
		$this->bind(":user", $data['user']);
		$this->bind(":email", $data['email']);
		
		//execute the statment & returen true or false
		if($this->execute()){ return true; }else{ return false; }
	}

	// Updating job
	function update($job_id, $data){
		//Insert query
		$this->query("UPDATE jobs
					  SET job_title 	= :job_title,
					  	  company 		= :company,
					  	  cat_id 		= :cat_id,
					  	  description 	= :description,
					  	  salary 		= :salary,
					  	  location 		= :location,
					  	  user 			= :user,
					  	  email 		= :email
					  WHERE id = $job_id");
		//bind values
		$this->bind(":job_title", $data['job_title']);
		$this->bind(":company", $data['company']);
		$this->bind(":cat_id", $data['cat_id']);
		$this->bind(":description", $data['description']);
		$this->bind(":salary", $data['salary']);
		$this->bind(":location", $data['location']);
		$this->bind(":user", $data['user']);
		$this->bind(":email", $data['email']);
		
		//execute the statment & returen true or false
		if($this->execute()){ return true; }else{ return false; }
	}

	// Deleting job
	function delete($job_id){
		$this->query("DELETE FROM jobs WHERE id = $job_id");
		if($this->execute()){ return true; }else{ return false; }
	}

}


?>
