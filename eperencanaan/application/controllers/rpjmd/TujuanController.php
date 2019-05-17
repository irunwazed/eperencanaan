<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TujuanController extends CI_Controller {

    private $level, $akun;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('rpjmd/TujuanModel');
        $this->level = 1;
        $this->akun = 2;
		
    }

    public function getData($page = 1, $save = ''){
        $jumDataAll = 0;
        $status = false;
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level, $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        // // echo "sdf";
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }

            $post = $this->input->post();
            $post['user_id'] = $session['id'];

            if($save != ''){
                $post['all'] = true;
            }

            $data = $this->TujuanModel->getAll($page, $search, $post);
            
            // $dataAll
            $jumDataAll = $this->TujuanModel->getCount($search, $post);
            $jumlahDatainPage = $this->TujuanModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
            $misi ='';
            $this->load->model('rpjmd/DataModel');
            $misi = $this->DataModel->getMisi($post);

		}else{
            $data = array();
            $jumlahPage = 1;
            $misi = '';
        }
        
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
            'misi'=>$misi,
			'data' => $data,
			'status' => $status,
        );
        
        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf('tujuan', 'rpjmd/tujuan', $kirim);
        }else if($save == 'excel'){
            $this->exportExcel('tujuan', $kirim['data']);
        }else{
            echo json_encode($kirim);
        }
    }
    
    public function create(){
        $status = false;
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level, $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        $pesan = "Gagal Memasukkan data";
        // print_r($this->input->post());
        if($status){
            $post = $this->input->post();
            $post['user_id'] = $session['id'];
            // print_r($post);
            $status = $this->TujuanModel->create($post);
            if($status)
                $pesan = "Berhasil Memasukkan Data";
        }
        // print_r($post['foto']);
        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function update(){
        $status = false;
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level, $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        // echo "sd";
        $pesan = "Gagal Mengubah data";
        // print_r($this->input->post());
        if($status){
            $post = $this->input->post();
            $post['user_id'] = $session['id'];
            // print_r($_FILES);
            $status = $this->TujuanModel->update($post);
            if($status)
                $pesan = "Berhasil Mengubah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function delete(){
        $status = false;
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level, $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        $pesan = "Gagal Menghapus data";
        // print_r($this->input->post());
        if($status){
            $post = $this->input->post();
            $post['user_id'] = $session['id'];
            $status = $this->TujuanModel->delete($post);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    function exportExcel($name='data', $data)
    {
        $this->load->library("excel");

        $fileName = $name."-".time();

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array(
            "Nomor",
            "Misi",
            "Tujuan",
        );

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        
        $excel_row = 2;
        $nomor = 1;
        foreach($data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $nomor);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['misi_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['tujuan_nama']);
            $excel_row++;
            $nomor++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
        $object_writer->save('php://output');

    }

}