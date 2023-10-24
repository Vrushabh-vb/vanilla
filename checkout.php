<?php require 'dbconnect.php' ?>
<?php require 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>

<link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
  <meta name="google-signin-client_id" content="787245060481-4padi0c9g2l1pnbie52fmpfdpo43209i.apps.googleusercontent.com" />
  <meta name="google-signin-cookiepolicy" content="single_host_origin" />
  <meta name="google-signin-scope" content="profile email" />
  <meta name="google-site-verification" content="-eak5o6MaC8dcrUhendmbMxTX-Q7FRNdoXiHJpGY1es" />
  <meta property="al:web:should_fallback" content="true" />
  <meta name="apple-itunes-app" content="app-id=907394059, app-argument=https://www.myntra.com/" />

  <link rel="shortcut icon" href="./img/cart.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/utils.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .m {
            margin: 50px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;

        }

        .m,
        img,p {
            /* margin: 50px auto; */
            width: 300px;
            /* border: 1px solid black; */
        }
    </style>
</head>

<body>

    <div class="m">
        <img id="loading-gif" src="./img/animation.gif" alt="Loading">
        <h2>Order Successfully Placed</h2>
    </div>

    <script>
        setTimeout(function() {
            // After a delay, you can redirect the user to the checkout page or perform any other action
            window.location.href = "index.php";
        }, 2000);
    </script>

<?php require 'footer.php' ?>
</body>

</html>