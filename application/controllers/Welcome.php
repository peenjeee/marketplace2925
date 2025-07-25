<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$inputan = $this->input->post();
		$this->form_validation->set_rules('email_member', 'Email Member', 'required');
		$this->form_validation->set_rules('password_member', 'Password', 'required');
		$this->form_validation->set_message('required', '%s wajib diisi');

		if ($this->form_validation->run() == TRUE) {
			$this->load->model('Mmember');
			$output = $this->Mmember->login($inputan);
			if ($output == "ada") {
				$this->session->set_flashdata('pesan_sukses', 'Berhasil Login');
				redirect('home', 'refresh');
			} else {
				$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
				redirect('/', 'refresh');
			}
		}

		$this->load->model('Mslider');
		$this->load->model('Mkategori');
		$this->load->model('Mproduk');
		$this->load->model('Martikel');
		$data['slider'] = $this->Mslider->tampil();
		$data['kategori'] = $this->Mkategori->tampil_terbaru();
		$data['produk'] = $this->Mproduk->tampil_produk_terbaru();
		$data['artikel'] = $this->Martikel->tampil_artikel_terbaru();
		$this->load->view('header');
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	}
}
