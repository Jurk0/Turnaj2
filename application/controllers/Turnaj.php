<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Turnaj extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Turnaj_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'turnaj/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'turnaj/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'turnaj/index.html';
            $config['first_url'] = base_url() . 'turnaj/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Turnaj_model->total_rows($q);
        $turnaj = $this->Turnaj_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'turnaj_data' => $turnaj,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('turnaj/turnaj_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Turnaj_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Názov_turnaju' => $row->Názov_turnaju,
		'Start_turnaja' => $row->Start_turnaja,
		'Mesto_idMesto' => $row->Mesto_idMesto,
	    );
            $this->load->view('turnaj/turnaj_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('turnaj'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('turnaj/create_action'),
	    'id' => set_value('id'),
	    'Názov_turnaju' => set_value('Názov_turnaju'),
	    'Start_turnaja' => set_value('Start_turnaja'),
	    'Mesto_idMesto' => set_value('Mesto_idMesto'),
	);
        $this->load->view('turnaj/turnaj_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Názov_turnaju' => $this->input->post('Názov_turnaju',TRUE),
		'Start_turnaja' => $this->input->post('Start_turnaja',TRUE),
		'Mesto_idMesto' => $this->input->post('Mesto_idMesto',TRUE),
	    );

            $this->Turnaj_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('turnaj'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Turnaj_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('turnaj/update_action'),
		'id' => set_value('id', $row->id),
		'Názov_turnaju' => set_value('Názov_turnaju', $row->Názov_turnaju),
		'Start_turnaja' => set_value('Start_turnaja', $row->Start_turnaja),
		'Mesto_idMesto' => set_value('Mesto_idMesto', $row->Mesto_idMesto),
	    );
            $this->load->view('turnaj/turnaj_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('turnaj'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Názov_turnaju' => $this->input->post('Názov_turnaju',TRUE),
		'Start_turnaja' => $this->input->post('Start_turnaja',TRUE),
		'Mesto_idMesto' => $this->input->post('Mesto_idMesto',TRUE),
	    );

            $this->Turnaj_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('turnaj'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Turnaj_model->get_by_id($id);

        if ($row) {
            $this->Turnaj_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('turnaj'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('turnaj'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Názov_turnaju', 'názov turnaju', 'trim|required');
	$this->form_validation->set_rules('Start_turnaja', 'start turnaja', 'trim|required');
	$this->form_validation->set_rules('Mesto_idMesto', 'mesto idmesto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

