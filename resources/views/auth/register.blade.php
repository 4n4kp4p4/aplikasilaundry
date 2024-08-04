<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/style.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route('register')}}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your username
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Level</label>
                                        <select class="form-control" name="level" id="exampleFormControlSelect1">
                                            <option value="Administrator">Administrator</option>
                                            <option value="Supervisi">Supervisi</option>
                                            <option value="Karyawan">Karyawan</option>
                                        </select>
                                        @error('level')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Confirm Password</label>
                                            <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                                            <div class="invalid-feedback">
                                                please fill in your password
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>

                                <div class="mt-5 text-muted text-center">
                                    <a href="{{route('login')}}">Already registered?</a>
                                </div>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://demo.getstisla.com/assets/modules/jquery.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/popper.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/tooltip.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/moment.min.js"></script>
    <script src="https://demo.getstisla.com/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="https://demo.getstisla.com/assets/js/scripts.js"></script>
    <script src="https://demo.getstisla.com/assets/js/custom.js"></script>
</body>

</html>