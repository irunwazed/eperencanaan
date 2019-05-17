<?php

class UserModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'ref_users';
    }

    public function getCount($search = '', $post){
        $this->db->like('username', $search);
        $query = $this->db->get($this->table);

        
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post){
        $jumlah = $this->jumlah;
        
        $awal = ($page - 1)*$jumlah;
        $this->db->like('username', $search);
        $this->db->limit($jumlah,$awal);
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }
    

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $result = false;
        $cek = $this->cekInput($post);
        if(count($cek) > 0){
            $data = array();
            $data['email'] = $post['email'];
            $data['username'] = $post['username'];
            $data['level_id'] = $post['level_id'];
            $data['akun_id'] = $post['akun_id'];
            
            $this->db->where('user_id', $post['user']);
            $dataUser = $this->db->get($this->table)->result_array();
            if($post['password'] != @$dataUser[0]['password']){
                $this->load->library('MyConfig');
                $data['password'] = $this->myconfig->password_hash($post['password']);
            }
            $query = $this->db->where('user_id', $post['user']);
            $result = $query->update($this->table, $data);
            if($post['akun_id'] == 2){
                $this->createAdminUser($post);
            }else if($post['akun_id'] == 3 && @$post['Kd_Urusan'] != null){
                $this->createOpdUser($post);
            }
            
        }

        return $result;
    }

    public function create($post)
    {
        $this->load->library('MyConfig');
        $this->load->library('Fungsi');
        $post = $this->security->xss_clean($post);
        $result = false;
        // print_r($post);
        $opd = $this->cekInput($post);
        if(count($opd) > 0){
            $data = array();
            $data['email'] = $post['email'];
            $data['username'] = $post['username'];
            $data['level_id'] = $post['level_id'];
            $data['akun_id'] = $post['akun_id'];
            $this->load->library('MyConfig');
            $data['password'] = $this->myconfig->password_hash($post['password']);
            $this->db->where('username', $post['username']);
            $dataUser = $this->db->get($this->table)->result_array();
            if(count($dataUser) == 0){
                $result = $this->db->insert($this->table, $data);
                $post['user'] = $this->db->insert_id();
            }else{
                return false;
            }
           
            
            // $query = $this->db->where('user_id', $post['user']);
            

            
            if($post['akun_id'] == 2){
                $this->createAdminUser($post);
                // print_r($post);
            }else if($post['akun_id'] == 3 && @$post['Kd_Urusan'] != null){
                $this->createOpdUser($post);
            }
            
        }
        
        return $result;
    }

    public function delete($post){
        $result = false;
        $cek = $this->cekInput($post);
        if($cek > 0){
            $id = $post['user'];
            $this->db->where('user_id', $id);
            $result = $this->db->delete($this->table);
        }
        return $result;
    }

    public function createAdminUser($post){
        $this->db->where('user_id', $post['user']);
        $cek = $this->db->get('ref_rpjmd_user')->num_rows();

        if($cek == 0){
            $result = $this->db->insert('ref_rpjmd_user', array(
                'user_id' => $post['user'],
                'rpjmd_id' => $post['rpjmd'],
            ));
        }else{
            $this->db->where('user_id', $post['user']);
            $result = $this->db->update('ref_rpjmd_user', array(
                'rpjmd_id' => $post['rpjmd'],
            ));
        }
    }

    public function createOpdUser($post){
        // print_r($post);
        $this->db->where('Kd_User', $post['user']);
        $cek = $this->db->get('ta_user_unit')->num_rows();

        if($cek == 0){
            $result = $this->db->insert('ta_user_unit', array(
                'Kd_User' => $post['user'],
                'Kd_Urusan' => $post['Kd_Urusan'],
                'Kd_Bidang' => $post['Kd_Bidang'],
                'Kd_Unit' => $post['Kd_Unit'],
                'Kd_Sub_Unit' => $post['Kd_Sub_Unit'],
            ));
            $result = $this->db->insert('ref_opd_user', array(
                'user_id' => $post['user'],
                'Kd_Urusan' => $post['Kd_Urusan'],
                'Kd_Bidang' => $post['Kd_Bidang'],
                'Kd_Unit' => $post['Kd_Unit'],
                'Kd_Sub' => $post['Kd_Sub_Unit'],
            ));
        }else{
            $this->db->where('Kd_User', $post['user']);
            $result = $this->db->update('ta_user_unit', array(
                'Kd_Urusan' => $post['Kd_Urusan'],
                'Kd_Bidang' => $post['Kd_Bidang'],
                'Kd_Unit' => $post['Kd_Unit'],
                'Kd_Sub_Unit' => $post['Kd_Sub_Unit'],
            ));
            $this->db->where('user_id', $post['user']);
            $result = $this->db->update('ref_opd_user', array(
                'Kd_Urusan' => $post['Kd_Urusan'],
                'Kd_Bidang' => $post['Kd_Bidang'],
                'Kd_Unit' => $post['Kd_Unit'],
                'Kd_Sub' => $post['Kd_Sub_Unit'],
            ));
        }
        
        
    }

    public function cekInput($post){

        // $this->db->where('user_id', $post['user_id']);
        // // $this->db->where('rpjmd_id', $post['rpjmd']);
        // $query = $this->db->get('ref_opd_user');
        // return $query->result_array();
        return 1;

    }

}