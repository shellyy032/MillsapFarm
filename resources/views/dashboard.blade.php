<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
 </head>
<body class="bg-[#344E41] text-[#DAD7CD] font-sans">

  <!-- navbar -->
  <div class="bg-[#344E41] px-8 py-4 flex items-center justify-between shadow-lg">
    <div class="flex items-center">
      <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" 
           alt="Logo" class="h-12 object-contain">
    </div>
    <div class="flex items-center space-x-8">
      <nav class="flex space-x-8 text-[#DAD7CD]">
        <a href="/dashboard" class="hover:text-[#D4A373]">Home</a>
        <a href="/control" class="hover:text-[#D4A373]">Control</a>
        <a href="/report" class="hover:text-[#D4A373]">Report</a>
        <a href="/about" class="hover:text-[#D4A373]">About</a>
      </nav>
      <div class="text-[#DAD7CD]">SuperAdmin ▾</div>
    </div>
    <!-- <div class="flex items-center space-x-8">
        <nav class="flex space-x-8 text-[#DAD7CD]">
            <a href="/dashboard" class="hover:text-[#D4A373]">Home</a>
            @if(auth()->check() && in_array(auth()->user()->role, ['admin','superadmin']))
                <a href="/control" class="hover:text-[#D4A373]">Control</a>
                <a href="/report" class="hover:text-[#D4A373]">Report</a>
            @endif
            <a href="/about" class="hover:text-[#D4A373]">About</a>
        </nav>

        <div class="text-[#DAD7CD] flex items-center space-x-4">
            @if(auth()->check())
                <span>{{ ucfirst(auth()->user()->role) }} ▾</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-[#D4A373] rounded hover:bg-[#C17C50]">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="px-4 py-2 bg-[#D4A373] text-[#1C1C1C] rounded hover:bg-[#C17C50]">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-[#DAD7CD] text-[#1C1C1C] rounded hover:bg-[#C17C50]">Register</a>
            @endif
        </div>
    </div> -->
  </div>

<!-- blur bg -->
<div class="relative">
  <div class="absolute inset-0 bg-cover bg-center blur-[1px] opacity-40 rounded-2xl"
       style="background-image: url('data:image/jpeg;base64,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');"></div>

  <div class="relative grid grid-cols-2 gap-6 p-8">
    <!-- graph -->
    <div class="bg-white rounded-xl p-6 ">
      <h2 class="text-3xl font-semibold mb-3 text-[#A3B18A]"><b>2025</b></h2>
      <h2 class="text-l font-semibold mb-3 text-black">REVENUE GROWTH</h2>
      <canvas id="lineChart" class="w-full h-60"></canvas>
      <p class="text-sm text-black mt-3">
        Projected 2025 revenue growth increases steadily each month,
        starting at $10M in January and reaching $45M by June.
      </p>
    </div>

    <!-- improvement  -->
    <div class="bg-transparent rounded-2xl p-6 text-[#4B1E00]">
    <h1 class="text-4xl font-bold mb-3 text-center text-yellow-500">NOVEMBER</h1>
    <div class="bg-white p-6 rounded-2xl mb-4">
        <p class="text-[#A3B18A] text-sm">Business Performance</p>
        <div class="text-4xl text-[#666633] font-bold mt-2">72%</div>
        <p class="text-sm text-[#D4A373]">Improved vs last 6 months</p>
    </div>
    <div class="bg-white p-6 rounded-2xl">
        <p class="text-[#4d9900] text-xl text-sm">Total Revenue</p>
        <div class="text-5xl text-[#444422] font-bold mt-1">$169,000</div>
        <p class="text-sm text-[#D4A373]">↑ 59%</p>
    </div>
    </div>

  </div>
</div>

  <!-- penjelasan -->
  <div class="bg-[#3A5A40] mx-8 p-6 rounded-xl grid grid-cols-2">
    <div>
      <div class="space-y-4">
        <div>
          <h3 class="text-[#D4A373] font-bold">LOREM IPSUM</h3>
          <p class="text-[#A3B18A] text-sm">Lorem ipsum dolor sit amet</p>
        </div>
        <div>
          <h3 class="text-[#D4A373] font-bold">LOREM IPSUM</h3>
          <p class="text-[#A3B18A] text-sm">Lorem ipsum dolor sit amet</p>
        </div>
        <div>
          <h3 class="text-[#D4A373] font-bold">LOREM IPSUM</h3>
          <p class="text-[#A3B18A] text-sm">Lorem ipsum dolor sit amet</p>
        </div>
        <div>
          <h3 class="text-[#D4A373] font-bold">LOREM IPSUM</h3>
          <p class="text-[#A3B18A] text-sm">Lorem ipsum dolor sit amet</p>
        </div>
      </div>
    </div>
    <div class="flex justify-center items-center">
      <canvas id="pieChart" class="w-60 h-60"></canvas>
    </div>
  </div>

  <!-- chart -->
  <script>
    new Chart(document.getElementById('lineChart'), {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Revenue ($M)',
          data: [10, 15, 27, 32, 40, 45],
          borderColor: '#D4A373',
          backgroundColor: '#D4A37333',
          fill: true,
          tension: 0.4
        }]
      },
      options: {
        cutout: '60%',
        plugins: { legend: { display: false } },
        scales: {
          x: { type: 'category', ticks: { color: '#51741bff' }, grid: { color: '#475B52' } },
          y: { type: 'linear', ticks: { color: '#51741bff'  }, grid: { color: '#475B52' } }
        }
      }
    });

    // donat
    new Chart(document.getElementById('pieChart'), {
      type: 'doughnut',
      data: {
        labels: ['A', 'B', 'C', 'D'],
        datasets: [{
          data: [33.3, 27.8, 20.4, 18.5],
          backgroundColor: ['#A3B18A', '#588157', '#3A5A40', '#D4A373'],
        }]
      },
      options: { plugins: { legend: { display: false } } }
    });
  </script>

