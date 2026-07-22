<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller { public function create(){return view('admin.auth.login');} public function store(Request $r){$credentials=$r->validate(['email'=>'required|email','password'=>'required|string']);if(!Auth::attempt($credentials,$r->boolean('remember'))){return back()->withErrors(['email'=>'အီးမေးလ် သို့မဟုတ် စကားဝှက် မမှန်ပါ။'])->onlyInput('email');}$r->session()->regenerate();return redirect()->intended(route('admin.dashboard'));} public function destroy(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('admin.login');} }
