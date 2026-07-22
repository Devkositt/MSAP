<?php
namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
class PetCatalogController extends Controller { public function index(Request $r){$pets=Pet::query()->with('primaryImage')->where('is_published',true)->when($r->animal_type,fn($q,$v)=>$q->where('animal_type',$v))->when($r->breed,fn($q,$v)=>$q->where('breed',$v))->when($r->age_group,fn($q,$v)=>$q->where('age_group',$v))->when($r->gender,fn($q,$v)=>$q->where('gender',$v))->when($r->status,fn($q,$v)=>$q->where('status',$v))->latest()->paginate(12)->withQueryString();$breeds=Pet::where('is_published',true)->whereNotNull('breed')->distinct()->orderBy('breed')->pluck('breed');return view('pets.index',compact('pets','breeds'));} public function show(Pet $pet){abort_unless($pet->is_published,404);$pet->load('images');return view('pets.show',compact('pet'));} }
