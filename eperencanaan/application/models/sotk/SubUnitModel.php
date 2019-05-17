<?php

class SubUnitModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'ref_sub_unit';
    }

    public function getCount($search = '', $user_id){

        $this->db->join('ref_bidang', 'ref_bidang.Kd_Bidang = '.$this->table.'.Kd_Bidang AND ref_bidang.Kd_Urusan = '.$this->table.'.Kd_Urusan ', 'left');
        $this->db->join('ref_urusan', 'ref_urusan.Kd_Urusan = '.$this->table.'.Kd_Urusan', 'left');
        $this->db->like('Nm_Sub_Unit', $search);
        $query = $this->db->get($this->table);
        // return count($query->result_array());

        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $user_id){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;
        
        $this->db->join('ref_bidang', 'ref_bidang.Kd_Bidang = '.$this->table.'.Kd_Bidang AND ref_bidang.Kd_Urusan = '.$this->table.'.Kd_Urusan ', 'left');
        $this->db->join('ref_urusan', 'ref_urusan.Kd_Urusan = '.$this->table.'.Kd_Urusan', 'left');
        $this->db->like('Nm_Sub_Unit', $search);
        $query = $this->db->limit($jumlah,$awal)->get($this->table)->result_array();
        return $query;
    }
    

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        // print_r($post);

        // $id = $post['id'];
        $this->db->where('Kd_Urusan', $post['urusan']);
        $this->db->where('Kd_Bidang', $post['bidang']);
        $this->db->where('Kd_Unit', $post['unit']);
        $this->db->where('Kd_Sub', $post['sub']);
        $data = array(
            // 'Kd_Urusan' => $post['urusan'], 
            // 'Kd_Bidang' => $post['bidang'], 
            // 'Kd_Unit' => $post['unit'],
            'Nm_Sub_Unit' => $post['Nm_Sub_Unit'],  
        );
        $result = $this->db->update($this->table, $data);
        

        return $result;
    }

    public function create($post)
    {
        $this->load->library('MyConfig');
        $post = $this->security->xss_clean($post);
        $date = time();
        // $opd_id = explode('-', $post['opd']);
        $result = false;
        $data = $this->cekInput($post['user_id'], 1);
        // print_r($post);
        if($data > 0){

            $this->db->where('Kd_Urusan', $post['urusan']);
            $this->db->where('Kd_Bidang', $post['bidang']);
            $this->db->where('Kd_Unit', $post['unit']);
            $this->db->order_by('Kd_Sub','DESC');
            $last_id = $this->db->get($this->table)->row()->Kd_Sub+1;
// echo $last_id;
            // print_r($post);
            $result = $this->db->insert($this->table, array(
                'Kd_Urusan' => $post['urusan'], 
                'Kd_Bidang' => $post['bidang'], 
                'Kd_Unit' => $post['unit'],
                'Kd_Sub' => $last_id, 
                'Nm_Sub_Unit' => $post['Nm_Sub_Unit'], 
            ));

        }
        
        return $result;
    }

    public function delete($post){

        // $id = $post['id'];
        // print_r($post);
        $this->db->where('Kd_Urusan', $post['urusan']);
        $this->db->where('Kd_Bidang', $post['bidang']);
        $this->db->where('Kd_Unit', $post['unit']);
        $this->db->where('Kd_Sub', $post['sub']);
        $result = $this->db->delete($this->table);

        return $result;
    }

    public function cekInput($user_id, $id){


        return 1;
    }

}