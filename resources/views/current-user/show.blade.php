@extends('layouts.app')
@section('title', 'ইউজার প্রোফাইল')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-4">
                <div class="card">
                    <img src="{{ $user->avatar }}" class="card-img-top"
                         alt="{{ $user->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Account created at {{ $user->created_at->format('d F, Y') }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small><span class="text-muted">Email:</span> <br>
                                <span>{{ $user->email }}</span></small>
                        </li>

                    </ul>
                    <div class="card-body">
                        <a href="{{ route('current-user.edit') }}" class="card-link">Edit profile</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <h5>Account</h5>
                <p>Account create at <strong>{{ $user->created_at->format('d F, Y') }}</strong> and last updated at
                    <strong>{{ $user->updated_at->format('d F, Y') }}</strong></p>
                <hr>

                <h4 style="font-weight: 400; margin-top: 20px;">Role</h4>
                <strong>{{ $user->roles->pluck('name')->join(', ') }}</strong>

                <h4 style="font-weight: 400; margin-top: 20px;">Permissions</h4>

                <div class="ml-3">
                    @forelse($menus_permissions as $menu => $permissions)
                        <div>
                            <strong><small>{{ $menu }}</small></strong>
                            <br>
                            @forelse($permissions as $permission)
                                <span
                                    class="badge bg-secondary">{{ \Illuminate\Support\Str::of($permission->name)->afterLast('-')->replace('_', ' ')->ucfirst() }}</span>
                            @empty
                            @endforelse
                        </div>
                    @empty
                    @endforelse
                </div>

            </div>
        </div>
    </div>

@endsection
