<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SasaranController extends CI_Controller {

    private $level, $akun;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('rpjmd/SasaranModel');
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
        // echo "sdf";
        // die();
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

            $data = $this->SasaranModel->getAll($page, $search, $post);

            // $dataAll
            $jumDataAll = $this->SasaranModel->getCount($search, $post);
            $jumlahDatainPage = $this->SasaranModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
            $dataTambah =array();
            $this->load->model('rpjmd/DataModel');
            $dataTambah = $this->DataModel->getTujuan($post);

		}else{
            $data = array();
            $jumlahPage = 1;
            $dataTambah = '';
        }
        
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
            'dataTambah'=>$dataTambah,
			'data' => $data,
			'status' => $status,
        );
        
        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf('sasaran', 'rpjmd/sasaran', $kirim);
        }else if($save == 'excel'){
            $this->exportExcel('sasaran', $kirim['data']);
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
            $status = $this->SasaranModel->create($post);
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
            $status = $this->SasaranModel->update($post);
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
            $status = $this->SasaranModel->delete($post);
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
            "No",
            "Tujuan",
            "Sasaran",
        );

        // mengatur variable align center
        $styleHorizontal = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );
        $styleVertical = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        // end mengatur variable align center

        $cells = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        
        $column = 0;
        $countAtas = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            
            // memberi border
            $object->getActiveSheet()->getStyle($cells[$countAtas]."1")->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                    )
                )
            );
            // end memberi border

            // menebalkan font
            $object->getActiveSheet()->getStyle($cells[$countAtas]."1")->getFont()->setBold(true);
            // end menebalkan font

            // mengatur auto menyesuaikan lebar
            $object->getActiveSheet()->getColumnDimension($cells[$countAtas])->setAutoSize(true);
            // end auto menyesuaikan lebar
         
            // menset align center
            $object->getActiveSheet()->getStyle($cells[$countAtas]."1")->applyFromArray($styleHorizontal);
            $object->getActiveSheet()->getStyle($cells[$countAtas]."1")->applyFromArray($styleVertical);
            // end menset align center
            
            // echo "Ini Cell".$cells[$count]."1";
            
            $countAtas++;
            $column++;
        }

        
        $excel_row = 2;
        $nomor = 1;
        foreach($data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $nomor);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['tujuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['sasaran_nama']);
            
            // Text wrapping
            $object->getActiveSheet()->getStyle("B".$excel_row)->getAlignment()->setWrapText(true);
            // end text wrapping

            $excel_row++;
            $nomor++;
        }

        $columnCell = 0;
        while($columnCell <= ($column-1)){
            $dataCell = 0;
            while($dataCell <= ($excel_row-1)){
                // memberi border
                $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray(
                    array(
                        'borders' => array(
                            'allborders' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                                )
                        )
                    )
                );
                // end memberi border
                
                // menset align center
                $object->getActiveSheet()->getStyle("A".$dataCell)->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray($styleVertical);
                // end menset align center

                $dataCell++;
            }
            $columnCell++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
        $object_writer->save('php://output');

    }

}