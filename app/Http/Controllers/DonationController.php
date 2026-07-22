<?php
namespace App\Http\Controllers;
use App\Models\{Donation,DonationChannel};
use App\Services\ImageOptimizer;
use Illuminate\Http\Request;
class DonationController extends Controller {
 public function create(){ $channels=DonationChannel::where('is_active',true)->orderBy('sort_order')->get(); return view('donations.create',compact('channels')); }
 public function store(Request $r,ImageOptimizer $images){$data=$r->validate(['donation_channel_id'=>'nullable|exists:donation_channels,id','donor_name'=>'required|string|max:120','display_name'=>'nullable|string|max:120','email'=>'nullable|email|max:255','phone'=>'nullable|string|max:30','amount'=>'required|numeric|min:100|max:999999999999','donated_at'=>'required|date|before_or_equal:today','reference_number'=>'nullable|string|max:100','slip'=>'required|image|mimes:jpg,jpeg,png,webp|max:5120','note'=>'nullable|string|max:1000','is_anonymous'=>'nullable|boolean']);$data['slip_path']=$images->store($r->file('slip'),'donation-slips',1400,76,'local');$data['is_anonymous']=$r->boolean('is_anonymous');unset($data['slip']);Donation::create($data);return redirect()->route('donations.create')->with('success','လှူဒါန်းမှုအထောက်အထား ပေးပို့ပြီးပါပြီ။ စိစစ်အတည်ပြုပြီးမှ စာရင်းတွင် ပေါ်လာပါမည်။');}
}
