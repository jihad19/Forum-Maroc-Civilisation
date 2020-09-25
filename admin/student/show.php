<?php 
    require "../function.php";
    is_logged_in();
    if($id = $_GET['id'])
        $student = student($id);
    if(empty($student)){
        setError("this student id : $id not found");
        header("Location: $originPath/student/showAll.php");
        exit;
    }
    extract($student);
    $page = 'student';
    $title = "Student info";
    $name = "Student";
    include '../layout/head.php';
    include '../layout/menu.php';
        ?>   

        <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Student info</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="<?="$originPath/index.php"?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?="$originPath/student/showAll.php"?>">Student List</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row icon-category" id="new-icons">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-divider">Show <?=$student['fullName']?><span class="card-subtitle">This page let you see/edit student info</span></div>
                            <div class="card-body">
                                <?php showMessages(); ?>
                                <?php showErrors(); ?>
                                <form action="<?="$originPath/student/edit.php"?>" method="POST" enctype="multipart/form-data">
                                    <input name="id" type="hidden" value="<?=$student['id']?>">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="stImg">Student image</label>
                                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                                            <img src="<?=resource($student['img'])?>" class="img-thumbnail" width="100%">
                                            <input class="form-control" type="hidden" name='file-stImg' value="<?=$student['img']?>">
                                            <input class="inputfile" id="file-stImg" type="file" name="file-stImg" data-multiple-caption="{count} files selected">
                                            <label class="btn-primary" for="file-stImg"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                                        </div>
                                        <div class="col-sm-4 col-lg-3">
                                            <img src="<?=resource($student['actNess'])?>" class="img-thumbnail" width="100%">
                                            <input class="form-control" type="hidden" name='file-actNess' value="<?=$student['actNess']?>">
                                            <input class="inputfile" id="file-actNess" type="file" name="file-actNess" data-multiple-caption="{count} files selected">
                                            <label class="btn-primary" for="file-actNess"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="fullName">Full Name</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="fullName" type="text" name='fullName' value="<?=$student['fullName']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="age">Age</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="age" type="number" name='age' value="<?=$student['age']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="establi">Establishment</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="establi" type="text" name='establi' value="<?=$student['establi']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="level">Level</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="level" type="text" name='level' value="<?=$student['level']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Days off</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select class="form-control" name="freetime">
                                                <option value=''></option>
                                                <?php
                                                    $getDaysOff = json_decode($student['freetime']);
                                                    print_r($getDaysOff);
                                                    foreach($listDayOff as $v){
                                                        $selected = '';
                                                        if($v == $getDaysOff) $selected = "selected";
                                                        echo "<option value='$v' $selected>$v</option>";
                                                    }?>
                                            </select>
                                        </div>
                                    </div>
                                    <hr class="col-11">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="parentName">Parrent Name</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="parentName" type="text" name='parentName' value="<?=$student['parentName']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="job">Job</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="job" type="text" name='job' value="<?=$student['job']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="tele">Phone</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="tele" type="text" name='tele' value="<?=$student['tele']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cin">CNI</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="cin" type="text" name='cin' value="<?=$student['cin']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="aderr">Address</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="aderr" type="text" name='aderr' value="<?=$student['aderr']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="num">Number</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="num" type="number" name='num' value="<?=$student['num']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-space btn-primary" type="submit">Submit</button>
                                            <a href="<?="$originPath/student/showAll.php"?>" class="btn btn-space btn-secondary">Cancel</a>
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
            App.init();
            App.formElements();
        });
        </script>
    <?php }
