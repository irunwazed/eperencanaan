<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RenstraController extends CI_Controller {

    private $level, $akun, $tahun, $link;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->myconfig->cekLogin();

        $this->level = 1;
        $this->akun = 2;
        $this->tahun = date("Y");
        $this->link = "bappeda/renstra";
        $this->load->model('bappeda/OpdPaguModel');
		
    }

    public function getData($save = ''){
        
        $jumDataAll = 0;
        $data = array();
        $kirim = array();
        $dataTambah = array();
        $jumlahDatainPage = 20;
        $jumlahPage = 1;
        $status = true;
        $linkSavePDF = '';
        $nameFile = '';
        $pageStatus = NULL;
        $dataType = '';

        $search = '';
        if(@$this->input->post('search')){
            $search = $this->input->post('search');
        }
        $this->load->model('opd/DataModel');
        $post = $this->input->post();
        $post['user_id'] = 3; // ambil dari session id setelah login
        $post['rpjmd'] = 1; // ambil dari session rpjmd setelah login
        $post['tahun_asli'] = $this->tahun;
        $kirim['tahun_asli'] = $this->tahun;
        $kirim['tahun_rpjmd'] = $this->DataModel->getTahunRpjmd($post);
        $kirim['tahun'] = $kirim['tahun_asli']-$kirim['tahun_rpjmd']+1;
        
        $data = $this->OpdPaguModel->getAll($search, $post);
        
        $kirim['dataAllOpd'] = $this->DataModel->getAllOpd($post);
        $kirim['data'] = $data;
        $kirim['dataTambah'] = $dataTambah;
        $kirim['link'] = $this->link;
        
        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
        }else if($save == 'excel'){
            if($kirim['data'])
            
            $this->exportExcel($dataType, $nameFile, $kirim['data'], $kirim);
        }else{
            $this->load->view("tampilan/".$this->link, $kirim);
            // echo json_encode($kirim);
        }
    }

    public function setData($name, $id = null){
        $post = $this->input->post();
        if($id != null){
            $post['perumusan_program_id'] = $id;
        }
        $post['rpjmd'] = 1; // ambil dari session rpjmd setelah login 
        $pesan = $this->OpdPaguModel->$name($post);
        $this->session->set_flashdata('msg', $pesan);
        redirect(base_url($this->link));
    }

    public function getOneData($id){
        $result = $this->OpdPaguModel->getOneData($id);

        $kirim = array(
            'data' => $result,
            'status' => true
        );

        echo json_encode($kirim);
    }
}