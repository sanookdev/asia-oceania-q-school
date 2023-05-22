<?
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user'] != "ADMIN"){
        echo "You dont have permission.";
        print_r($_SESSION);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST PAYMENT</title>
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

<body>
    <div class="container mt-5">
        <form id="payment-form" method="POST" action="./api/test_charge.php"><input type="hidden" name="omiseToken">
            <input type="hidden" id="amount" name="amount">
            <p>
                <button class="btn btn-outline-info btn-sm" type="submit" id="checkout-button">
                    PAY NOW</button>
            </p>
        </form>
    </div>


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

        setOmise(2000);
    })
    </script>
</body>

</html>