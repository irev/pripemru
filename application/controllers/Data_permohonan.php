<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_permohonan extends Auth_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_permohonan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_permohonan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_permohonan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_permohonan/index.html';
            $config['first_url'] = base_url() . 'data_permohonan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_permohonan_model->total_rows($q);
        $data_permohonan = $this->Data_permohonan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_permohonan_data' => $data_permohonan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template_load','data_permohonan/data_permohonan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Data_permohonan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'RuangID' => $row->RuangID,
		'PerusID' => $row->PerusID,
		'status' => $row->status,
        'type' => $row->type,
		'json_status' => $row->json_status,
	    );
            $this->template->load('template_load','data_permohonan/data_permohonan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_permohonan'));
        }
    }

    public function create() 
    {
        //// informasi kepemilikan 
        $ids = $this->uri->segment(4);
        $row = $this->Ruang_model->get_by_id($ids);
        if ($row) {
            $data = array(
                'idRuang'       => $row->idRuang,
                'peruID'        => $row->peruID,
                'luasLahan'     => $row->luasLahan,
                'statusPemilik' => $row->statusPemilik,
                'nmPemilik'     => $row->nmPemilik,
                'nmrSertifikat' => $row->nmrSertifikat,
                'atasNama'      => $row->atasNama,
                'nagari'        => $row->nagari,
                'kecamatan'     => $row->kecamatan,
                'letakLahan'    => $row->letakLahan,
                ///
                'button'      => 'INPUT',
                'action'      => site_url('data_permohonan/create_action/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6)),
                'id'          => set_value('id'),
                'RuangID'     => $this->uri->segment(4),//set_value('RuangID'),
                'PerusID'     => $this->uri->segment(5),//set_value('PerusID'),
                'status'      => set_value('status'),
                'type'        => $this->uri->segment(6) ,//set_value('type'),
                'json_status' => set_value('json_status'),
                'syarat'      => $this->M_syarat_model->typeSyarat($this->uri->segment(6)),
                );
        }
        $this->template->load('template_load','data_permohonan/data_permohonan_form', $data);
    }

    public function create_validasi() 
    {
        //// informasi kepemilikan 
        $ids = $this->uri->segment(3);
        $row = $this->Ruang_model->get_by_id($ids);
        if ($row) {
            $data = array(
                'idRuang'       => $row->idRuang,
                'peruID'        => $row->peruID,
                'luasLahan'     => $row->luasLahan,
                'statusPemilik' => $row->statusPemilik,
                'nmPemilik'     => $row->nmPemilik,
                'nmrSertifikat' => $row->nmrSertifikat,
                'atasNama'      => $row->atasNama,
                'nagari'        => $row->nagari,
                'kecamatan'     => $row->kecamatan,
                'letakLahan'    => $row->letakLahan,
                ///
                'button'      => 'INPUT',
                'action'      => site_url('data_permohonan/create_action/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5)),
                'id'          => set_value('id'),
                'RuangID'     => $this->uri->segment(3),//set_value('RuangID'),
                'PerusID'     => $this->uri->segment(4),//set_value('PerusID'),
                'status'      => set_value('status'),
                'type'        => $this->uri->segment(5) ,//set_value('type'),
                'json_status' => set_value('json_status'),
                'syarat'      => $this->M_syarat_model->typeSyarat($this->uri->segment(5)),
                );
        }
        $this->template->load('template_load','data_permohonan/data_permohonan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'RuangID'     => $this->input->post('RuangID',TRUE),
                'PerusID'     => $this->input->post('PerusID',TRUE),
                'status'      => $this->input->post('status',TRUE),
                'type'        => $this->input->post('type',TRUE),
                'json_status' => '{'.$this->input->post('json_status',TRUE).'}',
               
	       );

            $this->Data_permohonan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_permohonan'));
        }
    }
    
    public function update_validasi($id) 
    {
        $row = $this->Data_permohonan_model->get_by_id($id);
        $ids = $this->uri->segment(4);
        $row1 = $this->Ruang_model->get_by_id($ids);
        if ($row) {
            $data = array(
                'idRuang'       => $row1->idRuang,
                'peruID'        => $row1->peruID,
                'luasLahan'     => $row1->luasLahan,
                'statusPemilik' => $row1->statusPemilik,
                'nmPemilik'     => $row1->nmPemilik,
                'nmrSertifikat' => $row1->nmrSertifikat,
                'atasNama'      => $row1->atasNama,
                'nagari'        => $row1->nagari,
                'kecamatan'     => $row1->kecamatan,
                'letakLahan'    => $row1->letakLahan,

                'button' => 'Update ',
                'action' => site_url('data_permohonan/update_action'),
                'id' => set_value('id', $row->id),
                'RuangID' => set_value('RuangID', $row->RuangID),
                'PerusID' => set_value('PerusID', $row->PerusID),
                'status' => set_value('status', $row->status),
                'type' => set_value('status', $row->type),
                'json_status' => set_value('json_status', $row->json_status),
                'syarat' => $this->M_syarat_model->typeSyarat($row->type),
	    );
            $this->template->load('template_load','data_permohonan/data_permohonan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_permohonan'));
        }
    }

     public function update($id) 
    {
        $row = $this->Data_permohonan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('data_permohonan/update_action'),
                'id' => set_value('id', $row->id),
                'RuangID' => set_value('RuangID', $row->RuangID),
                'PerusID' => set_value('PerusID', $row->PerusID),
                'status' => set_value('status', $row->status),
                'type' => set_value('status', $row->type),
                'json_status' => set_value('json_status', $row->json_status),
                'syarat' => $this->M_syarat_model->typeSyarat($row->type),
        );
            $this->template->load('template_load','data_permohonan/data_permohonan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_permohonan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'RuangID'     => $this->input->post('RuangID',TRUE),
                'PerusID'     => $this->input->post('PerusID',TRUE),
                'status'      => $this->input->post('status',TRUE),
                'type'        => $this->input->post('type',TRUE),
                'json_status' => "{".$this->input->post('json_status',TRUE)."}",
	       );

            $this->Data_permohonan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_permohonan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Data_permohonan_model->get_by_id($id);

        if ($row) {
            $this->Data_permohonan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_permohonan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_permohonan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('RuangID', 'ruangid', 'trim|required');
	$this->form_validation->set_rules('PerusID', 'perusid', 'trim|required');
    $this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('json_status', 'json status', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_permohonan.xls";
        $judul = "data_permohonan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "RuangID");
	xlsWriteLabel($tablehead, $kolomhead++, "PerusID");
    xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Json Status");

	foreach ($this->Data_permohonan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->RuangID);
	    xlsWriteNumber($tablebody, $kolombody++, $data->PerusID);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->json_status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Data_permohonan.php */
/* Location: ./application/controllers/Data_permohonan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-26 18:43:28 */
/* http://harviacode.com */