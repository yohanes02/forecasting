<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengguna_model');
        $this->load->helper('aw_helper');
        $this->load->library(array('form_validation'));
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {


            $d['pengguna'] = $this->Pengguna_model->tampil_data();
            $this->load->view('manager/user/data_pengguna', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function tambah()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {
            $d['id_param'] = "";
            $d['username'] = "";
            $d['password'] = "";
            $d['nama_lengkap'] = "";
            $d['foto'] = "";
            $d['level'] = "";

            $d['st'] = "tambah";

            $this->load->view('manager/user/tambah', $d);
        } else {
            redirect('auth/logout');
        }
    }

    public function hapus($id)
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $this->Pengguna_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger background-danger" role="alert"> 
            Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fa fa-close"></i></button></div>');

            redirect(site_url('manager/pengguna'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger background-danger" role="alert"> 
                Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fa fa-close"></i></button></div>');

            redirect(site_url('manager/pengguna'));
        }
    }

    public function simpan()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $this->form_validation->set_rules('username', 'Username', 'trim|required');

            $id['id_user'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");

            if ($this->form_validation->run() == FALSE) {
                $st = $this->input->post('st');

                if ($st == "tambah") {
                    $d['id_param'] = "";
                    $d['username'] = "";
                    $d['password'] = "";
                    $d['nama_lengkap'] = "";
                    $d['foto'] = "";
                    $d['level'] = "";

                    $d['st'] = "tambah";

                    $this->db->get('users');

                    $this->template->load('manager/user/tambah', $d);
                }
            } else {
                $st = $this->input->post('st');
                if ($st == "tambah") {
                    $in['username'] = $this->input->post('username');
                    $in['password'] = MD5($this->input->post('password'));
                    $in['nama_lengkap'] = $this->input->post('nama_lengkap');
                    $in['level'] = $this->input->post('level');

                    if (!empty($_FILES['userfile']['name'])) {
                        $bersih = $_FILES['userfile']['name'];
                        $nm = str_replace(" ", "_", "$bersih");
                        $pisah = explode(".", $nm);
                        $nama_murni = date('Ymd-His');
                        $ekstensi_kotor = $pisah[1];
                        $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                        $file_type_baru = strtolower($file_type);

                        $ubah = $nama_murni; //tanpa ekstensi
                        $n_baru = $ubah . '.' . $file_type_baru;

                        $config['upload_path']    = "./assets/file_user";
                        $config['allowed_types'] = 'gif|jpg|png|jpeg';
                        $config['file_name'] = $n_baru;
                        $config['max_size']     = '0';
                        $config['max_width']      = '0';
                        $config['max_height']      = '0';

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload("userfile")) {
                            $data         = $this->upload->data();

                            /* PATH */
                            $source             = "./assets/file_user/" . $data['file_name'];
                            $destination_thumb    = "./assets/file_user/thumb/";
                            $destination_medium    = "./assets/file_user/medium/";

                            // Permission Configuration
                            chmod($source, 0777);

                            /* Resizing Processing */
                            // Configuration Of Image Manipulation :: Static
                            $this->load->library('image_lib');
                            $img['image_library'] = 'GD2';
                            $img['create_thumb']  = TRUE;
                            $img['maintain_ratio'] = TRUE;

                            /// Limit Width Resize
                            $limit_medium   = 425;
                            $limit_thumb    = 220;

                            // Size Image Limit was using (LIMIT TOP)
                            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];

                            // Percentase Resize
                            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                                $percent_medium = $limit_medium / $limit_use;
                                $percent_thumb  = $limit_thumb / $limit_use;
                            }

                            //// Making THUMBNAIL ///////
                            $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'];
                            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'];

                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%';
                            $img['source_image'] = $source;
                            $img['new_image']    = $destination_thumb;

                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear();

                            ////// Making MEDIUM /////////////
                            $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'];
                            $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'];

                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%';
                            $img['source_image'] = $source;
                            $img['new_image']    = $destination_medium;

                            $in['foto'] = $data['file_name'];

                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                        }
                    }

                    $this->db->insert("users", $in);

                    $this->session->set_flashdata('message', '<div class="alert alert-success background-success" role="alert"> 
                    Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close"></i></button></div>');

                    redirect('manager/pengguna');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success background-success" role="alert"> 
            Data Gagal ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="fa fa-close"></i></button></div>');

            redirect('manager/pengguna');
        }
    }

    public function edit()
    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {
            $id['id_user'] = $this->uri->segment(4);
            $q = $this->db->get_where("users", $id);
            $d = array();
            foreach ($q->result() as $dt) {

                $d['id_param'] = $dt->id_user;
                $d['username'] = $dt->username;
                $d['password'] = $dt->password;
                $d['nama_lengkap'] = $dt->nama_lengkap;
                $d['foto'] = $dt->foto;
                $d['level'] = $dt->level;
            }

            $d['st'] = "edit";

            $this->load->view('manager/user/edit_pengguna', $d);
        } else {
            redirect('manager/pengguna');
        }
    }

    public function simpan_ubah()

    {
        if ($this->session->userdata('logged_in') != "" && $this->session->userdata('level') == "Manager") {

            $id['id_user'] = $this->input->post("id_param");
            $pwd = $this->input->post('password');

            $st = $this->input->post('st');
            if ($st == "edit") {
                $upd['username'] = $this->input->post('username');
                $upd['nama_lengkap'] = $this->input->post('nama_lengkap');
                $upd['level'] = $this->input->post('level');

                if (!empty($pwd)) {
                    $upd['password'] = MD5($this->input->post('password'));
                }

                if (!empty($_FILES['userfile']['name'])) {
                    $acak = rand(00000000000, 99999999999);
                    $bersih = $_FILES['userfile']['name'];
                    $nm = str_replace(" ", "_", "$bersih");
                    $pisah = explode(".", $nm);
                    $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1", $pisah[0]);
                    $nama_murni = date('Ymd-His');
                    $ekstensi_kotor = $pisah[1];

                    $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                    $file_type_baru = strtolower($file_type);

                    $ubah = $nama_murni; //tanpa ekstensi
                    $n_baru = $ubah . '.' . $file_type_baru;

                    $config['upload_path']    = "./assets/file_user/";
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = $n_baru;
                    $config['max_size']     = '0';
                    $config['max_width']      = '0';
                    $config['max_height']      = '0';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload("userfile")) {
                        $data         = $this->upload->data();

                        /* PATH */
                        $source             = "./assets/file_user/" . $data['file_name'];
                        $destination_thumb    = "./assets/file_user/thumb/";
                        $destination_medium    = "./assets/file_user/medium/";

                        // Permission Configuration
                        chmod($source, 0777);

                        /* Resizing Processing */
                        // Configuration Of Image Manipulation :: Static
                        $this->load->library('image_lib');
                        $img['image_library'] = 'GD2';
                        $img['create_thumb']  = TRUE;
                        $img['maintain_ratio'] = TRUE;

                        /// Limit Width Resize
                        $limit_medium   = 425;
                        $limit_thumb    = 220;

                        // Size Image Limit was using (LIMIT TOP)
                        $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'];

                        // Percentase Resize
                        if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                            $percent_medium = $limit_medium / $limit_use;
                            $percent_thumb  = $limit_thumb / $limit_use;
                        }

                        //// Making THUMBNAIL ///////
                        $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'];
                        $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'];

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality']      = '100%';
                        $img['source_image'] = $source;
                        $img['new_image']    = $destination_thumb;

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear();

                        ////// Making MEDIUM /////////////
                        $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'];
                        $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'];

                        // Configuration Of Image Manipulation :: Dynamic
                        $img['thumb_marker'] = '';
                        $img['quality']      = '100%';
                        $img['source_image'] = $source;
                        $img['new_image']    = $destination_medium;

                        $upd['foto'] = $data['file_name'];

                        // Do Resizing
                        $this->image_lib->initialize($img);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                }

                $this->db->update("users", $upd, $id);

                $this->session->set_flashdata('message', '<div class="alert alert-success background-success" role="alert"> 
                Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fa fa-close"></i></button></div>');

                redirect('manager/pengguna');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger background-danger" role="alert"> 
                Data Gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="fa fa-close"></i></button></div>');

            redirect('manager/pengguna');
        }
    }
}
