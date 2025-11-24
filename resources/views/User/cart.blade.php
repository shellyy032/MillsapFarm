<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
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


    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-yellow-600 text-4xl mb-10 font-extrabold tracking-wider flex flex-col items-center justify-start pt-10">MY CART</h1>
        @foreach($cart as $item)
        <div class="flex items-start border-b pb-6 mb-6">
            <input type="checkbox" class="mt-2 mr-4 w-5 h-5">
            <img src="{{ $item['image'] }}" class="w-32 h-32 object-cover rounded">
            <div class="ml-4 flex-1">
                <h2 class="font-bold text-lg">{{ $item['name'] }}</h2>
                <p class="font-semibold mt-1">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                <p class="text-sm mt-3">Ongkos Kirim</p>
                <p class="text-sm">Total Transaksi</p>
            </div>
            <div class="ml-6 pr-6">
                <p class="text-sm mb-2">TYPE : {{ strtoupper($item['type']) }}</p>
                <div class="flex items-center gap-3 mb-4" data-qty-container>
                    <button class="px-3 py-1 border rounded" data-minus>-</button>
                    <input type="text" value="{{ $item['qty'] }}" class="w-16 text-center border rounded" data-input>
                    <button class="px-3 py-1 border rounded" data-plus>+</button>
                </div>
                <p class="text-sm">Rp {{ number_format($item['shipping'], 0, ',', '.') }}</p>
                <p class="font-semibold">Rp {{ number_format($item['total'], 0, ',', '.') }}</p>
            </div>
        </div>
        @endforeach
        <div class="flex justify-end gap-4 mt-8">
            <button class="bg-gray-300 px-5 py-2 rounded">Cancel</button>
            <button class="bg-green-600 text-white px-5 py-2 rounded">Checkout</button>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll("[data-qty-container]").forEach(container => {
                const minusBtn = container.querySelector("[data-minus]");
                const plusBtn = container.querySelector("[data-plus]");
                const input = container.querySelector("[data-input]");

                minusBtn.addEventListener("click", () => {
                    let value = parseInt(input.value);
                    if (value > 1) input.value = value - 1;
                });

                plusBtn.addEventListener("click", () => {
                    let value = parseInt(input.value);
                    input.value = value + 1;
                });
            });
        });
    </script>

</body>
</html>

