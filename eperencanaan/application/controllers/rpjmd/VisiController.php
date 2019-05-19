<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiController extends CI_Controller {

    private $level, $akun;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('rpjmd/VisiModel');
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
        // echo $save;
		if($status || true){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }

            $post = $this->input->post();
            $post['user_id'] = $session['id'];

            if($save != ''){
                $post['all'] = true;
            }

            $data = $this->VisiModel->getAll($page, $search, $post);
            
            // $dataAll
            $jumDataAll = $this->VisiModel->getCount($search, $post);
            $jumlahDatainPage = $this->VisiModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);



		}else{
            $data = array();
            $jumlahPage = 1;
        }
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
			'data' => $data,
			'status' => $status
        );

        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf('visi', 'rpjmd/visi', $kirim);
        }else if($save == 'excel'){
            $this->exportExcel('visi', $kirim['data']);
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
            $post['user_id']= $session['id'];
            $status = $this->VisiModel->create($post);
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
        $status= false;
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
            $status = $this->VisiModel->update($post);
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
            $status = $this->VisiModel->delete($post);
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
            "Visi", 
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

        $column = 0;
        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            // memberi border
            $object->getActiveSheet()->getStyle("A".$column)->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                            )
                    )
                )
            );
            // end memberi border

            // memberi border
            $object->getActiveSheet()->getStyle("B".$column)->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                            )
                    )
                )
            );
            // end memberi border

            $column++;
        }
        // menset align center
        $object->getActiveSheet()->getStyle("B1")->applyFromArray($styleHorizontal);
        $object->getActiveSheet()->getStyle("B1")->applyFromArray($styleVertical);
        // end menset align center

        $excel_row = 2;
        $no = 1;
        foreach($data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $no);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['rpjmd_visi']);

            // memberi border
            $object->getActiveSheet()->getStyle("A".$excel_row)->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                            )
                    )
                )
            );
            // end memberi border

            // memberi border
            $object->getActiveSheet()->getStyle("B".$excel_row)->applyFromArray(
                array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                            )
                    )
                )
            );
            // end memberi border

            // Text wrapping
            $object->getActiveSheet()->getStyle("B".$excel_row)->getAlignment()->setWrapText(true);
            // end text wrapping

            // menset align center
            $object->getActiveSheet()->getStyle("A".$excel_row)->applyFromArray($styleHorizontal);
            $object->getActiveSheet()->getStyle("A".$excel_row)->applyFromArray($styleVertical);
            $object->getActiveSheet()->getStyle("B".$excel_row)->applyFromArray($styleVertical);
            // end menset align center

            $no++;
            $excel_row++;
        }

        // memberi border
        // $object->getActiveSheet()->getStyle("B2")->applyFromArray(
        //     array(
        //         'borders' => array(
        //              'allborders' => array(
        //                 'style' => PHPExcel_Style_Border::BORDER_THIN
        //                 )
        //            )
        //     )
        // );
        // end memberi border
        
        // menebalkan font
        $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $object->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        // end menebalkan font

        // mengatur auto menyesuaikan lebar
        $object->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $object->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        // end auto menyesuaikan lebar

        // memberi warna
        // $object->getActiveSheet()->getStyle('B1')->getFill()->applyFromArray(
        //     array(
        //     'type' => PHPExcel_Style_Fill::FILL_SOLID,
        //     'startcolor' => array('rgb' => '42ebf4')
        //     )
        // );
        // end memberi warna

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
        $object_writer->save('php://output');

    }

}