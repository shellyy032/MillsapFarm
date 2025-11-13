<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login - Millsap Farms</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-[linear-gradient(180deg,#f3efe0,rgba(74,90,42,0.04))]">
  <div class="w-full max-w-md bg-white rounded-2xl p-8 shadow">
    <div class="text-center mb-6">
      <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" alt="logo" class="mx-auto h-12">
      <h2 class="mt-3 text-xl font-semibold text-[#34421b]">Login to Millsap Farms</h2>
    </div>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label class="block text-sm text-[#6b6b47] mb-1">Email</label>
        <input name="email" type="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9b86b]" />
      </div>

      <div class="mb-6">
        <label class="block text-sm text-[#6b6b47] mb-1">Password</label>
        <input name="password" type="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#c9b86b]" />
      </div>

      @if($errors->any())
        <div class="text-sm text-red-600 mb-4">{{ $errors->first() }}</div>
      @endif

      <div class="flex items-center justify-between">
        <button type="submit" class="px-5 py-2 bg-[#4a5a2a] text-white rounded-lg font-semibold">Login</button>
        <a href="{{ route('guest') }}" class="text-sm text-[#6b6b47]">Back to preview</a>
      </div>
    </form>
  </div>
</body>
</html>
