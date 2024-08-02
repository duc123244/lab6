<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="vh-100">
        <div>
            <div class="row">
                <!-- Form Section -->
                <div class="col-sm-6 text-black">
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 pt-5 pt-xl-0 mt-xl-n5">
                        <form style="width: 23rem;" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng ký</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success mb-4">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="form-outline mb-4">
                                <input type="text" id="fullname" name="fullname" class="form-control form-control" value="{{ old('fullname') }}" required>
                                <label class="form-label" for="fullname">Full Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="username" name="username" class="form-control form-control" value="{{ old('username') }}" required>
                                <label class="form-label" for="username">Username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control" value="{{ old('email') }}" required>
                                <label class="form-label" for="email">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control" required>
                                <label class="form-label" for="password">Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control" required>
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="file" id="avatar" name="avatar" class="form-control form-control">
                                <label class="form-label" for="avatar">Avatar</label>
                            </div>

                            <div class="d-flex">
                                <button type="submit" class="btn btn-info">Đăng ký</button>
                                ㅤ<p class="mt-3">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập </a></p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Image Section -->
                
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>

</html>

