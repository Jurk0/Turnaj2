<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zapas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Zapas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'zapas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'zapas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'zapas/index.html';
            $config['first_url'] = base_url() . 'zapas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Zapas_model->total_rows($q);
        $zapas = $this->Zapas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'zapas_data' => $zapas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('zapas/zapas_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Zapas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Tym1' => $row->Tym1,
		'Tym2' => $row->Tym2,
		'Start_zapasu' => $row->Start_zapasu,
		'Vysledok' => $row->Vysledok,
		'Poznamky' => $row->Poznamky,
		'Turnaj_idTurnaj' => $row->Turnaj_idTurnaj,
	    );
            $this->load->view('zapas/zapas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('zapas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Vytvoriť',
            'action' => site_url('zapas/create_action'),
	    'id' => set_value('id'),
	    'Tym1' => set_value('Tym1'),
	    'Tym2' => set_value('Tym2'),
	    'Start_zapasu' => set_value('Start_zapasu'),
	    'Vysledok' => set_value('Vysledok'),
	    'Poznamky' => set_value('Poznamky'),
	    'Turnaj_idTurnaj' => set_value('Turnaj_idTurnaj'),
	);
        $this->load->view('zapas/zapas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Tym1' => $this->input->post('Tym1',TRUE),
		'Tym2' => $this->input->post('Tym2',TRUE),
		'Start_zapasu' => $this->input->post('Start_zapasu',TRUE),
		'Vysledok' => $this->input->post('Vysledok',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Turnaj_idTurnaj' => $this->input->post('Turnaj_idTurnaj',TRUE),
	    );

            $this->Zapas_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('zapas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Zapas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('zapas/update_action'),
		'id' => set_value('id', $row->id),
		'Tym1' => set_value('Tym1', $row->Tym1),
		'Tym2' => set_value('Tym2', $row->Tym2),
		'Start_zapasu' => set_value('Start_zapasu', $row->Start_zapasu),
		'Vysledok' => set_value('Vysledok', $row->Vysledok),
		'Poznamky' => set_value('Poznamky', $row->Poznamky),
		'Turnaj_idTurnaj' => set_value('Turnaj_idTurnaj', $row->Turnaj_idTurnaj),
	    );
            $this->load->view('zapas/zapas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('zapas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Tym1' => $this->input->post('Tym1',TRUE),
		'Tym2' => $this->input->post('Tym2',TRUE),
		'Start_zapasu' => $this->input->post('Start_zapasu',TRUE),
		'Vysledok' => $this->input->post('Vysledok',TRUE),
		'Poznamky' => $this->input->post('Poznamky',TRUE),
		'Turnaj_idTurnaj' => $this->input->post('Turnaj_idTurnaj',TRUE),
	    );

            $this->Zapas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('zapas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Zapas_model->get_by_id($id);

        if ($row) {
            $this->Zapas_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('zapas'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('zapas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Tym1', 'tym1', 'trim|required');
	$this->form_validation->set_rules('Tym2', 'tym2', 'trim|required');
	$this->form_validation->set_rules('Start_zapasu', 'start zapasu', 'trim|required');
	$this->form_validation->set_rules('Vysledok', 'vysledok', 'trim|required');
	$this->form_validation->set_rules('Poznamky', 'poznamky', 'trim|required');
	$this->form_validation->set_rules('Turnaj_idTurnaj', 'turnaj idturnaj', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

