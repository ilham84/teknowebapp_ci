<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_model extends CI_Model
{
    public function __construct() {
        parent::__construct(); 
    }

    // Query Get Data and Search Article
    public function get_result_article($rowno, $rowperpage, $search="")
    {
        $this->db->select('a.*, b.category_name as category_name');
        $this->db->from('tbl_blog as a');
        $this->db->join('tbl_category as b', 'b.id_category = a.id_category');
        $this->db->order_by('id_article', 'DESC');

        if($search != ''){
            $this->db->like('title_article', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_article($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_blog as a');
        $this->db->join('tbl_category as b', 'b.id_category = a.id_category');
        $this->db->order_by('id_article', 'DESC');
      
        if($search != ''){
            $this->db->like('title_article', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }
    
    // Query Get Data and Search Blog
    public function get_result_blog($rowno, $rowperpage, $search="")
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('article_active = 1');
        $this->db->order_by('id_article', 'DESC');

        if($search != ''){
            $this->db->like('title_article', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_blog($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_blog');
        $this->db->where('article_active = 1');
        $this->db->order_by('id_article', 'DESC');

        if($search != ''){
            $this->db->like('title_article', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }
    
    // Query Get Data and Search Blog
    public function get_result_portofolio($rowno, $rowperpage, $search="")
    {
        $this->db->select('*');
        $this->db->from('tbl_project');
        $this->db->where('project_active = 1');
        $this->db->order_by('id_project', 'DESC');

        if($search != ''){
            $this->db->like('project_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_portofolio($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_project');
        $this->db->where('project_active = 1');
        $this->db->order_by('id_project', 'DESC');

        if($search != ''){
            $this->db->like('project_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }

    // Query Get Data and Search Project
    public function get_result_project($rowno, $rowperpage, $search="")
    {
        $this->db->select('a.*, b.category_name as category_name');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_category as b', 'b.id_category = a.id_category');
        $this->db->order_by('id_project', 'DESC');

        if($search != ''){
            $this->db->like('project_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_project($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_project as a');
        $this->db->join('tbl_category as b', 'b.id_category = a.id_category');
        $this->db->order_by('id_project', 'DESC');
      
        if($search != ''){
            $this->db->like('project_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }

    // Query Get Data and Search Category
    public function get_result_category($rowno, $rowperpage, $search="")
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->order_by('id_category', 'DESC');

        if($search != ''){
            $this->db->like('category_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);  
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_category($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('tbl_category');
        $this->db->order_by('id_category', 'DESC');
      
        if($search != ''){
            $this->db->like('category_name', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();
      
        return $result[0]['allcount'];
    }

}
