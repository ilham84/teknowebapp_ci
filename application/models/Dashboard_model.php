<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    //hitung total data blog
    public function get_blog()
    {
        $sql = "SELECT count(id_article) as id FROM tbl_blog";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }

    //hitung total data project
    public function get_project()
    {
        $sql = "SELECT count(id_project) as id FROM tbl_project";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }

    //hitung total data category
    public function get_category()
    {
        $sql = "SELECT count(id_category) as id FROM tbl_category";
        $result = $this->db->query($sql);
        return $result->row()->id;
    }
   
    function blogtag()
	{
		$query = "SELECT * FROM tbl_category WHERE category = '1' and category_active = '1' ORDER BY id_category ASC"; // Query untuk menampilkan semua data tag create article
		$data['tag'] = $this->db->query($query)->result();

		return $data;
    }
    
    function projecttag()
	{
		$query = "SELECT * FROM tbl_category WHERE category = '0' and category_active = '1' ORDER BY id_category ASC"; // Query untuk menampilkan semua data tag create project
		$data['tag'] = $this->db->query($query)->result();

		return $data;
    }

    //fungsi untuk menampilkan data article berdasarkan permalink
	function getarticle($permalink){ 
		$query = $this->db->query("SELECT a.*, b.category_name FROM tbl_blog AS a INNER JOIN tbl_category AS b ON a.id_category = b.id_category WHERE slug_article = '$permalink'");
		return $query;
    }
    
    function getproject($permalink){ 
		$query = $this->db->query("SELECT a.*, b.category_name FROM tbl_project AS a INNER JOIN tbl_category AS b ON a.id_category = b.id_category WHERE slug_project = '$permalink'");
		return $query;
    }

}
