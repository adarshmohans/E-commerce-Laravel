<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <title>Admin Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row w-100">
            <div class="col-md-6 mx-auto">
                <div class="card p-4 shadow">
                    <form action="{{ route('admin.dologin') }}" method="POST">
                        @csrf
                        <h3 class="text-center mb-4">Admin Login</h3>

                        <!-- Email input -->
                        <div class="mb-3">
                            <label class="form-label" for="form2Example1">User Name</label>
                            <input type="text" id="form2Example1" class="form-control" name="username" />
                        </div>

                        <!-- Password input -->
                        <div class="mb-3">
                            <label class="form-label" for="form2Example2">Password</label>
                            <input type="password" id="form2Example2" class="form-control" name="password" />
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-3">
                            <div class="col d-flex align-items-center">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example31" checked />
                                <label class="form-check-label" for="form2Example31"> Remember me </label>
                            </div>
                            <div class="col text-end">
                                <a href="#!">Forgot password?</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center mt-3">
                            <p>Not a member? <a href="#!">Register</a></p>
                            <p>or sign up with:</p>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
