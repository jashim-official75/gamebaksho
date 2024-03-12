<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //--index
    public function index(){
        $roles = Role::get();
        return view('backend.pages.role.index', [
            'roles'=>$roles,
        ]);
    }
}
