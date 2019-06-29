<?php

namespace App\Http\Controllers\Api;

use Storage;
use App\Models\Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\StoreAvatarFormRequest;

class AvatarController extends Controller
{
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function avatar(StoreAvatarFormRequest $request)
    {
        $path = '/' . uniqid(true).time() . '.png';

        $processedImage = $this->imageManager->make($request->file('image')->getPathName())
            ->resize(250, 250, function ($c) {
                $c->aspectRatio();
            })
            ->encode('png')->stream();
        
        $imageFile = $processedImage->__toString();
        
        Storage::disk('public_dir')->put('uploads/avatar'. $path, $imageFile);

        $avatar = $request->user()->avatar();
        if($avatar->count() && file_exists(public_path($avatar->first()->path()))){
            unlink(public_path($avatar->first()->path()));
            
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
        $covername = '/' . $unique . '.jpg';
        
        $processedImage = $this->imageManager->make($request->file('image')->getPathName())
            ->resize(350, 250, function ($c) {
                $c->aspectRatio();
            })
            ->encode('png')->stream();
        
        $imageFile = $processedImage->__toString();
        
        Storage::disk('public_dir')->put('avatar'. $path, $imageFile);
        
        $cover_path = public_path('images/cover.png');
        $cover = $this->imageManager
            ->make($cover_path)
            ->insert($imageFile, 'center')
            ->encode('jpeg')->stream();

        $cover_file = $cover->__toString();

        Storage::disk('public_dir')->put('cover'. $covername, $cover_file);

        $avatar = $request->user()->company->avatar();
        if($avatar->count()){
            unlink(public_path($avatar->first()->path()));

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
