<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Role & Access Control</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2C3E50] text-[#34495E] min-h-screen flex flex-col">

    <!-- nav -->
    <div class="bg-[#34495E] px-8 py-4 flex items-center justify-between text-[#FDFEFE]">
        <div class="text-xl font-bold">MILLSAP FARM</div>
        <nav class="flex space-x-6">
            <a href="/dashboard" class="hover:text-yellow-400">Home</a>
            <a href="/control" class="hover:text-yellow-400">Control</a>
            <a href="/report" class="hover:text-yellow-400">Laporan</a>
            <a href="/access" class="hover:text-yellow-400 underline">Access</a>
            <a href="/kendala" class="hover:text-yellow-400">Kendala</a>
        </nav>
        <div>SuperAdmin ▾</div>
    </div>

    <div class="text-center mt-10">
        <h1 class="text-3xl font-bold text-yellow-400">ROLE & ACCESS CONTROL</h1>
    </div>

    <!-- tabs -->
    <div class="w-11/12 mx-auto mt-8">
        <ul class="flex border-b border-gray-300">
            @php
                $roles = ['Admin','Supervisor','Kurir','User'];
                $currentRole = request('role') ?? 'Admin';
            @endphp
            @foreach ($roles as $role)
                <li class="-mb-px mr-1">
                    <a href="{{ url('/access?role='.$role) }}" class="bg-white inline-block py-2 px-4 font-semibold rounded-t-lg @if($currentRole==$role) text-orange-600 border-b-2 border-orange-600 @else text-gray-500 @endif">{{ $role }}</a>
                </li>
            @endforeach
        </ul>

        <!-- ACCESS TABLE -->
        <div class="bg-white mt-4 p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-4">Edit Hak Akses - {{ $currentRole }}</h2>
            <form action="{{ url('/access/update') }}" method="POST">
                @csrf
                <input type="hidden" name="role" value="{{ $currentRole }}">
                <table class="w-full text-center border border-gray-300">
                    <thead class="bg-orange-500 text-white">
                        <tr>
                            <th class="p-2">Modul</th>
                            <th class="p-2">Create</th>
                            <th class="p-2">Read</th>
                            <th class="p-2">Update</th>
                            <th class="p-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $modules = ['Produk','Transaksi','Stok','Laporan'];
                            $permissions = [
                                'Admin' => [
                                    'Produk'=>['create'=>true,'read'=>true,'update'=>true,'delete'=>false],
                                    'Transaksi'=>['create'=>false,'read'=>true,'update'=>false,'delete'=>false],
                                    'Stok'=>['create'=>true,'read'=>true,'update'=>false,'delete'=>false],
                                    'Laporan'=>['create'=>false,'read'=>true,'update'=>false,'delete'=>false],
                                ],
                                'Supervisor'=>[], 'Kurir'=>[], 'User'=>[]
                            ];
                        @endphp
                        @foreach ($modules as $mod)
                        <tr class="border-t">
                            <td class="p-2">{{ $mod }}</td>
                            @foreach (['create','read','update','delete'] as $perm)
                            <td class="p-2">
                                <input type="checkbox" name="permissions[{{ $mod }}][{{ $perm }}]" class="h-5 w-5 text-green-600" @if($permissions[$currentRole][$mod][$perm] ?? false) checked @endif>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- button -->
                <div class="flex justify-end mt-4 gap-3">
                    <a href="#" class="px-5 py-2 border rounded border-gray-400 text-gray-600">Cancel</a>
                    <button type="submit" class="px-5 py-2 bg-orange-500 text-white rounded">Update</button>
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
