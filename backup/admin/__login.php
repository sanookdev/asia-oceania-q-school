<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login Page</title>
    <style>
    .btn-success {
        background-color: #2bc48a !important;
        color: black;
    }
    </style>
</head>

<body>


    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Sign In</h3>
                    <p style="color:white">Asia Oceania Q School 2022</p>
                    <div class="d-flex justify-content-end social_icon">
                        <span onclick="window.open('https://www.facebook.com/thailandsnooker/','_blank')"><i
                                class="fab fa-facebook-square"></i></span>
                        <span onclick="window.open('http://www.thailandsnooker.org/','_blank')">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </span>
                    </div>

                </div>
                <div class="card-body">
                    <form id="loginForm">
                        <div class="form-group error-message">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username" minlength="4"
                                required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                minlength="4" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-success btn-block btn_submit">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- <a href="#" class="float-left" style="color:white!important;">Check Status
                        Register</a> -->
                    <a href="../entry-pack.pdf" class="float-left" target="_blank" style="color:white!important;">Entry
                        Pack</a>
                    <a href="../entry-form" class="float-right" style="color:white!important;">Entry Form</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- Axios api -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <script>
    $(document).ready(function() {
        console.log('ready jquery function ')
        $('#loginForm').on('submit', (e) => {
            e.preventDefault();
            console.log('form submited');
            var datas = {};
            $.each($("#loginForm").serializeArray(), function(i, field) {
                datas[field.name] = field.value;
            });
            axios.post('./api/informations.php', {
                    action: 'checkLogin',
                    data: datas
                })
                .then((res) => {
                    console.log(res);
                    if (res.data.status) {
                        outputhtml = '<div class = "alert alert-success">' + res.data.message +
                            '</div>';
                        $('.error-message').html(outputhtml);
                        // window.location.href = "./main.php?user=" + res.data.session.user;
                        nextPage(res.data.session.user);
                    } else {
                        outputhtml = '<div class = "alert alert-danger">' + res.data.message +
                            '</div>';
                        $('.error-message').html(outputhtml);
                    }
                })
        })
        nextPage = (user) => {
            new Request({
                url: 'main.php.php',
                method: 'post',
                data: {
                    'user': user
                },
                onComplete: function(response) {
                    alert(response);
                }
            });
        }
    })
    </script>
</body>

</html>