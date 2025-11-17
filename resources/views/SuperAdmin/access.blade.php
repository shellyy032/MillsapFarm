<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Role & Access Control</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-#teal-900 text-[#34495E] min-h-screen flex flex-col">

    <!-- nav -->
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

    <h1 class="text-center text-4xl font-extrabold text-yellow-600 mt-8 tracking-wider">ROLE & ACCESS CONTROL</h1>

    <!-- tabs -->
    <div class="w-11/12 mx-auto mt-10 bg-teal-900 p-3 rounded-xl flex gap-4 text-white font-semibold">
    @foreach (['USER','ADMIN','KURIR','SUPERVISOR'] as $r)
        <a href="/access?role={{ $r }}"
           class="px-6 py-2 rounded-lg transition
           {{ $currentRole == $r ? 'bg-white text-teal-900 font-bold shadow' : '' }}">
            {{ $r }}
        </a>
    @endforeach
    </div>

        <!-- access -->
        <div class="bg-white p- rounded shadow">
                @csrf
                <input type="hidden" name="role" value="{{ $currentRole }}">
                <div class="w-11/12 mx-auto bg-white mt-4 p-3 rounded shadow">
                <h2 class="text-lg font-semibold mb-4">Edit Hak Akses - {{ $currentRole }}</h2>
                <form action="{{ url('/access/update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{ $currentRole }}">
                    <table class="w-full text-center border border-gray-300 text-sm">
                        <thead class="bg-teal-900 text-white">
                            <tr>
                                <th class="p-1">Modul</th>
                                <th class="p-1">Create</th>
                                <th class="p-1">Read</th>
                                <th class="p-1">Update</th>
                                <th class="p-1">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modules as $mod)
                            <tr class="border-t text-gray-700">
                                <td class="p-1">{{ $mod }}</td>
                                @foreach (['create','read','update','delete'] as $perm)
                                <td class="p-1">
                                    <input type="checkbox"
                                        name="permissions[{{ $mod }}][{{ $perm }}]"
                                        class="h-4 w-4"
                                        @if($permissions[$currentRole][$mod][$perm] ?? false) checked @endif>
                                </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>



                <!-- button -->
                <div class="flex justify-end mt-4 gap-3">
                    <a href="#" class="px-5 py-2 border rounded border-gray-400 text-gray-600">Cancel</a>
                    <button type="submit" class="px-5 py-2 bg-teal-900 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- footer -->
    <div class="mt-auto bg-[#34495E] text-white py-4 flex justify-around">
        <div>USER : {{ $roleCounts['user'] }}</div>
        <div>ADMIN : {{ $roleCounts['admin'] }}</div>
        <div>KURIR : {{ $roleCounts['kurir'] }}</div>
        <div>SUPERVISOR : {{ $roleCounts['supervisor'] }}</div>
    </div>


</body>
</html>
