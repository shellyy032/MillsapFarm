<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Report Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        table tr:nth-child(even) { background: #f5f5f5; }
        th { cursor: pointer; }
    </style>
</head>
<body class="bg-gray-100">

    <!-- NAVBAR -->
    <div class="bg-teal-900 px-8 py-4 flex items-center justify-between shadow-lg">
        <div class="flex items-center">
            <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" 
                alt="Logo" class="h-12 object-contain">
        </div>
        <div class="flex items-center space-x-8">
            <nav class="flex space-x-8 text-[#DAD7CD]">
                <a href="/dashboard" class="hover:text-[#D4A373]">Home</a>
                <a href="/control" class="hover:text-[#D4A373]">Control</a>
                <a href="/report" class="hover:text-[#D4A373]">Report</a>
            </nav>
            <div class="text-[#DAD7CD]">SuperAdmin ▾</div>
        </div>
    </div>

    <!-- TITLE -->
    <h1 class="text-center text-4xl font-extrabold text-yellow-600 mt-8 tracking-wider">
        REPORT PRODUK
    </h1>

    <!-- ACTION BAR -->
    <div class="w-11/12 mx-auto mt-6 flex justify-between items-center">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search..." class="border p-2 rounded-lg w-60">
        <button class="bg-teal-700 text-white px-4 py-2 rounded hover:bg-teal-800" onclick="openAdd()">➕ Tambah Produk</button>
    </div>

    <!-- ADD MODAL -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 w-96 rounded-xl">
            <h2 class="text-xl font-bold mb-4">Tambah Produk</h2>
            <form action="/report/product/add" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="font-semibold">Nama Produk</label>
                    <input type="text" name="nama" class="border w-full p-2 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="font-semibold">Harga</label>
                    <input type="number" name="harga" class="border w-full p-2 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="font-semibold">Stok</label>
                    <input type="number" name="stok" class="border w-full p-2 rounded" required>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeAdd()" class="border px-4 py-2 rounded">Cancel</button>
                    <button class="bg-teal-700 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
        <div class="bg-white p-6 w-96 rounded-xl">
            <h2 class="text-xl font-bold mb-4">Edit Produk</h2>
            <form id="editForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="font-semibold">Nama Produk</label>
                    <input id="editNama" type="text" name="nama" class="border w-full p-2 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="font-semibold">Harga</label>
                    <input id="editHarga" type="number" name="harga" class="border w-full p-2 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="font-semibold">Stok</label>
                    <input id="editStok" type="number" name="stok" class="border w-full p-2 rounded" required>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="closeEdit()" class="border px-4 py-2 rounded">Cancel</button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- TABLE -->
    <div class="w-11/12 mx-auto bg-white shadow-md rounded-xl mt-4 p-6 overflow-x-auto">
        <table id="productTable" class="w-full border border-gray-300 text-center text-sm">
            <thead class="bg-teal-900 text-white">
                <tr>
                    <th onclick="sortTable(0)">ID</th>
                    <th onclick="sortTable(1)">Nama Produk</th>
                    <th onclick="sortTable(2)">Kategori</th>
                    <th onclick="sortTable(3)">Harga</th>
                    <th onclick="sortTable(4)">Stok</th>
                    <th onclick="sortTable(5)">Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products ?? [] as $p)
                <tr>
                    <td class="py-2 border">{{ $p['id'] }}</td>
                    <td class="py-2 border">{{ $p['nama'] }}</td>
                    <td class="py-2 border">{{ number_format($p['harga'],0,',','.') }}</td>
                    <td class="py-2 border">{{ $p['stok'] }}</td>
                    <td class="py-2 border flex justify-center gap-2">
                        <button onclick="openEdit({{ $p['id'] }}, '{{ $p['nama'] }}', {{ $p['harga'] }}, {{ $p['stok'] }})" class="text-blue-600 text-lg">✏️</button>
                        <form action="/report/product/delete/{{ $p['id'] }}" method="POST">
                            @csrf
                            <button class="text-red-600 text-lg" onclick="return confirm('Hapus produk ini?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // MODAL FUNCTIONS
        function openAdd() {
            let m = document.getElementById("addModal");
            m.classList.remove("hidden");
            m.classList.add("flex");
        }
        function closeAdd() {
            let m = document.getElementById("addModal");
            m.classList.add("hidden");
            m.classList.remove("flex");
        }

        function openEdit(id, nama, harga, stok) {
            let m = document.getElementById("editModal");
            m.classList.remove("hidden");
            m.classList.add("flex");

            document.getElementById("editNama").value = nama;
            document.getElementById("editHarga").value = harga;
            document.getElementById("editStok").value = stok;

            document.getElementById("editForm").action = `/report/product/edit/${id}`;
        }
        function closeEdit() {
            let m = document.getElementById("editModal");
            m.classList.add("hidden");
            m.classList.remove("flex");
        }

        // SEARCH FUNCTION
        function searchTable() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#productTable tbody tr");
            rows.forEach(row => {
                row.style.display = Array.from(row.children).some(td => td.textContent.toLowerCase().includes(input)) ? "" : "none";
            });
        }

        // SORT FUNCTION
        function sortTable(n) {
            let table = document.getElementById("productTable");
            let rows = Array.from(table.tBodies[0].rows);
            let asc = table.getAttribute("data-sort-dir") !== "asc";
            rows.sort((a,b) => {
                let x = a.cells[n].textContent.trim();
                let y = b.cells[n].textContent.trim();
                if(!isNaN(parseFloat(x)) && !isNaN(parseFloat(y))) return asc ? x-y : y-x;
                return asc ? x.localeCompare(y) : y.localeCompare(x);
            });
            rows.forEach(r => table.tBodies[0].appendChild(r));
            table.setAttribute("data-sort-dir", asc ? "asc" : "desc");
        }
    </script>

</body>
</html>
