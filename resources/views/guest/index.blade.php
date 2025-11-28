<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-teal-900">

    <div class="bg-teal-900 px-8 py-4 flex items-center justify-between shadow-lg">
            <div class="flex items-center">
            <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" alt="Logo" class="h-12 object-contain">
            </div>
            <div class="flex items-center space-x-8">
            <nav class="flex space-x-8 text-[#DAD7CD]">
                <a href="/dashboard" class="hover:text-[#D4A373]">Home</a>
            </nav>
            <div class="relative">
            <button onclick="toggleMenu()" class="text-[#DAD7CD] flex items-center gap-1">Guest▾</button>
            <div id="dropdownMenu"
                class="hidden absolute right-0 mt-2 bg-white text-black rounded-lg shadow-lg w-32">
                <a href="/profile" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="w-full h-[500px] bg-cover bg-center" style="background-image: url('https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/074010_2019-09-06.jpg')"></div>

    <div class="w-full max-w-screen bg-teal-900 py-8 flex justify-center">
        <div class="flex items-start gap-10 px-10">
            <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/549046998_1219663813534852_4785202718180397321_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=107&ccb=1-7&_nc_sid=127cfc&_nc_ohc=GcxCviMUvxAQ7kNvwFnCPLv&_nc_oc=Admkc2NMieGqqDKYoE7sbOiF5vSDjNFR0C0g8-6P-sEMZOVX5nMWXp5Y2e66zFlnUsQ&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=Z0x3YEO-pTP6IJGRTO_Cog&oh=00_AfjlURIou6ovpnofVVvGQnAH9wohXvSE8_8xPrZIb3UD9w&oe=6927AA64" alt="Foto" class="w-80 shadow-lg">

            <div class="text-white space-y-4 max-w-lg pl-10 text-justify">
                <h1 class="text-[#FFF3B0] text-5xl font-extrabold tracking-wider flex justify-center">INTRODUCTION</h1>
                <p class="text-lg leading-relaxed">Millsap Farms CSA is a community-supported agriculture program that provides members with seasonal produce directly from the farm.</p>
                <p class="text-lg leading-relaxed">It allows participants to customize their weekly selection, including vegetables and other locally sourced foods from partner producers. The program also includes a workshare component, where members contribute a set number of hours to farm activities.</p>
                <p class="text-lg leading-relaxed">Overall, it aims to create a closer connection between people and the process of growing their food in a transparent and sustainable way.</p>
                </p>
            </div>
        </div>
    </div>


    <!-- <div class="w-full bg-[#234542] text-white py-16 px-10"> -->
    <div class="relative w-full h-[500px] overflow-hidden">
        <div id="carousel" class="w-full h-full flex transition-transform duration-700 ease-in-out">
            <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/481122749_1056345513200017_866781563121885651_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHFrOAsawp9eE44FG1XbEw5-ClDY5sci_f4KUNjmxyL95pU4RP1O-JTDiu3aaC8jjqLk12_ClnJygR8Qiv31vpV&_nc_ohc=AMqCwdQeSzwQ7kNvwGc99KR&_nc_oc=AdnFLSfmI2YSJxYxU6eFuwwL9cXqc8ZluIHys9nPcHEFRED9_krNnkaqxzi3VCauED4&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=-jE2s89639ar-JpCMxTf0w&oh=00_AfjmhtUmCrCeDauHY-oJcoB6W_sar1q_qJAjK7EbP18TrA&oe=692F9BC1" class="w-full h-full object-cover flex-shrink-0">
            <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/490233646_23970366272565546_3728425382725214373_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=3a1ebe&_nc_eui2=AeH7FaWATvU4lNQyBl4QuJmVdB1FoB1UXEh0HUWgHVRcSGwElTmGo8os-UlN8oXoAheUWdKQAHrEhMf_-E7D0IpH&_nc_ohc=ijP4qFKKv3wQ7kNvwHl4QcC&_nc_oc=Adl_b8AgEdCOGOzkMnq-_T_e2nNXNls-gv28C3Uz4nShstUV2fO8WHHN1ANMA8PvJ7Q&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=D2z0ZNFVBgeWq9gMrNU8Vg&oh=00_AfhxEmfmCWUHcdab8fWSDKtXDr1TyJ8PNXqtbJicvaoBDw&oe=692F7C2A" class="w-full h-full object-cover flex-shrink-0">
            <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/471191943_18471413023023408_8368607682372730441_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHOpWGPznETM4ZhcVN8fsDBa4mm_aI0IrVriab9ojQitfC-PyUddpCXhaf7l-vv1ayFLlQui4BMLDYGNQmZZy4J&_nc_ohc=u8b-xnI-xG8Q7kNvwGbr1U9&_nc_oc=Adm8MMpO0m1Md-jp_N-WVH1hPQ8o9O8R6jXao3VwDM4RjsFmaxK71RgKNpQlDmibp4k&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=ZBrnNGvsmnQtIccm9sm4AA&oh=00_AfjbKuDaiBPIRb7EYtWnKNAxKJOlpZQDcwW46zrSNRFi4Q&oe=692F756E" class="w-full h-full object-cover flex-shrink-0">
            <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t39.30808-6/470200656_18469680814023408_4936235965611276334_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=127cfc&_nc_eui2=AeHEWWI4j3FPv0y2GdIRz6QPz4Gfo056FNDPgZ-jTnoU0IstBRwyLThgIcJmp-fT0F8GN-f4FAAxqwzcoqnsYjWu&_nc_ohc=8moeEfyXqcEQ7kNvwGLfvHZ&_nc_oc=AdkkantyoCIJJyno9QQH-NlkQg_GeqQExUeaI427YXvlFniNGpJTGKOeJNOf20eQ-A4&_nc_zt=23&_nc_ht=scontent.fkno11-1.fna&_nc_gid=8VPkPsM3ZJrxGMaUmxUY_A&oh=00_Afimyt9vhtdu2Adi_QKAlV2dVBUhizS2jF1NGJCNwF00iQ&oe=692F8B32" class="w-full h-full object-cover flex-shrink-0">
        </div>
        <button onclick="prevSlide()" class="absolute top-1/2 left-5 -translate-y-1/2 bg-black bg-opacity-40 text-white p-3 rounded-full hover:bg-opacity-70">❮</button>
        <button onclick="nextSlide()" class="absolute top-1/2 right-5 -translate-y-1/2 bg-black bg-opacity-40 text-white p-3 rounded-full hover:bg-opacity-70">❯</button>
        <div class="absolute bottom-5 w-full flex justify-center gap-2">
            <span class="dot w-3 h-3 bg-white opacity-50 rounded-full"></span>
            <span class="dot w-3 h-3 bg-white opacity-50 rounded-full"></span>
            <span class="dot w-3 h-3 bg-white opacity-50 rounded-full"></span>
            <span class="dot w-3 h-3 bg-white opacity-50 rounded-full"></span>
        </div>
    </div>

    <script>
    let currentIndex = 0;
    const carousel = document.getElementById("carousel");
    const dots = document.querySelectorAll(".dot");
    const totalSlides = carousel.children.length;

    function updateSlide() {
        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;

        dots.forEach((dot, i) => {
            dot.classList.toggle("opacity-100", i === currentIndex);
            dot.classList.toggle("opacity-50", i !== currentIndex);
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides; 
        updateSlide();
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlide();
    }

    dots.forEach((dot, index) => {
        dot.addEventListener("click", () => {
            currentIndex = index;
            updateSlide();
        });
    });

    // Auto slide
    setInterval(nextSlide, 5000);

    // 🔥 Aktifkan dot pertama saat awal halaman
    updateSlide();
    </script>


</body>
</html>


    