<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">

    <!-- NAVBAR -->
    <div class="bg-teal-900 px-8 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center">
            <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" 
                 alt="Logo" class="h-12 object-contain">
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
        <h1 class="text-yellow-600 text-4xl mb-10 font-extrabold tracking-wider text-center pt-10">MY ORDER</h1>
        @foreach($orders as $order)
        <div class="flex items-start mb-12">
            <img src="{{ $order['image'] }}" class="w-40 h-40 object-cover rounded">
            <div class="ml-6 flex-1">
                <h2 class="text-xl font-bold">{{ $order['name'] }}</h2>
                <p class="text-sm mt-1">Rp {{ number_format($order['price'], 0, ',', '.') }}</p>
                <p class="text-sm mt-6">Ongkos Kirim</p>
                <p class="text-sm">Total Transaksi</p>
                <div class="mt-8">
                    <h3 class="font-bold mb-2">Payment</h3>
                    <p class="text-sm">Payment Status: 
                        <span class="text-green-600">{{ $order['status_payment'] }}</span>
                    </p>
                    <p class="text-sm">Invoice ID: {{ $order['invoice'] }}</p>
                    <p class="text-sm">Payment Method: {{ $order['method'] }}</p>
                </div>
            </div>
            <div class="ml-10">
                <p class="text-sm text-right">x{{ $order['qty'] }}</p>
                <p class="text-xs text-right">TYPE: {{ strtoupper($order['type']) }}</p>
                <div class="mt-20 text-right">
                    <p class="text-sm">Rp {{ number_format($order['shipping'], 0, ',', '.') }}</p>
                    <p class="font-semibold">Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <div class="mt-10">
            <h3 class="font-bold mb-4">Status Pengiriman</h3>
            <div class="relative w-full">
                <div class="absolute top-2 left-0 right-0 h-1 bg-gray-300"></div>
                <div class="flex justify-between relative">
                    @foreach($order['shipping_steps'] as $step)
                        <div class="flex flex-col items-center w-1/4">
                            <div class="w-4 h-4 bg-green-700 rounded-full z-10"></div>
                            <p class="text-xs mt-2 text-center">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-10 text-center">
            <button class="border px-6 py-2 rounded">Back</button>
        </div>
        @endforeach
    </div>

    <script>
        function toggleMenu() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>

</body>
</html>
