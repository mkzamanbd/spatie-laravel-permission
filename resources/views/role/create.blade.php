@extends('layouts.app')
@section('title', 'Role List')
@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between px-0">
                        <span>Create a new role</span>
                        <a href="{{ route('role.index') }}" title="Create new group" class="btn btn-success btn-sm">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <div class="row g-3">
                                        <div class="col-md-12 mt-2">
                                            <label for="name" class="form-label required">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="Enter role name" required value="{{ old('name') }}">
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label for="description" class="form-label">Description (Optional)</label>
                                            <textarea class="form-control" name="description" id="description"
                                                      placeholder="Enter role description"
                                                      rows="3">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 my-3">
                                    <h3 class="text-center">
                                        Permissions
                                        <a href="{{ route('generate.permission') }}"><i class="bi bi-arrow-repeat"></i></a>
                                    </h3>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="row row-cols-1 row-cols-md-4 g-2">
                                        @forelse($menus as $menu)
                                            <div class="col">
                                                <div class="card h-100">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <span>
                                                            <label for="menu-{{ $menu->id }}">{{ $menu->name }}</label>
                                                        </span>
                                                        <span>
                                                            <input type="checkbox" id="menu-{{ $menu->id }}" class="form-check-input" onclick="selectItem({{ $menu->id }})">
                                                        </span>
                                                    </div>
                                                    <div class="card-body">
                                                        @foreach($permissions as $permission)
                                                            @continue(\Illuminate\Support\Str::of($permission->name)->beforeLast('-') != $menu->slug)
                                                            <div class="form-check">
                                                                <input type="checkbox" name="permissions[]"
                                                                       class="form-check-input select-item-{{ $menu->id }}"
                                                                       value="{{ $permission->id }}"
                                                                       id="permission-{{ $permission->id }}">

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
                                    <button class="btn btn-block btn-success w-100">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function selectItem(id){
            let selectItem = document.querySelectorAll(".select-item-"+id)
            selectItem.forEach((item) =>{
                console.log(item.checked === false? 'False': 'True')
                item.checked === false ? item.checked = true : item.checked = false
            })
        }
    </script>
@endpush
