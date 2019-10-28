<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_syarat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_syarat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'm_syarat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'm_syarat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'm_syarat/index.html';
            $config['first_url'] = base_url() . 'm_syarat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_syarat_model->total_rows($q);
        $m_syarat = $this->M_syarat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'm_syarat_data' => $m_syarat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template_load','m_syarat/m_syarat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->M_syarat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'ids' => $row->ids,
		'urut' => $row->urut,
		'kodeizin' => $row->kodeizin,
		'nama' => $row->nama,
		'type' => $row->type,
	    );
            $this->template->load('template_load','m_syarat/m_syarat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_syarat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'   => 'Create',
            'action'   => site_url('m_syarat/create_action'),
            'ids'      => set_value('ids'),
            'urut'     => set_value('urut'),
            'kodeizin' => '_'.uniqid(),// set_value('kodeizin'),
            'nama'     => set_value('nama'),
            'type'     => set_value('type'),
	);
        $this->template->load('template_load','m_syarat/m_syarat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'urut'     => $this->input->post('urut',TRUE),
        'kodeizin' => $this->input->post('type',TRUE).$this->input->post('kodeizin',TRUE),
        'nama'     => $this->input->post('nama',TRUE),
        'type'     => $this->input->post('type',TRUE),
	    );

            $this->M_syarat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_syarat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_syarat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_syarat/update_action'),
		'ids' => set_value('ids', $row->ids),
		'urut' => set_value('urut', $row->urut),
		'kodeizin' => set_value('kodeizin', $row->kodeizin),
		'nama' => set_value('nama', $row->nama),
		'type' => set_value('type', $row->type),
	    );
            $this->template->load('template_load','m_syarat/m_syarat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_syarat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ids', TRUE));
        } else {
            $data = array(
		'urut' => $this->input->post('urut',TRUE),
		'kodeizin' => $this->input->post('kodeizin',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'type' => $this->input->post('type',TRUE),
	    );

            $this->M_syarat_model->update($this->input->post('ids', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_syarat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_syarat_model->get_by_id($id);

        if ($row) {
            $this->M_syarat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_syarat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_syarat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('urut', 'urut', 'trim|required');
	$this->form_validation->set_rules('kodeizin', 'kodeizin', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');

	$this->form_validation->set_rules('ids', 'ids', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "m_syarat.xls";
        $judul = "m_syarat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Urut");
	xlsWriteLabel($tablehead, $kolomhead++, "Kodeizin");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");

	foreach ($this->M_syarat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->urut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kodeizin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->type);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file M_syarat.php */
/* Location: ./application/controllers/M_syarat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:28 */
/* http://harviacode.com */