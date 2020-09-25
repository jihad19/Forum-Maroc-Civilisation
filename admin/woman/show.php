<?php 
    require "../function.php";
    is_logged_in();

    if($id = $_GET['id'])
        $woman = woman($id);
    if(empty($woman)){
        setError("this woman id : $id not found");
        header("Location: $originPath/woman/showAll.php");
        exit;
    }
    extract($woman);
    $page = 'woman';
    $title = "Woman info";
    $name = "Woman";
    $extralink = "<link rel='stylesheet' type='text/css' href='". asset('lib/select2/css/select2.min.css') ."'/>\n";
    include '../layout/head.php';
    include '../layout/menu.php';
        ?>   

        <div class="be-content">
            <div class="page-head">
                <h2 class="page-head-title">Woman info</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="<?="$originPath/index.php"?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?="$originPath/woman/showAll.php"?>">Contacts</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </nav>
            </div>
            <div class="main-content container-fluid">
                <div class="row icon-category" id="new-icons">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header card-header-divider">Show <?=$woman['name']." ".$woman['lastname']?><span class="card-subtitle">This page let you see/edit woman info</span></div>
                            <div class="card-body">
                                <?php showMessages(); ?>
                                <?php showErrors(); ?>
                                <form action="<?="$originPath/woman/edit.php"?>" method="POST" enctype="multipart/form-data">
                                    <input name="id" type="hidden" value="<?=$woman['id']?>">
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="name">Name</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="name" type="text" name='name' value="<?=$woman['name']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="lastname">Lastname</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="lastname" type="text" name='lastname' value="<?=$woman['lastname']?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="birthday">Birthday</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="birthday" type="date" name='birthday' value="<?=$woman['birthday']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="level">Level</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="level" type="text" name='level' value="<?=$woman['level']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="place">Place</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="place" type="text" name='place' value="<?=$woman['place']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="job">Job</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="job" type="text" name='job' value="<?=$woman['job']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="tele">Tele</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="tele" type="text" name='tele' value="<?=$woman['tele']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cni">CNI</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="cni" type="text" name='cni' value="<?=$woman['cni']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="address">Address</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="address" type="text" name='address' value="<?=$woman['address']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="club">Club</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <select name="club[]" class="tags select2-hidden-accessible" id='club' multiple="" tabindex="-1" aria-hidden="true">
                                                <?php
                                                    $getClub = json_decode($woman['club'], true);
                                                    foreach($listOfClub as $v){
                                                        $selected = '';
                                                        if(in_array($v, $getClub)) $selected = "selected";
                                                        echo "<option value='$v' $selected>$v</option>";
                                                    }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="num">Number</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="num" type="number" name='num' value="<?=$woman['num']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="price">Price</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="price" type="number" name='price' value="<?=$woman['price']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                            <button class="btn btn-space btn-primary" type="submit">Submit</button>
                                            <a href="<?="$originPath/woman/showAll.php"?>" class="btn btn-space btn-secondary">Cancel</a>
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
