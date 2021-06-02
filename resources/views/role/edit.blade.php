@extends('layouts.app')
@section('title', 'Role List')
@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between px-0">
                        <span>Role Update</span>
                        <a href="{{ route('role.index') }}" title="Create new group" class="btn btn-success btn-sm">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{ route('role.update', $role->id) }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="row g-3">
                                        <div class="col-md-12 mt-2">
                                            <label for="name" class="form-label required">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Enter role name" required
                                                   value="{{ old('name', $role->name) }}">
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label for="description" class="form-label">Description (Optional)</label>
                                            <textarea class="form-control" name="description" id="description"
                                                      placeholder="Enter role description"
                                                      rows="3">{{ old('description', $role->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="text-center">Permissions</h3>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="row row-cols-1 row-cols-md-4 g-2">
                                        @forelse($menus as $menu)
                                            <div class="col" x-data="{ isAllChecked: false }"
                                                 x-init="() => {
                                                    let checked = true
                                                    const children = $refs.permissions.children

                                                    for(let i = 0; i < children.length; i++){
                                                         if(! children[i].firstChild.nextSibling.checked){
                                                            checked = false;
                                                            break;
                                                         }
                                                    }
                                                    isAllChecked = checked
                                                }"
                                            >
                                                <div class="card h-100">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <span>
                                                            <label for="menu-{{ $menu->id }}">{{ $menu->name }}</label>
                                                        </span>
                                                        <span>
                                                            <input type="checkbox" class="form-check-input" id="menu-{{ $menu->id }}"
                                                                   x-ref="selectAllPermissions"
                                                                   x-on:click="
                                                                       const children = event.target.parentElement.parentElement.nextElementSibling.children;
                                                                       for(let i = 0; i < children.length; i++){
                                                                         children[i].children[0].checked = event.target.checked
                                                                       }
                                                                   "
                                                                   x-bind:checked="isAllChecked"
                                                            >
                                                        </span>
                                                    </div>
                                                    <div class="card-body" x-ref="permissions">
                                                        @foreach($permissions as $permission)
                                                            @continue(\Illuminate\Support\Str::of($permission->name)->beforeLast('-') != $menu->slug)
                                                            <div class="form-check">
                                                                <input type="checkbox" name="permissions[]"
                                                                       x-on:click="
                                                                           let allChecked = true
                                                                           const allPermissions = event.target.parentElement.parentElement.children
                                                                           for(let i = 0; i < allPermissions.length; i++){
                                                                               const checkbox = allPermissions[i].children[0]
                                                                               if(!checkbox.checked){
                                                                                    allChecked = false
                                                                                    break
                                                                               }
                                                                           }
                                                                           $refs.selectAllPermissions.checked = allChecked
                                                                       "
                                                                       class="form-check-input"
                                                                       value="{{ $permission->id }}"
                                                                       id="permission-{{ $permission->id }}"
                                                                    {!! in_array($permission->id, $role->permissions->pluck('id')->all()) ? 'checked' : '' !!}
                                                                >

                                                                <label class="form-check-label"
                                                                       aria-describedby="permission-help-{{ $permission->id }}"
                                                                       for="permission-{{ $permission->id }}">
                                                                    {{ \Illuminate\Support\Str::of($permission->name)->afterLast('-')->replace('_', ' ')->ucfirst() }}
                                                                </label>

                                                                <div id="permission-help-{{ $permission->id }}"
                                                                     class="form-text">{{ $permission->description }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>

                                <div class="col-6">
                                    <a href="{{ route('role.index') }}" class="btn btn-block btn-secondary w-100">Back to list</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-block btn-success w-100">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
