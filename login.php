<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Vite App</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

<body >

  <div class=" flex items-center justify-center h-screen bg-sky-300		">

  <div class="bg-white p-6 rounded-lg md:w-[30%]">
    <h1 class="text-black text-3xl justify-center">Log In</h1>
    <form action="loginD.php" method="POST" class="max-w-md mx-auto">
        <div class="mt-5">
          <input type="text" name="email" placeholder="Email" class="border border-gray-400 py-1 px-2 w-full">
        </div>
        <div class="mt-5">
          <input type="password" name="password" placeholder="Password" class="border border-gray-400 py-1 px-2 w-full">
        </div>
        <div class="mt-5">
          <input type="checkbox" name="remember-me" class="border border-gray-400">
          Pemember me
        </div>
        <div class="mt-5">
          <button class="w-full bg-indigo-400 py-3 text-center text-white" name="login-btn">Login</button>
          <p>I don't have an account <a href="Register.html" class="text-bold underline">Register Now</a></p>
        </div>
      </form>
  </div>
  </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
