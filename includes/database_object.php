<?php

require_once('database.php');

class DatabaseObject {

	protected static $table_name = '';
	protected static $db_fields= array('');
	public $id;
	public $filename;
	public $type;
	public $size;
	public $caption;
	public $price;
	public $description;


	public static function find_by_id($id=0){
		global $database;
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." where ID = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
		/*global $database;
		$result_set = $database -> query("SELECT * FROM users where ID = {$id}");
		$found =$database -> fetch_array($result_set);
		return $found;*/
		 //array shift returns the first element in the array
		//$found =$database -> fetch_array($result_set);
		//return $found;

	}

	public static function find_all() {
		return static::find_by_sql("SELECT * FROM ".static::$table_name);
  }

   public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = static::instantiate($row);
    }
    return $object_array;
  }

  public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".static::$table_name;
    $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
    return array_shift($row);
	}

	private function has_attribute($attribute){
		$object_vars = $this->attributes();
		return array_key_exists($attribute, $object_vars);
	}

	protected function attributes(){ //return an array of attribute keys and values
		//return get_object_vars($this);
		$attributes = array();
		foreach (static::$db_fields as $field) {
			if(property_exists($this, $field)){
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;

	}

	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}

	public function create(){
		global $database; 
		$attributes = $this->sanitized_attributes();
		$sql = "INSERT INTO " .static::$table_name. " (";
		$sql .= join(", ", array_keys($attributes)); 
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";

		//die($sql);
		if($database->query($sql)){
			$this->id = $database->insert_id();
			return true;
		}else{
			return false;
		}
	}

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new static;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		
		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}


	public function update() {
	  global $database;

		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".static::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		
	  $sql = "DELETE FROM ".static::$table_name;
	  $sql .= " WHERE id=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	
		// NB: After deleting, the instance of User still exists, even though the database entry does not. This can be useful, as in: echo $user->first_name . " was deleted"; but, for example, we can't call $user->update() after calling $user->delete().
	}


}
?>