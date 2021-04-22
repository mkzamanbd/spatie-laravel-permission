@extends('layouts.app')
@section('title', 'Role List')
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between px-0">
                        <span>Role records</span>
                        <a href="{{ route('role.create') }}" title="Create new group" class="btn btn-success btn-sm">
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('role.show', $role->id) }}" title="Show role permissions" class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('role.edit', $role->id) }}" title="Change group information" class="btn btn-info btn-sm">
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
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
