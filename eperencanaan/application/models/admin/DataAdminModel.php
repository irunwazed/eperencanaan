<?php

class DataAdminModel extends CI_Model
{
    private $jumlah;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
    }

    public function getKodeOpdFromUser($user_id){
        // return 1;
        $this->db->where('Kd_User',$user_id);
        $result = $this->db->get('ta_user_unit')->row();
        return $result;
    }

}