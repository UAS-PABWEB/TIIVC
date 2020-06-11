<?php

class Kategori extends CI_Controller{
    public function cokelat()
    {
        $data['cokelat'] = $this->model_kategori->data_cokelat()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('cokelat',$data);
        $this->load->view('templates/footer');
    }

    public function karakter()
    {
        $data['karakter'] = $this->model_kategori->data_karakter()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('karakter',$data);
        $this->load->view('templates/footer');
    }

    public function pelangi()
    {
        $data['pelangi'] = $this->model_kategori->data_pelangi()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pelangi',$data);
        $this->load->view('templates/footer');
    }
}