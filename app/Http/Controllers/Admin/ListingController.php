<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ListingResource;
use App\Models\Company;
use App\Models\Image;
use App\Models\Listing;
use App\Models\Urgent;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ListingController extends Controller
{
    protected $imageManager;

    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    public function store(Request $request)
    {
        
        $user = $this->createUser($request);

        $company = $this->createCompany($request, $user);

        if(!$company->avatar){
            $this->createLogo($request, $company);
        }

        $this->createJob($request, $user, $company);

        return response()->json([
            'success' => true,
        ]);
    }

    public function createUser(Request $request)
    {
        $user = new User;
        $check = $user->where('email', $request->email);

        if($check->count()){
            return $check->first();
        }

        $user->name = $request->person;
        $user->email = $request->email;
        $user->password = bcrypt($request->email);
        $user->save();

        $user->assignRole('employer');

        return $user;
    }

    public function createCompany(Request $request, User $user)
    {
        if($user->company){
            return $user->company;
        }

        $company = $user->company()->create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return $company;
    }

    public function all(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->paginate(15)
    	);
    }

    public function publish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->isLive()->isNotExpired()->paginate(15)
    	);
    }

    public function unpublish(Request $request)
    {
    	return ListingResource::collection(
    		Listing::with('location', 'category', 'company')->latest()->isNotLive()->paginate(15)
    	);
    }

    public function expired(Request $request)
    {
        return ListingResource::collection(
            Listing::with('location', 'category', 'company')->latest()->isExpired()->paginate(15)
        );
    }

    public function createLogo(Request $request, Company $company)
    {
        $unique = str_slug($company->name) .'-' .time();

        $path = '/' . $unique . '.png';
        $covername = '/' . $unique . '.jpg';
        
        $processedImage = $this->imageManager->make($request->file('logo')->getPathName())
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

        $image = new Image;
        $image->path = $path;
        $image->company()->associate($company);
        $image->save();
        
        return $image;
        
    }

    public function createJob(Request $request, User $user, Company $company)
    {
        $listing = new Listing;

        $listing->title = $request->title;
        $listing->user()->associate($user);
        $listing->company_id = $company->id;
        $listing->category_id = $request->category;
        $listing->level_id = $request->level;
        $listing->experience_id = $request->experience;
        $listing->salary_id = $request->salary;
        $listing->education_id = $request->education;
        $listing->location_id = $request->location;
        $listing->term_id = $request->term;
        $listing->start = $request->start_date;
        $listing->closing = $request->closing_date;
        $listing->description = $request->description;
        $listing->requirement = $request->requirements;
        $listing->live = 1;
        $listing->expires_at = Carbon::now()->addMonth('1 month');
        $listing->slug = str_slug($request->title) .'-'. str_random(7) .'.html';

        $listing->save();

        $urgent = new Urgent;
        $urgent->expired_at = Carbon::now()->addMonth('1');
        $urgent->listing()->associate($listing);
        $urgent->save();

        return $listing;
    }
}
