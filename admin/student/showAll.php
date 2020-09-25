<?php 
    require "../function.php";
    is_logged_in();
    $students = students();
    $page = 'student';
    $title = "Students";
    $name = "Students";
    $extralink = "<link rel='stylesheet' type='text/css' href='". asset('lib/mprogress/css/mprogress.min.css') ."'/>\n";
    include '../layout/head.php';
    include '../layout/menu.php';

    ?>   
        <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Students</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="<?="$originPath/index.php"?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?="$originPath/student/showAll.php"?>">Students</a></li>
                        <li class="breadcrumb-item active">List All</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-header">Responsive Table
                                <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><span class="icon mdi mdi-more-vert"></span></a>
                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(20px, 25px, 0px);"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php showMessages(); ?>
                                <?php showErrors(); ?>
                                <table class="table table-striped table-hover" id='table1'>
                                    <thead>
                                        <tr>
                                            <th style="width:4%;">ID/Num</th>
                                            <th style="width:18%;">Student/level</th>
                                            <th style="width:17%;">Establishment</th>
                                            <th style="width:10%;">Days off</th>
                                            <th style="width:13%;">Parent/cin</th>
                                            <th style="width:10%;">Tele</th>
                                            <th style="width:10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($students as $student): ?>
                                            <tr>
                                                <td class="cell-detail">
                                                    <span><?=$student['id']?></span>
                                                    <span class="cell-detail-description"><?=$student['num']?></span>

                                                </td>
                                                <td class="user-avatar cell-detail user-info">
                                                    <img src="<?=resource($student['img'])?>" alt="Avatar">
                                                    <span><?=$student['fullName']?></span>
                                                    <span class="cell-detail-description"><?=$student['level']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=$student['establi']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=json_decode($student['freetime'])?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=$student['parentName']?></span>
                                                    <span class="cell-detail-description"><?=$student['cin']?></span>
                                                </td>
                                                <td class="cell-detail">
                                                    <span><?=$student['tele']?></span>
                                                </td>
                                                <td class="">
                                                    <div class="btn-group btn-hspace">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Open <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                                                    <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                                                        <a class="dropdown-item" href="<?="$originPath/student/show.php?id={$student['id']}"?>">
                                                            <span class="icon mdi mdi-settings"></span>    
                                                            Edit info
                                                        </a>
                                                        <a class="dropdown-item toggle-loader" target="_blank" data-name="<?=$student['fullName']?> carte.png" href="<?="$originPath/export.php?type=studentCarte&id={$student['id']}"?>">
                                                            <span class="icon mdi mdi-folder-person"></span>    
                                                            Student carte 
                                                        </a>
                                                        <a class="dropdown-item toggle-loader" target="_blank" data-name="<?=$student['fullName']?> info.png" href="<?="$originPath/export.php?type=studentInfo&id={$student['id']}"?>">
                                                            <span class="icon mdi mdi-download"></span>    
                                                            Export info
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item danger" href="#" data-toggle="modal" data-target="#md-fullColor<?=$student['id']?>">
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

        <?php foreach($students as $student): ?>
            <div class="modal modal-full-color modal-full-color-danger fade" id="md-fullColor<?=$student['id']?>" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center"><span class="modal-main-icon mdi mdi-info-outline"></span>
                                <h3>Information!</h3>
                                <p>student : <?=$student['fullName']?> will remove permently from database <br>Be Careful.</p>
                                <div class="mt-8">
                                    <form method="POST" action="<?="$originPath/student/delete.php"?>">
                                        <input type="hidden" value="<?=$student['id']?>" name="id">
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
        <script src="<?=asset("lib/jquery.niftymodals/js/jquery.niftymodals.js")?>" type="text/javascript"></script>
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