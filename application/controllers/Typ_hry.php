<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Typ_hry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Typ_hry_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'typ_hry/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'typ_hry/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'typ_hry/index.html';
            $config['first_url'] = base_url() . 'typ_hry/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Typ_hry_model->total_rows($q);
        $typ_hry = $this->Typ_hry_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'typ_hry_data' => $typ_hry,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('typ_hry/typ_hry_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Typ_hry_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Typ_hry' => $row->Typ_hry,
		'Nazov_hry' => $row->Nazov_hry,
	    );
            $this->load->view('typ_hry/typ_hry_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('typ_hry'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('typ_hry/create_action'),
	    'id' => set_value('id'),
	    'Typ_hry' => set_value('Typ_hry'),
	    'Nazov_hry' => set_value('Nazov_hry'),
	);
        $this->load->view('typ_hry/typ_hry_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Typ_hry' => $this->input->post('Typ_hry',TRUE),
		'Nazov_hry' => $this->input->post('Nazov_hry',TRUE),
	    );

            $this->Typ_hry_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('typ_hry'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Typ_hry_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('typ_hry/update_action'),
		'id' => set_value('id', $row->id),
		'Typ_hry' => set_value('Typ_hry', $row->Typ_hry),
		'Nazov_hry' => set_value('Nazov_hry', $row->Nazov_hry),
	    );
            $this->load->view('typ_hry/typ_hry_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('typ_hry'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Typ_hry' => $this->input->post('Typ_hry',TRUE),
		'Nazov_hry' => $this->input->post('Nazov_hry',TRUE),
	    );

            $this->Typ_hry_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('typ_hry'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Typ_hry_model->get_by_id($id);

        if ($row) {
            $this->Typ_hry_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('typ_hry'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('typ_hry'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Typ_hry', 'typ hry', 'trim|required');
	$this->form_validation->set_rules('Nazov_hry', 'nazov hry', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

