(function($){

    //Document Ready
    $(document).ready(function(){

        //logout Form

        $(document).on('click','a.logout_btn',function(e){
            e.preventDefault();
            $('form#logoutform').submit();
        });

        //Tag Modal Show
        $(document).on('click','a.addnewtag',function(e){
            e.preventDefault();
            $('#tag_add_modal').modal('show');
        });

        //All Tags
        function allTags(){
            $.ajax({
                url : '/tags-all',
                success : function(data){
                    $('tbody#alltags').html(data);
                }
            });
        }
        allTags();


        //Tag Add
        $('form#tag_add_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                url : '/tags-add',
                method: "POST",
                data : new FormData(this),
                contentType: false,
                processData: false,
                success: function(data){
                    $('#tag_add_modal').modal('hide');
                    $('form#tag_add_form')[0].reset();
                        swal({
                            title: "Success!",
                            text: "Tag Edit Updated Successful",
                            icon: "success",
                            button: "Aww yiss!",
                        });
                        allTags()
                }
            });
        });

        //Tag Status update

        $(document).on('click','a.tag_active_btn',function(e){
            e.preventDefault();
            let tag_status_id = $(this).attr('tag_action_id');
            $.ajax({
                url : '/tags-status/'+tag_status_id,
                success : function(data){
                    swal({
                        title: "Success!",
                        text: "Tag Status Updated Successful",
                        icon: "success",
                        button: "Aww yiss!",
                    });
                    allTags()
                }
            });
        });

        //Tag Edit And Update

        $(document).on('click','a.tag_edit_btn',function(e){
            e.preventDefault();
            $('#tag_edit_modal').modal('show');
            let tagEditid  = $(this).attr('tag_edit_id');

            $.ajax({
                url : '/tags-edit/'+tagEditid,
                success : function(data){
                    $('form#tag_edit_form input[name="name"]').val(data.name);
                }
            });

            $('form#tag_edit_form').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url  : '/tags-edit/'+tagEditid,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data : new FormData(this),
                    success: function(data){

                        $('#tag_edit_modal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Tag Updated Successful",
                            icon: "success",
                            button: "Aww yiss!",
                        });
                        allTags();
                    }
                });
            });
        });

        //Tag Delete
        $(document).on('click','a.tag_delete_btn',function(e){
                e.preventDefault();

                let tagdeleteid = $(this).attr('tag_delete_id');
                $.ajax({
                    url : '/tags-delete/'+tagdeleteid,
                    success : function(data){
                        swal({
                            title: "Success!",
                            text: "Tag Deleted  Successful",
                            icon: "success",
                            button: "Done!",
                        });
                        allTags();
                    }

                });

        });


        //Category  functions

        $(document).on('click','a.addnewcategory',function(e){
            e.preventDefault();
            $('#category_add_modal').modal('show');
        });

        //Category all

        function allcate(){

            $.ajax({

                url : '/category-all',
                success : function(data){

                    $('tbody#allcategory').html(data);

                }

            });


        }
        allcate();


        //Category added

        $('form#category_add_form').submit(function(e){
            e.preventDefault();
            $.ajax({

                url : '/category-add',
                data : new FormData(this),
                method : "POST",
                contentType: false,
                processData : false,
                success : function(data){

                    $('form#category_add_form')[0].reset();
                    $('#category_add_modal').modal('hide');


                    swal({
                        title: "Success!",
                        text: "Category Added Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    allcate();

                }

            });
        });

        //Category status update
        $(document).on('click','a.cat_active_btn',function(e){
            e.preventDefault();

            let cate_status_id = $(this).attr('cat_action_id');

            $.ajax({

                url : '/category-status/'+cate_status_id,
                success : function(data){

                    swal({
                        title: "Success!",
                        text: "Category Update Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    allcate();

                }

            });

        });

        //Category edit
        $(document).on('click','a.cate_edit_btn',function(e){
            e.preventDefault();

            $('#category_edit_modal').modal('show');
            let cat_edit_id = $(this).attr('cate_edit_id');

            $.ajax({

                url : '/category-edit/'+cat_edit_id,
                success : function(data){

                    $('form#category_edit_form input[name="name"]').val(data.name);

                }

            });

            $('form#category_edit_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/category-edit/'+cat_edit_id,
                    data : new FormData(this),
                    method : "POST",
                    contentType: false,
                    processData: false,
                    success : function(data){
                        $('#category_edit_modal').modal('hide');
                        swal({
                            title: "Success!",
                            text: "Category Update Successful",
                            icon: "success",
                            button: "Done!",
                        });
                        allcate();

                    }
                });

            });

        });

        //Category Delete
        $(document).on('click','a.cat_delete_btn',function(e){
            e.preventDefault();
            let cate_delete_id = $(this).attr('cat_delete_id');

            $.ajax({

                url : '/category-delete/'+cate_delete_id,
                success : function(data){

                    swal({
                        title: "Success!",
                        text: "Category Deleted Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    allcate();

                }

            });



        });

































    });

})(jQuery)
