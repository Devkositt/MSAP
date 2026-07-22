@extends('layouts.app')
@section('title', 'တိရစ္ဆာန် အပ်နှံရန်')
@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="mb-4 text-3xl font-bold">မိမိတိရစ္ဆာန်ကို အပ်နှံရန်</h1>
    <p class="mb-8 text-slate-600">မိမိတိရစ္ဆာန်ကို shelter သို့ အပ်နှံလိုပါက အောက်ပါ form ကို ဖြည့်ပေးပါ။ Admin မှ သင့်တိရစ္ဆာန်အား လက်ခံရန် စိစစ်ပြီး ဆက်သွယ်ပေးပါမည်။</p>
    
    <form action="{{ route('surrender.store') }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow-sm">
        @csrf
        
        <div class="border-b pb-4">
            <h2 class="mb-4 text-lg font-bold">ပိုင်ရှင် အချက်အလက်</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium">အမည် *</label>
                    <input type="text" name="owner_name" required class="w-full rounded border p-2">
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
        </div>
        
        <div class="border-b pb-4">
            <h2 class="mb-4 text-lg font-bold">တိရစ္ဆာန် အချက်အလက်</h2>
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label class="mb-1 block text-sm font-medium">တိရစ္ဆာန်အမည် *</label>
                    <input type="text" name="pet_name" required class="w-full rounded border p-2">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">အမျိုးအစား *</label>
                    <select name="animal_type" required class="w-full rounded border p-2">
                        <option value="">ရွေးပါ</option>
                        <option value="dog">ခွေး</option>
                        <option value="cat">ကြောင်</option>
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">မျိုးစိတ်</label>
                    <input type="text" name="breed" class="w-full rounded border p-2">
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">အသက်အုပ်စု</label>
                    <select name="age_group" class="w-full rounded border p-2">
                        <option value="">ရွေးပါ</option>
                        <option value="baby">ကလေး</option>
                        <option value="young">ငယ်ရွယ်</option>
                        <option value="adult">အရွယ်ရောက်</option>
                        <option value="senior">အသက်ကြီး</option>
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-sm font-medium">လိင်</label>
                    <select name="gender" class="w-full rounded border p-2">
                        <option value="">ရွေးပါ</option>
                        <option value="male">အထီး</option>
                        <option value="female">အမ</option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_spayed_neutered" value="1" class="rounded">
                        <span class="text-sm">သားကြောဖြတ်ပြီး</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_vaccinated" value="1" class="rounded">
                        <span class="text-sm">ကာကွယ်ဆေးထိုးပြီး</span>
                    </label>
                </div>
            </div>
            <div class="mt-4">
                <label class="mb-1 block text-sm font-medium">ကျန်းမာရေးအချက်အလက်</label>
                <textarea name="health_info" rows="2" class="w-full rounded border p-2" placeholder="ကျန်းမာရေးပြဿနာ ရှိပါက ဖော်ပြပါ"></textarea>
            </div>
        </div>
        
        <div>
            <label class="mb-1 block text-sm font-medium">အပ်နှံရခြင်း အကြောင်းအရာ *</label>
            <textarea name="reason" rows="3" required class="w-full rounded border p-2" placeholder="ဘာကြောင့် တိရစ္ဆာန်ကို အပ်နှံလိုပါသနည်း?"></textarea>
        </div>
        
        <button type="submit" class="w-full rounded bg-emerald-700 px-6 py-3 text-white hover:bg-emerald-800">အပ်နှံလျှောက်လွှာ တင်မည်</button>
    </form>
</div>
@endsection
