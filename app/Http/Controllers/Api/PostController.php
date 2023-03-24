<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->getSuccessResponse(Post::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:3000',
        ]);

        if ($validator->fails()) {
            // dd($validator->fails());
            return response()->json($this->getErrorResponse($validator->messages()));
        }

        $post = Post::create($request->all());

        return response()->json($this->getSuccessResponse($post));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json($this->getErrorResponse('Post not found'));
        }

        return response()->json($this->getSuccessResponse($post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json($this->getErrorResponse('Post not found'));
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:3000',
        ]);

        if ($validator->fails()) {
            return response()->json($this->getErrorResponse($validator->errors()->first()));
        }

        $post->fill($request->all());

        if (!$post->save()) {
            return response()->json($this->getErrorResponse('Failed to update post'));
        }

        return response()->json($this->getSuccessResponse($post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json($this->getErrorResponse('Post not found'));
        }

        $post->delete();

        return response()->json($this->getSuccessResponse('Post successfully deleted'));
    }
}
