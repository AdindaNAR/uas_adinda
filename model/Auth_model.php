<?php

class Auth_model{

	protected $db;
	function __construct($db){ //fungsi function construct = autoload
		$this->db = $db;
	}

	function tampil_data()
	{
		$row = $this->db->prepare("SELECT * FROM tbl_pegawai");
		$row->execute();
		return $hasil = $row->fetchAll();
	}

	function getData($id)
	{
		$row =$this->db->prepare("SELECT * FROM tbl_pegawai where id = $id");
		$row->execute();
		return $hasil = $row->fetch();
	}
	function proses_login($user,$pass)
    {
        // untuk password kita enkrip dengan md5
        $row = $this->db->prepare('SELECT * FROM tbl_user WHERE username=? AND password=md5(?)');
        $row->execute(array($user,$pass));
        $count = $row->rowCount();
        if($count > 0)
        {
            return $hasil = $row->fetch();
        }else{
            return 'gagal';
        }
    }
    
}



?>