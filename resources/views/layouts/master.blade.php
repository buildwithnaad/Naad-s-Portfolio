<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaadAli | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="https://naadali.onrender.com/assets/images/logo.png" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth:ital,wght@0,400;0,700;1,400;1,700&family=Bebas+Neue&family=Caveat:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Monoton&family=Noto+Sans:ital,wdth,wght@0,62.5,100..900;1,62.5,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Onest:wght@100..900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://naadali.onrender.com/assets/css/style.css">
    <link rel="stylesheet" href="https://naadali.onrender.com/build/assets/app-D27rO619.css">
    <link rel="stylesheet" href="https://naadali.onrender.com/build/assets/app-DKwNPa0n.js">
    <link rel="stylesheet" href="https://naadali.onrender.com/build/assets/app-Bfwsl08y.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
     integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <button id="scrollToTopBtn"
        class="fixed hidden h-[50px] w-[50px] flex justify-center items-center  text-white bg-[#FF4141] hover:bg-red-500 p-3 rounded-[15px] shadow-lg transition-all duration-300 z-50"
        style="bottom: 20px; right: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" fill='#fff'
            viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
            <path
                d="M342.6 81.4C330.1 68.9 309.8 68.9 297.3 81.4L137.3 241.4C124.8 253.9 124.8 274.2 137.3 286.7C149.8 299.2 170.1 299.2 182.6 286.7L288 181.3L288 552C288 569.7 302.3 584 320 584C337.7 584 352 569.7 352 552L352 181.3L457.4 286.7C469.9 299.2 490.2 299.2 502.7 286.7C515.2 274.2 515.2 253.9 502.7 241.4L342.7 81.4z" />
        </svg>
    </button>
    <x-header />

    <main class="container mx-auto main-section">
        <img style="z-index: -1" class="absolute top-[-120px] left-[-120px] bg-blue"
            src="https://naadali.onrender.com/assets/images/Ellipse 1.png" alt="" id="bg-image">
        @yield('content')

    </main>

    <!-- Scroll to Top Button -->

    <script>
        const scrollToTopBtn = document.getElementById("scrollToTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > window.innerHeight) {
                scrollToTopBtn.classList.remove("hidden");
                console.log('showed')
            } else {
                scrollToTopBtn.classList.add("hidden");
            }
        });

        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>

</body>
{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> --}}
<script src="https://naadali.onrender.com/assets/js/jQuery.js"></script>
<script src="https://naadali.onrender.com/assets/js/script.js"></script>

</html>
