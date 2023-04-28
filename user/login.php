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
                    <p style="color:white">Asia Oceania Q School 2023 </p>
                    <!-- <p style="color:red">(login system maintenance)</p> -->
                    <div class="d-flex justify-content-end social_icon">
                        <span
                            onclick="window.open('https://www.facebook.com/BsatTH?mibextid=ZbWKwL%E2%80%8B','_blank')"><i
                                class="fab fa-facebook-square"></i></span>
                        <span onclick="window.open('http://www.thailandsnooker.org/','_blank')">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    <span class="error-message" style="line-height:1rem!important;">
                    </span>
                    <form id="loginForm" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Email" minlength="4"
                                required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control"
                                placeholder="Passport No. or Thai Citizenship I.D." minlength="4" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Log In" class="btn btn-success btn-block btn_submit">
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="../entry-pack.pdf" target="_blank" class="float-left" style="color:white!important;">Entry
                        Pack</a>
                    <a href="../entry-form" id="entryform" class="float-right" style="color:white!important;">Entry
                        Form</a>
                </div>
                <div class="mt-3 text-center">
                    <p id="demo" style="color:red;background-color:yellow"></p>
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
    var countDownDate = new Date("Apr 24, 2023 12:00:00");
    var now = new Date();
    if (now >= countDownDate) {
        $('#entryform').prop('hidden', false);
    } else {
        $('#entryform').prop('hidden', true);
    }

    // // Update the count down every 1 second
    // var x = setInterval(function() {

    //     // Get today's date and time
    //     var now = new Date().getTime();

    //     // Find the distance between now and the count down date
    //     var distance = countDownDate - now;

    //     // Time calculations for days, hours, minutes and seconds
    //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     // Output the result in an element with id="demo"
    //     document.getElementById("demo").innerHTML = 'Countdown for Entry close : ' + hours +
    //         "h " +
    //         minutes + "m " + seconds + "s ";

    //     // If the count down is over, write some text 
    //     if (distance < 0) {
    //         clearInterval(x);
    //         document.getElementById("demo").innerHTML = "Entry is closed";
    //         document.getElementById('entryform').href = '#';
    //     }
    // }, 1000);
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
                    if (res.data.status) {
                        outputhtml = '<div class = "alert alert-success">' + res.data.message +
                            '</div>';
                        $('.error-message').html(outputhtml);
                        window.location.href = "./main.php";
                    } else {
                        outputhtml = '<div class = "alert alert-danger">' + res.data.message +
                            '</div>';
                        $('.error-message').html(outputhtml);
                    }
                })
        })
    })
    </script>
</body>

</html>