<?php
namespace App\Http\Controllers;
use App\Models\{Donation,Expense};
class TransparencyController extends Controller { public function index(){ $totalDonations=Donation::where('status','confirmed')->sum('amount');$totalExpenses=Expense::where('is_published',true)->sum('amount');$donations=Donation::with('channel')->where('status','confirmed')->latest('donated_at')->paginate(20,['*'],'donations');$expenses=Expense::where('is_published',true)->latest('spent_at')->limit(50)->get();return view('transparency.index',compact('totalDonations','totalExpenses','donations','expenses')); } }
