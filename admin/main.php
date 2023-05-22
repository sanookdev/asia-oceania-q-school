<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "<script>
    alert('username or password is invalid. you dont have permission.');
    window.location.href = './logout.php';
    </script>"; 
    exit();
}else{
    if($_SESSION['user']!= "ADMIN"){
        echo "<script>
        alert('username or password is invalid. you dont have permission.');
        window.location.href = './logout.php';
        </script>"; 
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>asia-oceania-q-school ( Admin Dashboard )
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- vido js CSS  -->
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
    <!-- flag CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/adminStyle.css">
    <!-- LINK CSS  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">

    <!-- Alertify -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />

    <style>
    td .btn-nowarp {
        width: 100% !important;
        margin-top: 5px !important;
    }
    </style>
</head>

<body class="layout-navbar-fixed ">
    <div id="overlay"></div>
    <div class="wrapper">
        <!-- Navbar -->
        <? include "./layouts/nav.php";?>

        <!-- sidebar-container  -->
        <? include "./layouts/sidebar.php";?>

        <!-- Content Wrapper. Contains page content [main] -->
        <div class="content-wrapper">
            <div class="card mb-2 mt-4">
                <div class="card-header">
                    <div class="form-row">
                        <div class="col-md-1 ">
                            <i class="fas fa-list-alt mr-1"></i> REPORT FORM
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="10%">Apply Date</th>
                                    <th>Entry Form No.</th>
                                    <th>Payment status</th>
                                    <th>Email</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Family Name</th>
                                    <th>Country</th>

                                    <!--  -->
                                    <th>Tshirt</th>
                                    <th>Tshirt black</th>
                                    <th>Tshirt black details</th>
                                    <th>Tshirt white</th>
                                    <th>Tshirt white details</th>

                                    <!--  -->
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody class="fetch_data"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a id="back-to-top" href="#" class="btn btn-secondary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>
        <!-- /.content-wrapper -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->




        <!-- footer layout -->
        <? include "./layouts/footer.php";?>

    </div>

    <div class="modal fade" id="listPhoto" tabindex="-1" role="dialog" aria-labelledby="listPhotoTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="listPhoto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/theme.js"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- DATATABLE JS  -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>


    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
    $(document).ready(() => {

        const USERNAME = <?= json_encode($_SESSION['user']);?>

        callpdf = (personal_id) => {
            if (personal_id != '') {
                window.open('./api/previewPdf.php?personal_id=' + personal_id);
            } else {
                alert('AccessDenied');
            }
        }
        viewPhoto = (personal_id) => {
            console.log(personal_id);
            axios.post('./api/informations.php', {
                action: 'listPhoto',
                personal_id: personal_id
            }).then((res) => {
                console.log(res);
                output = '';
                if (res.data.length > 0) {
                    output += '<div class = "p-2">';
                    output += '<div class = "alert alert-success">Documents</div>'
                    for (i = 0; i < res.data.length; i++) {
                        let photo = res.data[i].split('/');
                        let namefile = photo[photo.length - 1];
                        let locationFile = '../uploads/profiles/' + personal_id + '/' + namefile
                        console.log(photo);
                        output += '<div><a href="' + locationFile + '" target ="_blank">' +
                            namefile +
                            '</a></div>'
                    }
                    output += '</div>';

                } else {
                    output += '<div class = "alert alert-danger">Folder is Empty</div>';
                }
                $('.listPhoto').html(output);
                $('#listPhoto').modal('show');
            })
        }
        deleteData = (personal_id) => {
            console.log(personal_id);
            alertify.confirm("Are you sure ?",
                function() {
                    axios.post('./api/informations.php', {
                        action: 'deleteData',
                        personal_id: personal_id
                    }).then((res) => {
                        if (res.status) {
                            window.location.reload();
                        } else {
                            alertify.error(res.message);
                        }
                    })
                },
                function() {
                    alertify.error('Cancel');
                });

        }

        confirm_pay = (personal_id, payment_status) => {
            let newStatus = 0;
            if (payment_status == 1) {
                newStatus = 0;
            } else {
                newStatus = 1;
            }
            console.log(personal_id, newStatus)

            alertify.confirm("Are you sure ?",
                function() {
                    axios.post('./api/informations.php', {
                        action: 'confirm_pay',
                        personal_id: personal_id,
                        payment_status: newStatus
                    }).then((res) => {
                        if (res.status) {
                            window.location.reload();
                        } else {
                            alertify.error(res.message);
                        }
                    })
                },
                function() {
                    alertify.error('Cancel');
                });

        }


        axios.post('./api/informations.php', {
            action: 'listRegister'
        }).then((res) => {
            console.log(res);
            let data = res.data.data;
            output = '';
            if (res.data.message != 'nodata') {
                for (i = 0; i < data.length; i++) {
                    // let file = this.viewPhoto(data[i]['id']);
                    // console.log(data[i]['id'], file);
                    output += '<tr>';
                    output += '<td>' + parseInt(i + 1) + '</td>';
                    output += '<td>' + data[i]['created'] + '</td>';
                    output += '<td>' + data[i]['id'] + '</td>';
                    let tshirt_priceTHB = (parseInt(data[i]['tshirtblack']) + parseInt(data[i][
                            'tshirtwhite'
                        ])) *
                        425;
                    let tshirt_priceEURO = (parseInt(data[i]['tshirtblack']) + parseInt(data[i][
                            'tshirtwhite'
                        ])) *
                        10;
                    total_priceTHB = 17000 + tshirt_priceTHB;
                    total_priceEURO = 400 + tshirt_priceEURO;
                    output += '<td>';
                    // output += '<p>tshirt ' + data['tshirt'] + ' ea = £' + tshirt_priceEURO +
                    //     ' or ' +
                    //     tshirt_priceTHB + 'THB</p>';
                    // output += '<p>application = £400 or 17000 THB</p>';
                    // output += '<p class = "text-info">Total price = £' + total_priceEURO + ' or ' +
                    //     total_priceTHB +
                    //     ' THB</p>';
                    output += 'Total price : <span class = "text-secondary">' + total_priceTHB +
                        '</span><br>';

                    if (data[i]['waitingConfirm'] && data[i]['payment_status'] != '1') {
                        output +=
                            '<span class = "badge badge-info">Waiting for balance verificatio</span>';
                    } else {
                        if (data[i]['payment_status'] == '1') {
                            output += '<span class = "badge badge-success">paid</span>'
                        } else {
                            output += '<span class = "badge badge-warning">pending payment</span>';
                        }

                    }
                    output += '</td>';

                    output += '<td>' + data[i]['email'] + '</td>';
                    output += '<td>' + data[i]['firstname'] + '</td>';
                    output += '<td>' + data[i]['middlename'] + '</td>';
                    output += '<td>' + data[i]['familyname'] + '</td>';
                    output += '<td>' + data[i]['country'] + '</td>';
                    // 
                    output += '<td>' + data[i]['tshirt'] + '</td>';
                    output += '<td>' + data[i]['tshirtblack'] + '</td>';
                    output += '<td>' + data[i]['tshirtblack_details'] + '</td>';
                    output += '<td>' + data[i]['tshirtwhite'] + '</td>';
                    output += '<td>' + data[i]['tshirtwhite_details'] + '</td>';
                    // 
                    output += '<td>' + '<button class = "btn btn-outline-info btn-sm" value="' +
                        data[i]['id'] + '" onclick = "callpdf(' + "'" + data[i][
                            'id'
                        ] + "'" + ')"><i class="fas fa-file-pdf"></i></button>';
                    output += '<button class = "btn btn-outline-info btn-sm ml-2" value="' +
                        data[i]['id'] + '" onclick = "viewPhoto(' + "'" + data[i][
                            'id'
                        ] + "'" + ')"><i class="fas fa-folder"></i></button>';
                    output += '<button class = "btn btn-outline-danger btn-sm ml-2" value="' +
                        data[i]['id'] + '" onclick = "deleteData(' + "'" + data[i][
                            'id'
                        ] + "'" + ')"><i class="fas fa-trash"></i></button>';
                    output +=
                        '<button class = "btn btn-success btn-sm btn-nowarp" onclick = "confirm_pay(' +
                        "'" + data[i]['id'] + "','" + data[i]['payment_status'] + "'" +
                        ')">Confirm Pay</button>';
                    output += '</td>';
                    output += '</tr>';
                }
            }

            $('.fetch_data').html(output);
            var table = $('#dataTable').DataTable({
                lengthChange: false,
                buttons: ['excel'],
            });
            table.buttons().container()
                .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        })
    })
    </script>
</body>

</html>
<style scoped>
.card-header {
    width: 100%
}

.card,
.card-header,
.btn {
    border-radius: 0;
}

tr td .btn {
    width: 30px;

}

.modal .modal-content,
.modal .modal-content .form-group .form-control {
    background-color: #FFFFFF;
    color: #2E2E2E
}

/* .modal-body {
    margin-left: 9%;
    margin-right: 9%;
} */

.table td,
.table th {
    vertical-align: middle;
}

table tbody td {
    cursor: pointer;
}
</style>