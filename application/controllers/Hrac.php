<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hrac extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hrac_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hrac/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hrac/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hrac/index.html';
            $config['first_url'] = base_url() . 'hrac/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Hrac_model->total_rows($q);
        $hrac = $this->Hrac_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'hrac_data' => $hrac,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('hrac/hrac_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Hrac_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Meno' => $row->Meno,
		'Priezvisko' => $row->Priezvisko,
		'Vek' => $row->Vek,
		'Poznamky' => $row->Poznamky,
		'Mesto_idMesto' => $row->Mesto_idMesto,
		'Tym_id' => $row->Tym_id,
	    );
            $this->load->view('hrac/hrac_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('hrac'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hrac/create_action'),
	    'id' => set_value('id'),
	    'Meno' => set_value('Meno'),
	    'Priezvisko' => set_value('Priezvisko'),
	    'Vek' => set_value('Vek'),
	    'Poznamky' => set_value('Poznamky'),
	    'Mesto_idMesto' => set_value('Mesto_idMesto'),
	    'Tym_id' => set_value('Tym_id'),
	);
        $this->load->view('hrac/hrac_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Meno' => $this->input->post('Meno',TRUE),
		'Priezvisko' => $this->input->post('Priezvisko',TRUE),
		'Vek' => $this->input->post('Vek',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Mesto_idMesto' => $this->input->post('Mesto_idMesto',TRUE),
		'Tym_id' => $this->input->post('Tym_id',TRUE),
	    );

            $this->Hrac_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('hrac'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hrac_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('hrac/update_action'),
		'id' => set_value('id', $row->id),
		'Meno' => set_value('Meno', $row->Meno),
		'Priezvisko' => set_value('Priezvisko', $row->Priezvisko),
		'Vek' => set_value('Vek', $row->Vek),
		'Poznamky' => set_value('Poznamky', $row->Poznamky),
		'Mesto_idMesto' => set_value('Mesto_idMesto', $row->Mesto_idMesto),
		'Tym_id' => set_value('Tym_id', $row->Tym_id),
	    );
            $this->load->view('hrac/hrac_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('hrac'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Meno' => $this->input->post('Meno',TRUE),
		'Priezvisko' => $this->input->post('Priezvisko',TRUE),
		'Vek' => $this->input->post('Vek',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Mesto_idMesto' => $this->input->post('Mesto_idMesto',TRUE),
		'Tym_id' => $this->input->post('Tym_id',TRUE),
	    );

            $this->Hrac_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('hrac'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hrac_model->get_by_id($id);

        if ($row) {
            $this->Hrac_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('hrac'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('hrac'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Meno', 'meno', 'trim|required');
	$this->form_validation->set_rules('Priezvisko', 'priezvisko', 'trim|required');
	$this->form_validation->set_rules('Vek', 'vek', 'trim|required');
	$this->form_validation->set_rules('Poznamky', 'poznamky', 'trim|required');
	$this->form_validation->set_rules('Mesto_idMesto', 'mesto idmesto', 'trim|required');
	$this->form_validation->set_rules('Tym_id', 'tym id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

