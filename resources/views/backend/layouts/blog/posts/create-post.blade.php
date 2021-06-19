@extends('backend.layouts.app.app')

@section('backend-content')

    @include('backend.layouts.app.header')

    @include('backend.layouts.app.menu')


<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <a href="{{ route('showpost') }}" class="btn btn-sm btn-success">All Posts</a>
                        <br>
                        <h4 class="card-title">Create New Post</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('storepost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Select Type</label>
                                <div class="col-lg-9">
                                    <select name="post_type" id="post_type" class="form-control"   >
                                        <option value="--select--">Select</option>
                                        <option value="Single">Single</option>
                                        <option value="Gallery">Gallery</option>
                                        <option value="Video">Video</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Post Title</label>
                                <div class="col-lg-9">
                                    <input name="name" placeholder="Post Title" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Categorys</label>
                                <div class="col-lg-9">
                                    @foreach ($cate as $cat)
                                        <label for="cat{{ $cat -> id }}">
                                            <input value="{{ $cat -> id }}"  id="cat{{ $cat -> id }}" name="cats[]" type="checkbox"> {{ $cat -> name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Tags</label>
                                <div class="col-lg-9">
                                    <select class="alltags form-control" name="tags[]" multiple="multiple">
                                        @foreach ($tagsss as $tag)
                                            <option value="{{ $tag -> id }}">{{ $tag -> name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>


                            <div class="single">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Single Image</label>
                                    <div class="col-lg-9">
                                        <div class="single_image">

                                        </div>
                                        <input id="single_image_upload" name="single" type="file" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="gallery">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Gallery Image</label>
                                    <div class="col-lg-9">
                                        <div class="gallery_image">

                                        </div>
                                        <input id="gallery_image_upload" name="gallery[]" type="file" class="form-control" multiple>
                                    </div>
                                </div>
                            </div>



                            <div class="content">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Gallery Image</label>
                                    <div class="col-lg-9">
                                        <textarea name="content"></textarea>
                                    </div>
                                </div>
                            </div>



                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>




@endsection
