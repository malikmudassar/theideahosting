<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 8/2/2016
 * Time: 3:48 PM
 */
class Admin_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function checkUser($data)
    {
        $st=$this->db->select('*')->from('users')
            ->WHERE('email',$data['email'])
            ->WHERE('password',md5(sha1($data['password'])))
            ->get()->result_array();
        if(count($st)>0)
        {
            return $st[0];
        }
        else
        {
            return false;
        }
    }
    public function addUser($data)
    {
        $item=array(
            'name'  => $data['name'],
            'email' =>  $data['email'],
            'password'  => md5(sha1($data['password'])),
            'role'  => 1
        );
        $this->db->insert('users', $item);
    }

    public function updateUser($id, $data)
    {
        $item=array(
            'name'  => $data['name'],
            'email' =>  $data['email']
        );
        $this->db->where('id', $id)->update('users'. $item);
    }

    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }
    public function getAllById($table,$id)
    {
        $st= $this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }

    /////////////////////////////////////

    public function addSingleItem($table, $data)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->insert($table,$item);
    }

    public function delSingleItem($table, $id)
    {
        $this->db->query('DELETE from '.$table.' where id='.$id);
    }

    public function updateSingleItem($table, $data, $id)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->WHERE('id',$id)->update($table,$item);
    }

    public function getSingleItem($table, $id)
    {
        $st=$this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }
   
    public function addServer($data)
    {
        $item=array(
            'hostname'=>$data['hostname'],
            'code'=>$data['code'],
            'ip'=>$data['ip'],
            'location'=>$data['location'],
            'server_group'=>$data['server_group'],
            'description'=>$data['description']
        );

        $this->db->insert('servers',$item);
    }

    public function updateServer($id,$data)
    {
        $item=array(
            'hostname'=>$data['hostname'],
            'code'=>$data['code'],
            'ip'=>$data['ip'],
            'location'=>$data['location'],
            'server_group'=>$data['server_group'],
            'description'=>$data['description']
        );

        $this->db->where('id', $id)->update('servers',$item);
        return true;
    }

    public function addModule($data)
    {
        $item=array(
            'name'=>$data['name'],
            'cpu'=>$data['cpu'],
            'ram'=>$data['ram'],
            'storage'=>$data['storage']
        );

        $this->db->insert('modules',$item);
    }

    public function assignModule($data)
    {
        $item=array(
            'server_id' => $data['server_id'],
            'module_id' => $data['module_id']
        );
        $st=$this->db->select('*')->from('server_modules')
            ->where('server_id', $data['server_id'])
            ->where('module_id', $data['module_id'])
            ->get()
            ->result_array();
        if(count($st)>0)
        {
            // do nothing
        }
        else
        {
            $this->db->insert('server_modules', $item);
        }
    }

    public function getServerModules($id)
    {
        return $this->db->query('select * from modules where id in (select module_id from server_modules where server_id='.$id.')')->result_array();
    }

    public function updateModule($id,$data)
    {
        $item=array(
            'name'=>$data['name'],
            'cpu'=>$data['cpu'],
            'ram'=>$data['ram'],
            'storage'=>$data['storage']
        );

        $this->db->where('id', $id)->update('modules',$item);
    }

    public function delServerModule($module, $server)
    {
        $this->db->where('module_id', $module)
                ->where('server_id', $server)
                ->delete('server_modules');
        return true;
    }

    public function getServersInfo()
    {
        $data['servers']=$this->db->select('*')->from('servers')->get()->result_array();
        // echo '<pre>';print_r($data['servers']);exit;
        for($i=0;$i<count($data['servers']);$i++)
        {
            $data['servers'][$i]['modules']=$this->db->query('select * from modules where id in (select module_id from server_modules where server_id='.$data['servers'][$i]['id'].')')->result_array();
        }
        return $data['servers'];

    }




}