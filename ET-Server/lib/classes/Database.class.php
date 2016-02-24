<?php 
/** This is a class file - no output should happen from this file **/

class Database {
	private $connection;
	
	public function query($sql){
		// Query logic; return associative array or indexed arary?  User selectable?
		$result = $this->connection->query($sql);
		if($result === FALSE){
			// Throw error?  Return false?
			$message = $this->connection->error;
			$code = $this->connection->errno;
			throw new Exception($message, $code);
			echo 'Query failed: ' . $this->connection->error;
		}
		else{
			return $result;
		}
	}
	
	public function sanitize($str){
		$str = $this->connection->real_escape_string($str);
		return $str;
	}
	
	
	/**
	 * Returns the AUTO_INCREMENT ID of the last INSERT or UPDATE statement.  Returns 0 if
	 * last statement wasn't an INSERT or UPDATE.
	 * 
	 * @return int ID as int of the last INSERT or UPDATE statement.
	 */
	public function insertId(){
		return $this->connection->insert_id;
	}
	
	
	public function __construct(){
		$cfg = $GLOBALS['cfg'];
		// Constructor logic
		// Initiate connection and store connection in object
		$this->connection = new mysqli($cfg['db']['host'],
										$cfg['db']['user'],
										$cfg['db']['pass'],
										$cfg['db']['database'],
										$cfg['db']['port']);
		if($this->connection->connect_error){
			die('SQL connect error: ('
					.$this->connection->connect_errno
					.') '
					.$this->connection->connect_error
					);
			printf("SQL connect failed: %s\n", mysqli_connect_error());
			exit();
		}
	}
	
	public function __destruct(){
		// Kill the DB connection
		$this->connection->close();
	}
	
	public function __set($string, $var){
		// Setting directly to this object type should probably be disabled.
	}
}


?>