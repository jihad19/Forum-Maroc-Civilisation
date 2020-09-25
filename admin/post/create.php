<?php 
    require "../function.php";
    is_logged_in();

    $page = 'post';
    $title = "Add Post";
    $name = "Post";
    $extralink = "<link rel='stylesheet' type='text/css' href='". asset('lib/select2/css/select2.min.css') ."'/>\n";
    include '../layout/head.php';
    include '../layout/menu.php';
        ?>   

        <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Add Post</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="<?="$originPath/index.php"?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?="$originPath/post/showAll.php"?>">Post List</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row icon-category" id="new-icons">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-divider">Add Post<span class="card-subtitle">This page let you add a new post</span></div>
                            <div class="card-body">
                                <?php showMessages(); ?>
                                <?php showErrors(); ?>
                                <form action="<?="$originPath/post/save.php"?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="title">Title</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="title" type="text" name='title'>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="slug">Slug</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="slug" type="text" name='slug' data-set='code'>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="img">Image</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="inputfile" id="img" type="file" name="img" data-multiple-caption="{count} files selected">
                                            <label class="btn-primary" for="img"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="file">PDF</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="inputfile" id="file" type="file" name="file" data-multiple-caption="{count} files selected">
                                            <label class="btn-primary" for="file"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                                        </div>
                                    </div>

                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-space btn-primary" type="submit">Submit</button>
                                            <a href="<?="$originPath/post/showAll.php"?>" class="btn btn-space btn-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    include '../layout/footer.php';
    function partJs(){?>
        <script src="<?=asset("lib/jquery-ui/jquery-ui.min.js")?>" type="text/javascript "></script>
        <script src="<?=asset("lib/jquery.nestable/jquery.nestable.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/moment.js/min/moment.min.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/datetimepicker/js/bootstrap-datetimepicker.min.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/select2/js/select2.min.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/select2/js/select2.full.min.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/bootstrap-slider/bootstrap-slider.min.js")?>" type="text/javascript"></script>
        <script src="<?=asset("lib/bs-custom-file-input/bs-custom-file-input.js")?>" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            //-initialize the javascript
            $("#title").on('keyup',function(){
                var slug = $(this).val().replace(/ /g, "-");
                if($('#slug').attr('data-set')=='code'){
                    $('#slug').val(slug);
                }
            });
            $("#slug").on('click',function(){
                $(this).attr('data-set','admin');
            });
            $("#img").on('change',function(){
                $(this).parent().find(".card-subtitle").remove();
                var img_type = ['tif','tiff','bmp','jpg','jpeg','gif','png','eps','raw','cr2','nef','orf','sr2'];
                var file_name = $(this).val().replace(/(.*\\)/g, "");
                var patt = new RegExp("([^.]+)$");
                if(file_name)
                var file_type = patt.exec(file_name)[0];
                console.log(img_type.indexOf(file_type));
                if(img_type.indexOf(file_type) == -1)
                $(this).next("label").after('<span class="card-subtitle text-danger">this is not a image</span>');
            });

            $("#file").on('change',function(){
                $(this).parent().find(".card-subtitle").remove();
                var img_type = ['pdf'];
                var file_name = $(this).val().replace(/(.*\\)/g, "");
                var patt = new RegExp("([^.]+)$");
                if(file_name)
                var file_type = patt.exec(file_name)[0];
                console.log(img_type.indexOf(file_type));
                if(img_type.indexOf(file_type) == -1)
                $(this).next("label").after('<span class="card-subtitle text-danger">this is not a PDF file</span>');
            });
            App.init();
            App.formElements();
        });
        </script>
    <?php }
