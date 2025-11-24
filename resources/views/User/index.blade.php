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
                <a href="/product" class="hover:text-[#D4A373]">Product</a>
                <a href="/cart" class="hover:text-[#D4A373]">Cart</a>
                <a href="/order" class="hover:text-[#D4A373]">My Order</a>
                <a href="/history" class="hover:text-[#D4A373]">History</a>
            </nav>
            <div class="relative">
            <button onclick="toggleMenu()" class="text-[#DAD7CD] flex items-center gap-1">User▾</button>
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

    <div class="w-full bg-white h-screen rounded-t-[50%] mt-3 flex flex-col items-center justify-start pt-10 shadow-lg">
        <h1 class="text-[#5A3E1B] text-6xl mt-8 mb-8 font-extrabold tracking-wider">FRESH PRODUCE</h1>
        <div class="grid grid-cols-3 gap-6 w-full max-w-5xl mx-auto">

    <div class="relative h-48 mt-8 bg-cover bg-center" style="background-image: url('https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/IMG_1925.jpg/:/cr=t:8.05%25,l:0%25,w:83.9%25,h:83.9%25/rs=w:2320,h:1780')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <p class="absolute inset-0 flex items-center justify-center text-white font-bold text-2xl">VEGETABLE</p>
    </div>

    <div class="relative h-48 mt-8 bg-cover bg-center" style="background-image: url('https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/image-asset-01831f0.jpeg/:/cr=t:8.51%25,l:0%25,w:100%25,h:74.99%25/rs=w:776,h:388,cg:true')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <p class="absolute inset-0 flex items-center justify-center text-white font-bold text-2xl">PIZZA</div>

    <div class="relative h-48  mt-8 bg-cover bg-center" style="background-image: url('https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/IMG_7070.jpg/:/cr=t:31.25%25,l:0%25,w:100%25,h:37.5%25/rs=w:776,h:388,cg:true')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <p class="absolute inset-0 flex items-center justify-center text-white font-bold text-2xl">FLOWER</p>
    </div>

    <div class="relative h-48 bg-cover bg-center" style="background-image: url('https://scontent.fkno11-1.fna.fbcdn.net/v/t51.75761-15/476444544_18480107560023408_5033906321272920492_n.jpg?stp=dst-jpegr_tt6&_nc_cat=104&ccb=1-7&_nc_sid=127cfc&_nc_ohc=MAzCGj__ZI4Q7kNvwFoLS1-&_nc_oc=AdmRhSwj2SnuEQZna4IsoufVCRi6i-a5Vmd17vb35oU5OulWX8-Kz7uo7XT-Ic3iG8Y&_nc_zt=23&se=-1&_nc_ht=scontent.fkno11-1.fna&_nc_gid=orxMX_1qPY9kmc-KDQEmsw&oh=00_AfjIc8YhyjAjhHCJv-xx4Vam3fIRk3FvwT9k8OTPB61inQ&oe=6928A997')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <p class="absolute inset-0 flex items-center justify-center text-white font-bold text-2xl">FRUIT</p>
    </div>

    <div class="relative h-48 bg-cover bg-center" style="background-image: url('https://cw-images.us-east-1.linodeobjects.com/add495f1-d6a3-42e6-aeae-501e8347da27_600.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
        <p class="absolute inset-0 flex items-center justify-center text-white font-bold text-2xl">DAIRY</p>
    </div>

    <div class="relative h-48 bg-gray-300">
        <p class="absolute inset-0 flex items-center justify-center text-gray-600 font-bold text-2xl">COMING SOON</p>
    </div>
</div>
</div>

    <div class="max-w-8xl bg-white mx-auto mb-0">
        <div class="max-w-6xl mx-auto mt-0">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-[#5b2a29] mt-10">POPULAR SALES</h2>
                <a href="#" class="text-sm flex items-center gap-1 text-gray-700 mt-10">See All Product<span>→</span></a>
            </div>
            <div class="grid grid-cols-3 gap-6 mb-0">
                @foreach ($popular as $p)
                    <div class="bg-white shadow-lg rounded-md overflow-hidden">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $p['image'] }}')"></div>
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-lg">{{ $p['name'] }}</h3>
                            <p class="text-gray-700 text-sm">Rp {{ number_format($p['price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="max-w-8xl bg-white mx-auto mb-0">
        <div class="max-w-6xl mx-auto mt-0">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-[#5b2a29] mt-10">NEW ARRIVAL</h2>
                <a href="#" class="text-sm flex items-center gap-1 text-gray-700 mt-10">See All Product<span>→</span></a>
            </div>
            <div class="grid grid-cols-3 gap-6">
                @foreach ($new as $n)
                    <div class="bg-white shadow-lg rounded-md overflow-hidden">
                        <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $n['image'] }}')"></div>
                        <div class="p-4 text-center">
                            <h3 class="font-bold text-lg">{{ $n['name'] }}</h3>
                            <p class="text-gray-700 text-sm">Rp {{ number_format($n['price'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="w-full bg-[#234542] text-white py-16 px-10">
        <h2 class="text-center text-3xl font-bold text-[#e5c15c] mb-10">CONTACT US</h2>
        <div class="grid grid-cols-2 gap-10 max-w-6xl mx-auto">
            <div>
                <a href="https://www.google.com/maps/dir//6593+Emu+Ln,+Springfield,+MO+65803,+Amerika+Serikat/@37.3146256,-93.3513089,12z/" target="_blank">
                    <img src="https://scontent.fkno11-1.fna.fbcdn.net/v/t51.75761-15/488765145_18491795530023408_4601034120663477867_n.jpg?stp=dst-jpegr_tt6&_nc_cat=104&ccb=1-7&_nc_sid=127cfc&_nc_ohc=Zatg3cxiEjMQ7kNvwHCt4b_&_nc_oc=Adm7T7re3LdKk-i9joytgg_E5y6vsixtCb8owzLNaHOZ0ulmYmMFWcyCc2u-acFfLyw&_nc_zt=23&se=-1&_nc_ht=scontent.fkno11-1.fna&_nc_gid=389OMb-UvP-swE2b_-ADuw&oh=00_AfiKbrKctJXLOAJhDfWf2Qbs2WrvSlAeO81tKaJJKrp4lQ&oe=692895E7"class="w-full h-[330px] object-cover mb-6">
                </a>
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-2xl">📍</span>
                    <p>6593 Emu Ln, Springfield, MO 65803, USA</p>
                </div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="text-2xl">📞</span>
                    <p>08YY-ZZZZ-XXXX</p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✉️</span>
                    <p>millsapfarm@gmail.com</p>
                </div>
            </div>

            <div>
                <div class="mb-6">
                    <label class="block mb-1">Name</label>
                    <input type="text" class="w-full border border-gray-300 bg-transparent px-3 py-2 text-white">
                </div>
                <div class="mb-6">
                    <label class="block mb-1">Email</label>
                    <input type="email" class="w-full border border-gray-300 bg-transparent px-3 py-2 text-white">
                </div>
                <div class="mb-6">
                    <label class="block mb-1">Message</label>
                    <textarea class="w-full border border-gray-300 bg-transparent px-3 py-2 text-white h-24"></textarea>
                </div>
                <button class="w-full border border-gray-300 py-2 text-white tracking-widest">-- SEND --</button>
            </div>
        </div>
        <p class="text-center text-sm mt-10 opacity-80"> This site is protected by reCAPTCHA and the Google Privacy Policy and Terms of Service apply.</p>
    </div>



    