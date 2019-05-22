<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrudController extends CI_Controller {

    private $level, $akun, $tahun;
	public function __construct()
    {
		parent::__construct();
        $this->load->library('MyConfig');
        $this->level = 1;
        $this->akun = 2;
        $this->tahun = date("Y");
		
    }

    public function getData($name, $page = 1, $save = ''){

        if($page <= 0) $page = 1;
        $jumDataAll = 0;
        $data = array();
        $kirim = array();
        $dataTambah = array();
        $jumlahDatainPage = 20;
        $jumlahPage = 1;
        $status = false;
        $linkSavePDF = '';
        $nameFile = '';
        $pageStatus = NULL;
        $dataType = '';

        $session = $this->myconfig->getSession($this->input->post('session'), $this->level,true,  $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        // // echo "sdf";
		if($status){
            $search = '';
            if(@$this->input->post('search')){
                $search = $this->input->post('search');
            }
            $this->load->model('opd/DataModel');
            $post = $this->input->post();
            $post['user_id'] = $session['id'];
            $post['tahun_asli'] = $this->tahun;
            $kirim['tahun_asli'] = $this->tahun;
            $kirim['tahun_rpjmd'] = $this->DataModel->getTahunRpjmd($post);
            $kirim['tahun'] = $kirim['tahun_asli']-$kirim['tahun_rpjmd']+1;
            if($save != ''){
                $post['all'] = true;
            }

            if($name == "opd_pegawai"){
                
                $this->load->model('opd/PegawaiModel');
                $data = $this->PegawaiModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->PegawaiModel->getCount($search, $post);
                $jumlahDatainPage = $this->PegawaiModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);

                $linkSavePDF = 'opd/pegawai';
                $nameFile = 'pegawai';
                
            }
            
            if($name == "opd_visi"){
                $this->load->model('opd/VisiModel');
                $data = $this->VisiModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->VisiModel->getCount($search, $post);
                $jumlahDatainPage = $this->VisiModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);

                $linkSavePDF = 'opd/visi';
                $nameFile = 'visi';
            }
            
            if($name == "opd_visi_penjelasan"){
                $this->load->model('opd/VisiPenjelasanModel');
                $data = $this->VisiPenjelasanModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->VisiPenjelasanModel->getCount($search, $post);
                $jumlahDatainPage = $this->VisiPenjelasanModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);

                $linkSavePDF = 'opd/visi-penjelasan';
                $nameFile = 'visi-penjelasan';
            }

            if($name == "opd_misi"){
                $this->load->model('opd/MisiModel');
                $data = $this->MisiModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->MisiModel->getCount($search, $post);
                $jumlahDatainPage = $this->MisiModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);

                $linkSavePDF = 'opd/misi';
                $nameFile = 'misi';
            }

            if($name == "opd_tujuan"){
                $this->load->model('opd/TujuanModel');
                $data = $this->TujuanModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->TujuanModel->getCount($search, $post);
                $jumlahDatainPage = $this->TujuanModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                
                
                $dataTambah = $this->DataModel->getMisi($post);

                $linkSavePDF = 'opd/tujuan';
                $nameFile = 'tujuan';
            }

            if($name == "opd_sasaran"){
                $this->load->model('opd/SasaranModel');
                $data = $this->SasaranModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->SasaranModel->getCount($search, $post);
                $jumlahDatainPage = $this->SasaranModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                
                $dataTambah = $this->DataModel->getTujuan($post);

                $linkSavePDF = 'opd/sasaran';
                $nameFile = 'sasaran';
            }

            if($name == "opd_indikator"){
                $this->load->model('opd/IndikatorModel');
                $data = $this->IndikatorModel->getAll($page, $search, $post);
            
                // $dataAll
                $jumDataAll = $this->IndikatorModel->getCount($search, $post);
                $jumlahDatainPage = $this->IndikatorModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                
                $dataTambah = $this->DataModel->getSasaran($post);

                $linkSavePDF = 'opd/indikator';
                $nameFile = 'indikator';
            }

            if($name == "opd_pagu"){
                $this->load->model('bappeda/OpdPaguModel');
                $data = $this->OpdPaguModel->getAll($page, $search, $post);
                // // print_r($post);
                // // $dataAll
                $jumDataAll = $this->OpdPaguModel->getCount($search, $post);
                $jumlahDatainPage = $this->OpdPaguModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                // getAllOpd
                $kirim['dataAllOpd'] = $this->DataModel->getAllOpd($post);
            }
            
            if($name == "opd_renstra_kab" || $name == "opd_renstra_opd"){
                $this->load->model('opd/RenstraKabModel');
                $data = $this->RenstraKabModel->getAll($page, $search, $post);
            
                // $dataAll
                // $jumDataAll = $this->RenstraKabModel->getCount($search, $post);
                // $jumlahDatainPage = $this->RenstraKabModel->getJumlahInPage();
                // $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                
                if($name == "opd_renstra_opd"){
                    $post['name'] = 'opd';
                    $linkSavePDF = 'opd/renstra-opd';
                    $nameFile = 'renstra-opd';
                }else if($name == "opd_renstra_kab"){
                    $linkSavePDF = 'opd/renstra-kab';
                    $nameFile = 'renstra-kab';
                }
                

                $dataTambah = $this->DataModel->getSasaran($post);

                $data = $this->RenstraKabModel->getAll($page, $search, $post);

                $dataAll = array();
                $no = 0;
                $urusan = 0;
                $bidang = 0;
                $program = 0;
                foreach($data as $key){
                    
                    if($key['Kd_Prog'] != $program){
                        $program = $key['Kd_Prog'];
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Keg'] = '';
                        $dataAll[$no]['Ket_Kegiatan'] = '';
                        $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Ket_Program'];
                        $no++;
                    }
                    $dataAll[$no] = $key;
                    $dataAll[$no]['idAll'] = $no+1;
                    $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Ket_Kegiatan'];
                    // $dataAll[$no] = $key;
                    // $dataAll[$no]['opd']
                    $dataAll[$no]['target1_satuan_nama'] = $this->DataModel->selectSatuan($key['target1_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target2_satuan_nama'] = $this->DataModel->selectSatuan($key['target2_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target3_satuan_nama'] = $this->DataModel->selectSatuan($key['target3_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target4_satuan_nama'] = $this->DataModel->selectSatuan($key['target4_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target5_satuan_nama'] = $this->DataModel->selectSatuan($key['target5_satuan'])[0]['Uraian'];

                    if(@$key['Kd_Sub'] && @$key['Kd_Unit']){
                        $nm  = $this->DataModel->selectOpd($key['Kd_Urusan'], $key['Kd_Bidang'], $key['Kd_Sub'], $key['Kd_Unit']);
                        
                        $dataAll[$no]['Nm_Sub_Unit'] = @$nm[0]['Nm_Sub_Unit'];
                        $nm  = $this->DataModel->selectKegiatan($key['Kd_Urusan'], $key['Kd_Bidang'], $key['Kd_Prog'], $key['Kd_Keg']);
                        
                        $dataAll[$no]['Ket_Kegiatan'] = @$nm[0]['Ket_Kegiatan'];
                    }
                    $no++;
                }
                
                // $dataAll
                $jumDataAll = $this->RenstraKabModel->getCount($search, $post);
                $jumlahDatainPage = $this->RenstraKabModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                $dataTambah =array();
                $data = $dataAll;
            }

            if($name == "opd_rkpd_awal"){
                $this->load->model('opd/RkpdAwalModel');
                $data = $this->RkpdAwalModel->getAll($page, $search, $post);
                $dataAll = array();
                $no = 0;
                $urusan = 0;
                $bidang = 0;
                $program = 0;
                $tahun = $this->tahun;
                
                $linkSavePDF = 'opd/rkpd-awal';
                $nameFile = 'RKPD';
                $dataType = 'rkpd-awal';

                if(@$data[0]['rpjmd_tahun']){
                    $tahun = $tahun-$data[0]['rpjmd_tahun']+1;
                }else{
                    $tahun=0;
                }
                foreach($data as $key){
                    if($key['Kd_Urusan'] != $urusan){
                        $urusan = $key['Kd_Urusan'];
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Bidang'] = 0;
                        $dataAll[$no]['Kd_Prog'] = 0;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['nama_jenis'] = $dataAll[$no]['Nm_Urusan'];
                        $no++;
                    }
                    if($key['Kd_Bidang'] != $bidang){
                        $bidang = $key['Kd_Bidang'];
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Prog'] = 0;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['nama_jenis'] = $dataAll[$no]['Nm_Bidang'];
                        $no++;
                    }
                    if($key['Kd_Prog'] != $program){
                        $program = $key['Kd_Prog'];
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['nama_jenis'] = $dataAll[$no]['Ket_Program'];
                        $no++;
                    }
                    $dataAll[$no] = $key;
                    $dataAll[$no]['idAll'] = $no+1;
                    $dataAll[$no]['nama_jenis'] = $dataAll[$no]['Ket_Kegiatan'];
                    // $dataAll[$no]['opd']
                    $dataAll[$no]['target1_satuan_nama'] = $this->DataModel->selectSatuan($key['target1_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target2_satuan_nama'] = $this->DataModel->selectSatuan($key['target2_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target3_satuan_nama'] = $this->DataModel->selectSatuan($key['target3_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target4_satuan_nama'] = $this->DataModel->selectSatuan($key['target4_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target5_satuan_nama'] = $this->DataModel->selectSatuan($key['target5_satuan'])[0]['Uraian'];
                    $no++;
                }
                $jumDataAll = $this->RkpdAwalModel->getCount($search, $post);
                $jumlahDatainPage = $this->RkpdAwalModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                $dataTambah =array('tahun' => $tahun);
                $data = $dataAll;
            }
            
            if($name == "opd_rkpd_verifikasi" || $name == "opd_renja_awal" || $name == "opd_rkpd_perubahan" || $name == "opd_renja_perubahan" || $name == "opd_rkpd_final"){
                $this->load->model('opd/RkpdVerifikasiModel');
                if($name == "opd_renja_awal"){
                    $post['name'] = 'opd';
                }
                if($name == "opd_rkpd_perubahan" || $name == "opd_renja_perubahan"){
                    $post['jenis'] = 'rkpd_perubahan';
                }
                
                $nameFile = 'RKPD';

                if($name == "opd_rkpd_final"){
                    $dataType = 'rkpd-final';
                    $linkSavePDF = 'opd/rkpd-final';
                }else if($name == "opd_rkpd_verifikasi"){
                    $dataType = 'rkpd-verifikasi';
                    $linkSavePDF = 'opd/rkpd-verifikasi';
                }
                
                $data = $this->RkpdVerifikasiModel->getAll($page, $search, $post);
                $dataAll = array();
                $no = 0;
                $urusan = 0;
                $bidang = 0;
                $program = 0;
                $tahun = $this->tahun;
                
                if(@$data[0]['rpjmd_tahun']){
                    $tahun = $tahun-$data[0]['rpjmd_tahun']+1;
                }else{
                    $tahun=0;
                }
                foreach($data as $key){
                    if($key['Kd_Urusan'] != $urusan){
                        $urusan = $key['Kd_Urusan'];
                        $bidang = 0;
                        $program = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Bidang'] = 0;
                        $dataAll[$no]['Kd_Prog'] = 0;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['Nm_Bidang'] = '';
                        $dataAll[$no]['Ket_Program'] = '';
                        $dataAll[$no]['Ket_Kegiatan'] = '';
                        $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Nm_Urusan'];
                        $no++;
                    }
                    if($key['Kd_Bidang'] != $bidang){
                        $bidang = $key['Kd_Bidang'];
                        $program = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Prog'] = 0;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['Ket_Program'] = '';
                        $dataAll[$no]['Ket_Kegiatan'] = '';
                        $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Nm_Bidang'];
                        $no++;
                    }
                    if($key['Kd_Prog'] != $program){
                        $program = $key['Kd_Prog'];
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Keg'] = 0;
                        $dataAll[$no]['Ket_Kegiatan'] = '';
                        $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Ket_Program'];
                        $no++;
                    }
                    $dataAll[$no] = $key;
                    $dataAll[$no]['idAll'] = $no+1;
                    $dataAll[$no]['nama_jenis'] = @$dataAll[$no]['Ket_Kegiatan'];
                    // $dataAll[$no]['opd']
                    $dataAll[$no]['target1_satuan_nama'] = @$this->DataModel->selectSatuan($key['target1_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target2_satuan_nama'] = @$this->DataModel->selectSatuan($key['target2_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target3_satuan_nama'] = @$this->DataModel->selectSatuan($key['target3_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target4_satuan_nama'] = @$this->DataModel->selectSatuan($key['target4_satuan'])[0]['Uraian'];
                    $dataAll[$no]['target5_satuan_nama'] = @$this->DataModel->selectSatuan($key['target5_satuan'])[0]['Uraian'];
                    
                    if(@$key['Kd_Sub'] && @$key['Kd_Unit']){
                        $nm  = $this->DataModel->selectOpd($key['Kd_Urusan'], $key['Kd_Bidang'], $key['Kd_Sub'], $key['Kd_Unit']);
                        
                        $dataAll[$no]['Nm_Sub_Unit'] = @$nm[0]['Nm_Sub_Unit'];
                        // $nm  = $this->DataModel->selectKegiatan($key['Kd_Urusan'], $key['Kd_Bidang'], $key['Kd_Prog'], $key['Kd_Keg']);
                        
                        // $dataAll[$no]['Ket_Kegiatan'] = @$nm[0]['Ket_Kegiatan'];
                        
                    }
                    
                    $no++;
                }
                $jumDataAll = $this->RkpdVerifikasiModel->getCount($search, $post);
                $jumlahDatainPage = $this->RkpdVerifikasiModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                $dataTambah =array('tahun' => $tahun);
                $data = $dataAll;
                $kirim['dataUrusan'] = $this->DataModel->getUrusan();
                $kirim['dataSatuan'] = $this->DataModel->getSatuan();
            }

            if($name == "opd_pra_rka" || $name == "opd_pra_rka_perubahan"){
                $this->load->model('opd/PraRkaModel');
                if($name == "opd_renja_awal"){
                    $post['name'] = 'opd';
                    // $kirim['opd'] = true; 
                }
                if($name == "opd_pra_rka_perubahan"){
                    $post['jenis'] = 'perubahan';
                }
                // print_r($post);
                $linkSavePDF = 'opd/rka-pra';
                $nameFile = 'rka';
                $pageStatus = 'miring';
                
                $data = $this->PraRkaModel->getAll($page, $search, $post);
                $dataAll = array();
                $no = 0;
                $Kd_Rek_1 = 0;
                $Kd_Rek_2 = 0;
                $Kd_Rek_3 = 0;
                $Kd_Rek_4 = 0;
                $Kd_Rek_5 = 0;
                $tahun = $this->tahun;
                
                if(@$data[0]['rpjmd_tahun']){
                    $tahun = $tahun-$data[0]['rpjmd_tahun']+1;
                    
                    $kirim['dataOneOpd'] = @$this->DataModel->selectOneOpd($data[0]['Kd_Urusan'], $data[0]['Kd_Bidang'], $data[0]['Kd_Unit'], $data[0]['Kd_Sub']);
                    $kirim['dataOneKegiatan'] = @$this->DataModel->selectOneKegiatan($data[0]['Kd_Urusan'], $data[0]['Kd_Bidang'], $data[0]['Kd_Prog'], $data[0]['Kd_Keg']);
                    // $kirim['data'][]
                }else{
                    $tahun=0;
                }
                $totalIndex = 0;
                $total4Index = 0;
                $total5Index = 0;
                $kirim['dataTotal'] = 0;

                foreach($data as $key){
                    if($key['Kd_Rek_1'] != $Kd_Rek_1){
                        $Kd_Rek_1 = $key['Kd_Rek_1'];
                        $Kd_Rek_2 = 0;
                        $Kd_Rek_3 = 0;
                        $Kd_Rek_4 = 0;
                        $Kd_Rek_5 = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Rek_2'] = '';
                        $dataAll[$no]['Kd_Rek_3'] = '';
                        $dataAll[$no]['Kd_Rek_4'] = '';
                        $dataAll[$no]['Kd_Rek_5'] = '';
                        $dataAll[$no]['nama_belanja'] = $key['Nm_Rek_1'];
                        $no++;
                    }
                    if($key['Kd_Rek_2'] != $Kd_Rek_2){
                        $Kd_Rek_2 = $key['Kd_Rek_2'];
                        $Kd_Rek_3 = 0;
                        $Kd_Rek_4 = 0;
                        $Kd_Rek_5 = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Rek_3'] = '';
                        $dataAll[$no]['Kd_Rek_4'] = '';
                        $dataAll[$no]['Kd_Rek_5'] = '';
                        $dataAll[$no]['nama_belanja'] = $key['Nm_Rek_2'];
                        $no++;
                    }
                    if($key['Kd_Rek_3'] != $Kd_Rek_3){
                        $Kd_Rek_3 = $key['Kd_Rek_3'];
                        $Kd_Rek_4 = 0;
                        $Kd_Rek_5 = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $totalIndex = $no;
                        $dataAll[$totalIndex]['total'] = 0;
                        $dataAll[$no]['Kd_Rek_4'] = '';
                        $dataAll[$no]['Kd_Rek_5'] = '';
                        $dataAll[$no]['nama_belanja'] = $key['Nm_Rek_3'];
                        $no++;
                    }
                    if($key['Kd_Rek_4'] != $Kd_Rek_4){
                        $Kd_Rek_4 = $key['Kd_Rek_4'];
                        $Kd_Rek_5 = 0;
                        $total4Index = $no;
                        $dataAll[$total4Index]['total'] = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['Kd_Rek_5'] = '';
                        $dataAll[$no]['nama_belanja'] = $key['Nm_Rek_4'];
                        $no++;
                    }
                    if($key['Kd_Rek_5'] != $Kd_Rek_5){
                        $Kd_Rek_5 = $key['Kd_Rek_5'];
                        $total5Index = $no;
                        $dataAll[$total5Index]['total'] = 0;
                        $dataAll[$no] = $key;
                        $dataAll[$no]['idAll'] = $no+1;
                        $dataAll[$no]['nama_belanja'] = $key['Nm_Rek_5'];
                        $no++;
                    }
                    $dataAll[$no] = $key;
                    $dataAll[$no]['idAll'] = $no+1;
                    $dataAll[$no]['Kd_Rek_1'] = '';
                    $dataAll[$no]['Kd_Rek_2'] = '';
                    $dataAll[$no]['Kd_Rek_3'] = '';
                    // $dataAll[$no]['Kd_Rek_4'] = '';
                    // $dataAll[$no]['Kd_Rek_5'] = '';
                    @$dataAll[$totalIndex]['total'] += $dataAll[$no]['harga']*$dataAll[$no]['volume'];
                    @$dataAll[$total4Index]['total'] += $dataAll[$no]['harga']*$dataAll[$no]['volume'];
                    @$dataAll[$total5Index]['total'] += $dataAll[$no]['harga']*$dataAll[$no]['volume'];
                    $dataAll[$no]['satuan_nama'] = @$this->DataModel->selectSatuan($key['satuan'])[0]['Uraian'];
                    
                    $no++;
                }
                $jumDataAll = $this->PraRkaModel->getCount($search, $post);
                $jumlahDatainPage = $this->PraRkaModel->getJumlahInPage();
                $jumlahPage = ceil($jumDataAll/$jumlahDatainPage);
                $dataTambah =array('tahun' => $tahun);
                $data = $dataAll;
                $kirim['dataUrusan'] = $this->DataModel->getUrusan();
                $kirim['dataRek4'] = $this->DataModel->getRekening4(5, 2, 2);
                $kirim['dataSatuan'] = $this->DataModel->getSatuan();
            }
            
            $dataOpd = @$this->DataModel->getDataOpd($post['user_id'])[0];
            $kirim['dataOpd'] = $dataOpd;

            if($kirim['dataOpd'] != null || $kirim['dataOpd'] != 0 || $kirim['dataOpd'] != ''){
                $kirim['opd'] = true;
            }
        }
        
        $kirim['jumlahAll'] = $jumDataAll;
        $kirim['jumlahPage'] = $jumlahPage;
        $kirim['data'] = $data;
        $kirim['dataTambah'] = $dataTambah;
        
        $kirim['status'] = $status;
        
        if($save == 'pdf'){
            $this->load->library('M_pdf');
            $this->m_pdf->getPdf($nameFile, $linkSavePDF, $kirim, $pageStatus);
        }else if($save == 'excel'){
            if($kirim['data'])
            
            $this->exportExcel($dataType, $nameFile, $kirim['data'], $kirim);
        }else{
            echo json_encode($kirim);
        }
    }
    
    public function create($name){
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
            
            
            if($name == "opd_pegawai"){
                $this->load->model('opd/PegawaiModel');
                $status = $this->PegawaiModel->create($post);
            }

            if($name == "opd_visi"){
                $this->load->model('opd/VisiModel');
                $status = $this->VisiModel->create($post);
            }

            if($name == "opd_visi_penjelasan"){
                $this->load->model('opd/VisiPenjelasanModel');
                $status = $this->VisiPenjelasanModel->create($post);
            }
            

            if($name == "opd_misi"){
                $this->load->model('opd/MisiModel');
                $status = $this->MisiModel->create($post);
            }

            if($name == "opd_tujuan"){
                $this->load->model('opd/TujuanModel');
                $status = $this->TujuanModel->create($post);
            }

            if($name == "opd_sasaran"){
                $this->load->model('opd/SasaranModel');
                $status = $this->SasaranModel->create($post);
            }

            if($name == "opd_indikator"){
                $this->load->model('opd/IndikatorModel');
                $status = $this->IndikatorModel->create($post);
            }

            if($name == "opd_pagu"){
                $this->load->model('bappeda/OpdPaguModel');
                $status = $this->OpdPaguModel->create($post);
            }

            if($name == "opd_renstra_kab" || $name == "opd_renstra_opd"){
                if($name == "opd_renstra_opd"){
                    $post['name'] = 'opd';
                }
                $this->load->model('opd/RenstraKabModel');
                $status = $this->RenstraKabModel->create($post);
            }

            if($name == "opd_rkpd_verifikasi"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->create($post);
            }
            
            if($name == "opd_pra_rka"){
                $this->load->model('opd/PraRkaModel');
                $status = $this->PraRkaModel->create($post);
            }
            
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

    public function update($name){
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
            if($name == "opd_pegawai"){
                $this->load->model('opd/PegawaiModel');
                $status = $this->PegawaiModel->update($post);
            }

            if($name == "opd_visi"){
                $this->load->model('opd/VisiModel');
                $status = $this->VisiModel->update($post);
            }

            if($name == "opd_visi_penjelasan"){
                $this->load->model('opd/VisiPenjelasanModel');
                $status = $this->VisiPenjelasanModel->update($post);
            }

            if($name == "opd_misi"){
                $this->load->model('opd/MisiModel');
                $status = $this->MisiModel->update($post);
            }

            if($name == "opd_tujuan"){
                $this->load->model('opd/TujuanModel');
                $status = $this->TujuanModel->update($post);
            }

            if($name == "opd_sasaran"){
                $this->load->model('opd/SasaranModel');
                $status = $this->SasaranModel->update($post);
            }

            if($name == "opd_indikator"){
                $this->load->model('opd/IndikatorModel');
                $status = $this->IndikatorModel->update($post);
            }

            if($name == "opd_pagu"){
                $this->load->model('bappeda/OpdPaguModel');
                $status = $this->OpdPaguModel->update($post);
            }

            if($name == "opd_renstra_kab" || $name == "opd_renstra_opd"){
                if($name == "opd_renstra_opd"){
                    $post['name'] = 'opd';
                }
                $this->load->model('opd/RenstraKabModel');
                $status = $this->RenstraKabModel->update($post);
            }

            if($name == "opd_rkpd_awal"){
                $this->load->model('opd/RkpdAwalModel');
                $status = $this->RkpdAwalModel->update($post);
            }

            if($name == "opd_rkpd_verifikasi"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->update($post);
            }

            if($name == "opd_pra_rka"){
                $this->load->model('opd/PraRkaModel');
                $status = $this->PraRkaModel->update($post);
                $this->PraRkaModel->setJumlahAll($post);
            }
            
            if($status)
                $pesan = "Berhasil Mengubah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function delete($name){
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

            if($name == "opd_pegawai"){
                $this->load->model('opd/PegawaiModel');
                $status = $this->PegawaiModel->delete($post);
            }

            if($name == "opd_visi_penjelasan"){
                $this->load->model('opd/VisiPenjelasanModel');
                $status = $this->VisiPenjelasanModel->delete($post);
            }

            if($name == "opd_misi"){
                $this->load->model('opd/MisiModel');
                $status = $this->MisiModel->delete($post);
            }
            if($name == "opd_tujuan"){
                $this->load->model('opd/TujuanModel');
                $status = $this->TujuanModel->delete($post);
            }

            if($name == "opd_sasaran"){
                $this->load->model('opd/SasaranModel');
                $status = $this->SasaranModel->delete($post);
            }

            if($name == "opd_indikator"){
                $this->load->model('opd/IndikatorModel');
                $status = $this->IndikatorModel->delete($post);
            }

            if($name == "opd_pagu"){
                $this->load->model('bappeda/OpdPaguModel');
                $status = $this->OpdPaguModel->delete($post);
            }

            if($name == "opd_renstra_kab" || $name == "opd_renstra_opd"){
                if($name == "opd_renstra_opd"){
                    $post['name'] = 'opd';
                }
                $this->load->model('opd/RenstraKabModel');
                $status = $this->RenstraKabModel->delete($post);
            }

            if($name == "opd_rkpd_verifikasi"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->delete($post);
            }

            if($name == "opd_pra_rka"){
                
                $this->load->model('opd/PraRkaModel');
                $status = $this->PraRkaModel->delete($post);
            }
            
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);

    }

    public function other($name){
        $status = false;
        $session = $this->myconfig->getSession($this->input->post('session'), $this->level, $this->akun);
        if(@$session['status']){
            $status = $session['status'];
        }
        $pesan = "Gagal Memproses data";
        if($status){
            $post = $this->input->post();
            $post['user_id'] = $session['id'];

            if($name == "opd_renja_awal"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->kirim($post);
                if($status)
                    $pesan = "Berhasil Mengirim Data";
            }

            if($name == "opd_renja_perubahan"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->kirim($post, 'ta_rkpd_perubahan');
                if($status)
                    $pesan = "Berhasil Mengirim Data";
            }
            
            if($name == "opd_pra_rka"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->kirimFromBappeda($post);
                if($status)
                    $pesan = "Berhasil Mengirim Data";
            }

            if($name == "opd_pra_rka_perubahan"){
                $this->load->model('opd/RkpdVerifikasiModel');
                $status = $this->RkpdVerifikasiModel->kirimFromBappeda($post, 'ta_rkpd_perubahan');
                if($status)
                    $pesan = "Berhasil Mengirim Data";
            }
        }

        $kirim = array(
            'pesan' => $pesan,
			'status' => $status
		);
		echo json_encode($kirim);
    }

    function exportExcel($dataType = '', $name='data', $data, $dataAll = [])
    {
        $this->load->library("excel");

        $fileName = $name."-".time();

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        if($name == 'visi'){
            $table_columns = array(
                "Nomor",
                "Visi", 
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_visi_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'visi-penjelasan'){
            $table_columns = array(
                "Nomor",
                "Visi Penjelasan", 
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_visi_penjelasan_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'misi'){
            $table_columns = array(
                "Nomor",
                "Visi",
                "Misi", 
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_visi_nama']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['opd_misi_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'tujuan'){
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_misi_nama']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['opd_tujuan_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'sasaran'){
            $table_columns = array(
                "Nomor",
                "Tujuan",
                "Sasaran", 
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_tujuan_nama']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['opd_sasaran_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'indikator'){
            $table_columns = array(
                "Nomor",
                "Sasaran",
                "Indikator", 
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_sasaran_nama']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['opd_indikator_nama']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'pegawai'){
            $table_columns = array(
                "Nomor",
                "Nama",
                "Jenis Kelamin",
                "NIP",
                "Golongan",
                "Pangkat",
                "Jabatan",
                "Pendidikan",
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
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['opd_pegawai_nama']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['opd_pegawai_jk']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['opd_pegawai_nip']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['opd_pegawai_golongan']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['opd_pegawai_pangkat']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['opd_pegawai_jabatan']);
                $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['opd_pegawai_pendidikan']);
                $excel_row++;
                $nomor++;
            }
        }else if($name == 'renstra-opd'){
            $this->load->library("excel");

            $fileName = $name."-".time();
    
            $object = new PHPExcel();
    
            $object->setActiveSheetIndex(0);
            
            $tahun_rpjmd = $dataAll['tahun_rpjmd'];
            $table_columns = array(
                array(
                    "Tujuan",
                    "Sasaran",
                    "Indikator",
                    "Kode",
                    "Program",
                    "Kegiatan",
                    "Indikator Kinerka (Outcome)",
                    "",
                    "Kondisi Kinerja pada Awal RPJMD (Tahun 0)",
                    "Capaian Kerja",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "Lokasi",
                    "Penanggungjawab",
                ),
                array(
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "Program",
                    "Kegiatan",
                    "",
                    "".$tahun_rpjmd."",
                    "",
                    "".($tahun_rpjmd+1)."",
                    "",
                    "".($tahun_rpjmd+2)."",
                    "",
                    "".($tahun_rpjmd+3)."",
                    "",
                    "".($tahun_rpjmd+4)."",
                    "",
                    "Kondisi Kinerja Akhir Periode",
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
                    "",
                    "",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "",
                    "",
                )
    
            );
    
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
                
                if($row['Kd_Keg'] == null || $row['Kd_Keg'] == ''){
                    
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['tujuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['sasaran_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['indikator_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Urusan']." ".$row['Kd_Bidang']." ".$row['Kd_Prog']." ".$row['Kd_Keg']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Ket_Program']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Ket_Kegiatan']);

                }else{
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['tujuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['sasaran_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['indikator_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Urusan']." ".$row['Kd_Bidang']." ".$row['Kd_Prog']." ".$row['Kd_Keg']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Ket_Program']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Ket_Kegiatan']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['outcome']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['outcome_kegiatan']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['kondisi_awal']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['target1_tahun']." ".$row['target1_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['target1_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['target2_tahun']." ".$row['target2_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['target2_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['target3_tahun']." ".$row['target3_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['target3_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['target4_tahun']." ".$row['target4_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['target4_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['target5_tahun']." ".$row['target5_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['target5_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['akhir_target']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, ($row['target1_harga']+$row['target2_harga']+$row['target3_harga']+$row['target4_harga']+$row['target5_harga']));
                    $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row['lokasi']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row['Nm_Sub_Unit']);
                }
                $excel_row++;
            }
        }else if($name == 'RKPD'){
            $this->load->library("excel");

            $fileName = $name."-".time();
    
            $object = new PHPExcel();
    
            $object->setActiveSheetIndex(0);
    
            $table_columns = '';

            if($dataType == 'rkpd-awal'){
                $table_columns = array(
                    array(
                        "Kode",
                        "",
                        "",
                        "",
                        "Urusan / Bidang / Program / Kegiatan",
                        "Indikator Kinerka (Outcome)",
                        "",
                        "Tahun",
                        "",
                        "",
                        "",
                        "",
                        "Catatan Penting",
                        "Tahun",
                        "",
                        "",
                    ),
                    array(
                        "",
                        "",
                        "",
                        "",
                        "",
                        "Program",
                        "Kegiatan",
                        "Lokasi",
                        "Target Capaian Kerja",
                        "",
                        "Kebutuhan Dana/ pagu indikatif (Rp)",
                        "Sumber Dana",
                        "",
                        "Target Capaian Kerja",
                        "",
                        "Kebutuhan Dana/ pagu indikatif (Rp)",
                    )
        
                );


            }else{
                $table_columns = array(
                    array(
                        "Kode",
                        "",
                        "",
                        "",
                        "Urusan / Bidang / Program / Kegiatan",
                        "",
                        "",
                        "",
                        "Indikator Kinerka (Outcome)",
                        "",
                        "Tahun",
                        "",
                        "",
                        "",
                        "",
                        "Catatan Penting",
                        "Tahun",
                        "",
                        "",
                        "OPD",
                    ),
                    array(
                        "",
                        "",
                        "",
                        "",
                        "",
                        "",
                        "",
                        "",
                        "Program",
                        "Kegiatan",
                        "Lokasi",
                        "Target capaian kinerja",
                        "",
                        "Kebutuhan Dana/ pagu indikatif (Rp)",
                        "Sumber Dana",
                        "",
                        "Target capaian kinerja",
                        "",
                        "Kebutuhan Dana/ pagu indikatif (Rp)",
                    )
        
                );
            }
            
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
        // print_r($data);
            $tahun = 1+$this->tahun-@$data[0]['rpjmd_tahun'];

            if($dataType == 'rkpd-final' || $dataType == 'rkpd-verifikasi'){
                foreach($data as $row)
                {
                    if($row['Kd_Keg'] == null || $row['Kd_Keg'] == ''){
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Kd_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['Kd_Prog']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Keg']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Nm_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Nm_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['Ket_Program']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['Ket_Kegiatan']);
                    }else{
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Kd_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['Kd_Prog']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Keg']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Nm_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Nm_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['Ket_Program']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['Ket_Kegiatan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['outcome']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['outcome_kegiatan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['kondisi_awal']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['target'.$tahun.'_tahun']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['target'.$tahun.'_satuan_nama']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['target'.$tahun.'_harga']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['target'.$tahun.'_sumber_dana']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['target'.$tahun.'_catatan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['target'.($tahun+1).'_tahun']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['target'.($tahun+1).'_satuan_nama']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['target'.($tahun+1).'_harga']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['Nm_Sub_Unit']);
                    }
                    $excel_row++;
                }

                // memberi border Atas
                $borderArray = array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                    )
                );

                $object->getActiveSheet()->getStyle("A1:D2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("E1:H2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("I1:J1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("K1:O1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("P1:P2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("Q1:S1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("T1:T2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("L2:M2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("Q2:R2")->applyFromArray($borderArray);

                $object->getActiveSheet()->getStyle("I2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("J2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("K2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("N2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("O2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("S2")->applyFromArray($borderArray);
                // end memberi border Atas

                // merge cell
                $object->getActiveSheet()->mergeCells("A1:D2");
                $object->getActiveSheet()->mergeCells("E1:H2");
                $object->getActiveSheet()->mergeCells("I1:J1");
                $object->getActiveSheet()->mergeCells("K1:O1");
                $object->getActiveSheet()->mergeCells("P1:P2");
                $object->getActiveSheet()->mergeCells("Q1:S1");
                $object->getActiveSheet()->mergeCells("T1:T2");
                $object->getActiveSheet()->mergeCells("L2:M2");
                $object->getActiveSheet()->mergeCells("Q2:R2");
                // end merge cell    

                $columnCell = 0;
                while($columnCell <= $column){
                    $dataCell = 0;
                    while($dataCell <= $excel_row){
                        // memberi border bawah
                        $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray(
                        array(
                            'borders' => array(
                                'allborders' => array(
                                    'style' => PHPExcel_Style_Border::BORDER_THIN
                                    )
                            )
                        )
                        );
                        // end memberi border bawah

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
            }else if($dataType == 'rkpd-awal'){
                foreach($data as $row)
                {
                    if($row['Kd_Keg'] == null || $row['Kd_Keg'] == '' || $row['Kd_Keg'] == 0){
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Kd_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['Kd_Prog']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Keg']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nama_jenis']);
                    }else{
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Urusan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['Kd_Bidang']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['Kd_Prog']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Keg']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['nama_jenis']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['outcome']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['outcome_kegiatan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['lokasi']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['target'.$tahun.'_tahun']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['target'.$tahun.'_satuan_nama']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['target'.$tahun.'_harga']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['target'.$tahun.'_sumber_dana']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['target'.$tahun.'_catatan']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['target'.($tahun+1).'_tahun']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['target'.($tahun+1).'_satuan_nama']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['target'.($tahun+1).'_harga']);
                    }
                    $excel_row++;
                }

                // memberi border Atas
                $borderArray = array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                    )
                );

                $object->getActiveSheet()->getStyle("A1:D2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("E1:E2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("F1:G1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("H1:L1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("M1:M2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("N1:P1")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("I2:J2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("N2:O2")->applyFromArray($borderArray);

                $object->getActiveSheet()->getStyle("F2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("G2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("K2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("L2")->applyFromArray($borderArray);
                $object->getActiveSheet()->getStyle("P2")->applyFromArray($borderArray);
                // end memberi border Atas

                // merge cell
                $object->getActiveSheet()->mergeCells("A1:D2");
                $object->getActiveSheet()->mergeCells("E1:E2");
                $object->getActiveSheet()->mergeCells("F1:G1");
                $object->getActiveSheet()->mergeCells("H1:L1");
                $object->getActiveSheet()->mergeCells("M1:M2");
                $object->getActiveSheet()->mergeCells("N1:P1");
                $object->getActiveSheet()->mergeCells("I2:J2");
                $object->getActiveSheet()->mergeCells("N2:O2");
                // end merge cell    

                $columnCell = 0;
                while($columnCell <= ($column-1)){
                    $dataCell = 0;
                    while($dataCell <= ($excel_row-1)){
                        // memberi border bawah
                        $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray(
                        array(
                            'borders' => array(
                                'allborders' => array(
                                    'style' => PHPExcel_Style_Border::BORDER_THIN
                                    )
                            )
                        )
                        );
                        // end memberi border bawah

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
            }

            
           
        }else if($name == 'rka'){
            $this->load->library("excel");

            $fileName = $name."-".time();
    
            $object = new PHPExcel();
    
            $object->setActiveSheetIndex(0);

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
    
            $table_columns = array(
               
                array(
                    "RENCANA KERJA DAN ANGGARAN",
                    "",
                    "",
                    "PRA",
                ),
                array(
                    "SATUAN KERJA PERANGKAT DAERAH",
                    "",
                    "",
                    "RKA - OPD",
                ),
                array(
                    "KABUPATEN MOROWALI",
                    "",
                    "",
                    "2.2.1",
                )
    
            );
    
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
            // print_r(@$dataAll);
            extract($dataAll);
            $excel_row = $row;
            $nomor = 1;
            $countRow = 0;
            // echo "<pre>";
            // print_r(@$dataAll['tahun']);
            // echo "</pre>";
            $tahun = 1+$this->tahun-@$data[0]['rpjmd_tahun'];
            $namaTahunLalu = "tahun".($tahun-1)."_sebelum";
            $namaTahun = "tahun".($tahun)."_sebelum";
            $namaTahunDepan = "tahun".($tahun+1)."_sebelum";
            
            while($countRow <= 9)
            {
                if($countRow == 0){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Urusan Pemerintahan");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneOpd->Kd_Urusan);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneOpd->Nm_Urusan);
                }else if($countRow == 1){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Organisasi");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneOpd->Kd_Urusan.".".@$dataOneOpd->Kd_Bidang);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneOpd->Nm_Bidang);
                }else if($countRow == 2){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Unit Organisasi");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneOpd->Kd_Urusan.".".@$dataOneOpd->Kd_Bidang.".".@$dataOneOpd->Kd_Unit);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneOpd->Nm_Unit);
                }else if($countRow == 3){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Sub Unit Organisasi");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneOpd->Kd_Urusan.".".@$dataOneOpd->Kd_Bidang.".".@$dataOneOpd->Kd_Unit.".".@$dataOneOpd->Kd_Sub);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneOpd->Nm_Sub_Unit);
                }else if($countRow == 4){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Program");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneKegiatan->Kd_Urusan.".".@$dataOneKegiatan->Kd_Bidang.".".@$dataOneKegiatan->Kd_Prog);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneKegiatan->Ket_Program);
                }else if($countRow == 5){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Kegiatan");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, @$dataOneKegiatan->Kd_Urusan.".".@$dataOneKegiatan->Kd_Bidang.".".@$dataOneKegiatan->Kd_Prog.".".@$dataOneKegiatan->Kd_Keg);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, @$dataOneKegiatan->Ket_Kegiatan);
                }else if($countRow == 6){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Lokasi Kegiatan");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Tersebar");
                }else if($countRow == 7){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Jumlah Tahun n - 1");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Rp.".@$dataOneOpd->$namaTahunLalu."");
                    
                }else if($countRow == 8){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Jumlah Tahun n");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Rp.".@$dataOneOpd->$namaTahun."");
                }else if($countRow == 9){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Jumlah Tahun n + 1");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, ":");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Rp.".@$dataOneOpd->$namaTahunDepan."");
                }
                
                $countRow++;
                $excel_row++;
            }
            $excel_row++; $excel_row++; $excel_row++;
            $table_columns = array(
               
                array(
                    "RENCANA KERJA DAN ANGGARAN",
                    "",
                    "",
                ),
                array(
                    "Indikator",
                    "Tolak Ukur Kinerja",
                    "Target Kinerja",
                )
    
            );

            foreach($table_columns as $field)
            {
                $column = 0;
                foreach($field as $field2){
                    $object->getActiveSheet()->setCellValueByColumnAndRow($column, $excel_row, $field2);
                    $column++;
                }
                $excel_row++;            
            }

            $countRow = 0;
            foreach($data as $row)
            {
                if($countRow == 0){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Capaian Program");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "100%");
                }else if($countRow == 1){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Masukan");
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "Rp.");
                }else if($countRow == 2){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Keluaran");
                }else if($countRow == 3){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Hasil");
                }else if($countRow == 4){
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "Kelompok Sasaran Kegiatan : Kelompok Nelayan");
                }
                
                $countRow++;
                $excel_row++;
            }

            $table_columns = array(
               
                array(
                    "Kode",
                    "U r a i a n",
                    "Rincian Penghitungan",
                    "",
                    "",
                    "Jumlah (Rp)",
                ),
                array(
                    "",
                    "",
                    "Volume",
                    "Satuan",
                    "Harga Satuan",
                    "",
                )
    
            );

            foreach($table_columns as $field)
            {
                $column = 0;
                foreach($field as $field2){
                    $object->getActiveSheet()->setCellValueByColumnAndRow($column, $excel_row, $field2);
                    $column++;
                }
                $excel_row++;            
            }

            $countRow = 0;
            foreach($data as $row)
            {
                if($row['Kd_Rek_1'] != ''){
                    if($row['Kd_Rek_5'] != ''){
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Rek_1']." ".$row['Kd_Rek_2']." ".$row['Kd_Rek_3']." ".$row['Kd_Rek_4']." ".$row['Kd_Rek_5']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nama_belanja']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, @$row['total']);
                    }else if($row['Kd_Rek_3'] != '' && $row['Kd_Rek_4'] == ''){
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Rek_1']." ".$row['Kd_Rek_2']." ".$row['Kd_Rek_3']." ".$row['Kd_Rek_4']." ".$row['Kd_Rek_5']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nama_belanja']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, @$row['total']);
                    }else{
                        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['Kd_Rek_1']." ".$row['Kd_Rek_2']." ".$row['Kd_Rek_3']." ".$row['Kd_Rek_4']." ".$row['Kd_Rek_5']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nama_belanja']);
                        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, @$row['total']);
                    }
                    
                }else{
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['komentar']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "-".$row['nama_belanja']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['volume']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, ($row['harga']+$row['volume']));
                }
                
                $countRow++;
                $excel_row++;
            }

            // memberi border Atas
            $borderArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );

            $object->getActiveSheet()->getStyle("A1:C1")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A2:C2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A3:C3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A17:C17")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A23:C23")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A27:A28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("B27:B28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C27:E27")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("F27:F28")->applyFromArray($borderArray);

            $object->getActiveSheet()->getStyle("D1")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("B18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("E28")->applyFromArray($borderArray);
            // end memberi border Atas

            // merge cell
            $object->getActiveSheet()->mergeCells("A1:C1");
            $object->getActiveSheet()->mergeCells("A2:C2");
            $object->getActiveSheet()->mergeCells("A3:C3");
            $object->getActiveSheet()->mergeCells("A17:C17");
            $object->getActiveSheet()->mergeCells("A23:C23");
            $object->getActiveSheet()->mergeCells("A27:A28");
            $object->getActiveSheet()->mergeCells("B27:B28");
            $object->getActiveSheet()->mergeCells("C27:E27");
            $object->getActiveSheet()->mergeCells("F27:F28");
            // end merge cell    

             // memberi border Bawah
             $borderArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );

            $object->getActiveSheet()->getStyle("A4:D13")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A19:C23")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A29:F36")->applyFromArray($borderArray);
            // end memberi border Bawah

            $columnCell = 0;
            while($columnCell <= ($column-1)){
                $dataCell = 0;
                while($dataCell <= ($excel_row-1)){
                    // memberi border bawah
                    // $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray(
                    // array(
                    //     'borders' => array(
                    //         'allborders' => array(
                    //             'style' => PHPExcel_Style_Border::BORDER_THIN
                    //             )
                    //     )
                    // )
                    // );
                    // end memberi border bawah

                    // menset align center
                    // $object->getActiveSheet()->getStyle("A".$dataCell)->applyFromArray($styleHorizontal);
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
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->getFont()->setBold(true);
                // end menebalkan font

                // menset align center
                $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->applyFromArray($styleVertical);
                // end menset align center

                $columnCell++;
            }
        }else if($name == 'renstra-kab'){
            $this->load->library("excel");

            $fileName = $name."-".time();
    
            $object = new PHPExcel();
    
            $object->setActiveSheetIndex(0);
            // echo "<pre>";
            $tahun_rpjmd = $dataAll['tahun_rpjmd'];
            // echo $dataAll.data[0][''];
            $table_columns = array(
                array(
                    "Tujuan",
                    "Sasaran",
                    "Indikator",
                    "Kode",
                    "Program",
                    "Kegiatan",
                    "Indikator Kinerka (Outcome)",
                    "",
                    "Kondisi Kinerja pada Awal RPJMD (Tahun 0)",
                    "Capaian Kerja",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "Lokasi",
                    "Penanggungjawab",
                ),
                array(
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "Program",
                    "Kegiatan",
                    "",
                    "".$tahun_rpjmd."",
                    "",
                    "".($tahun_rpjmd+1)."",
                    "",
                    "".($tahun_rpjmd+2)."",
                    "",
                    "".($tahun_rpjmd+3)."",
                    "",
                    "".($tahun_rpjmd+4)."",
                    "",
                    "Kondisi Kinerja Akhir Periode",
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
                    "",
                    "",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "Target",
                    "Rp",
                    "",
                    "",
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
                
                if($row['Kd_Keg'] == null || $row['Kd_Keg'] == ''){
                    
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['tujuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['sasaran_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['indikator_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Urusan']." ".$row['Kd_Bidang']." ".$row['Kd_Prog']." ".$row['Kd_Keg']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Ket_Program']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Ket_Kegiatan']);

                }else{
                    $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['tujuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['sasaran_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['indikator_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['Kd_Urusan']." ".$row['Kd_Bidang']." ".$row['Kd_Prog']." ".$row['Kd_Keg']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['Ket_Program']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['Ket_Kegiatan']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row['outcome']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row['outcome_kegiatan']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row['kondisi_awal']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row['target1_tahun']." ".$row['target1_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row['target1_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row['target2_tahun']." ".$row['target2_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row['target2_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row['target3_tahun']." ".$row['target3_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row['target3_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(15, $excel_row, $row['target4_tahun']." ".$row['target4_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(16, $excel_row, $row['target4_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(17, $excel_row, $row['target5_tahun']." ".$row['target5_satuan_nama']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(18, $excel_row, $row['target5_harga']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(19, $excel_row, $row['akhir_target']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(20, $excel_row, ($row['target1_harga']+$row['target2_harga']+$row['target3_harga']+$row['target4_harga']+$row['target5_harga']));
                    $object->getActiveSheet()->setCellValueByColumnAndRow(21, $excel_row, $row['lokasi']);
                    $object->getActiveSheet()->setCellValueByColumnAndRow(22, $excel_row, $row['Nm_Sub_Unit']);
                }
                $excel_row++;
            }

            // memberi border Atas
            $borderArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );

            $object->getActiveSheet()->getStyle("A1:A3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("B1:B3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C1:C3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D1:D3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("E1:E3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("F1:F3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("G1:H1")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("I1:I3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("J1:U1")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("V1:V3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("W1:W3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("G2:G3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("H2:H3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("J2:K2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("L2:M2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("N2:O2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("P2:Q2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("R2:S2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("T2:U2")->applyFromArray($borderArray);

            $object->getActiveSheet()->getStyle("D1")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D2")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D3")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("B18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C18")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("C28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("D28")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("E28")->applyFromArray($borderArray);
            // end memberi border Atas

            // merge cell
            $object->getActiveSheet()->mergeCells("A1:C1");
            $object->getActiveSheet()->mergeCells("A2:C2");
            $object->getActiveSheet()->mergeCells("A3:C3");
            $object->getActiveSheet()->mergeCells("A17:C17");
            $object->getActiveSheet()->mergeCells("A23:C23");
            $object->getActiveSheet()->mergeCells("A27:A28");
            $object->getActiveSheet()->mergeCells("B27:B28");
            $object->getActiveSheet()->mergeCells("C27:E27");
            $object->getActiveSheet()->mergeCells("F27:F28");
            // end merge cell    

             // memberi border Bawah
             $borderArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );

            $object->getActiveSheet()->getStyle("A4:D13")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A19:C23")->applyFromArray($borderArray);
            $object->getActiveSheet()->getStyle("A29:F36")->applyFromArray($borderArray);
            // end memberi border Bawah

            $columnCell = 0;
            while($columnCell <= ($column-1)){
                $dataCell = 0;
                while($dataCell <= ($excel_row-1)){
                    // memberi border bawah
                    // $object->getActiveSheet()->getStyle($cells[$columnCell]."".$dataCell)->applyFromArray(
                    // array(
                    //     'borders' => array(
                    //         'allborders' => array(
                    //             'style' => PHPExcel_Style_Border::BORDER_THIN
                    //             )
                    //     )
                    // )
                    // );
                    // end memberi border bawah

                    // menset align center
                    // $object->getActiveSheet()->getStyle("A".$dataCell)->applyFromArray($styleHorizontal);
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
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->getFont()->setBold(true);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->getFont()->setBold(true);
                // end menebalkan font

                // menset align center
                $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."1")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."2")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."3")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."17")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."18")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."27")->applyFromArray($styleVertical);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->applyFromArray($styleHorizontal);
                $object->getActiveSheet()->getStyle($cells[$columnCell]."28")->applyFromArray($styleVertical);
                // end menset align center

                $columnCell++;
            }
        }
        
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
        $object_writer->save('php://output');
    }

}