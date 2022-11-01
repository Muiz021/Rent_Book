<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Buku | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<style>
    .main {
        height: 100vh;
    }

    .register-box {
        width: 500px;
        border: solid 1px;
        padding: 30px;
    }

    form div {
        margin-bottom: 15px;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <div class="alert alert-danger text-center" style="width: 500px;">
                {{ session('message') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success text-center" style="width: 500px;">
                {{ session('message') }}
            </div>
        @endif
        <div class="register-box">
            <form action="" method="POST">
                @csrf
                <div class="text-center">
                    <h1><b>REGISTER</b></h1>
                </div>
                <div>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div>
                    <div>
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control">
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" rows="5" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="text-center">
                    Have account? <a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>
