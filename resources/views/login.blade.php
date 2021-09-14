<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TODO list · Login</title>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }

            html, body {
                height: 100%;
            }

            body {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f8f9fa;
            }

            .form-signin {
                width: 100%;
                max-width: 420px;
                padding: 15px;
                margin: auto;
            }

            .form-label-group {
                position: relative;
                margin-bottom: 1rem;
            }

            .form-label-group > input,
            .form-label-group > label {
                height: 3.125rem;
                padding: .75rem;
            }

            .form-label-group > label {
                position: absolute;
                top: 0;
                left: 0;
                display: block;
                width: 100%;
                margin-bottom: 0; /* Override default `<label>` margin */
                line-height: 1.5;
                color: #495057;
                pointer-events: none;
                cursor: text; /* Match the input under the label */
                border: 1px solid transparent;
                border-radius: .25rem;
                transition: all .1s ease-in-out;
            }

            .form-label-group input::-webkit-input-placeholder {
                color: transparent;
            }

            .form-label-group input:-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-ms-input-placeholder {
                color: transparent;
            }

            .form-label-group input::-moz-placeholder {
                color: transparent;
            }

            .form-label-group input::placeholder {
                color: transparent;
            }

            .form-label-group input:not(:placeholder-shown) {
                padding-top: 1.25rem;
                padding-bottom: .25rem;
            }

            .form-label-group input:not(:placeholder-shown) ~ label {
                padding-top: .25rem;
                padding-bottom: .25rem;
                font-size: 12px;
                color: #777;
            }

            .logo-margin {
                padding-bottom: 5rem;
            }
        </style>
        <script>
            $(function() {
                if (localStorage.getItem("username") === null) {
                    return;
                }

                window.location.replace("/list");
            });

        	function loginUser() {
                // reset error field
                document.getElementById("error").innerHTML = "";

                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;

                if(!username) {
                    document.getElementById("error").innerHTML = "Username empty";
                    return;
                }

                if(!password) {
                    document.getElementById("error").innerHTML = "Password empty";
                    return;
                }

                const post_request_data = {
                    username: username, 
                    password: password
                };

                $.post("api/login", post_request_data, function(data) {
                    data = JSON.parse(data);
                    
                    if (data.success == false) {
                        document.getElementById("error").innerHTML = "Username or password wrong";
                    }
                    else {
                        localStorage.setItem('username', username);
                        localStorage.setItem('password', password);
                        window.location.replace("/list");
                    }
                });
            };
        </script>
    </head>

    <body class="d-flex flex-column h-100">
        <main role="main" class="flex-shrink-0 mt-5">
            <div class="container">
                <form  name="loginform" class="form-signin">
                    <div class="text-center mb-4">
                        <h3 class="mb-3 font-weight-bold">Login</h3>
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required autofocus>
                    </div>

                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required autofocus>
                    </div>

                    <div class="invalid-feedback" id = "wrongInputID" style="text-align: right;"></div>
                    <button class="btn btn-lg btn-primary btn-block" onclick="loginUser()" id="login" type="button">Login</button>
                    <div class="text-muted text-center">Don't have an account? <a href='/register'>Register</a></div>
                    <div class="text-danger text-center" id="error"></div>
                </form>
            </div>
        </main>
        <footer class="mt-auto py-3">
            <div class="container">
            <div class="text-muted text-center">&copy; Copyright, <a href='https://instagram.com/dugicisidora'>dugicisidora</a> 2021.</div>
            </div>
        </footer>
    </body>
</html>
