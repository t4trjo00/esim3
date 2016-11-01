<?php
class Home_model extends CI_Model {

public function getNames() {
	$names=array(
		array("en"=>'Liisa',"sn"=>'Virtaus'),
		array("en"=>'Julia',"sn"=>'Kananen'),
		array("en"=>'Paula',"sn"=>'Koja')
		);
		
	return $names;

}




}