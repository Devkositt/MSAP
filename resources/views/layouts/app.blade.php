<!doctype html>
<html lang="my"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="csrf-token" content="{{ csrf_token() }}"><title>@yield('title','MASP')</title><script src="https://cdn.tailwindcss.com"></script><style>body{font-family:system-ui,"Noto Sans Myanmar",sans-serif}</style></head>
<body class="bg-slate-50 text-slate-800">
<nav class="bg-emerald-700 text-white"><div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4"><a href="{{ route('home') }}" class="text-xl font-bold">🐾 MASP</a><div class="flex gap-5 text-sm"><a href="{{ route('pets.index') }}">မွေးစားရန်</a><a href="{{ route('surrender.create') }}">အပ်နှံရန်</a><a href="{{ route('donations.create') }}">လှူဒါန်းရန်</a><a href="{{ route('transparency') }}">ပွင့်လင်းမြင်သာမှု</a><a href="{{ route('admin.login') }}">Admin</a></div></div></nav>
<main class="mx-auto max-w-6xl px-4 py-8">
@if(session('success'))
<div class="mb-5 rounded bg-emerald-100 p-4 text-emerald-800">{{ session('success') }}</div>
@endif
@if($errors->any())
<div class="mb-5 rounded bg-red-100 p-4 text-red-800"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
@endif
@yield('content')
</main>
<footer class="mt-12 border-t bg-white py-8 text-center text-sm text-slate-500">© {{ date('Y') }} MASP</footer>
</body></html>
