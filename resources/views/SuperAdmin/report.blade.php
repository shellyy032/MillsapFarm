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

<!-- navbar -->
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
            <a href="/access" class="hover:text-[#D4A373]">Access</a>
            <a href="/constraint" class="hover:text-[#D4A373]">Constraint</a>
            <a href="/about" class="hover:text-[#D4A373]">About</a>
        </nav>
        <div class="text-[#DAD7CD]">SuperAdmin ▾</div>
        </div>
    </div>

<!-- title -->
<h1 class="text-center text-4xl font-extrabold text-yellow-600 mt-8 tracking-wider">
    REPORT PRODUK
</h1>

    <div class="w-11/12 mx-auto mt-10 bg-teal-900 p-3 rounded-xl flex gap-4 text-white font-semibold">
        @foreach (['PRODUK','TRANSAKSI','DIVISI','RIWAYAT'] as $r)
            <a href="/report?role={{ $r }}"
            class="px-6 py-2 rounded-lg transition
            {{ $currentRole == $r ? 'bg-white text-teal-900 font-bold shadow' : '' }}">
                {{ $r }}
            </a>
        @endforeach
    </div>

<!-- action bar -->
<div class="w-11/12 mx-auto mt-6 flex justify-between items-center">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search..." class="border p-2 rounded-lg w-60">
    <button class="bg-teal-700 text-white px-4 py-2 rounded hover:bg-teal-800" onclick="openAddProduct()">➕</button>
</div>

<!-- add -->
    <div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 overflow-auto">
    <div class="bg-[#DAD7CD] p-6 w-full max-w-[750px] rounded-xl max-h-[90vh] overflow-y-auto">
        <h2 class="text-xl font-bold mb-6 text-[#344E41]">Add Product</h2>
        <form action="{{ url('/report/product/add') }}" method="POST">
            @csrf
            <div class="space-y-3">
                <label class="block mb-1 text-[#344E41]">Nama Produk</label>
                <input type="text" name="nama" class="w-full p-2 rounded bg-[#3A5A40] text-white outline-none mb-3" required>

                <label class="block mb-1 text-[#344E41]">Kategori</label>
                <input type="text" name="kategori" class="w-full p-2 rounded bg-[#3A5A40] text-white outline-none mb-3" required>

                <label class="block mb-1 text-[#344E41]">Harga</label>
                <input type="number" name="harga" class="w-full p-2 rounded bg-[#3A5A40] text-white outline-none mb-3" required>

                <label class="block mb-1 text-[#344E41]">Stok</label>
                <input type="number" name="stok" class="w-full p-2 rounded bg-[#3A5A40] text-white outline-none mb-3" required>

                <label class="block mb-1 text-[#344E41]">Status</label>
                <div class="flex gap-3 mb-3">
                    <label>
                        <input type="radio" name="status" value="Available" class="hidden" checked>
                        <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#3A5A40] text-white">Available</div>
                    </label>
                    <label>
                        <input type="radio" name="status" value="Out of Stock" class="hidden">
                        <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#A3B18A] text-[#344E41]">Out of Stock</div>
                    </label>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeAddProduct()" class="px-5 py-2 border border-[#344E41] rounded text-[#344E41]">Cancel</button>
                <button class="px-5 py-2 rounded bg-[#3A5A40] text-white">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- table -->
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
            @foreach ($products as $p)
            <tr>
                <td class="py-2 border">{{ $p['id'] }}</td>
                <td class="py-2 border">{{ $p['nama'] }}</td>
                <td class="py-2 border">{{ $p['kategori'] }}</td>
                <td class="py-2 border">{{ number_format($p['harga'],0,',','.') }}</td>
                <td class="py-2 border">{{ $p['stok'] }}</td>
                <td class="py-2 border">{{ $p['status'] }}</td>
                <td class="py-2 border flex justify-center gap-2">
                    <form action="{{ url('/report/product/delete/'.$p['id']) }}" method="POST">
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
    function openAddProduct() {
        let m = document.getElementById("addProductModal");
        m.classList.remove("hidden");
        m.classList.add("flex");
    }
    function closeAddProduct() {
        let m = document.getElementById("addProductModal");
        m.classList.add("hidden");
        m.classList.remove("flex");
    }

    // search
    function searchTable() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#productTable tbody tr");
        rows.forEach(row => {
            row.style.display = Array.from(row.cells).some(td => td.textContent.toLowerCase().includes(input)) ? "" : "none";
        });
    }

    // sort
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
