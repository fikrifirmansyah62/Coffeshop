
<?php
    class Login_cus extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('cus_m_login');
        }

        public function index(){
            $this->load->view('login_mem');
        }

        public function login_aksi(){
        $users = $this->input->post('email', true);
        $pass = md5($this->input->post('password', true));

        // rule validasi
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $where = array (
                'email' => $users,
                'password' => $pass
            );

            $ceklogin = $this->cus_m_login->cek_login($where)->num_rows();
            if ($ceklogin == 0) {
                $this->session->set_flashdata('notification', '<b>EMAIL ATAU PASSWORD SALAH</b>');
				redirect(site_url('login_cus'));
             } else if ($ceklogin > 0) {
                $sess_data = array(
                    
                    'email' => $users,
                    'login' => 'OK'
                );
				$this->session->set_flashdata('notification', '<b> Sukses</b>');
                $this->session->set_userdata($sess_data);
                redirect(base_url('home'));
            } else {
                redirect(base_url('Login_cus'));
            }
        } else {
            $this->session->set_flashdata('notification', '<b> SILAHKAN MASUKAN EMAIL DAN PASSWORD ANDA</b>');
			$this->load->view('login_mem');
            redirect(base_url('Login_cus'));
        }
        }
    }
?>
