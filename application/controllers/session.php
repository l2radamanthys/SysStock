<?php


/*
 * Vista Para Manejar las Sessiones de Usuarios
 */
class Session extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        
    }
    
    function index()
    {
        echo "hola";
    }
    
    
    function login() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        #defino reglas para los campos de formulario
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');
        
        $data = array(
            'page_title' => 'Iniciar Session',
        );
        
        if (!$this->auth->user_is_logged()) 
        {
            if ($this->form_validation->run() !== FALSE)
            {
                $user = $this->input->post('username');
                $pswrd = $this->input->post('password');
                $data['custom_error'] = "podyt";
                if ($this->auth->user_login($user, $pswrd)) 
                {
                    redirect(base_url());
                }   
                else 
                {
                    $data['custom_error'] = "usuario o contraseña invalidos";
                    
                    $this->load->view('header', $data);
                    $this->load->view('user_menu/not-login');
                    $this->load->view('session/login', $data);
                    $this->load->view('footer');  
                }
            }            
            
            else {
                $this->load->view('header', $data);
                $this->load->view('user_menu/not-login');
                $this->load->view('session/login', $data);
                $this->load->view('footer');
            }   
        }
        
        else 
        {
            redirect(base_url()); #cambiar por la home  
        }
    }
    
    
    public function test_login()
    {
        
        if($this->auth->user_is_logged() === FALSE)
        {
            echo "Usuario No logueado";
        }
        else 
        {
            echo "<p>Usr: ".$this->auth->user_is_logged()."</p>";
            echo "<p>Nombre: ".$this->auth->user_get_name()."</p>";
            echo "<p>rol: ".$this->auth->user_get_role()."</p>"; 
        }
    }
    
    
    
    function logout() 
    {
        $this->auth->user_logout();
        redirect('/session/login');
      
    } 
    
    
    function register()
    {
        
    }
    
    
    function change_password()
    {
        
    }
}
