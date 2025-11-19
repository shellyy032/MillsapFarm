<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Report</title>
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
        <div class="text-[#DAD7CD]">SuperAdmin ▾</div>
        </div>
    </div>

    <h1 class="text-center text-6xl font-extrabold text-yellow-600 mt-8 tracking-wider">REPORT PRODUK</h1>

    <div class="w-11/12 mx-auto mt-4 bg-teal-900 p-3 rounded-xl flex justify-center gap-20 text-white font-semibold">
        <a href="?role=PRODUK" class="px-6 py-2 rounded-t-xl {{ $currentRole == 'PRODUK' ? 'bg-white text-orange-600 font-semibold' : 'text-white' }}">PRODUCT</a>
        <a href="?role=TRANSAKSI" class="px-6 py-2 rounded-t-xl {{ $currentRole == 'TRANSAKSI' ? 'bg-white text-orange-600 font-semibold' : 'text-white' }}">TRANSACTION</a>
        <a href="?role=DIVISI" class="px-6 py-2 rounded-t-xl {{ $currentRole == 'DIVISI' ? 'bg-white text-orange-600 font-semibold' : 'text-white' }}">DIVISION</a>
        <a href="?role=RIWAYAT" class="px-6 py-2 rounded-t-xl {{ $currentRole == 'RIWAYAT' ? 'bg-white text-orange-600 font-semibold' : 'text-white' }}">HISTORY</a>
    </div>
     
    <div class="overflow-x-auto">
        <div class="w-11/12 mx-auto bg-white shadow-md rounded-xl mt-4 p-6">
            <div class="flex justify-between mb-4">
                <input id="searchInput" type="text" placeholder="Cari..."
                    class="border px-4 py-2 rounded w-64"
                    onkeyup="searchTable()">
                @if($currentRole !== 'RIWAYAT')
                <button onclick="openAdd('{{ $currentRole }}')"
                    class="bg-teal-900 text-white px-4 py-2 rounded">➕</button>
                @endif
            </div>
            <table id="dataTable" class="w-full border border-gray-300 text-sm text-center">
                @if($currentRole == 'PRODUK')
                <thead class="bg-teal-900 text-white">
                    <tr>
                        <th class="p-2 border">ID Produk</th>
                        <th class="p-2 border">Nama Produk</th>
                        <th class="p-2 border">Kategori</th>
                        <th class="p-2 border">Harga</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produk as $p)
                    <tr>
                        <td class="border p-2">{{ $p['id_produk'] }}</td>
                        <td class="border p-2">{{ $p['nama_produk'] }}</td>
                        <td class="border p-2">{{ $p['kategori'] }}</td>
                        <td class="border p-2">{{ $p['harga'] }}</td>
                        <td class="border p-2">{{ $p['status'] }}</td>
                        <td class="py-2 border flex justify-center gap-3">
                            <button onclick="openEditProduct({{ $p['id_produk'] }})" class="text-blue-600 text-lg">✏️</button>
                            <form action="{{ route('product.delete', ['id' => $p['id_produk']]) }}" method="POST">
                                @csrf
                                <button class="text-red-600 text-lg" onclick="return confirm('Delete this product?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
                @if($currentRole == 'TRANSAKSI')
                <thead class="bg-teal-900 text-white">
                    <tr>
                        <th class="p-2 border">ID</th>
                        <th class="p-2 border">User</th>
                        <th class="p-2 border">Tanggal</th>
                        <th class="p-2 border">Total</th>
                        <th class="p-2 border">Admin</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $t)
                    <tr>
                        <td class="border p-2">{{ $t['id_transaksi'] }}</td>
                        <td class="border p-2">{{ $t['user'] }}</td>
                        <td class="border p-2">{{ $t['tanggal'] }}</td>
                        <td class="border p-2">{{ $t['total'] }}</td>
                        <td class="border p-2">{{ $t['admin'] }}</td>
                        <td class="border p-2">{{ $t['status'] }}</td>
                        <td class="py-2 border flex justify-center gap-3">
                            <button onclick="openDetailTransaction({{ $t['id_transaksi'] }})" class="text-green-600 text-lg">👁️</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
                @if($currentRole == 'DIVISI')
                <thead class="bg-teal-900 text-white">
                    <tr>
                        <th class="p-2 border">ID Divisi</th>
                        <th class="p-2 border">Nama Divisi</th>
                        <th class="p-2 border">Penanggung Jawab</th>
                        <th class="p-2 border">Jumlah Staf</th>
                        <th class="p-2 border">Status</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($divisi as $d)
                    <tr>
                        <td class="border p-2">{{ $d['id_divisi'] }}</td>
                        <td class="border p-2">{{ $d['nama_divisi'] }}</td>
                        <td class="border p-2">{{ $d['penanggung_jawab'] }}</td>
                        <td class="border p-2">{{ $d['jumlah_staf'] }}</td>
                        <td class="border p-2">{{ $d['status'] }}</td>
                        <td class="py-2 border flex justify-center gap-3">
                            <button onclick="openEditDivision({{ $d['id_divisi'] }})" class="text-blue-600 text-lg">✏️</button>
                            <form action="{{ route('division.delete', ['id' => $d['id_divisi']]) }}" method="POST">
                                @csrf
                                <button class="text-red-600 text-lg" onclick="return confirm('Delete this division?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
                @if($currentRole == 'RIWAYAT')
                <thead class="bg-teal-900 text-white">
                    <tr>
                        <th class="p-2 border">Waktu</th>
                        <th class="p-2 border">User</th>
                        <th class="p-2 border">Aksi</th>
                        <th class="p-2 border">Target</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($riwayat as $r)
                    <tr>
                        <td class="border p-2">{{ $r['waktu'] }}</td>
                        <td class="border p-2">{{ $r['user'] }}</td>
                        <td class="border p-2">{{ $r['aksi'] }}</td>
                        <td class="border p-2">{{ $r['target'] }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Tidak ada data riwayat</td>
                    </tr>
                    @endforelse
                </tbody>
            @endif
            </table>
        </div>
    </div>
</div>


    <div class="w-full min-h-screen flex justify-center items-center">
    <div class="p-6 bg-white rounded shadow">
    <!-- add produk -->
    <div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-[#DAD7CD] p-6 w-[600px] rounded-xl">
        <form action="/report/add-produk" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="font-bold text-xl mb-4">Add Product</h2>
            <label class="block mb-1 text-[#344E41]">Product Name</label>
            <input type="text" name="nama" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>

            <label class="block mb-1 text-[#344E41]">Category</label>
            <input type="text" name="kategori" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>

            <label class="block mb-1 text-[#344E41]">Price</label>
            <input type="number" name="harga" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>

            <label class="block mb-1 text-[#344E41]">Status</label>
            <div class="flex gap-3 mb-3">
                <label>
                    <input type="radio" name="status" value="Active" class="hidden" checked>
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#7FB77E] text-white">Active</div>
                </label>
                <label>
                    <input type="radio" name="status" value="Inactive" class="hidden">
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#A3B18A] text-[#344E41]">Passive</div>
                </label>
            </div>
            <label class="block mb-1 text-[#344E41]">Image</label>
            <input type="file" name="image" class="mb-3">

            <label class="block mb-1 text-[#344E41]">Description</label>
            <textarea name="deskripsi" class="w-full p-2 border bg-[#7FB77E] rounded mb-3"></textarea>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeAdd()" class="px-4 py-2 border">Cancel</button>
                <button class="px-4 py-2 bg-teal-900 text-white rounded">Save</button>
            </div>
        </form>
    </div>
    </div>

    <!-- add transaksi -->
    <div id="addTransaksiModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 overflow-auto">
    <div class="bg-[#DAD7CD] p-6 w-[700px] rounded-xl">
        <form action="/report/add-transaksi" method="POST">
            @csrf
            <h3 class="font-semibold">Transaction</h3>
            <label class="block mb-1 text-[#344E41]">User</label>
            <input type="text" name="user" placeholder="User" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Date</label>
            <input type="date" name="date" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Total</label>
            <input type="number" name="total" placeholder="Total" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Admin</label>
            <input type="text" name="admin" placeholder="Admin" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <h3 class="font-semibold">Detail Transaction</h3>
            <label class="block mb-1 text-[#344E41]">List of Items</label>
            <textarea name="items" class="w-full p-2 border bg-[#7FB77E] rounded mb-3"></textarea>
            <label class="block mb-1 text-[#344E41]">Total Transaction</label>
            <input type="number" name="total_transaction" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Payment</label>
            <div class="flex gap-3 mb-3">
                <label>
                    <input type="radio" name="payment_status" value="Active" class="hidden" checked>
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#7FB77E] text-white">Paid</div>
                </label>
                <label>
                    <input type="radio" name="payment_status" value="Inactive" class="hidden">
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#A3B18A] text-[#344E41]">Pending</div>
                </label>
            </div>
            <label class="block mb-1 text-[#344E41]">Method</label>
            <div class="flex gap-3 mb-3">
                <label>
                    <input type="radio" name="payment_status" value="Active" class="hidden" checked>
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#7FB77E] text-white">PayPal</div>
                </label>
            </div>
            <h3 class="font-semibold">Delivery</h3>
            <label class="block mb-1 text-[#344E41]">Delivery Id</label>
            <input type="text" name="driver_id" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Status</label>
            <input type="text" name="delivery_status" class="w-full p-2 border bg-[#7FB77E] rounded mb-3">
            <label class="block mb-1 text-[#344E41]">Delivery Address</label>
            <textarea name="alamat"  class="w-full p-2 border bg-[#7FB77E] rounded mb-3"></textarea>
            <div class="flex justify-end gap-3 mt-6">
                <button type="button" onclick="closeAdd()" class="px-5 py-2 border border-[#344E41] rounded text-[#344E41]">Cancel</button>
                <button class="px-5 py-2 rounded bg-[#7FB77E] text-white">Save</button>
            </div>
        </form>
    </div>
    </div>

    <!-- add divisi -->
    <div id="addDivisiModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-[#DAD7CD] p-6 w-[500px] rounded-xl">
        <form action="/report/add-divisi" method="POST">
            @csrf
            <h2 class="font-bold text-xl mb-4">Add Divisi</h2>
            <label class="block mb-1 text-[#344E41]">Division Name</label>
            <input type="text" name="nama_divisi" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>
            <label class="block mb-1 text-[#344E41]">Person in Charge</label>
            <input type="text" name="penanggung_jawab" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>
            <label class="block mb-1 text-[#344E41]">Number of Staff</label>
            <input type="number" name="jumlah_staf" class="w-full p-2 border bg-[#7FB77E] rounded mb-3" required>
            <label class="block mb-1 text-[#344E41]">Status</label>
            <div class="flex gap-3 mb-3">
                <label>
                    <input type="radio" name="status" value="Active" class="hidden" checked>
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#7FB77E] text-white">Active</div>
                </label>
                <label>
                    <input type="radio" name="status" value="Inactive" class="hidden">
                    <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#A3B18A] text-[#344E41]">Passive</div>
                </label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeAdd()" class="px-5 py-2 border border-[#344E41] rounded text-[#344E41]">Cancel</button>
                <button class="px-5 py-2 rounded bg-[#7FB77E] text-white">Save</button>
            </div>
            </div>
        </form>
    </div>
    </div>

    <!-- edit user -->
    <div id="editProduct" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-6 w-96 rounded-xl">
            <h2 class="text-xl font-bold mb-4">Edit Product</h2>
                 <form id="editForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="font-semibold">Product Name</label>
                        <input id="editNama" type="text" name="nama_produk" class="border w-full p-2 rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold">Category</label>
                        <input id="editKategori" type="text" name="kategori" class="border w-full p-2 rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold">Price</label>
                        <input id="editHarga" type="number" name="harga" class="border w-full p-2 rounded" required>
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold">Status</label>
                        <input id="editStatus" type="text" name="status" class="border w-full p-2 rounded" required>
                        <label>
                            <input type="radio" name="status" value="Active" class="hidden" checked>
                            <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#7FB77E] text-white">Active</div>
                        </label>
                        <label>
                            <input type="radio" name="status" value="Inactive" class="hidden">
                            <div class="px-4 py-2 rounded-lg cursor-pointer bg-[#A3B18A] text-[#344E41]">Passive</div>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold">Image</label>
                        <input id="editImage" <input type="file" name="image" class="mb-3"> required>
                    </div>
                    <div class="mb-3">
                        <label class="font-semibold">Description</label>
                        <input id="editDescription" type="text" name="description" class="border w-full p-2 rounded" required>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" onclick="closeEdit()" class="border px-4 py-2 rounded">Cancel</button>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl w-[400px]">
        <form id="deleteForm" method="POST">
            @csrf
            <h3 class="text-lg font-semibold mb-4">Delete Data?</h3>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeDelete()" class="px-4 py-2 border">Cancel</button>
                <button class="px-4 py-2 bg-red-600 text-white rounded">Delete</button>
            </div>
        </form>
    </div>
    </div>

    <script>
        function searchTable() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let rows = document.querySelectorAll("#dataTable tbody tr");

        rows.forEach(r => {
            r.style.display = r.innerText.toLowerCase().includes(input) ? "" : "none";
        });
        }

        function openAdd(role) {
            if (role === "PRODUK") document.getElementById("addProductModal").classList.remove("hidden");
            if (role === "TRANSAKSI") document.getElementById("addTransaksiModal").classList.remove("hidden");
            if (role === "DIVISI") document.getElementById("addDivisiModal").classList.remove("hidden");
        }

        function closeAdd() {
            document.querySelectorAll("[id$='Modal']").forEach(m => m.classList.add("hidden"));
        }

        function openEditProduct(id) {
            document.getElementById('editProductModal').classList.remove('hidden');
            document.getElementById('editProductId').value = id;
        }

        function closeEditProduct() {
            document.getElementById('editProductModal').classList.add('hidden');
        }

        function openEditDivision(id) {
            document.getElementById('editDivisionModal').classList.remove('hidden');
            document.getElementById('editDivisionId').value = id;
        }

        function closeEditDivision() {
            document.getElementById('editDivisionModal').classList.add('hidden');
        }   
    </script>
</body>
</html>
