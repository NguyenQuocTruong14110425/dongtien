<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Entity\Roles\RolesEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{

    public function __construct(RolesEntity $roles)
    {
        $this->roles = $roles;
    }
    public function getList()
    {
        $roles=  $this->roles->all();
        if($roles== true)
        {
            return view('admin.roles.list',
                ["roles" => $roles]);
        }
        else
        {
            $message = $this->roles->errors()?:$this->roles->errorQuery();
            Session::flash('error', $message);
            $roles = [];
            return view('admin.roles.list',
                ["roles" => $roles]);
        }

    }

    public function getFind($id)
    {
        $roles=  $this->roles->find($id);
        if($roles== true)
        {
            Session::flash('message', 'find success');
            return view('admin.roles.find',
                ["roles" => $roles]);
        }
        else
        {
            $message = $this->roles->errors()?:$this->roles->errorQuery();
            Session::flash('error', $message);
            return redirect('admin/roles/');
        }

    }
    public function getCreate()
    {
        return view('admin.roles.create');
    }

    public function postCreate(Request $request)
    {
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $roles=  $this->roles->create($data);
        if($roles== true)
        {
            Session::flash('message', 'Create new roles success');
            return redirect('admin/user/');
        }
        else
        {
            $messageQuery = $this->roles->errorQuery();
            $message = $this->roles->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getUpdate($id)
    {
        $roles_detail=  $this->roles->find($id);
        return view('admin.roles.update',[
            'Roles_detail'=>$roles_detail,
        ]);
    }

    public function postUpdate(Request $request ,$id)
    {
        $data = [
            'name'=>$request->name,
            'description'=>$request->description,
        ];
        $roles=  $this->roles->update($data);
        if($roles== true)
        {
            Session::flash('message', 'Update roles ssuccess');
            return redirect('admin/user/');
        }
        else
        {
            $messageQuery = $this->roles->errorQuery();
            $message = $this->roles->errors();
            Session::flash('messageQuery', $messageQuery);
            Session::flash('error', $message);
            return redirect( url()->previous());
        }
    }

    public function getAllTrash()
    {
        $roles_trash=  $this->roles->allTrash();
        return view('admin.roles.trash',['Roles_trash'=>$roles_trash]);
    }

    public function getRecover($id)
    {
        $roles=  $this->roles->trash($id,false);
        return redirect('admin/roles/all-trash');
    }
    public function getTrash($id)
    {
        $roles=  $this->roles->trash($id);
        return redirect('admin/roles/');
    }

    public function getDelete($id)
    {
        $roles=  $this->roles->delete($id);
        return redirect('admin/roles/all-trash');
    }
}
