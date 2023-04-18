<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Example 4: Custom Integration Multiple Buttons</title>
    <link rel="stylesheet" href="styles/examples.css">
    <link rel="stylesheet" href="styles/custom.css">
</head>

<body>

    <div class="form">

        <h1>Example 4: Custom Integration Multiple Buttons</h1>
        <p>Create a multiple checkout button.</p>

        <form name="checkoutForm" method="POST" action="checkout.html">

            <!-- Create your own button -->
            <p><button type="submit" id="checkout-button-1">Checkout Button number 1 !</button></p>
            <p><button type="submit" class="checkout-button-2">Checkout Button number 2 !</button></p>
            <p><button type="submit" id="checkout-button-3">Checkout Button number 3 !</button></p>
        </form>

    </div>

    <!-- Include card.js library -->
    <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>

    <!-- Config the card.js library -->
    <script type="text/javascript">
    // Set default parameters
    OmiseCard.configure({
        publicKey: 'YOUR_PUBLIC_KEY',
        image: 'https://cdn.omise.co/assets/dashboard/images/omise-logo.png',
        frameLabel: 'Merchant Name',
    });

    // Configuring your own custom button
    OmiseCard.configureButton('#checkout-button-1', {
        buttonLabel: 'PAY Now 4,500 Baht',
        submitLabel: 'PAY NOW',
        amount: 450000
    });

    // Configuring your own custom button
    OmiseCard.configureButton('.checkout-button-2', {
        buttonLabel: 'PAY Now 6,900 Dollar',
        submitLabel: 'PAY NOW',
        amount: 690000,
        currency: 'usd'
    });

    // Configuring your own custom button
    OmiseCard.configureButton('#checkout-button-3', {
        buttonLabel: 'PAY Now 12,599 Yen',
        submitLabel: 'PAY NOW',
        amount: 12599,
        currency: 'jpy'
    });

    // Then, attach all of the config and initiate it by 'OmiseCard.attach();' method
    OmiseCard.attach();
    </script>
</body>

</html>