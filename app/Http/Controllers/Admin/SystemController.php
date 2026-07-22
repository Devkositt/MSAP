<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
class SystemController extends Controller { public function migrate(){try{Artisan::call('migrate',['--force'=>true]);return back()->with('success','Migration ပြီးပါပြီ။ '.trim(Artisan::output()));}catch(\Throwable $e){report($e);return back()->withErrors(['system'=>'Migration မအောင်မြင်ပါ။ Log ကိုစစ်ဆေးပါ။']);}} }
