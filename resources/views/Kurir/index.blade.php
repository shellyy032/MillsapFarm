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
                <a href="/order" class="hover:text-[#D4A373]">Order</a>
                <a href="/update" class="hover:text-[#D4A373]">Update</a>
            </nav>
            <div class="relative">
            <button onclick="toggleMenu()" class="text-[#DAD7CD] flex items-center gap-1">Kurir▾</button>
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

    <div class="w-full bg-[#D9651A] h-screen rounded-t-[50%] -mt-32 flex flex-col items-center justify-start pt-10 shadow-lg">
        <h1 class="text-yellow-200 text-3xl font-extrabold tracking-wider">NEW ORDER</h1>
    

    <div class="w-full flex justify-center mt-14 px-4">
        <div class="bg-white w-[750px] rounded-md shadow-xl p-6 relative border border-gray-300">
            <div class="absolute left-[-40px] top-1/2 -translate-y-1/2 text-white text-4xl cursor-pointer">‹</div>
            <div class="absolute right-[-40px] top-1/2 -translate-y-1/2 text-white text-4xl cursor-pointer">›</div>
            @php $trx = $transactions[0]; @endphp
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold">ID Transaction : #{{ $trx['id'] }}</h2>
                <p class="text-sm">
                    Status : <span class="text-green-600 font-semibold">{{ $trx['status'] }}</span>
                </p>
            </div>

            <div class="w-full border-t border-gray-300 pt-3 pb-4">
                <h2 class="font-semibold mb-2">Transaction Info</h2>

                <div class="flex justify-between text-sm">
                    <div class="space-y-1">
                        <p>Username : <strong>{{ $trx['username'] }}</strong></p>
                        <p>TypeOfTransaction : <strong>{{ $trx['type'] }}</strong></p>
                        <p>Payment Method : <strong>{{ $trx['payment_method'] }}</strong></p>
                    </div>
                    <div class="text-sm">
                        <p>Date : {{ $trx['date'] }}</p>
                    </div>
                </div>
            </div>

            <div class="w-full border-t border-gray-300 pt-3">
                <div class="flex justify-between">
                    <h2 class="font-semibold">Detail Transaction</h2>
                    <span class="bg-gray-200 text-gray-700 text-xs px-3 py-1 rounded-full">
                        Status : {{ $trx['detail_status'] }}
                    </span>
                </div>

                <div class="grid grid-cols-2 mt-3">
                    <div>
                        <p class="font-semibold mb-1">Daftar Item</p>
                        <ul class="list-disc ml-5 text-sm space-y-1">
                            @foreach($trx['items'] as $item)
                                <li>{{ $item['name'] }} — x{{ $item['qty'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="text-right text-sm space-y-1">
                        @foreach($trx['items'] as $item)
                            <p>Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                        @endforeach
                        <p class="font-bold text-lg mt-2">Rp {{ number_format($trx['total'], 0, ',', '.') }}</p>
                    </div>
                </div>

                <div class="w-full flex justify-center mt-3 gap-6 pb-2">
                    <button class="px-8 py-2 bg-gray-300 rounded-full text-black hover:bg-gray-400">Reject</button>
                    <button class="px-8 py-2 bg-orange-600 text-white rounded-full hover:bg-orange-700">Accept</button>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-between items-center bg-[#D9651A] text-white font-bold py-4 px-4 ">
    <div class="w-full flex justify-center mt-3 space-x-1">
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
        <span class="w-2 h-2 bg-gray-300 rounded-full"></span>
    </div>
    </div>
</div>
</body>
</html>
