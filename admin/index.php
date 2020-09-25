<?php 
    require "function.php";
    is_logged_in();

    $students = students();
    $women = women();
    $posts = posts();

    $w = [
      [1, 20],
      [2, 60],
      [3, 40],
      [4, 65],
      [5, 45],
      [6, 75],
      [7, 35],
      [8, 40],
      [9, 60]
    ];
    $s = [
      [1, 20],
      [2, 40],
      [3, 25],
      [4, 45],
      [5, 25],
      [6, 50],
      [7, 35],
      [8, 60],
      [9, 30]
    ];

    // top report
    $student_month_count_user = array_reverse(count_user_for_month(get_num_month(group_by_date($students))));
    $student_sparkline = implode(', ',$student_month_count_user);

    $women_month_count_user = array_reverse(count_user_for_month(get_num_month(group_by_date($women))));
    $women_sparkline = implode(', ',$women_month_count_user);
    if(count($women_month_count_user) == 1)
    $women_sparkline = "0, $women_sparkline";
    
    $posts_month_count_user = array_reverse(count_user_for_month(get_num_month(group_by_date($posts))));
    $posts_sparkline = implode(', ',$posts_month_count_user);
    if(count($posts_month_count_user) == 1)
    $posts_sparkline = "0, $posts_sparkline";

    // main report
    $w = []; 
    $s = []; 
    $i=1;
    foreach($women_month_count_user as $count){
      $w[] = [$i++, $count];
    }

    $i=1;
    foreach($student_month_count_user as $count){
      $s[] = [$i++, $count];
    }

    // dd();

    $page = 'Dashboard';
    $title = "Dashboard";
    $name = "Dashboard";
    $extralink = "<link rel='stylesheet' type='text/css' href='". asset('lib/mprogress/css/mprogress.min.css') ."'/>\n";
    include 'layout/head.php';
    include 'layout/menu.php';



    ?>   
    <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile">
                          <div class="chart sparkline" id="spark1" data-sparkline="<?=$student_sparkline?>"></div>
                          <div class="data-info">
                            <div class="desc">Student</div>
                            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?=count($students)?>">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile">
                          <div class="chart sparkline" id="spark2" data-sparkline="<?=$women_sparkline?>"></div>
                          <div class="data-info">
                            <div class="desc">Women</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="<?=count($women)?>">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-4">
                        <div class="widget widget-tile">
                          <div class="chart sparkline" id="spark3" data-sparkline="<?=$posts_sparkline?>"></div>
                          <div class="data-info">
                            <div class="desc">Posts</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="<?=count($posts)?>">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 d-none">
                        <div class="widget widget-tile">
                          <div class="chart sparkline" id="spark4" data-sparkline="2, 3, 4, 5, 4, 3, 2, 3, 4, 5, 6, 5, 4, 3, 4, 5, 6, 5, 4, 4, 5"></div>
                          <div class="data-info">
                            <div class="desc">Downloads</div>
                            <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span class="number" data-toggle="counter" data-end="113">0</span>
                            </div>
                          </div>
                        </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="widget widget-fullwidth be-loading">
                <div class="widget-head">
                  <div class="tools d-none">
                    <div class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="icon mdi mdi-more-vert d-inline-block d-md-none"></span></a>
                      <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Week</a><a class="dropdown-item" href="#">Month</a><a class="dropdown-item" href="#">Year</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Today</a>
                      </div>
                    </div><span class="icon mdi mdi-chevron-down"></span><span class="icon toggle-loading mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
                  </div>
                  <div class=" button-toolbar d-none d-md-block">
                    <div class="btn-group">
                      <button class="btn btn-secondary d-none" type="button">Week</button>
                      <button class="btn btn-secondary active d-none" type="button">Month</button>
                      <button class="btn btn-secondary d-none" type="button">Year</button>
                    </div>
                    <div class="btn-group">
                      <button class="btn btn-secondary d-none" type="button">Today</button>
                    </div>
                  </div><span class="title">New account by month</span>
                </div>
                <div class="widget-chart-container">
                  <div class="widget-chart-info">
                    <ul class="chart-legend-horizontal">
                      <li><span data-color="main-chart-color1" style="background-color: rgb(66, 133, 100);"></span> Women</li>
                      <li><span data-color="main-chart-color2" style="background-color: rgb(129, 173, 248);"></span> Students</li>
                    </ul>
                  </div>

                  <div id="main-chart" style="height: 260px; padding: 0px; position: relative;">
                  <script type="text/javascript">
                    var woman = <?=json_encode($w)?>,
                        student = <?=json_encode($s)?>
                  </script>
                </div>
                </div>
                <div class="be-spinner">
                  <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="card card-table">
                <div class="card-header">
                  <div class="tools dropdown"> <span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="title">Women</div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th style="width:40%;">Woman</th>
                        <th class="number">Price</th>
                        <th style="width:20%;">Phone</th>
                        <th style="width:20%;">Date</th>
                        <th class="actions" style="width:5%;"></th>
                      </tr>
                    </thead>
                    <tbody class="no-border-x">
                      <?php foreach(array_splice($women,0,5) as $woman): ?>
                        <tr>
                          <td><?=$woman['name']." ".$woman['lastname']?></td>
                          <td><?=$woman['price']?> DH</td>
                          <td><?=$woman['tele']?></td>
                          <td><?=date('M d, Y', strtotime($woman['created_at']))?></td>
                          <td class="actions"><a class="icon" href="woman/show.php?id=<?=$woman['id']?>"><i class="mdi mdi-eye"></i></a></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="card card-table">
                <div class="card-header">
                  <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                    <div class="dropdown-menu dropdown-menu-right" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="title">Students</div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">Student</th>
                        <th style="width:36%;">Days off</th>
                        <th>Date</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach(array_splice($students,0,4) as $student): ?>
                        <tr>
                          <td class="user-avatar"> <img src="<?=resource($student['img'])?>" alt="Avatar"><?=$student['fullName']?></td>
                          <td><?=json_decode($student['freetime'])?></td>
                          <td><?=date('M d, Y', strtotime($student['created_at']))?></td>
                          <td class="actions"><a class="icon" href="student/show.php?id=<?=$student['id']?>"><i class="mdi mdi-eye"></i></a></td>
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

    <?php
    include 'layout/footer.php';
    function partJs(){?>
    <script src="<?=asset("/lib/jquery-flot/jquery.flot.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/jquery.flot.pie.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/jquery.flot.time.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/jquery.flot.resize.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/plugins/jquery.flot.orderBars.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/plugins/curvedLines.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-flot/plugins/jquery.flot.tooltip.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery.sparkline/jquery.sparkline.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/countup/countUp.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jquery-ui/jquery-ui.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jqvmap/jquery.vmap.min.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/jqvmap/maps/jquery.vmap.world.js")?>" type="text/javascript"></script>
    <script src="<?=asset("/lib/chartjs/Chart.min.js")?>" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        //-initialize the javascript
        App.init();
        App.dashboard();
    });
    </script>
    <?php } ?>