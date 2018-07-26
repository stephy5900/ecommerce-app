<?php

require_once(LIB_PATH.DS.'database.php');

class Order extends Photograph {
	
	protected static $table_name="orders";
	protected static $db_fields=array('id','name', 'phone_num', 'product', 'qty', 'address', 'price', 'total');
	public $id;
	public $name;
	public $phone_num;
	public $product;
	public $qty;
	public $address;
	public $price;
	public $total;


	/*public function save() {
		// A new record won't have an id yet.
		if(isset($this->id)) {
			
			//$this->update();
			$this->create();
		} else {
			echo "Could not place order";
		}
}*/

public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}
}


?>
	