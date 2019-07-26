<?php

namespace App\Http\Controllers\Api;

use Storage;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAvatarFormRequest;

class AvatarController extends Controller
{
    public function avatar(StoreAvatarFormRequest $request)
    {
        $path = '/' . uniqid(true).time() . '.png';

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $imageFile = file_get_contents($file->getRealPath());

        
        Storage::disk('public_dir')->put('avatar'. $path, $imageFile);

        $avatar = $request->user()->avatar();
        if($avatar->count()){
            if(file_exists($avatar->first()->file())){
                unlink($avatar->first()->file());
            }
            
        	$avatar->delete();
        }

        $image = new Image;
        $image->path = $path;
        $image->user()->associate($request->user());
        $image->save();
        
        return response([
            'data' => [
                'id' => $image->id,
                'path' => $image->path(),
            ]
        ], 200);
    }

    public function store(StoreAvatarFormRequest $request)
    {

        $unique = str_slug($request->user()->company->name) .'-' .time();

        $path = '/' . $unique . '.png';
        
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $imageFile = file_get_contents($file->getRealPath());
        
        Storage::disk('public_dir')->put('avatar'. $path, $imageFile);


        $avatar = $request->user()->company->avatar();
        if($avatar->count()){
            if(file_exists($avatar->first()->file())){
                unlink($avatar->first()->file());
            }
            $avatar->delete();
        }

        $image = new Image;
        $image->path = $path;
        $image->company()->associate($request->user()->company);
        $image->save();
        
        return response([
            'data' => [
                'id' => $image->id,
                'path' => $image->path(),
            ]
        ], 200);
        
    }
}
