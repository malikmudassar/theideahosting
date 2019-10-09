<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        if($this->isLoggedIn())
        {
            // 
            $data['title']='Admin Panel';
            $data['servers']=$this->admin_model->getServersInfo();
            // echo '<pre>';print_r($data);exit;
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_menu()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addMenuItem($_POST);
                    $data['success']='Congratulations! Menu Item Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_admin_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_admin_menu()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delAdminMenu($menuId);
        redirect(base_url().'admin/manage_admin_menu');
    }
    public function manage_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllMenuItems();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_admin_menu');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

    public function add_server()
    {
        $data['title']='Add Server';
        if($_POST)
        {
            if(!$this->validateIp($_POST['ip']))
            {
                $data['errors']='Invalid IP address format, please provide a valid IP address';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_server');
                $this->load->view('static/footer');
            }
            else
            {
                $this->admin_model->addServer($_POST);
                $data['success']='Congratulations! Server added successfully';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_server');
                $this->load->view('static/footer');
            }
        }
        else
        {
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/add_server');
            $this->load->view('static/footer');
        }
        
    }
    
    public function edit_server()
    {
        $data['title']='Edit Server';
        $id=$this->uri->segment(3);
        $data['server']=$this->admin_model->getAllById('servers', $id);
        if($_POST)
        {
            if(!$this->validateIp($_POST['ip']))
            {
                $data['errors']='Invalid IP address format, please provide a valid IP address';
                $data['server']=$this->admin_model->getAllById('servers', $id);
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_server');
                $this->load->view('static/footer');
            }
            else
            {
                $this->admin_model->updateServer($id, $_POST);
                $data['success']='Congratulations! Server Updated successfully';
                $data['server']=$this->admin_model->getAllById('servers', $id);
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_server');
                $this->load->view('static/footer');
            }
        }
        else
        {
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/edit_server');
            $this->load->view('static/footer');
        }
        
    }
    public function del_server()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('servers',$menuId);
        $this->session->set_flashdata('success', 'Server Deleted');
        redirect(base_url().'admin/manage_servers');
    }
    public function manage_servers()
    {
        if($this->isLoggedIn())
        {
            $data['menu_items']=$this->admin_model->getAll('servers');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_servers');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function validateIp($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }

    public function add_module()
    {
        if($this->isLoggedIn())
        {
            
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'cpu',
                        'label' =>  'CPU',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'ram',
                        'label' =>  'RAM',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'storage',
                        'label' =>  'Storage',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_module');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addModule($_POST);
                    $data['success']='Congratulations! Module Added Successfully';
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_module');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_module');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function assign_server_module()
    {
        $data['servers']=$this->admin_model->getAll('servers');
        $data['modules']=$this->admin_model->getAll('modules');
        if($this->isLoggedIn())
        {
            
            if($_POST)
            {
                $this->admin_model->assignModule($_POST);
                $data['success']='Congratulations! Module assigned successfully';
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/assign_server_module');
                $this->load->view('static/footer');
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/assign_server_module');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function grant_access()
    {
        $data['title']='Grant Access';
        $this->load->view('static/head',$data);
        $this->load->view('static/header');
        $this->load->view('static/sidebar');
        $this->load->view('admin/coming_soon');
        $this->load->view('static/footer');
    }

    public function manage_server_modules()
    {
        $id=$this->uri->segment(3);
        if($this->isLoggedIn())
        {
            $data['server']=$this->admin_model->getAllById('servers', $id);
            $data['server_modules']=$this->admin_model->getServerModules($id);
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_server_modules');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }        

    }
    public function del_server_module()
    {
        $module=$this->uri->segment(3);
        $server=$this->uri->segment(4);
        $this->admin_model->delServerModule($module, $server);
        $this->session->set_flashdata('success', 'Module Deleted');
        redirect(base_url().'admin/manage_server_modules/'.$server);
    }
    public function edit_module()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu_item']=$this->admin_model->getSingleItem('modules',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['menu_item']=$this->admin_model->getSingleItem('modules',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_module');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateModule($menuId,$_POST);
                    $data['success']='Congratulations! Module Updated Successfully';
                    $data['menu_item']=$this->admin_model->getSingleItem('modules',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_module');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_module');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_module()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('modules',$menuId);
        $this->session->set_flashdata('success', 'Module Deleted');
        redirect(base_url().'admin/manage_modules');
    }
    public function manage_modules()
    {
        if($this->isLoggedIn())
        {
            $data['menu_items']=$this->admin_model->getAll('modules');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_modules');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function add_user()
    {
        if($this->isLoggedIn())
        {
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'email',
                        'label' =>  'Email',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'password',
                        'label' =>  'Password',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'conf_password',
                        'label' =>  'Confirm Password',
                        'rules' =>  'trim|required|matches[password]'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_user');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addUser($_POST);
                    $data['success']='Congratulations! User Added Successfully';
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_user');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_user');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_user()
    {
        $id=$this->uri->segment(3);
        $data['user']=$this->admin_model->getAllById('users', $id);
        if($this->isLoggedIn())
        {
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'email',
                        'label' =>  'Email',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Admin Panel';
                    $data['user']=$this->admin_model->getAllById('users', $id);
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_user');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateUser($id,$_POST);
                    $data['success']='Congratulations! User Updated Successfully';
                    $data['user']=$this->admin_model->getAllById('users', $id);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_user');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_user');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function manage_users()
    {
        if($this->isLoggedIn())
        {
            $data['menu_items']=$this->admin_model->getAll('users');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_users');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    // Language Section Ends

    public function isLoggedIn()
    {
        if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    

}
?>
