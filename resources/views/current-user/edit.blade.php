@extends('layouts.app')
@section('title', 'ইউজার প্রোফাইল এডিট')
@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-9">
                <div class="card border-0">
                    <div class="card-header d-flex justify-content-between">
                        <span>ইউজার প্রোফাইল এডিট</span>
                        <a href="{{ route('current-user.show') }}" title="All users" class="btn btn-success btn-sm ml-auto">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('current-user.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-12 mt-2">

                                    <div class="row g-3">
                                        <div class="col-md-6 mt-2">
                                            <label for="name" class="form-label required">নাম</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                   placeholder="আপনার নাম লিখুন" required value="{{ old('name', $user->name) }}">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="email" class="form-label required">ইমেইল</label>
                                            <input type="text" name="email" class="form-control" id="email"
                                                   placeholder="ইমেইল লিখুন" required value="{{ old('email', $user->email) }}">
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label for="password" class="form-label required">পাসওয়ার্ড</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                   placeholder="পাসওয়ার্ড">
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="retype-password" class="form-label required">পুনরায় পাসওয়ার্ড লিখুন</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="retype-password"
                                                   placeholder="পুনরায় পাসওয়ার্ড লিখুন">
                                        </div>

                                        <div class="col-md-12 mt-2">
                                            <label for="signature" class="form-label">স্বাক্ষর</label>
                                            <input type="file" name="signature" class="form-control"
                                                   id="signature">
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            @if($user->signature_path)
                                                <img src="{{ asset('storage/'. $user->signature_path) }}" width="80px"/>
                                            @endif
                                        </div>

                                    </div>

                                </div>

                                <div class="col-6">
                                    <a href="{{ route('user.index') }}" class="btn btn-block btn-secondary mt-2 w-100">প্রোফাইলে ফিরে যান</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-block btn-success mt-2 w-100">আপডেট করুন</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
