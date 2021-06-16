<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //Tag Page Show

    public function index()
    {
       return view('backend.layouts.blog.tags.index');
    }

    //Tag Add

    public function tagAdd(Request $request)
    {
        Tag::create([

            'name'      => $request -> name,
            'slug'      => Str::slug($request -> name),

        ]);
    }

    //All Tags
    public function tagAll()
    {
        $alltags =  Tag::all();

        $content = '';
        $i = 1;

        foreach ($alltags as $tags) {

            if ($tags -> status == 'Active') {

                $tagstatus = '<span class="badge badge-success">Active</span>';

            } else {
                $tagstatus = '<span class="badge badge-danger">Inactive</span>';
            }

            //Tag staus action

            if ($tags -> status == 'Active') {
                $tagsbtn = '<a tag_action_id="'.$tags ->  id.'"  href="" class="btn btn-sm btn-danger tag_active_btn"> <i class="fa fa-eye-slash"></i>  </a>';
            } else {
                $tagsbtn = '<a tag_action_id="'.$tags ->  id.'"  href="" class="btn btn-sm btn-success tag_active_btn"> <i class="fa fa-eye"></i>  </a>';
            }

            $content .= '<tr>';
            $content .= '<td>'.$i ; $i ++.'</td>';
            $content .= '<td>'.$tags -> name.'</td>';
            $content .= '<td>'.$tags -> slug.'</td>';
            $content .= '<td>'.$tags ->created_at -> diffForHumans().'</td>';
            $content .= '<td>'.$tagstatus .'</td>';
            $content .= '<td>'.$tagsbtn .' <a tag_edit_id="'.$tags -> id.'"  href="" class="btn btn-sm btn-info tag_edit_btn"><i class="fa fa-edit"></i></a>  <a tag_delete_id="'.$tags -> id.'" href=""  class="btn btn-sm btn-danger tag_delete_btn" > <i class="fa fa-trash"></i> </a> </td>';
            $content .= '</tr>';

        }

        echo  $content;

    }

    //Tag Status
    public function tagStatus($id)
    {

        $tag_status_id =    Tag::find($id);

        if ($tag_status_id -> status == 'Active') {
            $tag_status_id -> status = 'Inactive';
            $tag_status_id -> update();
        } else {
            $tag_status_id -> status = 'Active';
            $tag_status_id -> update();
        }
    }

    //Tag Edit data show

    public function tagEdit($id)
    {
        $tag_edit_id =  Tag::find($id);

        return [

            'name'      => $tag_edit_id -> name,

        ];


    }

    //Tag Update
    public function tagUpdate(Request $request, $id)
    {

        $tagupdateid = Tag::find($id);

        $tagupdateid -> name  = $request -> name;
        $tagupdateid -> slug  = Str::slug($request -> name);
        $tagupdateid -> update();


    }


    //Tag Delete

    public function tagDelete($id)
    {
        $tag_delete_id = Tag::find($id);
        $tag_delete_id -> delete();
        $tag_delete_id -> update();
    }






}
