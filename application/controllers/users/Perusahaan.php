<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan extends User_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perusahaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/perusahaan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/perusahaan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/perusahaan/index.html';
            $config['first_url'] = base_url() . 'users/perusahaan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Perusahaan_model->total_rows($q);
        $perusahaan = $this->Perusahaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perusahaan_data' => $perusahaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        //$this->template->load('template_load','perusahaan/perusahaan_list', $data);
        $this->template->load('template_load','users/perusahaan/perusahaan_list', $data);
    }

    public function read($id) 
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/ruang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/ruang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/ruang/index.html';
            $config['first_url'] = base_url() . 'users/ruang/index.html';
        }
        $idPerusahaan = $this->uri->segment(4);
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ruang_model->total_rows_by_perusahaan($q, $idPerusahaan); 
        $ruang = $this->Ruang_model->get_limit_data_by_perusahaan($config['per_page'], $start, $q, $idPerusahaan);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $row = $this->Perusahaan_model->get_by_id($id);
        if ($row) {
        $data = array(
        'idPru'      => $row->idPru,
        'nmPeru'     => $row->nmPeru,
        'alamatPeru' => $row->alamatPeru,
        'npwpPeru'   => $row->npwpPeru,

/////RUANG DATA (DATA LAHAN)
        'ruang_data' => $ruang,
        'q' => $q,
        'pagination' => $this->pagination->create_links(),
        'total_rows' => $config['total_rows'],
        'start' => $start,  
	    );

            //$this->template->load('template_load','perusahaan/perusahaan_read', $data);
            $this->template->load('template_load','users/perusahaan/perusahaan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perusahaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('users/perusahaan/create_action'),
            'idPru' => set_value('idPru'),
            'nmPeru' => set_value('nmPeru'),
            'alamatPeru' => set_value('alamatPeru'),
            'npwpPeru' => set_value('npwpPeru'),
            'iduser' => $this->session->userdata('iduser'),//set_value('iduser') ,
	);
        $this->template->load('template_load','users/perusahaan/perusahaan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                    'idPru'      => "PER".uniqid(),
                    'nmPeru'     => $this->input->post('nmPeru',TRUE),
                    'alamatPeru' => $this->input->post('alamatPeru',TRUE),
                    'npwpPeru'   => $this->input->post('npwpPeru',TRUE),
	       );

            $this->Perusahaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users/perusahaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/perusahaan/update_action'),
		'idPru' => set_value('idPru', $row->idPru),
		'nmPeru' => set_value('nmPeru', $row->nmPeru),
		'alamatPeru' => set_value('alamatPeru', $row->alamatPeru),
		'npwpPeru' => set_value('npwpPeru', $row->npwpPeru),
	    );
            $this->template->load('template_load','users/perusahaan/perusahaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users/perusahaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idPru', TRUE));
        } else {
            $data = array(
		'nmPeru' => htmlspecialchars($this->input->post('nmPeru',TRUE)),
		'alamatPeru' => $this->input->post('alamatPeru',TRUE),
		'npwpPeru' => $this->input->post('npwpPeru',TRUE),
	    );

            $this->Perusahaan_model->update($this->input->post('idPru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users/perusahaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Perusahaan_model->get_by_id($id);

        if ($row) {
            $this->Perusahaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users/perusahaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users/perusahaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nmPeru', 'Nama Perusahaan', 'trim|required|is_unique[perusahaan.nmPeru]',
        array(
            'is_unique' =>  ' %s sudah ada',
        )
    );
	$this->form_validation->set_rules('alamatPeru', 'alamatperu', 'trim|required');
	$this->form_validation->set_rules('npwpPeru', 'npwpperu', 'trim|required');

	$this->form_validation->set_rules('idPru', 'idPru', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "perusahaan.xls";
        $judul = "perusahaan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NmPeru");
	xlsWriteLabel($tablehead, $kolomhead++, "AlamatPeru");
	xlsWriteLabel($tablehead, $kolomhead++, "NpwpPeru");

	foreach ($this->Perusahaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nmPeru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamatPeru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwpPeru);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Perusahaan.php */
/* Location: ./application/controllers/Perusahaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:28 */
/* http://harviacode.com */