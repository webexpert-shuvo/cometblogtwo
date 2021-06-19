<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    //index

    public function index()
    {

        $allpostsdata =  Post::latest()->get();

        return  view('backend.layouts.blog.posts.index',[

            'allposts'      => $allpostsdata,


        ]);
    }

    //Post Create
    public function createPost()
    {
        $categorys = Category::where('status','Active')->latest()->get();
        $tagdata = Tag::where('status','Active')->latest()->get();

        return view('backend.layouts.blog.posts.create-post' ,[

            'cate'      => $categorys ,
            'tagsss'      => $tagdata,

        ]);
    }

    //Post Create

    public function storePost(Request $request)
    {

        $singleuname = '';
        if ($request -> hasFile('single')) {
            $single_img = $request -> file('single');
            $singleuname = md5(time().rand()).'.'.$single_img ->getClientOriginalExtension();
            $single_img ->move(public_path('backend/assets/img/posts') ,$singleuname );
        }

        //Gallery Image Uplaod

        $gallimgname = [];
        if ($request -> hasFile('gallery')) {
            $galleryimage = $request -> file('gallery');
            foreach ($galleryimage as $gallimg) {
                $gallimgname = md5(time().rand()).'.'.$gallimg ->getClientOriginalExtension();
                $gallimg ->move(public_path('backend/assets/img/posts') ,$gallimgname);
            }
        }


        $featured = [
            'post_type' => $request -> post_type,
            'single'    => $singleuname,
            'gallery'   => $gallimgname,
        ];

        $post_data =    Post::create([
            'name'      => $request -> name,
            'user_id'   => Auth::user()->id,
            'slug'      => Str::slug($request -> name),
            'featured'  => json_encode($featured),
            'content'   => $request -> content,
        ]);

        $post_data -> tags() -> attach($request -> tags);
        $post_data -> categories() -> attach($request->cats);

        return redirect()->back();


    }


    //Post Trash

    public function trashPost(Request $request , $id)
    {

        $post_trash_id =  Post::find($id);

        if ($post_trash_id -> status == 'Inactive') {
            $post_trash_id -> status = 'Active';
            $post_trash_id -> update();
        } else {
            $post_trash_id -> status = 'Inactive';
            $post_trash_id -> update();
        }

        return redirect()->back();



    }






}
