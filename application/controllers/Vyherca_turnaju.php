<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vyherca_turnaju extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vyherca_turnaju_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'vyherca_turnaju/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'vyherca_turnaju/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'vyherca_turnaju/index.html';
            $config['first_url'] = base_url() . 'vyherca_turnaju/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Vyherca_turnaju_model->total_rows($q);
        $vyherca_turnaju = $this->Vyherca_turnaju_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'vyherca_turnaju_data' => $vyherca_turnaju,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('vyherca_turnaju/vyherca_turnaju_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Vyherca_turnaju_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Tym_idTym' => $row->Tym_idTym,
		'Turnaj_idTurnaj' => $row->Turnaj_idTurnaj,
	    );
            $this->load->view('vyherca_turnaju/vyherca_turnaju_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('vyherca_turnaju'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Vytvoriť',
            'action' => site_url('vyherca_turnaju/create_action'),
	    'id' => set_value('id'),
	    'Tym_idTym' => set_value('Tym_idTym'),
	    'Turnaj_idTurnaj' => set_value('Turnaj_idTurnaj'),
	);
        $this->load->view('vyherca_turnaju/vyherca_turnaju_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Tym_idTym' => $this->input->post('Tym_idTym',TRUE),
		'Turnaj_idTurnaj' => $this->input->post('Turnaj_idTurnaj',TRUE),
	    );

            $this->Vyherca_turnaju_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('vyherca_turnaju'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Vyherca_turnaju_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('vyherca_turnaju/update_action'),
		'id' => set_value('id', $row->id),
		'Tym_idTym' => set_value('Tym_idTym', $row->Tym_idTym),
		'Turnaj_idTurnaj' => set_value('Turnaj_idTurnaj', $row->Turnaj_idTurnaj),
	    );
            $this->load->view('vyherca_turnaju/vyherca_turnaju_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('vyherca_turnaju'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Tym_idTym' => $this->input->post('Tym_idTym',TRUE),
		'Turnaj_idTurnaj' => $this->input->post('Turnaj_idTurnaj',TRUE),
	    );

            $this->Vyherca_turnaju_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('vyherca_turnaju'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Vyherca_turnaju_model->get_by_id($id);

        if ($row) {
            $this->Vyherca_turnaju_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('vyherca_turnaju'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('vyherca_turnaju'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Tym_idTym', 'tym idtym', 'trim|required');
	$this->form_validation->set_rules('Turnaj_idTurnaj', 'turnaj idturnaj', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

