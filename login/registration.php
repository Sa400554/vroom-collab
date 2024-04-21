<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header>
    <!-- NAV BAR -->
    
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo"> -->
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Vroom</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
    
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
        </li>
        <li>
          <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inquiry</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
    
  <div class="container mx-auto max-w-screen-md mt-24 px-4">
    <?php
    if (isset($_POST["submit"])) {
       $fullName = $_POST["fullname"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       $passwordRepeat = $_POST["repeat_password"];
       
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);

       $errors = array();
       
       if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        array_push($errors,"All fields are required");
       }
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
       }
       if (strlen($password)<8) {
        array_push($errors,"Password must be at least 8 characters long");
       }
       if ($password!==$passwordRepeat) {
        array_push($errors,"Password does not match");
       }
       require_once "database.php";
       $sql = "SELECT * FROM users WHERE email = '$email'";
       $result = mysqli_query($conn, $sql);
       $rowCount = mysqli_num_rows($result);
       if ($rowCount>0) {
        array_push($errors,"Email already exists!");
       }
       if (count($errors)>0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
       } else {
        
        $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong");
        }
       }
      

    }
    ?>
    <form action="registration.php" method="post">
        <div class="form-group">
            <input type="text" name="fullname" placeholder="Full Name:"
                class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
        </div>
        <div class="form-group mt-4">
            <input type="email" name="email" placeholder="Email:"
                class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
        </div>
        <div class="form-group mt-4">
            <input type="password" name="password" placeholder="Password:"
                class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
        </div>
        <div class="form-group mt-4">
            <input type="password" name="repeat_password" placeholder="Repeat Password:"
                class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
        </div>
        <div class="form-btn mt-4">
            <input type="submit" name="submit" value="Register"
                class="btn btn-primary px-4 py-2 bg-blue-700 text-white rounded-lg cursor-pointer focus:outline-none focus:bg-blue-800">
        </div>
    </form>
    <div class="mt-4 text-center">
        <p>Already Registered? <a href="login.php" class="text-blue-700 hover:text-blue-900">Login Here</a></p>
    </div>
</div>

</body>
</html>