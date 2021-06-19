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
                        text: "Category Deleted WithOut Para Successful",
                        icon: "success",
                        button: "Done!",
                    });
                    allcate();

                }

            });
        });


        //Profile modal Show update

        $(document).on('click','a.profile_edit_btn',function(e){
            e.preventDefault();
            let user_id = $(this).attr('user_data_id');
            $('#edit_personal_details').modal('show');

            $('form#profile_update_form').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/profile/'+user_id,
                    method : "POST",
                    data : new FormData(this),
                    contentType: false,
                    processData: false,
                    success : function(data){

                        swal({
                            title: "Success!",
                            text: "Prtofile Update Successfull",
                            icon: "success",
                            button: "Done!",
                        });

                    }

                });

            })

        });

        //Profile Description Add
        $(document).on('click','a.profile_edit_button',function(e){
            e.preventDefault();

            $('#profile_desc').modal('show');
            let profile_desc_update = $(this).attr('profile_desc_update');

            $('form#bioupdate').submit(function(e){
                e.preventDefault();

                $.ajax({

                    url : '/profile-bio/'+profile_desc_update,
                    method : "POST",
                    data : new FormData(this),
                    contentType : false,
                    processData : false,
                    success : function(data){

                        swal({
                            title: "Success!",
                            text: "Prtofile Bio Successfull",
                            icon: "success",
                            button: "Done!",
                        });

                    }

                });




            });



        });

        $('.alltags').select2();
        CKEDITOR.replace( 'content' );


        //Post Controll

        $('#post_type').change(function(e){
            e.preventDefault();

            let single = $(this).val();

            if (single == 'Single') {
                $('.single').show();
            } else {
                $('.single').hide();
            }

            if (single == 'Gallery') {
                $('.gallery').show();
            } else {
                $('.gallery').hide();
            }

        });

        //Single Image uplaod
        $('#single_image_upload').change(function(e){
            e.preventDefault();
            let singleurl = URL.createObjectURL(e.target.files[0]);
            let single_img_uplaod = '<img src="'+singleurl+'" style="width:300px; height:300x; border:5px solid #252525; border-radious:4px;" >' ;
            $('.single_image').html(single_img_uplaod);
        });

        //Gallry Image Uplod

        $('#gallery_image_upload').change(function(e){
            e.preventDefault();
            gallimg = '';
            for (let i = 0; i < e.target.files.length; i++) {
                let gallery_url = URL.createObjectURL(e.target.files[i]);
                gallimg += '<img  src="'+gallery_url+'" style="width:80px; height:80px; margin:10px 5px; border:3px solid red;">';
            }
            $('.gallery_image').html(gallimg);
        });



















































    });

})(jQuery)
