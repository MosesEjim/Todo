<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo &mdash;Login</title>
    <link rel="stylesheet" href="{{URL::asset('css/todo.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    <form method="POST" action="{{route('login.post')}}">
     @csrf
        <div class="wrapper wrapper-container">
            <div class="card col-lg-4 col-md-4 col-sm-12">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="mb-3">

                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>

                    <div class="login-msg">
                        <span class="msg">Don't have an account yet? <a href="{{route('signup.get')}}">signup</a></span>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('success'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.success("{{ session('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true
            , "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif

    </script>

</body>
</html>
