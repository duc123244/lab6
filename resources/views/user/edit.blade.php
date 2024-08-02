@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sửa Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="fullname">{{ __('Fullname') }}</label>
                            <input type="text" class="form-control" name="fullname" value="{{ $user->fullname }}" required>
                        </div>

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="avatar">{{ __('Avatar') }}</label>
                            <input type="file" class="form-control" name="avatar">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">{{ __('Cập nhật') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
