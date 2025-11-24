<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-teal-900 text-white font-sans">
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

    <div class="w-full bg-white h-screen rounded-t-[50%] -mt-32 flex flex-col items-center justify-start pt-10 shadow-lg">
        <h1 class="text-yellow-600 text-6xl font-extrabold tracking-wider">UPDATE</h1>

    <div class="w-full bg-white py-6 px-6 gap-6 border-b">
        @foreach ($transactions as $t)
        <div class="w-full bg-white py-6 px-6 flex items-start gap-6 border-b">
            <img src="{{ $t['image'] }}" class="w-20 h-20 rounded-full object-cover">
            <div class="flex-1">
                <p class="text-xl font-extrabold uppercase">{{ $t['name'] }}</p>
                <p class="text-black font-semibold text-sm">{{ $t['phone'] }}</p>
                <p class="text-black font-semibold text-sm">{{ $t['item'] }}</p>
                <p class="text-sm text-black mt-2"><span class="font-bold">Notes :</span>{{ $t['notes'] }}</p>
                <p class="text-sm text-black font-semibold mt-3">Rp {{ number_format($t['price'], 0, ',', '.') }}</p>
            </div>
                <div class="flex flex-col items-end gap-3 w-[200px]">
                <select class="border rounded px-3 py-2 w-full font-semibold text-green-700">
                    <option {{ $t['status'] == 'On Trip' ? 'selected' : '' }}>On Trip</option>
                    <option {{ $t['status'] == 'Waiting' ? 'selected' : '' }}>Waiting</option>
                    <option {{ $t['status'] == 'Done' ? 'selected' : '' }}>Done</option>
                    <option {{ $t['status'] == 'Reject' ? 'selected' : '' }}>Reject</option>
                </select>
                @if ($t['status'] == 'Reject')
                <div class="w-full">
                    <label class="font-semibold text-black text-sm">NOTES :</label>
                    <input type="text"class="border px-3 py-2 rounded w-full mt-1"placeholder="Address set wrong">
                </div>
                @endif
                <div class="flex gap-3 w-full justify-end">
                    <button class="px-4 py-2 rounded border text-orange-600 font-semibold">Cancel</button>
                    <button class="px-4 py-2 rounded bg-orange-600 text-white font-semibold">Update</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>