<!-- loss -->
<div class="bg-[#DAD7CD] mx-8 mt-8 p-8 rounded-t-[80px] text-center text-[#3A5A40]">
  <h2 class="text-lg font-bold tracking-widest mb-6">KERUGIAN</h2>

  <div class="grid grid-cols-2 gap-4 items-start">
 
  <div class="relative w-1/2 h-40 rounded-xl overflow-hidden ml-auto">
    <img src="https://media.timeout.com/images/105596022/image.jpg" 
         alt="Food" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
      <p class="font-bold text-lg">LOREM</p>
      <p class="text-3xl font-bold mt-1">1200</p>
    </div>
  </div>

  <div class="flex flex-col gap-3">
    <div class="relative w-1/2 h-12 rounded-lg overflow-hidden">
      <img src="https://images.unsplash.com/photo-1542838132-92c53300491e" 
           alt="Loss 1" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="absolute inset-0 flex justify-between items-center px-4 text-white font-semibold text-sm">
        <span>LOREM</span>
        <span>500</span>
      </div>
    </div>

    <div class="relative w-1/2 h-12 rounded-lg overflow-hidden">
      <img src="https://media.gq.com/photos/581799e0a6fe84375dbe8d86/3:2/w_800/Cheese%201.jpg"
           alt="Loss 2" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="absolute inset-0 flex justify-between items-center px-4 text-white font-semibold text-sm">
        <span>LOREM</span>
        <span class="translate-x-[-6px]">15</span>
      </div>
    </div>

    <div class="relative w-1/2 h-12 rounded-lg overflow-hidden">
      <img src="https://www.epicgardening.com/wp-content/uploads/2023/09/plants-with-tiny-flowers.jpeg"
           alt="Loss 3" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="absolute inset-0 flex justify-between items-center px-4 text-white font-semibold text-sm">
        <span>LOREM</span>
        <span>5</span>
      </div>
    </div>
  </div>
</div>


  <!-- best seller -->
  <h2 class="text-lg font-bold tracking-widest mt-10 mb-4 text-[#432818]">BEST SELLER</h2>
  <div class="space-y-3 w-2/3 mx-auto">
    <div class="flex justify-between items-center bg-[#588157] text-white font-bold py-2 px-4 rounded-lg">
      <div class="flex items-center space-x-2">
        <span>🍕</span>
        <span>PIZZA PEPPERONI</span>
      </div>
      <span>500</span>
    </div>
    <div class="flex justify-between items-center bg-[#7F5539] text-white font-bold py-2 px-4 rounded-lg">
      <div class="flex items-center space-x-2">
        <span>🧀</span>
        <span>MOZARELLA</span>
      </div>
      <span>350</span>
    </div>
    <div class="flex justify-between items-center bg-[#D4A373] text-white font-bold py-2 px-4 rounded-lg">
      <div class="flex items-center space-x-2">
        <span>🌸</span>
        <span>FLOWER BOUQUET</span>
      </div>
      <span>150</span>
    </div>
  </div>

<!-- toogle -->
  <div class="w-full mt-4 space-y-3">
  <details class="bg-gray-100 rounded-lg p-3 cursor-pointer group">
    <summary class="flex justify-between items-center font-semibold text-gray-800">
      <span class="translate-x-0 block">Toggle 1</span>
      <svg class="w-5 h-5 text-gray-600 transition-transform duration-200 group-open:rotate-180" 
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <p class="text-gray-600 mt-2">Isi konten toggle pertama.</p>
  </details>

  <details class="bg-gray-100 rounded-lg p-3 cursor-pointer group">
    <summary class="flex justify-between items-center font-semibold text-gray-800">
      <span class="translate-x-2 block">Toggle 2</span>
      <svg class="w-5 h-5 text-gray-600 transition-transform duration-200 group-open:rotate-180" 
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <p class="text-gray-600 mt-2">Isi konten toggle kedua.</p>
  </details>

  <details class="bg-gray-100 rounded-lg p-3 cursor-pointer group">
    <summary class="flex justify-between items-center font-semibold text-gray-800">
      <span class="translate-x-4 block">Toggle 3</span>
      <svg class="w-5 h-5 text-gray-600 transition-transform duration-200 group-open:rotate-180" 
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <p class="text-gray-600 mt-2">Isi konten toggle ketiga.</p>
  </details>

  <details class="bg-gray-100 rounded-lg p-3 cursor-pointer group">
    <summary class="flex justify-between items-center font-semibold text-gray-800">
      <span class="translate-x-6 block">Toggle 4</span>
      <svg class="w-5 h-5 text-gray-600 transition-transform duration-200 group-open:rotate-180" 
           xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>
    <p class="text-gray-600 mt-2">Isi konten toggle keempat.</p>
  </details>
</div>


</div>
</body>
</html>
