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


    <div class="p-6">
        <h2 class="font-bold text-xl mb-4">HISTORY TRANSAKSI</h2>
        @foreach($orders as $order)
        <div class="flex justify-between items-center py-4 border-b">
            <div>
                <p class="font-semibold">• {{ $order['date'] }}</p>
                <p>Total Transaksi. Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
            </div>
            <div class="text-right">
                <p>Status. 
                    <span class="text-green-700 font-semibold">{{ $order['status'] }}</span>
                </p>
                <button onclick="handleViewOrder({
                        id: '{{ $order['id'] }}',
                        name: '{{ $order['customer_name'] ?? 'Unknown' }}',
                        phone: '{{ $order['phone'] ?? '-' }}',
                        price: '{{ number_format($order['total'], 0, ',', '.') }}',
                        date: '{{ $order['date'] }}',
                        notes: `{{ $order['notes'] ?? '-' }}`
                    })"class="mt-2 px-4 py-1 border rounded-full">View Detail</button>
            </div>

        </div>
        @endforeach
    </div>

    <!-- detail -->
    <div id="viewOrderModal" class="hidden fixed inset-0 bg-black/50 justify-center items-center z-50">
        <div class="bg-[#DAD7CD] p-8 rounded-xl w-[700px] max-h-[90vh] overflow-y-auto text-[#344E41] shadow-lg">
            <h2 class="text-2xl font-bold mb-4">VIEW ORDER</h2>
            <h3 class="text-xl font-semibold mb-4">Order Information</h3>
            <div class="mb-3">
                <label class="font-semibold">Order ID</label>
                <input type="text" id="view_order_id" readonly class="w-full p-3 rounded bg-[#3A5A40] text-white outline-none">
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label class="font-semibold">Customer Name</label>
                    <input type="text" id="view_customer_name" readonly class="w-full p-3 rounded bg-[#3A5A40] text-white outline-none">
                </div>
                <div>
                    <label class="font-semibold">Phone Number</label>
                    <input type="text" id="view_phone" readonly class="w-full p-3 rounded bg-[#3A5A40] text-white outline-none">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-4">
                <div>
                    <label class="font-semibold">Total Price</label>
                    <input type="text" id="view_price" readonly class="w-full p-3 rounded bg-[#3A5A40] text-white outline-none">
                </div>
                <div>
                    <label class="font-semibold">Order Date</label>
                    <input type="text" id="view_order_date" readonly class="w-full p-3 rounded bg-[#3A5A40] text-white outline-none">
                </div>
            </div>
            <div class="mt-4">
                <label class="font-semibold">Notes</label>
                <textarea id="view_notes" rows="4" readonly
                    class="w-full p-4 rounded bg-[#3A5A40] text-white outline-none"></textarea>
            </div>
            <div class="flex justify-end gap-3 mt-6">
                <button onclick="closeViewOrder()" 
                    class="px-5 py-2 bg-[#C17F5C] rounded text-white">Back</button>
            </div>

        </div>
    </div>

    <script>
        function handleViewOrder(data) {
            document.getElementById("view_order_id").value = data.id;
            document.getElementById("view_customer_name").value = data.name;
            document.getElementById("view_phone").value = data.phone;
            document.getElementById("view_price").value = "Rp " + data.price;
            document.getElementById("view_order_date").value = data.date;
            document.getElementById("view_notes").value = data.notes;
            openViewOrder();
        }

        function openViewOrder() {
            document.getElementById("viewOrderModal").classList.remove("hidden");
        }

        function closeViewOrder() {
            document.getElementById("viewOrderModal").classList.add("hidden");
        }

        function toggleMenu() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>

</body>
</html>
