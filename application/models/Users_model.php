<?php 

class Users_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_user_data($user_login){

        $this->db
            ->select('user_id, password_hash, user_full_name, user_email')
            ->from('users')
            ->where('user_login', $user_login);
        $result = $this->db->get();

        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return NULL;
        }

    }

    public function get_data($id, $select = NULL) {
        if(!empty($select)) {
            $this->db->select($select);
        }
        //$this->db->from('users');
        $this->db->where('user_id', $id);
        return $this->db->get('users');
    }

    public function insert($data) {
        $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }

    public function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }

    public function is_duplicated($field, $value, $id = NULL) {
        if(!empty($id)) {
            $this->db->where('user_id <> '.$id);
        }
        //$this->db->from('users');
        $this->db->where($field, $value);
        return $this->db->get('users')->num_rows() > 0;
    }

    public $column_search = array('user_login', 'user_full_name', 'user_email');
    public $column_order = array('user_login', 'user_full_name', 'user_email');

    public function _get_datatable() {        
        $search = NULL;
        if($this->input->post('search')){
            $search = $this->input->post('search')['value'];
        }
        
        $order = $this->input->post('order');
        $order_column = NULL;
        $order_dir = NULL;
        if(isset($order)){
            $order_column = $order[0]['column'];
            $order_dir = $order[0]['dir'];
        }

        $this->db->from('users');
        if(isset($search)){
            $first = TRUE;
            foreach ($this->column_search as $field) {
                if($first){
                    $this->db->group_start();
                    $this->db->like($field, $search);
                    $first = FALSE;
                } else {
                    $this->db->or_like($field, $search);
                }
            }
            if(!$first){
                $this->db->group_end();
            }
        }

        if(isset($order)){
            $this->db->order_by($this->column_order[$order_column], $order_dir);
        }
    }

    public function get_datatable(){
        $length = $this->input->post('length');
        $start = $this->input->post('start');
        $this->_get_datatable();
        if(isset($length) && $length != -1){
            $this->db->limit($length, $start);
        }
        return $this->db->get()->result();
    }

    public function records_filtered(){
        $this->_get_datatable();
        return $this->db->get()->num_rows();
    }

    public function records_total(){
        $this->db->from('users');
        return $this->db->count_all_results();
    }

}