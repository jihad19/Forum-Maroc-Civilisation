<?php 
    require "../function.php";
    is_logged_in();

    $posts = posts();
    $page = 'post';
    $title = "Posts";
    $name = "Posts";
    $extralink = "<link rel='stylesheet' type='text/css' href='". asset('lib/mprogress/css/mprogress.min.css') ."'/>\n";
    include '../layout/head.php';
    include '../layout/menu.php';

    ?>   
        <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Posts</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="<?="$originPath/index.php"?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?="$originPath/post/showAll.php"?>">Posts</a></li>
                        <li class="breadcrumb-item active">List All</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-header">Responsive Table
                                <div class="tools dropdown">
                                    <a href="create.php" class="icon mdi mdi-plus" title="Add Post"></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php showMessages(); ?>
                                <?php showErrors(); ?>
                                <table class="table table-striped table-hover" id='table1'>
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Create At</th>
                                            <th>by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($posts as $post): ?>
                                            <tr>
                                                <td class="cell-detail">
                                                    <span><?=$post['title']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=$post['slug']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=$post['created_at']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span>admin</span>
                                                </td>
                                                <td class="">
                                                    <div class="btn-group btn-hspace">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Open <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                        <a class="dropdown-item" href="<?="$originPath/post/show.php?id={$post['id']}"?>">
                                                            <span class="icon mdi mdi-settings"></span>    
                                                            Edit info
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item danger" href="#" data-toggle="modal" data-target="#md-fullColor<?=$post['id']?>">
                                                            <span class="icon mdi mdi-delete"></span>
                                                            Remove from list
                                                        </a>
                                                    </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php foreach($posts as $post): ?>
            <div class="modal modal-full-color modal-full-color-danger fade" id="md-fullColor<?=$post['id']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center"><span class="modal-main-icon mdi mdi-info-outline"></span>
                                <h3>Information!</h3>
                                <p>post : <?=$post['title']?> will remove permently from database <br>Be Careful.</p>
                                <div class="mt-8">
                                    <form method="POST" action="<?="$originPath/post/delete.php"?>">
                                        <input type="hidden" value="<?=$post['id']?>" name="id">
                                        <button class="btn btn-danger btn-space" type="reset" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-secondary btn-space" type="submit">Proceed</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php
    include '../layout/footer.php';
    function partJs(){?>
    <script src="<?=asset("lib/datatables/datatables.net/js/jquery.dataTables.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons/js/buttons.flash.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/jszip/jszip.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/pdfmake/pdfmake.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/pdfmake/vfs_fonts.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons/js/buttons.print.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons/js/buttons.html5.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("lib/mprogress/js/mprogress.min.js")?>" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        //-initialize the javascript
        App.init();
      	App.dataTables();
        App.ajaxLoader();
    });
    </script>
    <?php } ?>