<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <style>
    .ui-datepicker-calendar {
        display: none;
    }

    .error {
        color: red;
    }
    </style>
</head>

<body>
    <? require('./info/moredetails.php');?>
    <div class="container box">
        <div class="card mt-3">
            <div class="card-body">
                <div class="card-title text-center p-md-5" style="padding-bottom:0px!important;">
                    <img src="./pictures/logo/BSAT-Logo.jpg" class="img-logo mr-3" alt="">
                    <img src="./pictures/logo/WST-Logo-Large.png" class="img-logo" alt="">
                    <img src="./pictures/logo/SAT-English.jpg" class="img-logo" style="margin-left: -10px" alt="">

                    <h4 class="mt-3 head-title">
                        Entry Form<br>
                        Asia & Oceania Q School 2022 <br>
                        1 - 15 June 2022 <br>
                        Bangkok, Thailand
                    </h4>
                    <div class="mt-3">
                        <p id="demo" style="color:red;background-color:yellow"></p>
                    </div>
                </div>
                <form action="#" id="form_register" class="mt-4 was-validated">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="prefix">Prefix</label>
                            <select name="prefix" id="prefix" class="form-control" required>
                                <option value="Mr.">Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss.">Miss.</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="forThai">Thai Nationality</label>
                            <select name="forThai" id="forThai" class="form-control" required>
                                <option value="">Choose</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="firstname">First Name*</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" id="middlename">
                        </div>
                        <div class="col-md-4">
                            <label for="familyname">Family Name*</label>
                            <input type="text" class="form-control" name="familyname" id="familyname" required>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label>Gender*</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dateofbirth">Date Of Birth*</label>
                            <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="age">Age*</label>
                            <input type="number" class="form-control" name="age" id="age" min="12" value="12" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pob">Place Of Birth*</label>
                            <input type="text" class="form-control" name="pob" id="pob" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="country">Country*</label>
                            <input type="text" class="form-control" name="country" id="country" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nationality">Nationality*</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="passportNo">Passport No</label>
                            <span class="error">(Mandatory)</span>
                            <input type="text" class="form-control" name="passportNo" id="passportNo" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="idcard">Thai Citizenship I.D. No</label>
                            <input type="text" class="form-control" name="idcard" id="idcard" max="13" disabled>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="issueddate">Issued Date*</label>
                            <input type="date" class="form-control" name="issueddate" id="issueddate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="expirydate">Expiry Date*</label>
                            <input type="date" class="form-control" name="expirydate" id="expirydate" required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="formerProfessional">Former Professional*</label>
                            <select name="formerProfessional" id="formerProfessional" class="form-control" required>
                                <option value="">Choose</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="yearsactive">Years Active*</label>
                            <input type="text" class="form-control" name="yearsactive" id="yearsactive" disabled>
                        </div>
                        <div class="col-md-4">
                            <label for="highestWorldrankingPeryear">Highest World Ranking / Year </label>
                            <input type="text" class="form-control" name="highestWorldrankingPeryear"
                                id="highestWorldrankingPeryear">
                        </div>
                        <div class="col-md-4">
                            <label for="lastestWorldrankingPeryear">Latest World Ranking / Year</label>
                            <input type="text" class="form-control" name="lastestWorldrankingPeryear"
                                id="lastestWorldrankingPeryear">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-6">
                            <label for="bestPracticebreak">Best Practice Break*</label>
                            <input type="text" class="form-control" name="bestPracticebreak" id="bestPracticebreak"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="bestTournamentbreak">Best Tournament Break*</label>
                            <input type="text" class="form-control" name="bestTournamentbreak" id="bestTournamentbreak"
                                required>
                        </div>
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="dateofarrival">Date of Arrival</label>
                            <input type="date" class="form-control" name="dateofarrival" id="dateofarrival">
                        </div>
                        <div class="col-md-4">
                            <label for="airline">Airline </label>
                            <input type="text" class="form-control" name="airline" id="airline">
                        </div>
                        <div class="col-md-4">
                            <label for="flightNo">Flight No</label>
                            <input type="text" class="form-control" name="flightNo" id="flightNo">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-2">
                            <label for="partyNo">No. of Party</label>
                            <input type="number" class="form-control" name="partyNo" id="partyNo" min="0" max="2"
                                value="0">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="firstnameParty1">1.Party Name</label>
                            <input placeholder="First Name*" type="text" class="form-control" name="firstnameParty1"
                                id="firstnameParty1">
                        </div>
                        <div class="col-md-4">
                            <label for="middlenameParty1" style="opacity : 0">1.</label>
                            <input placeholder="Middle Name" type="text" class="form-control" name="middlenameParty1"
                                id="middlenameParty1">
                        </div>
                        <div class="col-md-4">
                            <label for="familynameParty1" style="opacity : 0">1.</label>
                            <input placeholder="Family Name*" type="text" class="form-control" name="familynameParty1"
                                id="familynameParty1">
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="col-md-4">
                            <label for="firstnameParty2">2.Party Name</label>
                            <input placeholder="First Name" type="text" class="form-control" name="firstnameParty2"
                                id="firstnameParty2">
                        </div>
                        <div class="col-md-4">
                            <label for="middlenameParty2" style="opacity : 0">2</label>
                            <input placeholder="Middle Name" type="text" class="form-control" name="middlenameParty2"
                                id="middlenameParty2">
                        </div>
                        <div class="col-md-4">
                            <label for="familynameParty2" style="opacity : 0">2</label>
                            <input placeholder="Family Name" type="text" class="form-control" name="familynameParty2"
                                id="familynameParty2">
                        </div>
                    </div>
                    <hr>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#hotelDetails">
                        <i class="fa fa-info-circle"></i>
                        Accommodation Details
                    </a>

                    <div class="form-row mt-4">
                        <div class="col-md-6">
                            <label for="hotelReservation">Hotel Reservation Request*</label>
                            <select name="hotelReservation" id="hotelReservation" class="form-control">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="typeRoom">Type of Room</label>
                            <select name="typeRoom" id="typeRoom" class="form-control" disabled>
                                <option value="">Choose</option>
                                <option value="Single">Single</option>
                                <option value="Twin">Twin</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h5>Other Information:</h5>
                    <a class="btn btn-primary mt-2" data-toggle="modal" data-target="#testGoProcedure">
                        <i class="fa fa-info-circle"></i>
                        Test & Go procedure
                    </a>
                    <a class="btn btn-primary mt-2" data-toggle="modal" data-target="#entryFee">
                        <i class="fa fa-info-circle"></i>
                        Entry fee
                    </a>
                    <a class="btn btn-primary mt-2" data-toggle="modal" data-target="#closingDate">
                        <i class="fa fa-info-circle"></i>
                        Closing dates
                    </a>
                    <hr>
                    <h5>Player’s Contact Information:</h5>
                    <div class="form-row mt-3">
                        <div class="col-md-8">
                            <label for="homeAddress">Home Address*</label>
                            <textarea rows="4" class="form-control" name="homeAddress" id="homeAddress"
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-row mt-4">
                        <div class="col-md-6">
                            <label for="email">Email Address*</label><span class="error">(Mandatory and Case
                                Sensitive)</span>
                            <input type="text" class="form-control" name="email" id="email" required>
                            <span class="err-emailMessage"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile">Mobile No.*</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" required>
                        </div>
                    </div>

                    <div class="form-row mt-4">
                        <div class="col-md-4">
                            <label for="facebook">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="facebook">
                        </div>
                        <div class="col-md-4">
                            <label for="twitter">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="twitter">
                        </div>
                        <div class="col-md-4">
                            <label for="line_id">Line</label>
                            <input type="text" class="form-control" name="line_id" id="line_id">
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col-md-4">
                            <label for="weibo_id">Weibo</label>
                            <input type="text" class="form-control" name="weibo_id" id="weibo_id">
                        </div>
                        <div class="col-md-4">
                            <label for="whatsapp_id">WhatsApp</label>
                            <input type="text" class="form-control" name="whatsapp_id" id="whatsapp_id">
                        </div>
                        <div class="col-md-4">
                            <label for="wechat_id">Wechat</label>
                            <input type="text" class="form-control" name="wechat_id" id="wechat_id">
                        </div>
                    </div>
                    <hr>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#competitionVanue">
                        <i class="fa fa-info-circle"></i>
                        Venue Information
                    </a>
                    <br>
                    <div class="alert alert-warning mt-2">
                        I hereby confirm to take part in this year Asia & Oceania Q School and
                        will
                        be fully responsible for all the costs effective on my own expenses.
                    </div>

                    <hr>
                    <h5>Require Immediately:</h5>
                    <div class="form-row mt-4">
                        <div class="col-md-6">
                            <label for="bankDepositSlip">Bank Deposit Slip:<br>
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="bankDepositSlip" name="file[]"
                                        onchange="fileChangeName($(this))">
                                    <label class="custom-file-label bankDepositSlipNamefile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 style="color:red" class="mt-4">Other Require Documents (must be submit before closing date to
                        complete the
                        entry)</h5>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="facePhoto">Profile Photo<br>
                                (Color Photo with white background no less than 100 kb)
                            </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="facePhoto" name="file[]"
                                        onchange="fileChangeName($(this))">
                                    <label class="custom-file-label facePhotoNamefile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="idcardPhoto">Passport Photo: / <br>
                                Thai Citizenship I.D. Photo (for Thai Nationality only)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="idcardPhoto" name="file[]"
                                        onchange="fileChangeName($(this))">
                                    <label class="custom-file-label idcardPhotoNamefile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-4">
                        <div class="col-md-6">
                            <label for="flightTicket">Arrival Flight Ticket Confirmation:<br>
                                (Non-resident only)
                            </label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="flightTicket" name="file[]"
                                        onchange="fileChangeName($(this))">
                                    <label class="custom-file-label flightTicketNamefile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="vacineCert">Vaccination Certificate:</label>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="vacineCert" name="file[]"
                                        onchange="fileChangeName($(this))">
                                    <label class="custom-file-label vacineCertNamefile">Choose file</label>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <button type="submit" class="btn btn-outline-success float-right btn_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <!-- <script src="./js/register.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
    // var file = [];
    // Set the date we're counting down to
    var countDownDate = new Date("May 16, 2023 12:00:00").getTime();

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
    //         document.getElementById('form_register').innerHTML = "";
    //     }
    // }, 1000);

    $(document).ready(() => {
        $('#form_register').on('submit', ((e) => {
            e.preventDefault();
            datas = {};
            $.each($("#form_register").serializeArray(), function(i, field) {
                datas[field.name] = field.value;
            });
            delete datas['forThai'];
            if (datas['passportNo'] == '' && datas['idcard'] == '') {
                alertify.error('Mandatory Passport No or Thai Citizenship I.D. ');
            } else {
                axios.post('./api/informations.php', {
                    action: 'register',
                    data: datas
                }).then((res) => {
                    if (res.data.status) {
                        uploadFile(res.data.personal_id);
                    }
                })
            }
        }))

        $('#hotelReservation').on('change', () => {
            let val = $('#hotelReservation').find(":selected").val();
            console.log(val);
            if (val == 'Yes') {
                $('#typeRoom').prop('disabled', false);
                $('#typeRoom').prop('required', true);

            } else {
                $('#typeRoom').val('');
                $('#typeRoom').prop('required', false);
                $('#typeRoom').prop('disabled', true);
            }
        })

        $('#formerProfessional').on('change', () => {
            let val = $('#formerProfessional').find(":selected").val();
            if (val == 'Yes') {
                $('#yearsactive').prop('disabled', false);
                $('#yearsactive').prop('required', true);
            } else {
                $('#yearsactive').val('');
                $('#yearsactive').prop('required', false);
                $('#yearsactive').prop('disabled', true);
            }
        })

        $('#forThai').on('change', () => {
            let val = $('#forThai').find(":selected").val();
            if (val == 'Yes') {
                $('#idcard').prop('disabled', false);
                $('#idcard').prop('required', true);
                $('#passportNo').prop('disabled', true);
                $('#passportNo').val('');
            } else if (val == 'No') {
                $('#idcard').prop('disabled', true);
                $('#idcard').val('');
                $('#passportNo').prop('disabled', false);
                $('#passportNo').prop('required', true);
            } else {
                $('#idcard').prop('disabled', true);
                $('#passportNo').prop('disabled', true);
                $('#idcard').val('');
                $('#passportNo').val('');
            }
        })

        $('#email').on('change', () => {
            axios.post('./api/informations.php', {
                    action: 'checkDuplicateEmail',
                    email: $('#email').val()
                })
                .then((res) => {
                    let output = '';
                    if (res.data.status) {
                        output = '<p style = "color:green">' + res.data.message +
                            '</p>';
                        $('.btn_submit').prop('disabled', false);
                    } else {
                        output = '<p style ="color:red">' + res.data.message +
                            '</p>';
                        $('.btn_submit').prop('disabled', true);

                    }
                    $(".err-emailMessage").html(output);
                })
        })

        fileChangeName = (e) => {
            console.log(e[0].id);
            var path_name = e.val();
            if (path_name) {
                var startIndex = (path_name.indexOf('\\') >= 0 ? path_name.lastIndexOf('\\') : path_name
                    .lastIndexOf('/'));
                var filename = path_name.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                idNameFile = '.' + e[0].id + 'Namefile';
                $(idNameFile).html(filename);
            }
        }
    })

    function _(el) {
        return document.getElementById(el);
    }

    function getFile(idFile) {
        return _(idFile).files[0];
    }
    // var listFile = ['vacineCert', 'flightTicket', 'idcardPhoto', 'facePhoto', 'bankDepositSlip'];
    var listFile = ['flightTicket', 'idcardPhoto', 'facePhoto', 'bankDepositSlip'];

    function uploadFile(personal_id) {
        let reName = '';
        let checkEmptyFile = 0;
        for (i = 0; i < listFile.length; i++) {
            let file = getFile[listFile[i]];
            if (typeof file !== 'undefined') {
                $checkEmptyFile++;
            }
        }

        if (checkEmptyFile == 0) {
            alertify.alert("Completed", function() {
                window.location.href = './user';
            });
        }

        for (i = 0; i < listFile.length; i++) {
            if (listFile[i] == 'vacineCert') {
                reName = 'vacinecertificate';
            } else if (listFile[i] == 'flightTicket') {
                reName = 'arrival_flight_ticket';
            } else if (listFile[i] == 'idcardPhoto') {
                reName = 'idcard';
            } else if (listFile[i] == 'facePhoto') {
                reName = 'profile';
            } else if (listFile[i] == 'bankDepositSlip') {
                reName = 'bankDepositSlip';
            }
            let file = getFile(listFile[i]);
            if (typeof file !== 'undefined') {
                let formdata = new FormData();
                formdata.append(listFile[i], file);
                formdata.append('personal_id', personal_id);
                formdata.append('reName', reName);
                let url = "./api/file_upload_parser.php";
                $.ajax({
                    type: 'post',
                    url: url,
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function(response) {
                        console.log(response)
                        if (response == '1') {
                            alertify
                                .alert("Completed", function() {
                                    window.location.href = './user';
                                });
                        } else {
                            alertify.error(response);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        }
    }
    </script>
</body>

</html>