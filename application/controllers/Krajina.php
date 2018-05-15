<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Krajina extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Krajina_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'krajina/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'krajina/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'krajina/index.html';
            $config['first_url'] = base_url() . 'krajina/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Krajina_model->total_rows($q);
        $krajina = $this->Krajina_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'krajina_data' => $krajina,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$this->load->view('templates/header');
		$this->load->view('templates/navigation');
		$this->load->view('krajina/krajina_list', $data);
		$this->load->view('templates/footer');

    }

    public function read($id) 
    {
        $row = $this->Krajina_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'Nazov_krajiny' => $row->Nazov_krajiny,
	    );
            $this->load->view('krajina/krajina_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('krajina'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Vytvoriť',
            'action' => site_url('krajina/create_action'),
	    'id' => set_value('id'),
	    'Nazov_krajiny' => set_value('Nazov_krajiny'),
	);
        $this->load->view('krajina/krajina_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nazov_krajiny' => $this->input->post('Nazov_krajiny',TRUE),
	    );

            $this->Krajina_model->insert($data);
            $this->session->set_flashdata('message', 'Vytvorenie úspešné!');
            redirect(site_url('krajina'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Krajina_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Upraviť',
                'action' => site_url('krajina/update_action'),
		'id' => set_value('id', $row->id),
		'Nazov_krajiny' => set_value('Nazov_krajiny', $row->Nazov_krajiny),
	    );
            $this->load->view('krajina/krajina_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('krajina'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'Nazov_krajiny' => $this->input->post('Nazov_krajiny',TRUE),
	    );

            $this->Krajina_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Upravenie úspešné!');
            redirect(site_url('krajina'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Krajina_model->get_by_id($id);

        if ($row) {
            $this->Krajina_model->delete($id);
            $this->session->set_flashdata('message', 'Vymazanie úspešné!');
            redirect(site_url('krajina'));
        } else {
            $this->session->set_flashdata('message', 'Záznam sa nenašiel!');
            redirect(site_url('krajina'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nazov_krajiny', 'nazov krajiny', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
