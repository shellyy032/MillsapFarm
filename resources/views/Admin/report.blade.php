<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
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
                <a href="/control" class="hover:text-[#D4A373]">Control</a>
                <a href="/report" class="hover:text-[#D4A373]">Report</a>
            </nav>
            <div class="relative">
            <button onclick="toggleMenu()" class="text-[#DAD7CD] flex items-center gap-1">Admin▾</button>
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

     <div class="w-full mt-5 px-6">
        <div class="w-full rounded-xl overflow-hidden bg-white shadow p-4">
            <canvas id="revenueChart" class="w-full h-[250px]"></canvas>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-4 mt-6 px-6">
        <div class="bg-white shadow rounded-xl p-4 flex flex-col items-center">
            <p class="text-gray-500 text-sm">TOTAL REVENUE</p>
            <p class="text-2xl text-black font-bold">${{ number_format($totalRevenue) }}</p>
            <p class="text-green-600 font-semibold text-xs mt-1">▲ 5.9%</p>
        </div>
        <div class="bg-white shadow rounded-xl p-4 flex flex-col items-center">
            <p class="text-gray-500 text-sm">PENDING</p>
            <p class="text-2xl text-black font-bold">{{ $pending }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-4 flex flex-col items-center">
            <p class="text-gray-500 text-sm">DONE</p>
            <p class="text-2xl text-black font-bold">{{ $done }}</p>
        </div>
        <div class="bg-white shadow rounded-xl p-4 flex flex-col items-center">
            <p class="text-red-600 text-sm font-semibold">REJECT</p>
            <p class="text-2xl text-red-600 font-bold">{{ $reject }}</p>
        </div>
    </div>

    <div class="w-full mt-6">
        <h2 class="text-center text-5xl font-extrabold text-[#E7D27A]">
            TOTAL PENDAPATAN : RP {{ number_format($totalPendapatan) }}
        </h2>
    </div>

    <div class="w-full max-w-screen mt-10 bg-[#DAD7CD] py-5">
    <div class="w-full text-center">
        <p class="text-[#6B593A] text-3xl font-extrabold tracking-widest">BEST SELLER</p>
    </div>

    <div class="w-full max-w-xl mx-auto mt-4 space-y-4">
        @foreach ($bestSeller as $item)
            <div class="flex items-center gap-3
                @if($loop->index == 0) bg-[#6C8A31] text-white
                @elseif($loop->index == 1) bg-[#6B593A] text-white
                @else bg-[#E7D27A] text-black @endif
                p-4 rounded-lg">
                <div class="text-2xl">{{ $item['icon'] }}</div>
                <p class="flex-1 font-semibold">{{ $item['name'] }}</p>
                <p class="font-bold">{{ $item['qty'] }}</p>
            </div>
        @endforeach
    </div>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById('dropdownMenu').classList.toggle('hidden');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Revenue',
                    data: {!! json_encode($revenues) !!},
                    borderWidth: 3,
                    borderColor: 'rgb(34, 197, 94)',
                    backgroundColor: 'rgba(34, 197, 94, 0.2)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
    </script>
</body>
</html>