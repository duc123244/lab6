@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <p>Chào, {{ $user->fullname }}!</p>

                    @if ($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100px" height="100px" style="border-radius:100px">
                    @else
                        <p>Không có avatar.</p>
                    @endif

                    <a href="{{ route('user.edit') }}" class="btn btn-primary">Sửa profile</a>
                    <a href="{{ route('user.change-password') }}" class="btn btn-warning">Đổi mật khẩu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
