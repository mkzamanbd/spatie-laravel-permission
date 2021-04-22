<?php

namespace App\Http\Controllers;

use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data['dashboard_active'] = 'active';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard')->with($this->data);
    }

    public function profile(UserService $userService){
        $id = Auth::id();
        $user = $userService->userDetailsById($id);

        // get all permissions
        $permissions = $user->getAllPermissions();

        // manipulate menu permissions
        $menus_permissions = $permissions->map(function (Permission $permission) {
            $permission['menu'] = (string) Str::of($permission->name)->before('-')->replace('_', ' ')->ucfirst();
            return $permission;
        })->groupBy('menu');

        return view('current-user.show', compact('user', 'menus_permissions'));
    }

    public function edit(){
        $user = Auth::user();
        return view('current-user.edit', compact('user'));
    }

    public function update(Request $request){
        $user = \App\Models\User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password) {
            $user->password = bcrypt($request->password);
        }

        if($request->has('signature')){
            if($user->signature_path){
                Storage::delete($user->signature_path);
            }
            $path = $request->file('signature')->store('signatures');
            $user->signature_path = $path;
        }
        $user->save();
        return redirect()->route('current-user.show')->withSuccess('ইউজারের তথ্য সফলভাবে আপডেট হয়েছে!');
    }
}
