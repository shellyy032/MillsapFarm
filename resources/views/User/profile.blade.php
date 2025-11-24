<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

    <!-- CONTENT -->
    <div class="max-w-4xl mx-auto p-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold">Account Information</h1>

            <div class="flex gap-3">
                <button class="border px-4 py-1 rounded text-orange-600 border-orange-600">
                    Cancel
                </button>
                <button class="bg-orange-600 text-white px-4 py-1 rounded">
                    Update
                </button>
            </div>
        </div>


        <div class="space-y-10">
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <p class="text-sm mb-1">UserName</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded">{{ $user['username'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Role</p>
                    <div class="border px-4 py-2 rounded text-center">{{ $user['role'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Email</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded">{{ $user['email'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Password</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded">{{ $user['password_mask'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Phone Number</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded">{{ $user['phone'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Confirm Password</p>
                    <input  type="password" class="bg-[#3E6259] text-white px-4 py-2 rounded w-full" value="***********" disabled>
                </div>
            </div>
            <hr class="border-gray-300">
            <h2 class="font-bold">Change Password</h2>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <p class="text-sm mb-1">Password</p>
                    <input  type="password" class="bg-[#3E6259] text-white px-4 py-2 rounded w-full" value="***********">
                </div>

                <div>
                    <p class="text-sm mb-1 ">Confirm Password</p>
                    <input  type="password" class="bg-[#3E6259] text-white px-4 py-2 rounded w-full" value="***********">
                </div>
            </div>
            <hr class="border-gray-300">
            <h2 class="font-bold">Account Activity</h2>
            <div class="grid grid-cols-2 gap-8">
                <div>
                    <p class="text-sm mb-1">Created At</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded text-sm">{{ $user['created_at'] }}</div>
                </div>
                <div>
                    <p class="text-sm mb-1">Last Activity</p>
                    <div class="bg-[#3E6259] text-white px-4 py-2 rounded text-sm">{{ $user['last_activity'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById("dropdownMenu").classList.toggle("hidden");
        }
    </script>

</body>
</html>
