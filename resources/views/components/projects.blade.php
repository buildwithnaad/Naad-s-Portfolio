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
    class="fixed inset-0 z-50 hidden bg-black/90 backdrop-blur-sm flex items-center justify-center flex-col">
    <button onclick="closeModal()" class="fixed top-4 right-4 text-white text-3xl z-50">&times;</button>
    <button onclick="prevImage()"
        class="fixed left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-50 bg-black/50 p-2 rounded-full hover:bg-black">&larr;</button>
    <button onclick="nextImage()"
        class="fixed right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-50 bg-black/50 p-2 rounded-full hover:bg-black">&rarr;</button>
    <div class="w-[90%] max-w-5xl overflow-y-auto max-h-screen mt-[60px] mb-[30px]">
        <img id="modalImage" src="" alt="Preview" class="w-full h-auto rounded-lg shadow-lg mx-auto">
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
