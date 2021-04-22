@extends('layouts.app')
@section('title', 'User list')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex align-items-center justify-content-between px-0">
                        <h5>User records</h5>
                        <div>
                            <a href="{{ route('user.create') }}" title="Create new user" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('user.show', $user->id) }}" title="Show user details"
                                           class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $user->id) }}" title="Update user"
                                           class="btn btn-info btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" data-bs-toggle="modal" class="btn btn-danger btn-sm" data-bs-target="#exampleModal{{ $loop->index }}"><i class="fa fa-trash"></i></button>
                                        <div class="modal fade" id="exampleModal{{ $loop->index }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ml-3 border-0">
                                                        <h5 class="modal-title" id="exampleModalLabel">আপনি কি নিশ্চিত যে আপনি এই রেকর্ডটি মুছতে চান?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
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
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="20" class="text-center">No users are available</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
