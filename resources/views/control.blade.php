@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col">
    {{-- Navbar --}}
    <nav class="bg-[#264641] text-white flex justify-between items-center px-8 py-4">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/millsapfarm_logo.png') }}" alt="Logo" class="h-10">
            <span class="text-xl font-semibold tracking-wide text-white">MILLSAP FARM</span>
        </div>
        <ul class="flex space-x-8 text-sm uppercase">
            <li><a href="#" class="hover:text-yellow-400 text-white">Home</a></li>
            <li><a href="#" class="hover:text-yellow-400 text-white">Control</a></li>
            <li><a href="#" class="hover:text-yellow-400 text-white">Home</a></li>
            <li><a href="#" class="hover:text-yellow-400 text-white">Home</a></li>
            <li><a href="#" class="hover:text-yellow-400 text-white">Home</a></li>
        </ul>
        <div>
            <span class="font-semibold text-white">SuperAdmin ▾</span>
        </div>
    </nav>

    {{-- Header --}}
    <div class="relative text-center py-12 bg-[url('/images/bg-farm.jpg')] bg-cover bg-center">
        <h1 class="text-4xl font-extrabold text-yellow-300 tracking-wide drop-shadow-md">
            CONTROL DASHBOARD
        </h1>
    </div>

    {{-- Tabs --}}
    <div class="bg-[#264641] flex justify-center space-x-4 py-4">
        <button class="bg-[#E7E5C0] text-[#264641] px-6 py-2 rounded-t-2xl font-semibold">USER</button>
        <button class="hover:bg-[#E7E5C0]/40 text-white px-6 py-2 rounded-t-2xl">ADMIN</button>
        <button class="hover:bg-[#E7E5C0]/40 text-white px-6 py-2 rounded-t-2xl">KURIR</button>
        <button class="hover:bg-[#E7E5C0]/40 text-white px-6 py-2 rounded-t-2xl">SUPERVISOR</button>
    </div>

    {{-- Table Section --}}
    <div class="bg-white mx-8 mb-8 p-6 rounded-b-2xl shadow-lg">
        {{-- Search and Icons --}}
        <div class="flex justify-end items-center mb-4 space-x-3">
            <input type="text" placeholder="Search..." class="border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-yellow-200 text-gray-800">
            <button class="text-gray-700 hover:text-green-600"><i data-lucide="search"></i></button>
            <button class="text-gray-700 hover:text-blue-600"><i data-lucide="edit"></i></button>
            <button class="text-gray-700 hover:text-green-600"><i data-lucide="plus-circle"></i></button>
            <button class="text-gray-700 hover:text-red-600"><i data-lucide="trash-2"></i></button>
        </div>

        {{-- Table --}}
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-[#C65C02] text-white text-left">
                    <th class="p-3 border">UserId</th>
                    <th class="p-3 border">UserName</th>
                    <th class="p-3 border">Email</th>
                    <th class="p-3 border">Status</th>
                    <th class="p-3 border">Created_at</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border">
                    <td class="p-3 border text-gray-900">U001</td>
                    <td class="p-3 border text-gray-900">Linda McMallend</td>
                    <td class="p-3 border text-blue-700 underline">Linda@gmail.com</td>
                    <td class="p-3 border text-green-600 font-medium">Active</td>
                    <td class="p-3 border text-gray-900">2024/04/30</td>
                </tr>
                <tr class="border">
                    <td class="p-3 border text-gray-900">U002</td>
                    <td class="p-3 border text-gray-900">Leonard Alvonso</td>
                    <td class="p-3 border text-blue-700 underline">Le0nard@gmail.com</td>
                    <td class="p-3 border text-red-600 font-medium">Passive</td>
                    <td class="p-3 border text-gray-900">2024/05/20</td>
                </tr>
                <tr class="border">
                    <td class="p-3 border text-gray-900">U003</td>
                    <td class="p-3 border text-gray-900">Thomas Vendelton</td>
                    <td class="p-3 border text-blue-700 underline">thomasv@gmail.com</td>
                    <td class="p-3 border text-green-600 font-medium">Active</td>
                    <td class="p-3 border text-gray-900">2024/11/14</td>
                </tr>
                <tr class="border">
                    <td class="p-3 border text-gray-900">U004</td>
                    <td class="p-3 border text-gray-900">Jeanette</td>
                    <td class="p-3 border text-blue-700 underline">j3anette@gmail.com</td>
                    <td class="p-3 border text-green-600 font-medium">Active</td>
                    <td class="p-3 border text-gray-900">2025/06/25</td>
                </tr>
                <tr class="border">
                    <td class="p-3 border text-gray-900">U005</td>
                    <td class="p-3 border text-gray-900">Mary_1202</td>
                    <td class="p-3 border text-blue-700 underline">M4ryy@gmail.com</td>
                    <td class="p-3 border text-green-600 font-medium">Active</td>
                    <td class="p-3 border text-gray-900">2025/10/05</td>
                </tr>
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="flex justify-end items-center mt-4 space-x-2">
            <button class="bg-[#E86C02] text-white px-3 py-1 rounded">Previous</button>
            <button class="border border-gray-400 px-3 py-1 rounded text-gray-900">1</button>
            <span class="text-gray-900">...</span>
            <button class="border border-gray-400 px-3 py-1 rounded text-gray-900">5</button>
            <button class="bg-[#E86C02] text-white px-3 py-1 rounded">Next</button>
        </div>
    </div>

    {{-- Footer Stats --}}
    <footer class="bg-[#264641] text-white text-center py-3 text-sm flex justify-center space-x-8">
        <span class="text-white">USER : 21</span>
        <span class="text-white">ADMIN : 3</span>
        <span class="text-white">KURIR : 5</span>
        <span class="text-white">SUPERVISOR : 4</span>
    </footer>
</div>

{{-- Lucide Icons --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
@endsection
