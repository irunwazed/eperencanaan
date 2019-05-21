<?php

class OpdPaguModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 200;
        $this->table = 'ref_opd_pagu';
    }

    public function getCount($search = '', $post){
        // $opd = $this->cekInput($post);
        // $this->db->where('ref_opd_pagu.Kd_Urusan', $opd[0]['Kd_Urusan']);
        // $this->db->where('ref_opd_pagu.Kd_Bidang', $opd[0]['Kd_Bidang']);
        // $this->db->where('ref_opd_pagu.Kd_Unit', $opd[0]['Kd_Unit']);
        // $this->db->where('ref_opd_pagu.Kd_Sub', $opd[0]['Kd_Sub']);
        $this->db->join('ref_sub_unit', 'ref_sub_unit.Kd_Urusan = ref_opd_pagu.Kd_Urusan AND ref_sub_unit.Kd_Bidang = ref_opd_pagu.Kd_Bidang AND ref_sub_unit.Kd_Unit = ref_opd_pagu.Kd_Unit AND ref_sub_unit.Kd_Sub = ref_opd_pagu.Kd_Sub', 'left');
        // $this->db->join('ref_rpjmd_user', 'ref_rpjmd_user.rpjmd_id = ref_rpjmd.rpjmd_id', 'left');
        // $this->db->where('ref_rpjmd_user.user_id', $post['user_id']);
        // $this->db->where('ref_rpjmd_user.rpjmd_id', $post['rpjmd']);
        // $this->db->like('opd_pegawai_nama', $search);
        $this->db->where('ref_opd_pagu.rpjmd_id', $post['rpjmd']);
        $query = $this->db->get($this->table);

        
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($search = '', $post){
        $jumlah = $this->jumlah;
        
        $this->db->join('ref_sub_unit', 'ref_sub_unit.Kd_Urusan = ref_opd_pagu.Kd_Urusan AND ref_sub_unit.Kd_Bidang = ref_opd_pagu.Kd_Bidang AND ref_sub_unit.Kd_Unit = ref_opd_pagu.Kd_Unit AND ref_sub_unit.Kd_Sub = ref_opd_pagu.Kd_Sub', 'left');
        $this->db->where('ref_opd_pagu.rpjmd_id', $post['rpjmd']);
        // $this->db->like('opd_pegawai_nama', $search);
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }
    
    public function getOneData($id){
        $this->db->where('ref_opd_pagu.opd_pagu_id', $id);
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $result = false;
        $pesan = "Gagal Mengedit Data";
        $opd = $this->cekInput($post);
        if($opd > 0){
            $kode = explode("-", $post['kode_opd']);
            $id = $post['opd_pagu_id'];
            $this->db->where('opd_pagu_id', $id);
            $data = array(
                'Kd_Urusan' => $kode[0], 
                'Kd_Bidang' => $kode[1], 
                'Kd_Unit' => $kode[2], 
                'Kd_Sub' => $kode[3], 
                'tahun1_sebelum' => $post['tahun1_sebelum'], 
                'tahun1_sesudah' => $post['tahun1_sesudah'], 
                'tahun2_sebelum' => $post['tahun2_sebelum'], 
                'tahun2_sesudah' => $post['tahun2_sesudah'], 
                'tahun3_sebelum' => $post['tahun3_sebelum'], 
                'tahun3_sesudah' => $post['tahun3_sesudah'], 
                'tahun4_sebelum' => $post['tahun4_sebelum'], 
                'tahun4_sesudah' => $post['tahun4_sesudah'], 
                'tahun5_sebelum' => $post['tahun5_sebelum'], 
                'tahun5_sesudah' => $post['tahun5_sesudah'], 
            );
            $result = $this->db->update($this->table, $data);
            if($result){
                $status = 'success';
                $pesan = "Berhasil Mengedit Data";
            }
        }
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function create($post)
    {
        // die("TAMAT");
        $post = $this->security->xss_clean($post);
        $result = false;
        $status = 'danger';
        $pesan = "Gagal Memasukkan Data";
        $cek = $this->cekInput($post);
        if($cek > 0){
            $kode = explode("-", $post['kode_opd']);
            $result = $this->db->insert($this->table, array(
                'Kd_Urusan' => $kode[0], 
                'Kd_Bidang' => $kode[1], 
                'Kd_Unit' => $kode[2], 
                'Kd_Sub' => $kode[3], 
                'tahun1_sebelum' => $post['tahun1_sebelum'], 
                'tahun1_sesudah' => $post['tahun1_sesudah'], 
                'tahun2_sebelum' => $post['tahun2_sebelum'], 
                'tahun2_sesudah' => $post['tahun2_sesudah'], 
                'tahun3_sebelum' => $post['tahun3_sebelum'], 
                'tahun3_sesudah' => $post['tahun3_sesudah'], 
                'tahun4_sebelum' => $post['tahun4_sebelum'], 
                'tahun4_sesudah' => $post['tahun4_sesudah'], 
                'tahun5_sebelum' => $post['tahun5_sebelum'], 
                'tahun5_sesudah' => $post['tahun5_sesudah'], 
                'rpjmd_id' => $post['rpjmd'],
            ));
            if($result){
                $status = 'success';
                $pesan = "Berhasil Membuat Data";
            }
        }
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function delete($post){
        $result = false;
        $status = 'danger';
        $pesan = "Gagal Menghapus Data";
        $cek = $this->cekInput($post);
        if($cek > 0){
            $id = $post['opd_pagu_id'];;
            $this->db->where('opd_pagu_id', $id);
            $result = $this->db->delete($this->table);
            if($result){
                $status = 'success';
                $pesan = "Berhasil Menghapus Data";
            }
        }
        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }


    public function cekInput($post){

        return 1;
    }

}