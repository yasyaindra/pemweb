<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pengolaan Data Makanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 align-item-center d-flex flex-column min-vh-100 justify-content-center">
                <main class="form-signin">
                    <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
                    <form action="/login" method="POST">
                        <div class="form-floating">
                            <input type="text" name="username" class="form-control mb-3" id="username"
                                placeholder="username" autofocus required />
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control mb-3" id="password"
                                placeholder="Password" required />
                            <label for="password">Password</label>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">
                            Login
                        </button>
                    </form>
                    <small class="d-block text-center mt-3">Not registered? <a href="/register">Register
                            Now!</a></small>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
