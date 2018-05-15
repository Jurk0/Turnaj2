<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mesto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mesto_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'mesto/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'mesto/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'mesto/index.html';
            $config['first_url'] = base_url() . 'mesto/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mesto_model->total_rows($q);
        $mesto = $this->Mesto_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'mesto_data' => $mesto,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('mesto/mesto_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Mesto_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Nazov_mesta' => $row->Nazov_mesta,
		'Krajina_idKrajina' => $row->Krajina_idKrajina,
	    );
            $this->load->view('mesto/mesto_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('mesto'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('mesto/create_action'),
	    'id' => set_value('id'),
	    'Nazov_mesta' => set_value('Nazov_mesta'),
	    'Krajina_idKrajina' => set_value('Krajina_idKrajina'),
	);
        $this->load->view('mesto/mesto_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nazov_mesta' => $this->input->post('Nazov_mesta',TRUE),
		'Krajina_idKrajina' => $this->input->post('Krajina_idKrajina',TRUE),
	    );

            $this->Mesto_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('mesto'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mesto_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Vytvoriť',
                'action' => site_url('mesto/update_action'),
		'id' => set_value('id', $row->id),
		'Nazov_mesta' => set_value('Nazov_mesta', $row->Nazov_mesta),
		'Krajina_idKrajina' => set_value('Krajina_idKrajina', $row->Krajina_idKrajina),
	    );
            $this->load->view('mesto/mesto_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('mesto'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Nazov_mesta' => $this->input->post('Nazov_mesta',TRUE),
		'Krajina_idKrajina' => $this->input->post('Krajina_idKrajina',TRUE),
	    );

            $this->Mesto_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('mesto'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mesto_model->get_by_id($id);

        if ($row) {
            $this->Mesto_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('mesto'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('mesto'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nazov_mesta', 'nazov mesta', 'trim|required');
	$this->form_validation->set_rules('Krajina_idKrajina', 'krajina idkrajina', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

