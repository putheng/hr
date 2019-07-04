<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(StoreQuestionRequest $request)
    {
    	$question = new Question;

    	$question->question = $request->question;
    	$question->answer = $request->answer;
    	$question->user()->associate(auth()->user());

    	$question->save();

    	return QuestionResource::collection(
    		Question::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function destroy(Request $request)
    {
    	Question::find($request->id)->delete();

    	return QuestionResource::collection(
    		Question::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function edit(Request $request)
    {
    	Question::find($request->id)->update($request->only('question', 'answer'));
    	
    	return QuestionResource::collection(
    		Question::get()
    	)->additional([
    		'success' => true
    	]);
    }

    public function all(Request $request)
    {
    	return QuestionResource::collection(
    		Question::get()
    	)->additional([
    		'success' => true
    	]);
    }
}
