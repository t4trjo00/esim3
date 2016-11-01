<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {



public function index() {
	echo "Tämä on Home-controllerin index-funktio";


	}

	public function toka() {
		echo "tämä on home-controllerin toka-funktio";
	}

public function kolmas() {
	$data['nimet']=array(
		array("en"=>'Jussi',"sn"=>'Virta'),
		array("en"=>'Juhi',"sn"=>'Virtanen'),
		array("en"=>'Pussi',"sn"=>'Pirta')
		);
	$data['user']="Joonas";
	$data['vuosi']=2016;

	$this ->load->view('home/kolmas',$data);

	}

public function neljas() {
	$this ->load->model('Home_model');
	$data['sisalto']=$this->Home_model->getNames();
	$this->load->view('home/neljas',$data);

}



}





