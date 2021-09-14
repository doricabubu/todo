<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>TODO list</title>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style>
            .table td {
                padding-left: 32px;
            }

            .fa-times {
                color: #AA0000;
            }

            h3 {
                margin-left: 10px;
                margin-bottom: 20px;
            }

            .container {
                padding: 20px;
                max-width: 460px;
            }

            .container_my {
                border:1px solid black;
                background-color: #fff59c;
            }

            .fa-plus {
                color: #00AA00;
            }

            .table>tbody>tr>td,
            .table>tbody>tr>th {
                border-top: none;
            }

            a {
                color: #000000;
            }

            .dora_link {
                color: #AA8A35;
            }

            body {
                background-color: white;
            }
            
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
        </style>
        <script>
            $(function() {
                if (localStorage.getItem("username") === null) {
                    window.location.replace("/login");
                }

                document.getElementById("username").innerHTML = localStorage.getItem("username");

                fetchTasks();
            });

            function fetchTasks() {
                const post_request_data = {
                    username: localStorage.getItem("username")
                };

                $.post("api/get_list", post_request_data, function(data) {
                    data = JSON.parse(data);

                    for(var i = 0; i < data.length; i++) {
                        displayTask(data[i]);
                    }
                });
            };

            function displayTask(task_data) {
                var done_part = task_data.done == 0 ? "fa-square-o" : "fa-check-square-o"
                var checkbox = "<a id=\"checkbox" + task_data.id + "\" onclick=\"toggleDone(" + task_data.id + ")\"><i class=\"fa " + done_part + "\" aria-hidden=\"true\"></i></a>"

                var element_html = "<tr id=\"list" + task_data.id + "\" class=\"row\"><td class=\"col-md-10\">" + checkbox + " " + task_data.content + "</td><td class=\"col-md-2 center-block\"></i><a onclick=\"deleteFromList(" + task_data.id + ")\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></a></td></tr>"
                
                document.getElementById("lista").innerHTML += element_html;
            };

            function addToList() {
                const post_request_data = {
                    username: localStorage.getItem("username"),
                    content: document.getElementById("text").value
                };

                $.post("api/add_to_list", post_request_data, function(data) {
                    data = JSON.parse(data);

                    displayTask(data);
                    document.getElementById("text").value = "";
                });
            };

            function deleteFromList(id) {
                const post_request_data = {
                    username: localStorage.getItem("username"),
                    id: id
                };

                $.post("api/delete_from_list", post_request_data, function(data) {
                    document.getElementById("list" + id).remove();
                });
            };

            function toggleDone(id) {
                const post_request_data = {
                    username: localStorage.getItem("username"),
                    id: id
                };

                $.post("api/toggle_done", post_request_data, function(data) {
                    data = JSON.parse(data);

                    var done_part = data.done ? "fa-check-square-o" : "fa-square-o";
                    document.getElementById("checkbox" + id).innerHTML = "<i class=\"fa " + done_part + "\" aria-hidden=\"true\"></i></a>";
                });
            };

            function logout() {
                localStorage.clear();
                window.location.replace("/login");
            };
        </script>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="nav navbar-nav">
                <li>
                    <a class="nav-link" href="/list">TODO list</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <span id="username"></span>
                    &nbsp;
                    <a class="btn btn-danger my-2 my-sm-0 " onclick="logout()">Izloguj se</a>
                </li>
            </ul>
        </nav>
        <main role="main" class="flex-shrink-0 mt-5">
            <div class="container">
                <div class="container_my">
                    <h3>To do:</h3>
                </div>

                <table class="table" id="lista"></table>
                
                <table class="table" id="add_new">
                    <tr class="row">
                        <td class="col-md-10">
                            <input type="text" id="text"></input>
                        </td>
                        <td class="col-md-2 center-block">
                            <i class="fa fa-plus" aria-hidden="true" onclick="addToList()"></i>
                        </td>
                    </tr>
                </table>
            </div>
        </main>
        <footer class="mt-auto py-3">
            <div class="container">
            <div class="text-muted text-center">&copy; Copyright, <a href='https://instagram.com/dugicisidora'>dugicisidora</a> 2021.</div>
            </div>
        </footer>
    </body>
</html>
