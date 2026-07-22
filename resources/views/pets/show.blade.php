@extends('layouts.app') @section('title',$pet->name) @section('content')<a href="{{ route('pets.index') }}" class="text-emerald-700">← ပြန်သွားရန်</a><div class="mt-5 grid gap-8 lg:grid-cols-2"><div class="grid grid-cols-2 gap-3">@forelse($pet->images as $image)<img src="{{ str_starts_with($image->path, 'http') ? $image->path : asset('storage/'.$image->path) }}" alt="{{ $image->alt_text ?: $pet->name }}" class="h-64 w-full rounded-xl object-cover {{ $loop->first?'col-span-2':'' }}">@empty<div class="col-span-2 grid h-80 place-items-center rounded-xl bg-slate-200 text-7xl">🐾</div>@endforelse</div><div><div class="flex items-center gap-4"><h1 class="text-4xl font-bold">{{ $pet->name }}</h1><span class="rounded-full bg-emerald-100 px-3 py-1 text-sm">{{ ucfirst($pet->status) }}</span></div><p class="mt-4 whitespace-pre-line leading-7">{{ $pet->description }}</p><dl class="mt-7 grid grid-cols-2 gap-4 rounded-xl bg-white p-6 shadow-sm"><div><dt class="text-sm text-slate-500">အမျိုးအစား</dt><dd>{{ $pet->animal_type==='dog'?'ခွေး':'ကြောင်' }} / {{ $pet->breed }}</dd></div><div><dt class="text-sm text-slate-500">အသက်အုပ်စု</dt><dd>{{ ucfirst($pet->age_group) }}</dd></div><div><dt class="text-sm text-slate-500">ကာကွယ်ဆေး</dt><dd>{{ $pet->is_vaccinated?'ထိုးပြီး':'မထိုးရသေး' }}</dd></div><div><dt class="text-sm text-slate-500">သားကြောဖြတ်</dt><dd>{{ $pet->is_spayed_neutered?'ပြုလုပ်ပြီး':'မပြုလုပ်ရသေး' }}</dd></div></dl>@if($pet->health_info)<div class="mt-5 rounded-xl bg-amber-50 p-5"><h2 class="font-bold">ကျန်းမာရေးအချက်အလက်</h2><p class="mt-2 whitespace-pre-line">{{ $pet->health_info }}</p></div>@endif
@if($pet->status === 'available')
<div class="mt-8 rounded-xl bg-emerald-50 p-6">
    <h2 class="mb-4 text-xl font-bold">မွေးစားလျှောက်လွှာ တင်ရန်</h2>
    <p class="mb-4 text-sm text-slate-600">ဤတိရစ္ဆာန်ကို မွေးစားလိုပါက အောက်ပါ form ကို ဖြည့်ပေးပါ။ Admin မှ သင့်လျှောက်လွှာကို စိစစ်ပြီး ဆက်သွယ်ပေးပါမည်။</p>
    <form action="{{ route('adoption.store', $pet) }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <label class="mb-1 block text-sm font-medium">အမည် *</label>
                <input type="text" name="name" required class="w-full rounded border p-2">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">အီးမေးလ် *</label>
                <input type="email" name="email" required class="w-full rounded border p-2">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">ဖုန်းနံပါတ် *</label>
                <input type="tel" name="phone" required class="w-full rounded border p-2">
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium">နေရပ်လိပ်စာ *</label>
                <input type="text" name="address" required class="w-full rounded border p-2">
            </div>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium">တိရစ္ဆာန် မွေးစားရာတွင် အတွေ့အကြုံ</label>
            <textarea name="experience" rows="3" class="w-full rounded border p-2" placeholder="ယခင်က တိရစ္ဆာန်များ မွေးစားဖူးပါသလား?"></textarea>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium">လက်ရှိ မွေးစားထားသော တိရစ္ဆာန်များ</label>
            <textarea name="other_pets" rows="2" class="w-full rounded border p-2" placeholder="လက်ရှိ မွေးစားထားသော တိရစ္ဆာန်များ ရှိပါက ဖော်ပြပါ"></textarea>
        </div>
        <div>
            <label class="mb-1 block text-sm font-medium">မွေးစားလိုသည့် အကြောင်းအရာ *</label>
            <textarea name="reason" rows="3" required class="w-full rounded border p-2" placeholder="ဘာကြောင့် ဤတိရစ္ဆာန်ကို မွေးစားလိုပါသနည်း?"></textarea>
        </div>
        <button type="submit" class="rounded bg-emerald-700 px-6 py-2 text-white hover:bg-emerald-800">လျှောက်လွှာ တင်မည်</button>
    </form>
</div>
@endif</div></div>@endsection
