<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Control Dashboard - Millsap Farms</title>

  @vite('resources/css/app.css')

  <style>
    :root{
      --teal:#274f49;       /* header dark teal */
      --teal-soft:#2f5b55;  /* nav bg */
      --orange:#d25f19;     /* action / primary orange */
      --muted:#e9e9e6;      /* page bg */
      --table-head:#c85a14; /* table header orange */
      --olive:#5b6f38;
    }
    /* small helpers to match screenshot look */
    .rounded-pill { border-radius: 999px; }
    .tab-pill { border-radius: 18px 18px 0 0; }
  </style>
</head>
<body class="bg-[color:var(--muted)] min-h-screen font-sans">

  <!-- HEADER -->
  <header class="bg-[color:var(--teal)] text-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
      <div class="flex items-center gap-4">
        <img src="https://img1.wsimg.com/isteam/ip/f7e4c243-2df4-478a-8464-d92c4cab6ab7/Logo%20with%20outline.png/:/rs=w:505,h:178,cg:true,m/cr=w:505,h:178/qt=q:95" alt="logo" class="h-12">
        <nav class="hidden md:flex gap-6 items-center text-sm uppercase tracking-wide">
          <a href="#" class="opacity-80 hover:opacity-100">Home</a>
          <a href="#" class="opacity-80 underline">Control</a>
          <a href="#" class="opacity-80">Home</a>
          <a href="#" class="opacity-80">Home</a>
          <a href="#" class="opacity-80">Home</a>
        </nav>
      </div>

      <div class="flex items-center gap-4 text-sm">
        <div class="hidden md:block text-sm">SuperAdmin ▾</div>
      </div>
    </div>
  </header>

  <!-- HERO TITLE -->
  <section class="bg-[linear-gradient(0deg,rgba(0,0,0,0.06),transparent)]">
    <div class="max-w-7xl mx-auto px-6 py-10 text-center">
      <h1 class="text-4xl md:text-5xl font-extrabold tracking-wide text-[#e6cf6f]">CONTROL DASHBOARD</h1>

      <!-- TABS -->
      <div class="mt-6 flex justify-center">
        <div class="inline-flex bg-[color:var(--teal-soft)] rounded-2xl px-1 py-1 shadow-lg">
          <button class="px-5 py-2 tab-pill bg-white text-[color:var(--orange)] font-bold rounded-pill mr-2">USER</button>
          <button class="px-6 py-2 tab-pill text-white">ADMIN</button>
          <button class="px-6 py-2 tab-pill text-white">KURIR</button>
          <button class="px-6 py-2 tab-pill text-white">SUPERVISOR</button>
        </div>
      </div>
    </div>
  </section>

  <!-- ACTION BAR (DELETE CONFIRM) -->
  <div class="max-w-7xl mx-auto px-6 mt-6">
    <div id="actionBar" class="hidden bg-[color:var(--orange)] text-white rounded-md p-4 flex items-center justify-between">
      <div class="font-semibold">Are You Sure Want To <span class="font-extrabold uppercase">DELETE</span> This?</div>
      <div class="flex gap-3">
        <button id="btnDeleteConfirm" class="px-4 py-2 bg-white text-[color:var(--orange)] font-semibold rounded">DELETE</button>
        <button id="btnCancel" class="px-4 py-2 border border-white rounded text-white">CANCEL</button>
      </div>
    </div>
  </div>

  <!-- MAIN CONTENT TABLE -->
  <main class="max-w-7xl mx-auto px-6 mt-6">
    <div class="bg-white rounded-xl shadow overflow-hidden">
      <div class="p-4 flex items-center justify-between border-b">
        <div class="flex items-center gap-3">
          <button id="toggleSelect" class="w-8 h-8 flex items-center justify-center border rounded text-[color:var(--teal)]">☐</button>

          <!-- quick icons: search, add, edit, delete, filter -->
          <div class="ml-4 flex items-center gap-3">
            <input id="q" placeholder="Search..." class="px-3 py-2 rounded border focus:outline-none" />
            <button title="Search" class="px-3 py-2 border rounded">🔍</button>
            <button title="Edit" class="px-3 py-2 border rounded">✏️</button>
            <button id="btnBulkDelete" title="Delete" class="px-3 py-2 border rounded text-[color:var(--orange)]">🗑️</button>
            <button title="Add" class="px-3 py-2 border rounded">＋</button>
            <button title="Filter" class="px-3 py-2 border rounded">⚙️</button>
          </div>
        </div>

        <div class="flex items-center gap-2 text-sm text-gray-600">
          <div class="px-3 py-2 rounded border">Page 1 of 5</div>
        </div>
      </div>

      <!-- Table -->
      <div class="p-4 overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
          <thead>
            <tr class="bg-[color:var(--table-head)] text-white text-left">
              <th class="w-8 p-3"></th>
              <th class="p-3">UserId</th>
              <th class="p-3">UserName</th>
              <th class="p-3">Email</th>
              <th class="p-3">Status</th>
              <th class="p-3">Created_at</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rows as $r)
            <tr class="border-b last:border-b-0">
              <td class="p-3 align-top">
                <input type="checkbox" class="row-checkbox w-4 h-4 text-[color:var(--teal)]" value="{{ $r['id'] }}">
              </td>
              <td class="p-3 align-top text-sm font-medium">{{ $r['id'] }}</td>
              <td class="p-3 align-top text-sm">{{ $r['username'] }}</td>
              <td class="p-3 align-top text-sm text-blue-800 underline">{{ $r['email'] }}</td>
              <td class="p-3 align-top text-sm">
                @if($r['status'] == 'Active')
                  <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">{{ $r['status'] }}</span>
                @else
                  <span class="px-3 py-1 text-xs rounded-full bg-orange-50 text-orange-700">{{ $r['status'] }}</span>
                @endif
              </td>
              <td class="p-3 align-top text-sm">{{ $r['created_at'] }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- pagination -->
      <div class="p-4 flex items-center justify-end border-t gap-3">
        <button class="px-3 py-1 bg-[color:var(--table-head)] text-white rounded">Previous</button>
        <div class="px-3 py-1 border rounded">1</div>
        <div class="px-3 py-1 border rounded">...</div>
        <div class="px-3 py-1 border rounded">5</div>
        <button class="px-3 py-1 bg-[color:var(--table-head)] text-white rounded">Next</button>
      </div>
    </div>

    <!-- bottom summary bar -->
    <div class="mt-6 bg-[color:var(--teal)] text-white rounded-xl p-6 flex justify-between">
      <div class="text-center w-1/4">
        <div class="text-sm">USER</div>
        <div class="text-2xl font-bold">{{ $stats['user'] }}</div>
      </div>
      <div class="text-center w-1/4">
        <div class="text-sm">ADMIN</div>
        <div class="text-2xl font-bold">{{ $stats['admin'] }}</div>
      </div>
      <div class="text-center w-1/4">
        <div class="text-sm">KURIR</div>
        <div class="text-2xl font-bold">{{ $stats['kurir'] }}</div>
      </div>
      <div class="text-center w-1/4">
        <div class="text-sm">SUPERVISOR</div>
        <div class="text-2xl font-bold">{{ $stats['supervisor'] }}</div>
      </div>
    </div>
  </main>

  <!-- small JS: select / show action bar -->
  <script>
    (function(){
      const btnBulkDelete = document.getElementById('btnBulkDelete');
      const actionBar = document.getElementById('actionBar');
      const btnCancel = document.getElementById('btnCancel');
      const checkboxes = document.querySelectorAll('.row-checkbox');
      const toggleSelect = document.getElementById('toggleSelect');

      function anyChecked(){
        return Array.from(checkboxes).some(cb => cb.checked);
      }

      // show action bar if any checked
      checkboxes.forEach(cb=>{
        cb.addEventListener('change', ()=>{
          actionBar.classList.toggle('hidden', !anyChecked());
        });
      });

      // select-all toggle (simple)
      toggleSelect.addEventListener('click', ()=>{
        const any = anyChecked();
        checkboxes.forEach(cb => cb.checked = !any);
        actionBar.classList.toggle('hidden', !anyChecked());
      });

      // bulk delete click -> show action bar
      btnBulkDelete.addEventListener('click', ()=>{
        if(anyChecked()){
          actionBar.classList.remove('hidden');
          window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
          alert('Please select at least one row to delete.');
        }
      });

      // cancel hides
      btnCancel?.addEventListener('click', ()=> actionBar.classList.add('hidden'));

      // delete confirm (dummy)
      document.getElementById('btnDeleteConfirm')?.addEventListener('click', ()=>{
        // collect selected values
        const ids = Array.from(checkboxes).filter(c=>c.checked).map(c=>c.value);
        // show confirmation (replace with real delete action)
        if(confirm('Delete selected: ' + ids.join(', ') + ' ?')){
          alert('Deleted (demo). Refresh to see demo unchanged.');
          actionBar.classList.add('hidden');
        }
      });
    })();
  </script>

</body>
</html>
