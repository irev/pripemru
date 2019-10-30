<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruang extends User_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ruang_model');
        $this->load->library('form_validation');
    }

    public function index()
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

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ruang_model->total_rows($q);
        $ruang = $this->Ruang_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ruang_data' => $ruang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template_load','users/ruang/ruang_list', $data);
    }

    public function read($id) 
    {
        
        $row = $this->Ruang_model->get_by_id($id);
        if ($row) {
           ($this->session->userdata('iduser') != $row->userid)? redirect(site_url('users/ruang')):"";
            $data = array(
        		'idRuang' => $row->idRuang,
        		'peruID' => $row->peruID,
        		'luasLahan' => $row->luasLahan,
        		'statusPemilik' => $row->statusPemilik,
        		'nmPemilik' => $row->nmPemilik,
        		'nmrSertifikat' => $row->nmrSertifikat,
        		'atasNama' => $row->atasNama,
        		'nagari' => $row->nagari,
        		'kecamatan' => $row->kecamatan,
                'letakLahan' => $row->letakLahan,
        		'userid' => $row->userid,
	    );
            $this->template->load('template_load','users/ruang/ruang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users/ruang'));
        }

    }

    public function create() 
    {
        $data = array(
            'button' => 'SIMPAN',
            'action' => site_url('users/ruang/create_action/'.$this->uri->segment(4)),
            'idRuang' => 'RG'.uniqid(),// set_value('idRuang'),
            'peruID' => $this->uri->segment(4),
            'type' => set_value('type'),
            'luasLahan' => set_value('luasLahan'),
            'statusPemilik' => set_value('statusPemilik'),
            'nmPemilik' => set_value('nmPemilik'),
            'nmrSertifikat' => set_value('nmrSertifikat'),
            'atasNama' => set_value('atasNama'),
            'nagari' => set_value('nagari'),
            'kecamatan' => set_value('kecamatan'),
            'letakLahan' => set_value('letakLahan'),
	);
        $this->template->load('template_load','users/ruang/ruang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'peruID'        => $this->input->post('peruID',TRUE),
                'type'          => $this->input->post('type',TRUE),
                'luasLahan'     => $this->input->post('luasLahan',TRUE),
                'statusPemilik' => $this->input->post('statusPemilik',TRUE),
                'nmPemilik'     => $this->input->post('nmPemilik',TRUE),
                'nmrSertifikat' => $this->input->post('nmrSertifikat',TRUE),
                'atasNama'      => $this->input->post('atasNama',TRUE),
                'nagari'        => $this->input->post('nagari',TRUE),
                'kecamatan'     => $this->input->post('kecamatan',TRUE),
                'letakLahan'    => $this->input->post('letakLahan',TRUE),
                'userid'    => $this->session->userdata('iduser'),
	    );

            $this->Ruang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users/ruang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ruang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/ruang/update_action'),
                'idRuang' => set_value('idRuang', $row->idRuang),
                'peruID' => set_value('peruID', $row->peruID),
                'type' => set_value('type', $row->type),
                'luasLahan' => set_value('luasLahan', $row->luasLahan),
                'statusPemilik' => set_value('statusPemilik', $row->statusPemilik),
                'nmPemilik' => set_value('nmPemilik', $row->nmPemilik),
                'nmrSertifikat' => set_value('nmrSertifikat', $row->nmrSertifikat),
                'atasNama' => set_value('atasNama', $row->atasNama),
                'nagari' => set_value('nagari', $row->nagari),
                'kecamatan' => set_value('kecamatan', $row->kecamatan),
                'letakLahan' => set_value('letakLahan', $row->letakLahan),
	    );
            $this->template->load('template_load','users/ruang/ruang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users/ruang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idRuang', TRUE));
        } else {
            $data = array(
        'peruID' => $this->input->post('peruID',TRUE),
		'type' => $this->input->post('type',TRUE),
		'luasLahan' => $this->input->post('luasLahan',TRUE),
		'statusPemilik' => $this->input->post('statusPemilik',TRUE),
		'nmPemilik' => $this->input->post('nmPemilik',TRUE),
		'nmrSertifikat' => $this->input->post('nmrSertifikat',TRUE),
		'atasNama' => $this->input->post('atasNama',TRUE),
		'nagari' => $this->input->post('nagari',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'letakLahan' => $this->input->post('letakLahan',TRUE),
	    );

            $this->Ruang_model->update($this->input->post('idRuang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users/ruang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ruang_model->get_by_id($id);

        if ($row) {
            $this->Ruang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users/ruang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users/ruang'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('peruID', 'peruid', 'trim|required');

	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('luasLahan', 'luaslahan', 'trim|required');
	$this->form_validation->set_rules('statusPemilik', 'statuspemilik', 'trim|required');
	$this->form_validation->set_rules('nmPemilik', 'nmpemilik', 'trim|required');
	$this->form_validation->set_rules('nmrSertifikat', 'nmrsertifikat', 'trim|required');
	$this->form_validation->set_rules('atasNama', 'atasnama', 'trim|required');
	$this->form_validation->set_rules('nagari', 'nagari', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('letakLahan', 'letaklahan', 'trim|required');

	$this->form_validation->set_rules('idRuang', 'idRuang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "DATAPERMOHONAN.xls";
        $judul = "DATA PERMOHONAN";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Perusahaan");
    	xlsWriteLabel($tablehead, $kolomhead++, "type");
    	xlsWriteLabel($tablehead, $kolomhead++, "Luas Lahan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Status Pemilik");
    	xlsWriteLabel($tablehead, $kolomhead++, "Pemilik");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Sertifikat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Atas Nama");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nagari");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");
    	xlsWriteLabel($tablehead, $kolomhead++, "Letak Lahan");

	foreach ($this->Ruang_model->get_all() as $data) {
            $kolombody = 0;
            $namaPerusahaan = $this->Perusahaan_model->get_data_by($data->peruID, 'nmPeru');
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->nmPeru);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->type);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->luasLahan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->statusPemilik);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nmPemilik);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nmrSertifikat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->atasNama);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nagari);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->letakLahan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Ruang.php */
/* Location: ./application/controllers/Ruang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:29 */
/* http://harviacode.com */