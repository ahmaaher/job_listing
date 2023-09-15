<?php


class Database{
	private $host 	= DB_HOST;
	private $dbname = DB_NAME;
	private $user 	= DB_USER;
	private $pass 	= DB_PASS;

	private $dbh, $error, $stmt;

	function __construct(){
		// Set DSN, which is database source name.
		$dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
		//setting some options
		$opts = array(
			PDO::ATTR_PERSISTENT => TRUE,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opts);
		}catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}

	function query($q){ $this->stmt = $this->dbh->prepare($q); }

	function execute(){ return $this->stmt->execute(); }

	function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	function result_set(){
		$this->stmt->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ); // fetch the result as object not associative array
	}

	function result_single(){
		$this->stmt->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ); // fetch the result as object not associative array
	}

	function selectSingleQuery($q){
		$this->query($q);
		return $this->result_single();
	}

	function selectSetQuery($q){
		$this->query($q);
		return $this->result_set();
	}
	
	function checkItem($q){
		$this->query($q);
		$this->stmt->execute();
		return $this->stmt->rowCount();
	}

}


?>