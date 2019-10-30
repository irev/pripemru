<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends Auth_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
	    $this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template_load','user/user_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->User_model->json();
    }

    public function read($id=null) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id'           => $row->id,
        'username'     => $row->username,
        //'password'     => $row->password,
        'level'        => $row->level,
        'email'        => $row->email,
        'token'        => $row->token,
        'token_expire' => $row->token_expire,
	    );
            $this->template->load('template_load','user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'       => 'Create',
            'action'       => site_url('user/create_action'),
            'id'           => uniqid(),
            'username'     => set_value('username'),
            'password'     => set_value('password'),
            'level'        => set_value('level'),
            'email'        => set_value('email'),
            'token'        => set_value('token'),
            'token_expire' => set_value('token_expire'),
	);
        //$this->load->view('user/user_form', $data);
        $this->template->load('template_load','user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'id' => 'USR'.uniqid(),
            'username' => $this->input->post('username',TRUE),
            'password' => md5($this->input->post('password',TRUE)),
            'level' => $this->input->post('level',TRUE),
            'email' => $this->input->post('email',TRUE),
            'token' => 'Tok_'.uniqid(), //$this->input->post('token',TRUE),
            'token_expire' => date('Y-m-d', strtotime($Date. ' + 1 days')),//$this->input->post('token_expire',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
        		'id' => set_value('id', $row->id),
        		'username' => set_value('username', $row->username),
        		'password' => set_value('password', $row->password),
        		'level' => set_value('level', $row->level),
        		'email' => set_value('email', $row->email),
        		'token' => set_value('token', $row->token),
        		'token_expire' => set_value('token_expire', $row->token_expire),
	    );
           $this->template->load('template_load','user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function setting($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Setting',
                'action' => site_url('user/update_action'),
                'id' => set_value('id', $row->id),
                'username' => set_value('username', $row->username),
                'password' => set_value('password'),
                'level' => set_value('level', $row->level),
                'email' => set_value('email', $row->email),
                'token' => set_value('token', $row->token),
                'token_expire' => set_value('token_expire', $row->token_expire),
            );
            $this->template->load('template_load','user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }


    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		//'password' => md5($this->input->post('password',TRUE)),
		'level' => $this->input->post('level',TRUE),
		'email' => $this->input->post('email',TRUE),
		'token' => 'Tok_'.uniqid(), //$this->input->post('token',TRUE),
		'token_expire' => date('Y-m-d', strtotime($Date. ' + 1 days')),//$this->input->post('token_expire',TRUE),
	    );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username',
        'required|min_length[5]|max_length[12]|is_unique[user.username]',
        array(
                'required'      => 'Anda belum memasukan %s.',
                'is_unique'     => '%s sudah ada.'
        ));

    
	$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.email]', 
        array(
            'required' => 'Mohon isi dengan email yang valid',
            'valid_email' => 'Mohon isi dengan email yang valid',
            'is_unique' => 'Email ini sudah terdaftar'
        )
    );
	//$this->form_validation->set_rules('token', 'token', 'trim|required');
	//$this->form_validation->set_rules('token_expire', 'token expire', 'trim|required');

    $this->form_validation->set_rules('password', 'password', 'min_length[5]|max_length[12]|required',
    array(
        'min_length'  => 'anda minimal {param} karakter',
        'max_length' => 'anda maksimal {param} karakter',
        'required'       => 'anda belum diisi',
    )
    );
    $this->form_validation->set_rules('passconf', 'Password Konfirmasi', 'required|matches[password]',
        array(
            'required' => 'Kolom Konfirmasi Kata Sandi diperlukan',
            'matches' => 'Konfirmasi Kata Sandi Tidak Cocok',
        )
    
    );

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        $this->form_validation->set_rules('level', 'level', 'trim|required|in_list[user,operator,admin]', 
            array(
                'in_list'=> 'tingkatan yang tersedia yaitu: ( {param} ) pilih salah satu '
            )
        );
    }

    public function _rules_pass(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Level");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Token");
	xlsWriteLabel($tablehead, $kolomhead++, "Token Expire");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token_expire);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-30 11:28:41 */
/* http://harviacode.com */