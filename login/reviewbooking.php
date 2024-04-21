<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Vroom</title>
</head>
<body>
<!-- BOOKING -->


<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Vroom</span>
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">    </span>
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><i class="fa-solid fa-phone"></i></span>
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">946511343543</span>
      </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <a href="logout.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log Out</a>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
    </div>
    
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="userloggedin.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="loggedinabout.html" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="loggedininquiry.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Inquiry</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  
  <main class="self-center mt-8 w-full max-w-[1278px] max-md:max-w-full">
    <div class="flex gap-5 max-md:flex-col max-md:gap-0">
      <section class="flex flex-col w-[62%] max-md:ml-0 max-md:w-full">
        <div class="flex grow gap-5 items-start max-md:flex-wrap max-md:mt-10">
          <img loading="lazy" src="decorative-icon.svg" alt="Decorative icon" class="shrink-0 w-11 border-4 border-black border-solid aspect-[1.16] fill-blue-500 stroke-[4px] stroke-black">
          <div class="flex flex-col grow shrink-0 items-center mt-5 basis-0 w-fit max-md:max-w-full">
            <div class="shrink-0 max-w-full bg-zinc-300 h-[369px] w-[346px]" role="presentation"></div>
            <h2 class="self-stretch mt-16 text-4xl font-bold text-zinc-800 max-md:mt-10 max-md:max-w-full">Send the receipt to us via</h2>
            <button class="flex gap-5 mt-6 text-xl text-black whitespace-nowrap" onclick="sendEmail()">
              <img loading="lazy" src="email-icon.png" alt="Email icon" class="shrink-0 w-10 aspect-square">
              <p class="flex-auto my-auto">aaa@gmail.com</p>
            </button>
          </div>
        </div>
      </section>
      
      <aside class="flex flex-col ml-5 w-[38%] max-md:ml-0 max-md:w-full">
        <button class="justify-center self-stretch px-10 py-9 my-auto w-full text-4xl leading-4 text-black bg-emerald-500 max-md:px-5 max-md:mt-10 max-md:max-w-full" onclick="reviewBooking()">
          Review Your Booking
        </button>
      </aside>
    </div>
  </main>

  <script>
    function callNumber() {
      window.location.href = 'tel:9779841312141';
    }
    
    function goToHome() {
      window.location.href = '/';
    }
    
    function goToAbout() {
      window.location.href = '/about';  
    }
    
    function goToInquiry() {
      window.location.href = '/inquiry';
    }
    
    function toggleMenu() {
      // Toggle mobile menu visibility
    }
    
    function sendEmail() {
      window.location.href = 'mailto:aaa@gmail.com';
    }
    
    function reviewBooking() {
      // Handle booking review
    }
  </script>
</body>
</html>