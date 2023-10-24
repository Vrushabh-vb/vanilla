   <!-- inheriting navbar -->
   <?php require 'navbar.php' ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'dbconnect.php';
 


  $username = $_POST['username'];
  $email = $_POST['email'];

  $stmt = $conn->prepare("SELECT id, username, email FROM `signup` WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($user_id, $db_username, $db_email);
  $stmt->fetch();
  $stmt->close();

  // Check if the email exists 
  if ($db_username === $username && $db_email === $email) {

session_start();
$_SESSION['username'] = $db_username; 
$_SESSION['email'] = $email;

// redirecting
header("Location: index.php");
exit();
  } else {
    $error_message = "Invalid email or password.";
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/style.css" />
  <style>
    @media (min-width: 992px) {
      .rounded-lg-3 {
        border-radius: 0.3rem;
      }
    }
  </style>
</head>

<body data-bs-theme="dark">



  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Login</h1>
        <p class="col-lg-10 fs-4">Login By Your Email and Username!</p>
        <?php
        if (isset($error_message)) {
          echo '<div class="alert alert-danger" role="alert">' . $error_message . '</div>';
        }
        ?>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" action="login.php" method="POST">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Username" name="username" />
            <label for="floatingPassword">Username</label>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" />
            <label for="floatingInput">Email address</label>
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me" name="remember" /> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">
            Log In
          </button>
          <hr class="my-4" />
          <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
    </div>
  </div>

  <!-- script -->
  <!-- <link rel="stylesheet" href="db/user_login.php"> -->

</body>

</html>