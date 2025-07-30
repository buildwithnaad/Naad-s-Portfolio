<!-- Portfolio Section -->
<section class="flex justify-center flex-col items-center my-[100px]">
    <h2 class="sub-heading font-bold text-center text-[#FF4141]">My Portfolio</h2>

    <div class="card-container w-full flex justify-center items-stretch flex-wrap">
        <!-- Repeat manually since no Blade/loop -->
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/p1.png" alt="Project Image 1"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(0)" />
            </div>
        </div>
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/p2.png" alt="Project Image 2"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(1)" />
            </div>
        </div>
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/p3.png" alt="Project Image 3"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(2)" />
            </div>
        </div>
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/p4.png" alt="Project Image 4"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(3)" />
            </div>
        </div>
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/p5.png" alt="Project Image 5"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(4)" />
            </div>
        </div>
        <div class="portfolio-image-container p-3">
            <div class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="https://naadali.onrender.com/assets/images/project1.png" alt="Project Image 6"
                    class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                    onclick="openModal(5)" />
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="imageModal"
    class="fixed inset-0 z-50 hidden bg-black/90 backdrop-blur-sm flex items-center justify-center flex-col px-4 transition-opacity duration-500 ease-in-out">
    
    <!-- Close Button -->
    <button onclick="closeModal()"
        class="absolute top-6 right-6 text-white hover:text-red-500 text-4xl transition-transform transform hover:scale-110 z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M18.3 5.71a1 1 0 0 0-1.42 0L12 10.59 7.12 5.7A1 1 0 0 0 5.7 7.12L10.59 12l-4.88 4.88a1 1 0 1 0 1.41 1.42L12 13.41l4.88 4.89a1 1 0 0 0 1.42-1.42L13.41 12l4.89-4.88a1 1 0 0 0 0-1.41z"/>
        </svg>
    </button>

    <!-- Previous Button -->
    <button onclick="prevImage()"
        class="absolute left-6 top-1/2 transform -translate-y-1/2 text-white bg-[#FF4141] hover:bg-red-500 p-3 rounded-full transition-all duration-300 shadow-lg z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M15.41 7.41 14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
        </svg>
    </button>

    <!-- Next Button -->
    <button onclick="nextImage()"
        class="absolute right-6 top-1/2 transform -translate-y-1/2 text-white bg-[#FF4141] hover:bg-red-500 p-3 rounded-full transition-all duration-300 shadow-lg z-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8.59 16.59 13.17 12 8.59 7.41 10 6l6 6-6 6z"/>
        </svg>
    </button>

    <!-- Image Container -->
    <div class="w-full max-w-6xl max-h-[85vh] mt-20 mb-10 overflow-hidden rounded-2xl border-2 border-white/20 shadow-2xl transition-transform duration-500 transform hover:scale-[1.02]">
        <img id="modalImage"
            src=""
            alt="Preview"
            class="w-full h-auto object-contain rounded-2xl" />
    </div>
</div>


<script>
    const imagePaths = [
        "https://naadali.onrender.com/assets/images/p1.png",
        "https://naadali.onrender.com/assets/images/p2.png",
        "https://naadali.onrender.com/assets/images/p3.png",
        "https://naadali.onrender.com/assets/images/p4.png",
        "https://naadali.onrender.com/assets/images/p5.png",
        "https://naadali.onrender.com/assets/images/project1.png"
    ];

    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        const modal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        modalImage.src = imagePaths[currentIndex];
        modal.classList.remove("hidden");
        document.body.style.overflow = "hidden";
    }

    function closeModal() {
        const modal = document.getElementById("imageModal");
        modal.classList.add("hidden");
        document.getElementById("modalImage").src = "";
        document.body.style.overflow = "auto";
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imagePaths.length;
        document.getElementById("modalImage").src = imagePaths[currentIndex];
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + imagePaths.length) % imagePaths.length;
        document.getElementById("modalImage").src = imagePaths[currentIndex];
    }

    document.addEventListener("keydown", function (e) {
        if (document.getElementById("imageModal").classList.contains("hidden")) return;

        if (e.key === "ArrowRight") nextImage();
        if (e.key === "ArrowLeft") prevImage();
        if (e.key === "Escape") closeModal();
    });
</script>
