<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public static function middleware(): array
    {
        return [
            'auth',       
        ];
    }

    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function getData(Request $request)
    {
        if($request->ajax()) {
            $users = User::query();
            return DataTables::of($users)->
            addIndexColumn()
            ->addColumn("action", function($row){
                $editBtn = "<a href='". route('users.edit',$row->id) ."' class='btn btn-warning btn-sm'> EDIT </a> |";
                $deleteBtn = "<button url='". route('users.delete',$row->id) ."' class='btn btn-danger btn-sm swal'> Delete </button> |";
                $showBtn = "<a href='#' class='btn btn-info btn-sm'> Show </a>";
                $btns = "";
                if($row->hasPermissionTo("Users_Update")) {
                    $btns = $btns . $editBtn . " ";
                }
                if($row->hasPermissionTo("Users_Delete")) {
                    $btns = $btns . $deleteBtn . " ";
                }
                if($row->hasPermissionTo("Users_Read")) {
                    $btns = $btns . $showBtn . " ";
                }
                return $btns;
            })
            ->addColumn('role',function($row){
                return  count($row->roles) >= 1 ? $row->roles[0]->name : '';
            })
            ->rawColumns(['action','role'])
            ->make(true);
        }
    }


    public function create() {
        return view('admin.pages.users.form')->with(['roles' => Role::all()]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users,email',
            'password' => 'string|min:8|confirmed',
            'role_id' => 'required',
            'mobile' => 'string|required'
        ]);

        $role = Role::whereId($request->role_id)->first();
        if($role == null) {
            return back()->with('error', translate("Error In Role Input"));
        }
        $user = new User([  
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password)
        ]);
        $user->save();
        $user->syncRoles($role);

        return redirect()->route('users.index')->with('success',translate("User Created Successfully"));
    }

    public function edit($id) {
        return view('admin.pages.users.form')->with(['roles'=> Role::all(), 'user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'password' => 'string|min:8|confirmed',
            'role_id' => 'required',
            'mobile' => 'string|required'
        ]);

        //check mail
        if(User::where('email',$request->email)->where('id','!=',$id)->first()) {
            return back()->with('error', translate("Email is already taken"));
        }

        $user = User::findOrFail($id);
        $user->update($request->all());
        $role = Role::whereId($request->role_id)->first();
        $user->syncRoles($role);

        return redirect()->route('users.index')->with('success',translate("User Updated Successfully")); 
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success',translate("User Deleted Successfully")); 
    }
}
