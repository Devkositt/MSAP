<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\{Donation,Expense,Pet};
class DashboardController extends Controller { public function __invoke(){return view('admin.dashboard',['petCount'=>Pet::count(),'pendingCount'=>Donation::where('status','pending')->count(),'confirmedTotal'=>Donation::where('status','confirmed')->sum('amount'),'expenseTotal'=>Expense::sum('amount')]);} }
