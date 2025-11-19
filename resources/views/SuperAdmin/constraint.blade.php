<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Constraint</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e9ecef] min-h-screen flex flex-col">
    <div class="bg-teal-900 px-8 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center">
        <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" alt="Logo" class="h-12 object-contain">
        </div>
        <div class="flex items-center space-x-8">
        <nav class="flex space-x-8 text-[#DAD7CD]">
            <a href="/dashboard" class="hover:text-[#D4A373]">Home</a>
            <a href="/control" class="hover:text-[#D4A373]">Control</a>
            <a href="/report" class="hover:text-[#D4A373]">Report</a>
            <a href="/access" class="hover:text-[#D4A373]">Access</a>
            <a href="/constraint" class="hover:text-[#D4A373]">Constraint</a>
            <a href="/about" class="hover:text-[#D4A373]">About</a>
        </nav>
        <div class="relative">
            <button onclick="toggleMenu()" class="text-[#DAD7CD] flex items-center gap-1">SuperAdmin▾</button>
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

    <h1 class="text-center text-6xl font-extrabold text-yellow-600 mt-8 tracking-wider">CONSTRAINT</h1>

    <div class="w-11/12 mx-auto mt-4 bg-teal-900 p-3 rounded-xl flex justify-center gap-20 text-white font-semibold">
        @foreach (['USER','ADMIN','KURIR','SUPERVISOR'] as $r)
            <a href="/constraint?role={{ $r }}"
               class="px-6 py-2 rounded-lg transition
               {{ $currentRole == $r ? 'bg-white text-teal-900 font-bold shadow' : '' }}">
                {{ $r }}
            </a>
        @endforeach
    </div>
    <div class="w-11/12 mx-auto mt-6 bg-white p-6 rounded-xl shadow">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b bg-teal-900 text-white">
                    <th class="p-2">ID_Kendala</th>
                    <th class="p-2">Divisi</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kendala as $k)
                <tr class="border-b">
                    <td class="p-2">{{ $k['id'] }}</td>
                    <td class="p-2">{{ $k['divisi'] }}</td>
                    <td class="p-2">{{ $k['tanggal'] }}</td>
                    <td class="p-2">
                        <button 
                            onclick="openDetail('{{ $k['judul'] }}','{{ $k['divisi'] }}','{{ $k['deskripsi'] }}','{{ $k['foto'] }}')"
                            class="px-3 py-1 bg-teal-700 text-white rounded-md">
                            Detail
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="flex justify-end pr-20 mt-4 text-black">
        <div class="flex items-center gap-2">
            <button class="bg-white px-4 py-2 rounded shadow hover:bg-gray-100">Previous</button>
            <button class="bg-white px-4 py-2 rounded shadow hover:bg-gray-100 font-bold">1</button>
            <button class="bg-white px-4 py-2 rounded shadow hover:bg-gray-100">...</button>
            <button class="bg-white px-4 py-2 rounded shadow hover:bg-gray-100">5</button>
            <button class="bg-white px-4 py-2 rounded shadow hover:bg-gray-100">Next</button>
        </div>
    </div>

    <div class="mt-auto bg-teal-900 text-white py-4 flex justify-around font-semibold">
        <div>USER : {{ $roleCounts['USER'] }}</div>
        <div>ADMIN : {{ $roleCounts['ADMIN'] }}</div>
        <div>KURIR : {{ $roleCounts['KURIR'] }}</div>
        <div>SUPERVISOR : {{ $roleCounts['SUPERVISOR'] }}</div>
    </div>

    <div id="detailModal"class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">
        <div class="bg-[#EDEDE0] p-8 rounded-2xl shadow-xl w-[860px]">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-3xl font-bold text-[#1C2E2A]">LAPORAN KENDALA DIVISI</h2>
                <button onclick="closeDetail()"
                    class="px-5 py-2 rounded-lg bg-[#52796F] text-white text-lg">
                    Back
                </button>
            </div>
            <div class="mb-4">
                <label class="font-semibold text-gray-700">Judul Masalah</label>
                <div class="bg-[#7FB77E] px-4 py-2 rounded-lg mt-1" id="modalTitle"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="font-semibold text-gray-700">Divisi</label>
                    <div class="bg-[#7FB77E] px-4 py-2 rounded-lg mt-1" id="modalDivisi"></div>
                </div>

                <div>
                    <label class="font-semibold text-gray-700">DateTime</label>
                    <div class="bg-[#7FB77E] px-4 py-2 rounded-lg mt-1" id="modalTanggal"></div>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="font-semibold text-gray-700">Deskripsi</label>
                <div class="bg-[#7FB77E]  px-4 py-3 rounded-lg mt-1 leading-relaxed" id="modalDesc"></div>
            </div>

            <div class="mb-6">
                <label class="font-semibold text-gray-700">Foto Bukti</label>
                <div class="mt-2">
                    <a id="modalDownload" download 
                        class="inline-block px-4 py-2 bg-[#52796F] text-white rounded-lg cursor-pointer mb-2">
                        Click to download
                    </a>
                    <img id="modalFoto" class="w-full max-h-80 object-contain rounded-lg border">
                </div>
            </div>
        </div>
    </div>


    <script>
    function openDetail(judul, divisi, deskripsi, foto, tanggal) {
        document.getElementById('modalTitle').innerText = judul;
        document.getElementById('modalDivisi').innerText = divisi;
        document.getElementById('modalDesc').innerText = deskripsi;
        document.getElementById('modalFoto').src = foto;
        document.getElementById('modalTanggal').innerText = tanggal;
        document.getElementById('modalDownload').href = foto;
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeDetail() {
        document.getElementById('detailModal').classList.add('hidden');
    }
    </script>

</body>
</html>
