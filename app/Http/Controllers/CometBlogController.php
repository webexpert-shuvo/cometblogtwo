<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CometBlogController extends Controller
{
    //Show Comet Blog Post

    public function index()
    {
        $allposts =  Post::where('status','Active')->latest()->paginate(1);
        return view('comet.blog-sidebar' ,[

            'postsdata'    => $allposts,

        ]);
    }


}
