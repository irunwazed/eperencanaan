<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TujuanSasaranController extends CI_Controller {

    private $level, $akun;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model('rpjmd/TujuanSasaranModel');
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
            $this->load->model('rpjmd/DataModel');
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }

            $post = $this->input->post();
            $post['user_id'] = $session['id'];

            if($save != ''){
                $post['all'] = true;
            }

            $data = $this->TujuanSasaranModel->getAll($page, $search, $post);
            
            $dataAll = array();
            $no = 0;

            foreach($data as $key){
                $dataAll[$no] = $key;
                // $dataAll[$no]['opd']
                $dataAll[$no]['target1_satuan_nama'] = $this->DataModel->selectSatuan($key['target1_satuan'])[0]['Uraian'];
                $dataAll[$no]['target2_satuan_nama'] = $this->DataModel->selectSatuan($key['target2_satuan'])[0]['Uraian'];
                $dataAll[$no]['target3_satuan_nama'] = $this->DataModel->selectSatuan($key['target3_satuan'])[0]['Uraian'];
                $dataAll[$no]['target4_satuan_nama'] = $this->DataModel->selectSatuan($key['target4_satuan'])[0]['Uraian'];
                $dataAll[$no]['target5_satuan_nama'] = $this->DataModel->selectSatuan($key['target5_satuan'])[0]['Uraian'];


                $no++;
            }

            // $dataAll
            $jumDataAll = $this->TujuanSasaranModel->getCount($search, $post);
            $jumlahDatainPage = $this->TujuanSasaranModel->getJumlahInPage();
            $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
            $dataTambah =array();
            
            $dataMisi = $this->DataModel->getMisi($post);
            $dataSatuan = $this->DataModel->getSatuan();
            // $dataIsuStrategi = $this->DataModel->getIsuStrategi($post);
            

		}else{
            $data = array();
            $jumlahPage = 1;
            $dataTambah = '';
        }
        
        
		$kirim = array(
            'jumlahAll' => $jumDataAll,
            'jumlahPage' => $jumlahPage,
            'dataTambah'=>$dataTambah,
            'dataMisi' => $dataMisi,
            'dataSatuan' => $dataSatuan,
            // 'dataIsuStrategi' => $dataIsuStrategi,
			'data' => $dataAll,
			'status' => $status,
        );
        
        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf('tujuan-sasaran', 'rpjmd/tujuan-sasaran', $kirim);
        }else if($save == 'excel'){
            $this->exportExcel('tujuan-sasaran', $kirim['data']);
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
            $status = $this->TujuanSasaranModel->create($post);
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
            $status = $this->TujuanSasaranModel->update($post);
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
            $status = $this->TujuanSasaranModel->delete($post);
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
            array(
                "No",
                "Misi",
                "Isu Strategi RPJMD",
                "Tujuan RPJMD",
                "Sasaran RPJMD",
                "Indikator",
                "Kondisi Awal",
                "Tujuan",
                "",
                "",
                "",
                "",
            ),
            array(
                "",
                "",
                "",
                "",
                "",
                "",
                "",
                "Tahun 1",
                "Tahun 2",
                "Tahun 3",
                "Tahun 4",
                "Tahun 5",
            )
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
        $row = 1;
        foreach($table_columns as $field)
        {
            $column = 0;
            foreach($field as $field2){
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, $row, $field2);
                $column++;
            }
            $row++;            
        }

        
        $excel_row = $row;
        $nomor = 1;
        foreach($data as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $nomor);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['misi_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['isu_strategi_rpjmd']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['tujuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['sasaran_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['indikator_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['tujuan_sasaran_kondisi_awal']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['target1_tahun']." ".$row['target1_satuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['target2_tahun']." ".$row['target2_satuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['target3_tahun']." ".$row['target3_satuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['target4_tahun']." ".$row['target4_satuan_nama']);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['target5_tahun']." ".$row['target5_satuan_nama']);
            $excel_row++;
            $nomor++;
        }

        // memberi border Atas
        $borderArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $object->getActiveSheet()->getStyle("A1:A2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("B1:B2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("C1:C2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("D1:D2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("E1:E2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("F1:F2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("G1:G2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("H1:L1")->applyFromArray($borderArray);

        $object->getActiveSheet()->getStyle("H2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("I2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("J2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("K2")->applyFromArray($borderArray);
        $object->getActiveSheet()->getStyle("L2")->applyFromArray($borderArray);
        // end memberi border Atas

        // merge cell
        $object->getActiveSheet()->mergeCells("A1:A2");
        $object->getActiveSheet()->mergeCells("B1:B2");
        $object->getActiveSheet()->mergeCells("C1:C2");
        $object->getActiveSheet()->mergeCells("D1:D2");
        $object->getActiveSheet()->mergeCells("E1:E2");
        $object->getActiveSheet()->mergeCells("F1:F2");
        $object->getActiveSheet()->mergeCells("G1:G2");
        $object->getActiveSheet()->mergeCells("H1:L1");
        // end merge cell    

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

                // Text wrapping
                $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->getAlignment()->setWrapText(true);
                // end text wrapping

                $dataCell++;
            }

            // mengatur auto menyesuaikan lebar
            $object->getActiveSheet()->getColumnDimension($cells[$columnCell])->setAutoSize(true);
            // $object->getActiveSheet()->getColumnDimension("A")->setWidth(10);
            // end auto menyesuaikan lebar

            // menebalkan font
            $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->getFont()->setBold(true);
            $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->getFont()->setBold(true);
            // end menebalkan font

            // menset align center
            $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleHorizontal);
            $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleVertical);
            $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleHorizontal);
            $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleVertical);
            // end menset align center

            $columnCell++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
        $object_writer->save('php://output');

    }

}