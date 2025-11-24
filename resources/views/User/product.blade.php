<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

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

    
   <div class="max-w-8xl bg-white mx-auto mb-0">
    <div class="max-w-6xl mx-auto mt-0">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-extrabold text-[#5b2a29] mt-10">FLOWERS</h2>
                <a href="#" class="text-sm flex items-center gap-1 text-gray-700 mt-10">See All Product<span>→</span></a>
            </div>

            <div class="grid grid-cols-3 gap-6 mb-0">
                @foreach ($flower as $f)
                    <a href="/product/{{ $f['id'] }}" class="block">
                        <div class="bg-white shadow-lg rounded-md overflow-hidden hover:shadow-xl transition">
                            <div class="h-48 bg-cover bg-center"
                                style="background-image: url('{{ $f['image'] }}')"></div>

                            <div class="p-4 text-center">
                                <h3 class="font-bold text-lg">{{ $f['name'] }}</h3>
                                <p class="text-gray-700 text-sm">
                                    Rp {{ number_format($f['price'], 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    <div class="max-w-6xl mx-auto py-10">
        <div class="grid grid-cols-2 gap-10">
            @foreach ($flower as $f)
            <div class="w-full h-[420px] rounded-lg bg-cover bg-center"
                style="background-image: url('{{ $f['image'] }}')">
            </div>
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold text-[#5b2a29] mb-3">{{ $f['name'] }}</h1>
                <p class="text-gray-700 text-sm leading-relaxed mb-6">{{ $f['desc'] ?? 'No description available for this product.' }}</p>
                <p class="text-2xl font-extrabold text-[#5b2a29] mb-5">Rp {{ number_format($f['price'], 0, ',', '.') }}</p>
                <div class="mb-6">
                    <label class="text-gray-700 text-sm font-semibold">Quantity</label>
                    <input type="number" min="1" value="1" class="w-20 mt-2 border border-gray-300 rounded-md px-3 py-2">
                </div>
                <div class="flex gap-4 mt-auto">
                    <button class="px-5 py-3 bg-[#5b2a29] text-white rounded-md font-semibold">Add to Cart</button>
                    <button class="px-5 py-3 bg-green-600 text-white rounded-md font-semibold">Checkout</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>

