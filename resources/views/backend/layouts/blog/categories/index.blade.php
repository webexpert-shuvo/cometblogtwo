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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Category </h4><br>
                        <a href="" class="btn btn-sm btn-success addnewcategory">Add New Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="allcategory">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



</div>

<div id="category_add_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Category</h3>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="category_add_form">
                    @csrf
                    <div class="form-group">
                        <input name="name" type="text" placeholder="Category Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add New Category">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


<div id="category_edit_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Add New Category</h3>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="category_edit_form">
                    @csrf
                    <div class="form-group">
                        <input name="name" type="text" placeholder="Category Name" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add New Category">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection
