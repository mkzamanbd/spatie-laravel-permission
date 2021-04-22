@extends('layouts.app')
@section('title', 'Role List')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between px-0">
                        <span>Role Details</span>
                        <div>
                            <a href="{{ route('role.index') }}" title="Create new group" class="btn btn-success btn-sm">
                                <i class="bi bi-list"></i>
                            </a>
                            <a href="{{ route('role.edit', $role->id) }}" title="Create new group" class="btn btn-info btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" data-bs-toggle="modal" class="btn btn-danger btn-sm" data-bs-target="#exampleModal"><i class="fa fa-trash"></i></button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ml-3 border-0">
                                            <h5 class="modal-title" id="exampleModalLabel">আপনি কি নিশ্চিত যে আপনি এই রেকর্ডটি মুছতে চান?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('role.destroy', $role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">বাতিল করুন</button>
                                                <button type="submit" class="btn btn-danger">মুছে ফেলুন</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 text-center my-2">
                                <h3>Name: {{ $role->name }}</h3>
                                <p>Description: {{ $role->description }}</p>
                            </div>
                            <div class="col-12">
                                <div class="row row-cols-1 row-cols-md-4 g-2">
                                    @forelse($menus as $menu)
                                        <div class="col">
                                            <div class="card h-100">
                                                <div class="card-header d-flex justify-content-between">
                                                    <span>{{ $menu->name }}</span>
                                                    <span>
                                                        <input type="checkbox" class="form-check-input">
                                                    </span>
                                                </div>
                                                <div class="card-body" x-ref="permissions">
                                                    @foreach($permissions as $permission)
                                                        @continue(\Illuminate\Support\Str::of($permission->name)->beforeLast('-') != $menu->slug)
                                                        <div class="form-check">
                                                            <input type="checkbox"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
