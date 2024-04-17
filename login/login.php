<?php
session_start(); // Start session at the very beginning

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($user) {
        if (password_verify($password, $user["password"])) {
            $_SESSION["user"] = "yes";
            header("Location: userloggedin.html"); // Redirect after successful login
            die(); // Stop further execution
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email does not match</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <!-- NAV BAR -->

    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo"> -->
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Vroom</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div
                class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 bg-gray-50 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inquiry</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto max-w-screen-md mt-24 px-4">

        <form action="login.php" method="post">
        <div class="form-group">
    <input type="email" placeholder="Enter Email:" name="email"
        class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
</div>
<div class="form-group mt-4">
    <input type="password" placeholder="Enter Password:" name="password"
        class="form-control px-4 py-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-900 dark:text-white dark:border-gray-700">
</div>
<div class="form-btn mt-4">
    <input type="submit" value="Login" name="login"
        class="btn btn-primary px-4 py-2 bg-blue-700 text-white rounded-lg cursor-pointer focus:outline-none focus:bg-blue-800">
</div>

        </form>
        <div class="mt-4 text-center">
            <p>Not registered yet ?<a href="registration.php"
                    class="text-blue-700 hover:text-blue-900"> Register Here</a></p>
        </div>
    </div>

    <style>
        /* Additional CSS styles */
        body {
            padding: 150px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 30px;
            background-color: rgb(255, 255, 255);
        }
    </style>
</body>

</html>
