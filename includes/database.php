<?php
require_once(LIB_PATH.DS."config.php");

class MySQLDatabase {
	
	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
  function __construct() {
    $this->open_connection();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists( "mysql_real_escape_string" );
  }

	public function open_connection() {
		$this->connection = mysqli_connect("localhost", "root", "","photo_gallery");
		if (!$this->connection) {
			die("Database connection failed: " . mysqli_error());
		} //else {
			//echo "Success";
			//$db_select = mysqli_select_db("photo_gallery", $this-> connection);
			//if (!$db_select) {
				//die("Database selection failed: " . mysqli_error());
			//}
		}
	

	public function close_connection() {
		if(isset($this->connection)) {
			mysqli_close($this->connection);
			unset($this->connection);
		}
	}

	public function query($sql) {
		$this->last_query = $sql;
		$result = mysqli_query($this->connection, $sql);
		$this->confirm_query($result);
		return $result;
	}
	
	public function escape_value( $value ) {
		if( $this->real_escape_string_exists ) { 
			if( $this->magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else {
			if( !$this->magic_quotes_active ) { $value = addslashes( $value ); }
			
		}
		return $value;
	}
	
  public function fetch_array($result_set) {
    return mysqli_fetch_array($result_set);
  }
  
  public function num_rows($result_set) {
   return mysqli_num_rows($result_set);
  }
  
  public function insert_id() { //to get the last id inserted over the current db connection do this
    return mysqli_insert_id($this->connection);
  }
  
  public function affected_rows() {
    return mysqli_affected_rows($this->connection);
  }

	private function confirm_query($result) {
		if (!$result) {
	    $output = "Database query failed: " . mysqli_error($this->connection) . "<br /><br />";
	    //$output .= "Last SQL query: " . $this->last_query; //returns the last run query when an error occurs
	    die( $output );
		}
	}
	 
}

$database = new MySQLDatabase();
//$db =& $database;

?>