<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\UserService\UserService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    protected $permission_for = 'user';

    public $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        // check permission
        $this->hasPermission('view');
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {

        // check permission
        $this->hasPermission('create');
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserStoreRequest $request)
    {
        // check permission
        $this->hasPermission('create');

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        // assign role
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->withSuccess('ইউজারের তথ্য সফলভাবে আপডেট হয়েছে!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show($id, UserService $userService)
    {
        // check permission
        $this->hasPermission('show');
        //get user
        $user = $userService->userDetailsById($id);

        // get all permissions
        $permissions = $user->getAllPermissions();

        // manipulate menu permissions
        $menus_permissions = $permissions->map(function (Permission $permission) {
            $permission['menu'] = (string) Str::of($permission->name)->before('-')->replace('_', ' ')->ucfirst();
            return $permission;
        })->groupBy('menu');

        return view('user.show', compact('user', 'menus_permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        // check permission
        $this->hasPermission('update');
        // fetch user
        $user = User::find($id);
        //roles
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, $id)
    {
        // check permission
        $this->hasPermission('update');

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        // assign role
        $user->syncRoles($request->roles);
        return redirect()->route('user.index')->withSuccess('ইউজারের তথ্য সফলভাবে আপডেট হয়েছে!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // check permission
        $this->hasPermission('delete');
        // delete user
        User::destroy($id);
        return redirect()->route('user.index')->withSuccess('User deleted successfully');
    }
}
