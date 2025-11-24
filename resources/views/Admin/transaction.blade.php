<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transaction</title>
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

    <div class="w-full h-[500px] bg-cover bg-center" style="background-image: url('https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/074010_2019-09-06.jpg')"></div>

    <div class="w-full bg-white h-screen rounded-t-[50%] -mt-32 flex flex-col items-center justify-start pt-10 shadow-lg">
        <h1 class="text-yellow-600 text-5xl font-extrabold tracking-wider">TRANSACTION LIST</h1>

    <div class="flex justify-center mt-4 gap-6">
        <div class="flex items-center w-[450px] bg-white rounded-full shadow px-5 py-2 text-black">
            <input type="text" placeholder="Search..." class="w-full outline-none px-2">
            <span class="material-icons">search</span>
        </div>

    <div class="flex justify-end gap-6 pr-20 mt-4">
        <button onclick="openAdd()" class="p-2 bg-white text-black rounded-full shadow">➕</button>
    </div>
    </div>

    <div class="w-full flex justify-center items-center bg-white font-bold py-4 px-4 ">
    <div class="flex justify-center mt-2 px-10">
        <table class="w-full max-w-5xl bg-white text-black rounded-lg shadow-lg overflow-hidden">
            <thead class="bg-[#D9651A] text-white">
                <tr>
                    <th class="py-3 px-4">ID_Transaksi</th>
                    <th class="py-3 px-4">UserName</th>
                    <th class="py-3 px-4">TypeOfOrder</th>
                    <th class="py-3 px-4">Price</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4">Payment</th>
                    <th class="py-3 px-4">DateTime</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $t)
                <tr class="border-b text-center">
                    <td class="py-3 px-4">{{ $t['id'] }}</td>
                    <td class="py-3 px-4">{{ $t['username'] }}</td>
                    <td class="py-3 px-4">{{ $t['type'] }}</td>
                    <td class="py-3 px-4">Rp {{ number_format($t['price'], 0, ',', '.') }}</td>
                    <td class="py-3 px-4">
                        @if ($t['status'] == 'Waiting')
                            <span class="text-yellow-600 font-bold">Waiting</span>
                        @elseif ($t['status'] == 'On Process')
                            <span class="text-blue-600 font-bold">ON Process</span>
                        @elseif ($t['status'] == 'Done')
                            <span class="text-green-600 font-bold">Done</span>
                        @else
                            <span class="text-red-600 font-bold">Reject</span>
                        @endif
                    </td>
                    <td class="py-3 px-4">{{ $t['payment'] }}</td>
                    <td class="py-3 px-4">{{ $t['datetime'] }}</td>
                    <td class="py-2 border flex justify-center gap-3">
                        <button onclick='openView(@json($t))'class="text-yellow-600 text-xl">👁️</button>
                        <button onclick='openEdit(@json($t))' class="text-blue-600 text-xl">✏️</button>
                        <form action="{{ route('transaction.delete', $t['id']) }}" method="POST">
                            @csrf
                            <button class="text-red-600 text-xl">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
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

    <!-- add -->
    <div id="addModal" class="hidden">
        <div class="fixed inset-0 bg-black/50"></div>
        <div class="fixed inset-0 flex justify-center items-center z-50">
            <div class="bg-[#DAD7CD] p-8 rounded-xl w-[700px] max-h-[90vh] overflow-y-auto text-[#344E41] shadow-lg border border-[#A3B18A]">
                <h2 class="text-3xl font-bold mb-6 text-center tracking-wide">Add Transaction</h2>
                <h3 class="text-xl font-semibold mb-4 border-l-4 border-[#588157] pl-3">Transaction Info</h3>
                <label class="font-semibold">UserName</label>
                <input type="text" name="username"
                    class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Type of Order</label>
                <input type="text" name="typeoforder"
                    class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Date Time</label>
                <input type="datetime-local" name="datetime"
                    class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <h3 class="text-xl font-semibold mb-4 mt-6 border-l-4 border-[#588157] pl-3">Detail Transaction</h3>
                <label class="font-semibold">List of Item</label>
                <input type="text" name="listofitem"
                    class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Total Transaction</label>
                <input type="text" name="totaltransaction"
                    class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="block mb-2 font-semibold">Payment</label>
                <div class="flex gap-4 mb-6">
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_status" value="Active" class="hidden peer" checked>
                        <div class="px-4 py-2 rounded-lg bg-[#7FB77E] text-white shadow peer-checked:ring-2 ring-white">Paid</div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_status" value="Inactive" class="hidden peer">
                        <div class="px-4 py-2 rounded-lg bg-[#A3B18A] text-[#344E41] shadow peer-checked:ring-2 ring-white">Pending</div>
                    </label>
                </div>
                <label class="block mb-2 font-semibold">Method</label>
                <div class="flex gap-4 mb-6">
                    <label class="cursor-pointer">
                        <input type="radio" name="payment_method" value="PayPal" class="hidden peer" checked>
                        <div class="px-4 py-2 rounded-lg bg-[#7FB77E] text-white shadow peer-checked:ring-2 ring-white">PayPal</div>
                    </label>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeAdd()" class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400 transition">Cancel</button>
                    <button class="px-6 py-2 bg-[#7FB77E] text-white rounded-lg shadow hover:bg-[#6ea96e] transition">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- edit -->
    <div id="editModal" class="hidden fixed inset-0 bg-black/50 justify-center items-center z-50"> 
        <div class="bg-[#DAD7CD] p-8 rounded-xl w-[700px] max-h-[90vh] overflow-y-auto text-[#344E41] shadow-lg border border-[#A3B18A]">
            <h2 class="text-3xl font-bold mb-6 text-center tracking-wide">Edit Transaction</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <h3 class="text-xl font-semibold mb-4 border-l-4 border-[#588157] pl-3">Transaction Info</h3>
                <label class="font-semibold">UserName</label>
                <input type="text" id="editUsername" name="username" class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Type of Order</label>
                <input type="text" id="editTypeoforder" name="typeoforder" class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Date Time</label>
                <input type="date" id="editDatetime" name="datetime" class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <h3 class="text-xl font-semibold mb-4 mt-6 border-l-4 border-[#588157] pl-3">Detail Transaction</h3>
                <label class="font-semibold">List of Item</label>
                <input type="text" id="editListofitem" name="listofitem" class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="font-semibold">Total Transaction</label>
                <input type="text" id="editTotaltransaction" name="totaltransaction" class="w-full p-3 rounded-lg bg-[#7FB77E] text-white mb-4 outline-none shadow">
                <label class="block mb-2 font-semibold">Payment</label>
                <div class="flex gap-4 mb-5">
                    <label class="cursor-pointer">
                        <input type="radio" id="editPaid" name="payment" value="Paid" class="hidden peer">
                        <div class="px-4 py-2 rounded-lg bg-[#7FB77E] text-white peer-checked:ring-2 ring-white shadow">Paid</div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" id="editPending" name="payment" value="Pending" class="hidden peer">
                        <div class="px-4 py-2 rounded-lg bg-[#A3B18A] text-[#344E41] peer-checked:ring-2 ring-white shadow">Pending</div>
                    </label>
                </div>
                <label class="block mb-2 font-semibold">Method</label>
                <div class="flex gap-4 mb-6">
                    <label class="cursor-pointer">
                        <input type="radio" id="editPaypal" name="method" value="PayPal" class="hidden peer">
                        <div class="px-4 py-2 rounded-lg bg-[#7FB77E] text-white peer-checked:ring-2 ring-white shadow">PayPal</div>
                    </label>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="button" onclick="closeEdit()" class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400 transition">Cancel</button>
                    <button class="px-6 py-2 rounded-lg bg-blue-600 text-white shadow hover:bg-blue-700 transition">Update</button>
                </div>
            </form>
        </div>
    </div>


    <!-- view -->
    <div id="viewModal" class="hidden fixed inset-0 bg-black/50 justify-center items-center z-50">
        <div class="bg-[#DAD7CD] p-8 rounded-xl w-[700px] max-h-[80vh] overflow-y-auto text-[#344E41] shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-extrabold">ID Order : <span id="viewOrderId"></span></h2>
                <button onclick="closeView()" class="px-4 py-1 bg-red-300 rounded">Back</button>
            </div>
            <p class="text-right font-semibold mb-4">Status : <span id="viewStatus"></span></p>
            <h3 class="font-bold text-lg border-b pb-1 mb-3">Order Info</h3>
            <div class="grid grid-cols-3 gap-3 mb-3">
                <div>
                    <p class="text-sm font-semibold">UserName</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewUsername"></p>
                </div>
                <div>
                    <p class="text-sm font-semibold">Phone Number</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewPhone"></p>
                </div>
                <div>
                    <p class="text-sm font-semibold">DateTime</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewDatetime"></p>
                </div>
            </div>
            <p class="text-sm font-semibold">Alamat Pengiriman</p>
            <div class="bg-[#344E41] text-white p-4 rounded mb-5" id="viewAddress"></div>
            <h3 class="font-bold text-lg border-b pb-1 mb-3">Detail Transaction</h3>
            <div class="mb-3">
                <p class="font-semibold mb-2">Daftar Item</p>
                <div id="viewListofitem" class="space-y-1"></div>
            </div>
            <div class="flex justify-end font-bold text-lg mb-5">
                Total Transaksi : <span id="viewTotaltransaction" class="ml-2"></span>
            </div>
            <h3 class="font-bold text-lg border-b pb-1 mb-3">Payment</h3>
            <div class="grid grid-cols-2 gap-4 mb-5">
                <div>
                    <p class="text-sm font-semibold">Payment Method</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewMethod"></p>
                </div>
                <div>
                    <p class="text-sm font-semibold">Payment Status</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewPaymentStatus"></p>
                </div>
            </div>
            <h3 class="font-bold text-lg border-b pb-1 mb-3">Notes</h3>
            <div class="bg-[#344E41] text-white p-4 rounded mb-5" id="viewNotes"></div>
            <h3 class="font-bold text-lg border-b pb-1 mb-3">Delivery</h3>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-sm font-semibold">Status</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewDeliveryStatus"></p>
                </div>
                <div>
                    <p class="text-sm font-semibold">Estimates</p>
                    <p class="bg-[#344E41] text-white px-3 py-2 rounded mt-1" id="viewEstimate"></p>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button onclick="closeView()" class="px-5 py-2 bg-gray-300 rounded">Close</button>
            </div>
        </div>
    </div>



    <script>
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

        function openView(t) {
        const modal = document.getElementById("viewModal");
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.getElementById("viewOrderId").innerText = t.id;
        document.getElementById("viewStatus").innerText = t.status;
        document.getElementById("viewUsername").innerText = t.username;
        document.getElementById("viewDatetime").innerText = t.datetime;
        document.getElementById("viewPhone").innerText = "-";
        document.getElementById("viewAddress").innerText = "-";
        document.getElementById("viewListofitem").innerText = t.type;
        document.getElementById("viewTotaltransaction").innerText = "Rp " + t.price;
        document.getElementById("viewMethod").innerText = t.payment;
        document.getElementById("viewPaymentStatus").innerText = t.status;
        document.getElementById("viewNotes").innerText = "-";
        document.getElementById("viewDeliveryStatus").innerText = t.status;
        document.getElementById("viewEstimate").innerText = "-";
        }

        function closeView() {
            let m = document.getElementById("viewModal");
            m.classList.add("hidden");
            m.classList.remove("flex");
        }

        function openEdit(data) {
            let m = document.getElementById("editModal");
            m.classList.remove("hidden");
            m.classList.add("flex");
            document.getElementById("editUsername").value = data.username;
            document.getElementById("editTypeoforder").value = data.type;
            document.getElementById("editDatetime").value = data.datetime;
            document.getElementById("editListofitem").value = data.price;
            document.getElementById("editTotaltransaction").value = data.price;
            if (data.payment === "Paid") {
                document.getElementById("editPaid").checked = true;
            } else {
                document.getElementById("editPending").checked = true;
            }
            if (data.method === "PayPal") {
                document.getElementById("editPaypal").checked = true;
            }

            document.getElementById("editForm").action = `/transaction/${data.id}/update`;
        }

        function closeEdit() {
            let m = document.getElementById("editModal");
            m.classList.add("hidden");
            m.classList.remove("flex");
        }
    </script>

</body>
</html>
