<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <META HTTP-EQUIV="Refresh" CONTENT="0;URL=http://www.asia-oceania-q-school.com"> -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <title>Asia Oceania Q School 2023</title>
    <style>
    .btn-success {
        background-color: #2bc48a !important;
        color: black;
    }

    .img-logo {
        height: 60px;
        width: auto;
        margin-bottom: 10px;
    }

    .btnGroup {
        padding-left: 30px;
        padding-right: 30px;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card text-center">
                <div class="card-header">
                    <div class="d-flex justify-content-end social_icon">
                        <span
                            onclick="window.open('https://www.facebook.com/BsatTH?mibextid=ZbWKwL%E2%80%8B','_blank')"><i
                                class="fab fa-facebook-square"></i></span>
                        <span onclick="window.open('http://www.thailandsnooker.org/','_blank')">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="card-body mt-3" style="color:white">
                    <img src="./pictures/logo/SAT-English.jpg" class="img-logo" alt="">
                    <img src="./pictures/logo/WST-Logo-Large.png" class="img-logo" alt="">
                    <img src="./pictures/logo/BSAT-Logo.jpg" class="img-logo" alt="">
                    <h5 style="color:white">Asia & Oceania Q School</h5>
                    1 - 15 June 2023 Bangkok, Thailand <br>
                    <div class="btnGroup">
                        <a class="btn btn-warning btn-block mt-md-2" target="_blank" href="./entry-pack.pdf">
                            <i class="fa fa-info-circle"></i>
                            Entry Pack
                        </a>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="./entry-form" style="color:orange!important;" id="entryform">Entry Form</a>
                    <span style="color:white;" class="mr-2 ml-2" id="or"> or</span>
                    <a href="./user" style="color:orange!important;">Log In</a>
                </div>

                <div class="mt-3">
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
    // Set the date we're counting down to
    var countDownDate = new Date("Apr 24, 2023 12:00:00");
    var now = new Date();
    if (now >= countDownDate) {
        $('#entryform').prop('hidden', false);
        $('#or').prop('hidden', false);
    } else {
        $('#entryform').prop('hidden', true);
        $('#or').prop('hidden', true);
    }

    // Update the count down every 1 second
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
    // 
    </script>
</body>

</html>