<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Control Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .tab-active {
            border-bottom: 3px solid #ffb703;
            color: #ffb703;
        }
        table tr:nth-child(even) { background: #f5f5f5; }
    </style>
</head>

<body class="bg-gray-100">
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

    <h1 class="text-center text-6xl font-extrabold text-yellow-600 mt-8 p-6 tracking-wider">CONTROL DASHBOARD</h1>

    <div class="w-11/12 mx-auto mt-4 bg-teal-900 p-3 rounded-xl flex justify-center gap-20 text-white font-semibold">
    @foreach (['USER','ADMIN','KURIR','SUPERVISOR'] as $r)
        <a href="/control?role={{ $r }}" class="px-6 py-2 rounded-lg transition {{ $role == $r ? 'bg-white text-teal-900 font-bold shadow' : '' }}">{{ $r }}</a>
    @endforeach
    </div>

    <div class="w-11/12 mx-auto bg-white shadow-md rounded-xl mt-4 p-6">

        <!-- add user -->
        <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50 overflow-auto">
            <div class="bg-[#DAD7CD] p-6 w-full max-w-[750px] rounded-xl max-h-[90vh] overflow-y-auto">
                <form action="/control/add" method="POST">
                    @csrf
                    <div class="space-y-3">
                        <h3 class="font-semibold mb-4 text-[#344E41]">Account Information</h3>

                        <label class="block mb-1 text-[#344E41]">User ID</label>
                        <input type="text" name="user_id" class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3" required>

                        <label class="block mb-1 text-[#344E41]">UserName</label>
                        <input type="text" name="username" class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3" required>

                        <label class="block mb-1 text-[#344E41]">Email</label>
                        <input type="email" name="email" class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3" required>

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

                        <label class="block mb-1 text-[#344E41]">Password</label>
                        <input type="password" name="password"
                            class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3" required>

                        <label class="block mb-1 text-[#344E41]">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3" required>
                    </div>

                    <div class="mt-6">
                        <h3 class="font-semibold mb-4 text-[#344E41]">Role</h3>

                        <div class="flex gap-3 mb-6 flex-wrap">
                        <label>
                            <input type="radio" name="role" value="USER" class="hidden"
                                {{ $role == 'USER' ? 'checked' : '' }}>
                            <div class="px-6 py-2 rounded-lg cursor-pointer 
                                {{ $role == 'USER' ? 'bg-[#BC6C25] text-white' : 'bg-[#A3B18A] text-[#344E41]' }}">
                                USER
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="role" value="ADMIN" class="hidden"
                                {{ $role == 'ADMIN' ? 'checked' : '' }}>
                            <div class="px-6 py-2 rounded-lg cursor-pointer 
                                {{ $role == 'ADMIN' ? 'bg-[#BC6C25] text-white' : 'bg-[#A3B18A] text-[#344E41]' }}">
                                ADMIN
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="role" value="KURIR" class="hidden"
                                {{ $role == 'KURIR' ? 'checked' : '' }}>
                            <div class="px-6 py-2 rounded-lg cursor-pointer 
                                {{ $role == 'KURIR' ? 'bg-[#BC6C25] text-white' : 'bg-[#A3B18A] text-[#344E41]' }}">
                                KURIR
                            </div>
                        </label>

                        <label>
                            <input type="radio" name="role" value="SUPERVISOR" class="hidden"
                                {{ $role == 'SUPERVISOR' ? 'checked' : '' }}>
                            <div class="px-6 py-2 rounded-lg cursor-pointer 
                                {{ $role == 'SUPERVISOR' ? 'bg-[#BC6C25] text-white' : 'bg-[#A3B18A] text-[#344E41]' }}">
                                SUPERVISOR
                            </div>
                        </label>
                    </div>

                        <h3 class="font-semibold mb-3 text-[#344E41]">Account Activity</h3>

                        <label class="block mb-1 text-[#344E41]">Created At</label>
                        <input type="text" name="created_at"
                            class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3"
                            value="{{ date('Y-m-d H:i:s') }}" readonly>

                        <label class="block mb-1 text-[#344E41]">Last Activity</label>
                        <input type="text" name="last_activity"
                            class="w-full p-2 rounded bg-[#7FB77E] text-white outline-none mb-3"
                            value="-" readonly>
                    </div>
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeAdd()" class="px-5 py-2 border border-[#344E41] rounded text-[#344E41]">Cancel</button>
                        <button class="px-5 py-2 rounded bg-[#7FB77E] text-white">Save</button>
                    </div>

                </form>
            </div>
        </div>

        <!-- edit user -->
        <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 w-96 rounded-xl">
                <h2 class="text-xl font-bold mb-4">Edit User</h2>

                <form id="editForm" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="font-semibold">Nama Pengguna</label>
                        <input id="editNama" type="text" name="nama_pengguna" class="border w-full p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label class="font-semibold">Email</label>
                        <input id="editEmail" type="email" name="email" class="border w-full p-2 rounded" required>
                    </div>

                    <div class="flex justify-end gap-3 mt-4">
                        <button type="button" onclick="closeEdit()" class="border px-4 py-2 rounded">Cancel</button>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

       <div class="w-11/12 mx-auto flex justify-between items-center mb-3">
        <form method="GET" action="/control" class="flex items-center gap-3">
            <div class="flex items-center w-[450px] bg-white rounded-full shadow px-5 py-2 text-black">
                <input type="text" placeholder="Search..." class="w-full outline-none px-2">
                <span class="material-icons">search</span>
            </div>
        </form>
        <button onclick="openAdd()" class="bg-green-600 text-white px-3 py-1 rounded-lg shadow text-sm">➕</button>
       </div>

        <table id="productTable" class="w-full border border-gray-300 text-center text-sm">
            <thead class="bg-teal-900 text-white">
                <tr>
                    <th class="py-2 border">User ID</th>
                    <th class="py-2 border">UserName</th>
                    <th class="py-2 border">Email</th>
                    <th class="py-2 border">Status</th>
                    <th class="py-2 border">Created At</th>
                    <th class="py-2 border">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $u)
                <tr>
                    <td class="py-2 border">{{ $u['id_user'] }}</td>
                    <td class="py-2 border">{{ $u['nama_pengguna'] }}</td>
                    <td class="py-2 border text-blue-600">{{ $u['email'] }}</td>

                    <td class="py-2 border">
                        <span class="{{ $u['status'] == 'Active' ? 'text-green-600' : 'text-red-600' }}">
                            {{ $u['status'] }}
                        </span>
                    </td>

                    <td class="py-2 border">{{ $u['created_at'] }}</td>

                    <td class="py-2 border flex justify-center gap-3">
                        <button onclick="openEdit({{ $u['id_user'] }}, '{{ $u['nama_pengguna'] }}', '{{ $u['email'] }}')" class="text-blue-600 text-lg">✏️</button>
                        <form action="{{ route('control.delete', ['role' => $role, 'id' => $u['id_user']]) }}" method="POST">
                            @csrf
                            <button class="text-red-600 text-lg" onclick="return confirm('Hapus user ini?')">🗑️</button>
                    </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 text-gray-500 text-center">No user data available</td>
                </tr>
                @endforelse
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

    <div class="mt-auto bg-teal-900 text-white py-4 flex justify-around">
        <div>USER : {{ $roleCounts['user'] }}</div>
        <div>ADMIN : {{ $roleCounts['admin'] }}</div>
        <div>KURIR : {{ $roleCounts['kurir'] }}</div>
        <div>SUPERVISOR : {{ $roleCounts['supervisor'] }}</div>
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

        function openEdit(id, nama, email) {
            let m = document.getElementById("editModal");
            m.classList.remove("hidden");
            m.classList.add("flex");

            document.getElementById("editNama").value = nama;
            document.getElementById("editEmail").value = email;

            document.getElementById("editForm").action = `/control/${id}/update`;
        }

        function closeEdit() {
            let m = document.getElementById("editModal");
            m.classList.add("hidden");
            m.classList.remove("flex");
        }
    </script>

</body>
</html>
