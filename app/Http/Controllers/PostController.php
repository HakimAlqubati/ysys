<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd("index");

        $posts = $request->user()->posts;
        return view('posts/index', compact('posts'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    // public function posts()
    // {
    //     $user = auth()->user();

    //     if ($user) {
    //         $curren_uid = $user->id;
    //         $posts = post::all()->where('user_id', $curren_uid);
    //         return view('posts/index', compact('posts'));
    //     } else {
    //         return redirect('/login');
    //     }
    // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = auth()->user();
        if ($user) {
            return view('posts/add');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post();
        $post->title = request('title1');
        $post->body = request('body1');
        $post->user_id = request('user_id1');
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {



        $post = $request->user()->posts($id)->get();

        return view('posts.post', compact('post'));

        // $user = auth()->user();
        // if ($user) {
        //     $curren_uid = $user->id;
        //     $post = post::where([
        //         ['id', '=', $id],
        //         ['user_id', $curren_uid]
        //     ])->get();
        //     var_dump(count($post));
        //     return view('posts.post', compact('post'));
        // } else {
        //     return redirect('/login');
        // }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        if ($user) {
            $curren_uid = $user->id;
            $post = post::where([
                ['id', '=', $id],
                ['user_id', $curren_uid]
            ])->get();
            if (count($post) > 0) {
                return view("posts.edit", compact('post'));
            } else {
                return view('posts.404');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {


        $post = post::find($id);
        $post->title = request('title1');
        $post->body = request('body1');


        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::find($id)->delete();

        return redirect('/posts')->with('success', 'Post deleted');
    }
}
