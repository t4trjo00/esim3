<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asiakas extends CI_Controller 
	{
		public function listaa()
		{
			$this->load->model('Asiakas_model');
			$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
			$data['sivun_sisalto']='asiakas/listaa';
			$this->load->view('menu/sisalto',$data);
		}

public function lisaa()
{
		$btn=$this->input->post('btnTallenna');
		$lisaa_asiakas=array(
			"etunimi"=>$this->input->post('en'),
			"sukunimi"=>$this->input->post('sn'),
			"email"=>$this->input->post('em'),
			);
	$this->load->model('Asiakas_model');
	if (isset($btn)) 
	{
			$lisays=$this->Asiakas_model->addAsiakas($lisaa_asiakas);
			if ($lisays>0) 
			{
			echo '<script>alert("Lisäys onnistui")</script>';
			}
	}

	$data['sivun_sisalto']='asiakas/lisaa';
	$this->load->view('menu/sisalto',$data);

}

}	