<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_barang_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('t_barang/t_barang_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->T_barang_model->json();
    }

    public function read($id) 
    {
        $row = $this->T_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id_barang' => $row->id_barang,
        		'nama_barang' => $row->nama_barang,
        		'deskripsi' => $row->deskripsi,
        		'id_gambar' => $row->id_gambar,
	    );
            $this->load->view('t_barang/t_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_barang/create_action'),
    	    'id_barang' => set_value('id_barang'),
    	    'nama_barang' => set_value('nama_barang'),
    	    'deskripsi' => set_value('deskripsi'),
    	    'id_gambar' => set_value('id_gambar'),
	);
        $this->load->view('t_barang/t_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'deskripsi' => $this->input->post('deskripsi',TRUE),
        		'id_gambar' => $this->input->post('id_gambar',TRUE),
	    );

            $this->T_barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_barang/update_action'),
        		'id_barang' => set_value('id_barang', $row->id_barang),
        		'nama_barang' => set_value('nama_barang', $row->nama_barang),
        		'deskripsi' => set_value('deskripsi', $row->deskripsi),
        		'id_gambar' => set_value('id_gambar', $row->id_gambar),
	    );
            $this->load->view('t_barang/t_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
        		'nama_barang' => $this->input->post('nama_barang',TRUE),
        		'deskripsi' => $this->input->post('deskripsi',TRUE),
        		'id_gambar' => $this->input->post('id_gambar',TRUE),
	    );

            $this->T_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_barang_model->get_by_id($id);

        if ($row) {
            $this->T_barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_barang'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
    	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
    	$this->form_validation->set_rules('id_gambar', 'id gambar', 'trim|required');

    	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T_barang.php */
/* Location: ./application/controllers/T_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-01-30 01:38:09 */
/* http://harviacode.com */