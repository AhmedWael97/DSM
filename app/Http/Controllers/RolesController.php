<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RolesController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',       
        ];
    }

    public function index()
    {
        return view('admin.pages.rap.index');
    }

    public function getData(Request $request)
    {
        if($request->ajax()) {
            $roles = Role::query();
            return DataTables::of($roles)->
            addIndexColumn()
            ->addColumn("action", function($row){
                $editBtn = "<a href='". route('roles.edit',$row->id) ."' class='btn btn-warning btn-sm'> EDIT </a> |";
                $deleteBtn = "<button url='". route('roles.delete',$row->id) ."' class='btn btn-danger btn-sm swal'> Delete </button> |";
                $showBtn = "<a href='#' class='btn btn-info btn-sm'> Show </a>";

                return $editBtn . ' ' . $deleteBtn . ' ' . $showBtn;  
            })
            ->addColumn('permissions',function($row){
                return count($row->permissions);
            })
            ->rawColumns(['action','permissions'])
            ->make(true);
        }
    }


    public function create() {
        return view('admin.pages.rap.form')->with(['permissions' => Permission::all()]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:191|unique:roles,name',
        ]);

        $role = new Role(['name' => $request->name]);
        $role->save();


        $role->syncPermissions(Permission::whereIn('id', $request->permissions)->pluck('name'));

        return redirect()->route('roles.index')->with('success',translate("Role Created Successfully"));
    }

    public function edit($id) {
        return view('admin.pages.rap.form')->with(['role'=> Role::findOrFail($id), 'permissions' => Permission::all()]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:191',
        ]);

        if(Role::where('id','!=',$id)->where('name', $request->name)->first()) {
            return back()->with('error', translate("Role Name is taken"));
        }

        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        
        $role->syncPermissions(Permission::whereIn('id', $request->permissions)->pluck('name'));

        return redirect()->route('roles.index')->with('success',translate("Role Updated Successfully"));

    }

    public function destroy($id) {
        $Role = Role::findOrFail($id);
    
        if(User::role($Role->name)->count() >= 1) {
            return response(translate("We cannot delete role, Some users take this role"),500);
        }
        
        $Role->delete();

        return redirect()->route('roles.index')->with('success',translate("Role Deleted Successfully")); 
    }
}
