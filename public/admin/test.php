<?php
 require_once("../../includes/initialize.php");  

 $sql ="SELECT * FROM photographs WHERE NOT caption LIKE '%headphone%' AND NOT caption  LIKE '%speaker'";
 $photos = Photograph::find_by_sql($sql);

foreach ($photos as $photo) {
	
	echo $photo->id;
	
}



?> 