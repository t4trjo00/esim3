<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asiakas extends CI_Controller 
	{

    function __construct() {
        parent::__construct();
        $this->load->model('Asiakas_model');
    }


		public function listaa()
		{
			//$this->load->model('Asiakas_model');		turha, esiteltiin ylempänä
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

	public function nayta_poistettavat() 
	{
			//$this->load->model('Asiakas_model'); 
			$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
			$data['sivun_sisalto']='asiakas/poista';
			$this->load->view('menu/sisalto',$data);
	}	

	public function poista($id)
	{
			//$this->load->model('Asiakas_model');
			$poista=$this->Asiakas_model->delAsiakas($id);
			if ($poista>0) 
			{
			echo '<script>alert("poisto onnistui")</script>';
			}

			$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
			$data['sivun_sisalto']='asiakas/listaa';
			$this->load->view('menu/sisalto',$data);

	}

	public function etsi_tilaus() 
	{
			$id=$this->input->post('valittu_id');
			$btn=$this->input->post('btnEtsi');

			$this->load->model('Tilaus_model');
			$this->load->model('Asiakas_model');
			$data['asiakkaat']=$this->Asiakas_model->getAsiakas();

			if (isset($btn)) 
			{
				$data['tilaus']=$this->Tilaus_model->searchTilaus($id);
			}
			$data['sivun_sisalto']='asiakas/etsi_tilaus';
			$this->load->view('menu/sisalto',$data);
	}

	public function naytaMuokattavaAsiakas($id)
	{
		$data['asiakas']=$this->Asiakas_model->getValittuAsiakas($id);
		$data['sivun_sisalto']='asiakas/nayta_muokattava_asiakas';
		$this->load->view('menu/sisalto',$data);
	}

	public function paivita_asiakas()
	{
		$btn=$this->input->post('btnTallenna');
		if (isset($btn)); 
		{
			$uusiData=array(
				'etunimi'=>$this->input->post('en'),
				'sukunimi'=>$this->input->post('sn'),
				'email'=>$this->input->post('em'));
			$id=$this->input->post('id');
		$testi=$this->Asiakas_model->updateValittuAsiakas($uusiData,$id);
		if ($testi>0) {
			echo '<script>alert("Päivitys onnistui")</script>';
		}
		else {
			echo '<script>alert("Päivitys epäonnistui")</script>';

		}
		}
	}
	public function nayta_muokattavat_asiakaat()
	{
		$data['asiakkaat']=$this->Asiakas_model->getAsiakas();
		$data['sivun_sisalto']='asiakas/nayta_muokattavat_asiakaat';
		$this->load->view('menu/sisalto',$data);
	}

		public function muokkaa_asiakkaat()
	{
		$btn=$this->input->post('btnTallenna');
		if (isset($btn)); 
		{
			$id=$this->input->post('id');
			$enimi=$this->input->post('en');
			$snimi=$this->input->post('sn');
			$email=$this->input->post('em');
			$lkm=0;
			foreach ($id as $rivi) 
			{
				$lkm++;

			}
			for ($x=0; $x<$lkm; $x++) 
			{ 
				$paivita_asiakas=array(
					"etunimi"=>$enimi[$x],
					"sukunimi"=>$snimi[$x],
					"email"=>$email[$x]
					);
						$testi['asiakkaat']=$this->Asiakas_model->updateValittuAsiakas($paivita_asiakas,$id[$x]);
			}
			$this->listaa();

		}

	}

}	