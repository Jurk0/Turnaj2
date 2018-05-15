<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tym extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tym_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tym/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tym/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tym/index.html';
            $config['first_url'] = base_url() . 'tym/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tym_model->total_rows($q);
        $tym = $this->Tym_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tym_data' => $tym,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('tym/tym_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Tym_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Nazov' => $row->Nazov,
		'Poznamky' => $row->Poznamky,
		'Typ_hry_idTyp_hry' => $row->Typ_hry_idTyp_hry,
	    );
            $this->load->view('tym/tym_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('tym'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tym/create_action'),
	    'id' => set_value('id'),
	    'Nazov' => set_value('Nazov'),
	    'Poznamky' => set_value('Poznamky'),
	    'Typ_hry_idTyp_hry' => set_value('Typ_hry_idTyp_hry'),
	);
        $this->load->view('tym/tym_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nazov' => $this->input->post('Nazov',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Typ_hry_idTyp_hry' => $this->input->post('Typ_hry_idTyp_hry',TRUE),
	    );

            $this->Tym_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('tym'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tym_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('tym/update_action'),
		'id' => set_value('id', $row->id),
		'Nazov' => set_value('Nazov', $row->Nazov),
		'Poznamky' => set_value('Poznamky', $row->Poznamky),
		'Typ_hry_idTyp_hry' => set_value('Typ_hry_idTyp_hry', $row->Typ_hry_idTyp_hry),
	    );
            $this->load->view('tym/tym_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('tym'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Nazov' => $this->input->post('Nazov',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Typ_hry_idTyp_hry' => $this->input->post('Typ_hry_idTyp_hry',TRUE),
	    );

            $this->Tym_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('tym'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tym_model->get_by_id($id);

        if ($row) {
            $this->Tym_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('tym'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('tym'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nazov', 'nazov', 'trim|required');
	$this->form_validation->set_rules('Poznamky', 'poznamky', 'trim|required');
	$this->form_validation->set_rules('Typ_hry_idTyp_hry', 'typ hry idtyp hry', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

