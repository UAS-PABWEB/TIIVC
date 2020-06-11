<?php

class Model_kategori extends CI_Model{

        public function data_cokelat(){
            return $this->db->get_where("tb_produk", array('kategori' => 'cokelat'));
        }

        public function data_karakter(){
            return $this->db->get_where("tb_produk", array('kategori' => 'karakter'));
        }

        public function data_pelangi(){
            return $this->db->get_where("tb_produk", array('kategori' => 'pelangi'));
        }

}