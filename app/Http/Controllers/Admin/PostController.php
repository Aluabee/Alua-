<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostsRequest;
use App\Model\admin\admin;
use App\Model\user\category;
use App\Model\user\tag;
use App\Model\User\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard('admin')->user()->can('posts.create')) {
            $tags = tag::all();
            $categories = category::all();

            return view('admin.post.post', compact('tags', 'categories'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsRequest $request)
    {

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        }
        $admin = new admin;
        $admin->name = $request->name;
        $post = new post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->image = $imageName;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->posted_by = Auth::guard('admin')->id();
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->user()->can('posts.update')) {
            $post = post::with('tags', 'categories')->where('id', $id)->first();
            $tags = tag::all();
            $categories = category::all();
            return view('admin.post.edit', compact('post', 'tags', 'categories'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostsRequest $request, $id)
    {

        if ($request->hasFile('image')) {
            $imageName = $request->image->store('public/images');
        }
        $post = post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->image = $imageName;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            post::where('id', $id)->delete();
            return redirect()->back();

    }
}
