<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    //Show Category

    public function index()
    {
        return view('backend.layouts.blog.categories.index');
    }

    //Category add
    public function categoryAdd(Request $request)
    {
        Category::create([
            'name'      => $request -> name,
            'slug'      => Str::slug($request->name),
        ]);
    }

    //All Category

    public function categoryAll()
    {

        $allcate = Category::all();

        $content = '';
        $i = 1;

        foreach($allcate as $cat ){

            if ($cat -> status == 'Active') {

                $catstatus = '<span class="badge badge-success">Active</span>';

            } else {
                $catstatus = '<span class="badge badge-danger">Inactive</span>';
            }

            //Tag staus action

            if ($cat -> status == 'Active') {
                $tagsbtn = '<a cat_action_id="'.$cat ->  id.'"  href="" class="btn btn-sm btn-danger cat_active_btn"> <i class="fa fa-eye-slash"></i>  </a>';
            } else {
                $tagsbtn = '<a cat_action_id="'.$cat ->  id.'"  href="" class="btn btn-sm btn-success cat_active_btn"> <i class="fa fa-eye"></i>  </a>';
            }



            $content .= '<tr>';
            $content .= '<td>'. $i; $i++.'</td>';
            $content .= '<td>'. $cat -> name.'</td>';
            $content .= '<td>'. $cat -> slug.'</td>';
            $content .= '<td>'. $cat -> created_at ->diffForHumans().'</td>';
            $content .= '<td>'.$catstatus .'</td>';
            $content .= '<td>'.$tagsbtn .' <a  cate_edit_id="'.$cat -> id.'" href="" class="btn btn-sm btn-info cate_edit_btn"   > <i class="fa fa-edit"> </i></a>  <a href="" class="btn btn-sm btn-danger cat_delete_btn" cat_delete_id="'.$cat -> id.'"> <i class="fa fa-trash"></i> </a> </td>';
            $content .= '</tr>';

        }

        echo $content;


    }


    //Category status update
    public function categoryStatus($id)
    {
        $cate_status_id =  Category::find($id);

        if ($cate_status_id -> status == 'Active') {
            $cate_status_id -> status = 'Inactive';
            $cate_status_id -> update();
        } else {
            $cate_status_id -> status = 'Active';
            $cate_status_id ->  update();
        }

    }


    //Tag Edit Update
    public function categoryEdit($id)
    {
        $tag_edit_id = Category::find($id);

        return [

            'name'      => $tag_edit_id -> name,

        ];



    }

    //Category update
    public function categoryUpdate(Request $request , $id)
    {
        $cate_update_id = Category::find($id);
        $cate_update_id -> name = $request -> name;
        $cate_update_id -> slug =  Str::slug($request -> name);
        $cate_update_id -> update();
    }

    //Category Delete
    public function categoryDelete($id)
    {

        $cate_delete_id = Category::find($id);
        $cate_delete_id -> delete();
        $cate_delete_id -> update();

    }



}
