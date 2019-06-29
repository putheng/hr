<?php

namespace App\Http\Helpers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

Class FileUpload
{
	public function upload(UploadedFile $file)
    {
    	return $this->storeFileUpload($file);
    }

    public function buildFilePath(UploadedFile $file)
    {
    	$name = $file->getClientOriginalName();

    	return $this->buildDirPath() . str_slug(uniqid(true) .'-'. $name).'.'. $file->extension();
    }

    public function buildDirPath()
    {
    	return 'uploads/'. date('Y') .'/'. date('m') .'/';
    }

    public function getFileContent(UploadedFile $file)
    {
    	return file_get_contents($file->getRealPath());
    }

    public function storeFileUpload(UploadedFile $uploadFile)
    {
    	$fileName = $uploadFile->getClientOriginalName();
        $filePath = $this->buildFilePath($uploadFile);

    	Storage::disk('public_dir')->put(
    		$filePath,
    		$this->getFileContent($uploadFile)
    	);

    	$file = new File;

    	$file->name = $fileName;
    	$file->path = $filePath;
    	$file->user()->associate(auth()->user());

    	$file->save();

    	return $file;
    }
}