<?php

class Access extends CI_Controller {
    private $id_user;
    private $user_name;
    

    public function __construct(){
        parent::__construct();       
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';       

    }


    public function index()
    {
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'budget_actual' => $this->budget_actual,
            );
            $this->load->view("home_view", $data);
        }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }
    }

    public function login_user(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        if ($user_login) {
            redirect('access', 'refresh');
        }

        $usuario = $this->input->post('email_user');
        $password = $this->input->post('pass_user');
        $valid_user = $this->access_model->login($usuario,$password);

        if ($valid_user != -1 && !empty($valid_user)) {

            $datos_cookie['login'] = true;
            $datos_cookie['id_user'] = intval($valid_user['id_user']);
            $datos_cookie['name_user'] = $valid_user['name_user'];
            $datos_cookie['budget_actual'] = $valid_user['budget_actual'];
            $datos_cookie['budget_events_actual'] = $valid_user['budget_events_actual'];
            $datos_cookie['budget_gif_premium_actual'] = $valid_user['budget_gif_premium_actual'];
            $datos_cookie['budget_merchandising_actual'] = $valid_user['budget_merchandising_actual'];
            $datos_cookie['job_user'] = $valid_user['job_user'];
            $datos_cookie['address_user'] = $valid_user['address_user'];
            $datos_cookie['city_user'] = $valid_user['city_user'];
            $datos_cookie['department_user'] = $valid_user['department_user'];
            $datos_cookie['email_user'] = $valid_user['email_user'];
            $datos_cookie['id_profile'] = $valid_user['id_profile'];

            $this->session->set_userdata($datos_cookie);

            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'budget_actual' => $this->budget_actual,
            );

            if ($this->session->userdata('id_profile') == 6) {
                redirect('provider');
            }

            if ($this->session->userdata('id_profile') == 14) {
                redirect('purchases/purchases_list');
            }

            $this->load->view("home_view", $data);

            //     if ($profile == 6 || $profile == 9) {
            //         return 2;
            //     }elseif ($profile == 10 || $profile == 7) {
            //         return 3;
            //     }elseif ($profile == 11 || $profile == 8) {
            //         return 4;
            //     }
            //
            // return 1;
        }else {
            $data = array(
                'user_login' => -1,
            );
            $this->load->view("login", $data);
        }

    }


    public function logout(){
		$this->session->sess_destroy();
        $this->session->set_userdata('login', false);
		redirect('access', 'refresh');
	}

    public function acceso_denegado()
    {
        $datos = array(
            'id_user' => $this->id_user,
            'user_name' => $this->user_name,
            'budget_actual' => $this->budget_actual,
            'titulo' => "CMS | Acceso denegado",
            'contenido' => 'acceso'
        );
        $this->load->view("plantillas/plantilla", $datos);

    }



}

?>
