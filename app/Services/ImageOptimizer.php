<?php
namespace App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
class ImageOptimizer { public function store(UploadedFile $file,string $directory,int $maxWidth=1600,int $quality=78,string $disk='public'): string { $path=trim($directory,'/').'/'.Str::uuid().'.webp'; $image=Image::read($file->getRealPath()); $image->scaleDown(width:$maxWidth); Storage::disk($disk)->put($path,(string)$image->toWebp($quality)); return $path; } public function delete(?string $path,string $disk='public'): void { if($path) Storage::disk($disk)->delete($path); } }
