<?php

namespace App\Http\Controllers\User;

use App\Model\user\post;
use App\Model\admin\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(post $post)
    {
        return view('user.post', compact('post'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $admins = admin::all();
        $posts = post::search($query)->orderByDESC('created_at')->paginate(5);

        return view('user.search-results', compact('admins', 'posts'));
    }
}
