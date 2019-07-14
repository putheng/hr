<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileUpload;
use App\Http\Resources\ResumeResource;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function store(Request $request)
    {  
        $json = json_encode($request->all());

        $resume = new Resume;
        $resume->title = $request->title;
        $resume->user()->associate($request->user());
        $resume->type = 2;
        $resume->information = $json;

        $resume->save();

        return response()->json([
            'success' => true,
            'message' => 'Resume was created'
        ]);
    }

    public function storeUpdate(Request $request, Resume $resume)
    {  
        $json = json_encode($request->all());

        $resume->title = $request->title;
        $resume->user()->associate($request->user());
        $resume->type = 2;
        $resume->information = $json;

        $resume->save();

        return response()->json([
            'success' => true,
            'message' => 'Resume was updated'
        ]);
    }

    public function download(Request $request, Resume $resume)
    {
        $file = $resume->file;

        $path = public_path($file->path);

         if (!is_file($path)) {
            abort(404);
        }

        return response()->download($path);
    }

    public function destroy(Request $request)
    {

        $request->user()->resumes()->where('id', $request->id)->first()->delete();

        return ResumeResource::collection(
            $request->user()->resumes()->orderBy('id', 'desc')->get()
        );
    }

    public function show(Request $request)
    {
        return ResumeResource::collection(
            $request->user()->resumes()->orderBy('id', 'desc')->get()
        );
    }

    public function get(Request $request, Resume $resume)
    {
        return new ResumeResource(
            $resume
        );
    }

    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
    		'resume' => 'required',
    	]);

    	$fileUpload = new FileUpload;

    	$upload = $fileUpload->upload($request->file('resume'));

    	$resume = new Resume;
    	$resume->title = $request->title;
    	$resume->user()->associate($request->user());
    	$resume->file()->associate($upload);

    	$resume->save();

    	return response()->json([
    		'success' => true,
    		'message' => 'Resume was created'
    	]);
    }
}
