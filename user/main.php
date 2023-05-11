<?
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == 'ADMIN'){
    header('Location: ./logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>asia-oceania-q-school ( User Dashboard )</title>

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
                        <div class="col-md-12 ">
                            <i class="fas fa-list-alt mr-1"></i> MY ENTRY FORM
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th width="13%">Application No.</th>
                                    <th width="10%">Apply Date</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Family Name</th>
                                    <th>Total price</th>
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

    <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>


    <script>
    $(document).ready(() => {
        const username = <?= json_encode($_SESSION['user']);?>;
        const personal_id = <?= json_encode($_SESSION['personal_id']);?>;

        setOmise = (amount) => {
            OmiseCard.configure({
                publicKey: 'pkey_test_5vhvxzw47q7827bebv4',
                image: 'http://localhost/asia-oceania-q-school/pictures/logo/BSAT-Logo.jpg',
                frameLabel: 'BSAT THAILAND',
                currency: "THB",
                amount: amount
            });

            // Configuring your own custom button
            OmiseCard.configureButton('#checkout-button', {
                buttonLabel: 'PAY Now ' + amount / 100 + '.00 THB',
                submitLabel: 'PAY NOW',
                amount: amount
            });

            $('#amount').val(amount);
            OmiseCard.attach();
        }




        callpdf = (personal_id) => {
            if (personal_id != '') {
                window.open('./api/previewPdf.php?personal_id=' + personal_id);
            } else {
                alert('AccessDenied');
            }
        }
        viewPhoto = () => {
            axios.post('./api/informations.php', {
                action: 'listPhoto',
                personal_id: personal_id
            }).then((res) => {
                output = '';
                if (res.data.length > 0) {
                    output += '<div class = "p-2">';
                    output += '<div class = "alert alert-success">Documents</div>'
                    for (i = 0; i < res.data.length; i++) {
                        let photo = res.data[i].split('/');
                        let namefile = photo[photo.length - 1];
                        let locationFile = '../uploads/profiles/' + personal_id + '/' + namefile
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
        editProfile = () => {
            window.location.href = "./editForm.php";
        }

        axios.post('./api/informations.php', {
            action: 'myRegister',
            personal_id: personal_id
        }).then((res) => {
            let data = res.data.data;
            output = '';
            let total_priceEURO = 0;
            let total_priceTHB = 0;
            if (res.data.message != 'nodata') {
                if (data['id'] < 10) {
                    data['id'] = '00' + data['id'];
                } else if (data['id'] < 100) {
                    data['id'] = '0' + data['id'];
                }

                output += '<tr>';
                output += '<td>' + data['id'] + '</td>';
                output += '<td>' + data['created'] + '</td>';
                output += '<td>' + data['firstname'] + '</td>';
                output += '<td>' + data['middlename'] + '</td>';
                output += '<td>' + data['familyname'] + '</td>';

                let buttonPayment =
                    '<form id="payment-form" method="POST" action="./api/charge.php"><input type="hidden" name="omiseToken"><input type = "hidden" id = "amount" name = "amount" value = "100000"><p><button class="btn btn-outline-info btn-sm float-right" type="submit" id="checkout-button">PAY NOW</button></p> </form>';

                let classPaymentStatus = (data['payment_status'] == 1) ? 'text text-success' :
                    'text text-danger';
                let messagePayment = (data['payment_status'] == 1) ? 'paid' :
                    'pending payment';

                let tshirt_priceTHB = (parseInt(data['tshirtblack']) + parseInt(data['tshirtwhite'])) *
                    425;
                let tshirt_priceEURO = (parseInt(data['tshirtblack']) + parseInt(data['tshirtwhite'])) *
                    10;
                total_priceTHB = 17000 + tshirt_priceTHB;
                total_priceEURO = 400 + tshirt_priceEURO;

                output += '<td>';
                output += '<p>tshirt ' + (parseInt(data['tshirtblack']) + parseInt(data[
                        'tshirtwhite'])) +
                    ' ea = £' +
                    tshirt_priceEURO + ' or ' +
                    tshirt_priceTHB + 'THB</p>';
                output += '<p>application = £400 or 17000 THB</p>';
                output += '<p class = "text-success">Total price = £' + total_priceEURO + ' or ' +
                    total_priceTHB +
                    ' THB</p>';
                output += '<small class = "' + classPaymentStatus + '">' + messagePayment + '</small>';
                output += buttonPayment;
                output += '</td>';
                output += '<td>' + '<button class = "btn btn-outline-info btn-sm" value="' +
                    data['id'] + '" onclick = "callpdf(' + "'" + data[
                        'id'
                    ] + "'" + ')"><i class="fas fa-file-pdf"></i></button>';
                output += '<button class = "btn btn-outline-info btn-sm ml-2" value="' +
                    data['id'] + '" onclick = "viewPhoto()"><i class="fas fa-folder"></i></button>';
                output += '<button class = "btn btn-outline-info btn-sm btn_edit ml-2" value="' +
                    data['id'] +
                    '" onclick = "editProfile()"><i class="fas fa-upload"></i></button>';
                output += '</td>';

                output += '</tr>';
            }

            $('.fetch_data').html(output);
            setOmise(total_priceTHB * 100);
            // var table = $('#dataTable').DataTable({
            //     lengthChange: false,
            //     searching: false
            // });
            // table.buttons().container()
            //     .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        })
    })
    </script>

    <?
       if(isset($_SESSION['flash_message'])) {
            $message = $_SESSION['flash_message'];
            $status = $_SESSION['flash_status'];
            unset($_SESSION['flash_message']);
            unset($_SESSION['flash_status']);
            if($status){
                echo "<script>alertify.success(".json_encode($message).")</script>";
            }else{
                echo "<script>alertify.warning(".json_encode($message).")</script>";
            }
        }
    ?>
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


.table td,
.table th,
.table tr td {
    vertical-align: middle;
}

table tbody td {
    cursor: pointer;
}

#checkout-button {
    width: 100%;
}
</style>