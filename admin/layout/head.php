<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?=asset("img/logo-fav.png")?>">
    <title><?= $title??''; ?></title>
    <link rel="stylesheet" type="text/css" href="<?=asset("lib/perfect-scrollbar/css/perfect-scrollbar.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=asset("lib/material-design-icons/css/material-design-iconic-font.min.css")?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?=asset("lib/jquery.vectormap/jquery-jvectormap-1.2.2.css")?>"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=asset("lib/jqvmap/jqvmap.min.css")?>"> -->
    <link rel="stylesheet" type="text/css" href="<?=asset("lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css")?>"/>
    <link rel="stylesheet" type="text/css" href="<?=asset("lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")?>"/>
    <link rel="stylesheet" type="text/css" href="<?=asset("lib/datetimepicker/css/bootstrap-datetimepicker.min.css")?>">
    <?=$extralink??''?>
    <link rel="stylesheet" href="<?=asset("css/app.css")?>" type="text/css">
  <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a class="navbar-brand" href="index.html"></a>
          </div>
          <div class="page-title"><span><?= $name??''; ?></span></div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="<?=asset("img/avatar.png")?>" alt="Avatar"><span class="user-name"><?=$_SESSION['login']['data']['fullName']?></span></a>
                <div class="dropdown-menu" role="menu">     
                  <div class="user-info">
                    <div class="user-name"><?=$_SESSION['login']['data']['fullName']?></div>
                    <div class="user-position online">Available</div>
                  </div>
                  <a class="d-none dropdown-item" href="pages-profile.html">
                    <span class="icon mdi mdi-face"></span>
                    Account
                  </a>
                  <a class="d-none dropdown-item" href="#">
                    <span class="icon mdi mdi-settings"></span>
                    Settings
                  </a>
                  <a class="dropdown-item" href="<?=$originPath?>/logout.php">
                    <span class="icon mdi mdi-power"></span>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <ul class="d-none nav navbar-nav float-right be-icons-nav">
              <li class="nav-item dropdown"><a class="nav-link be-toggle-right-sidebar" href="#" role="button" aria-expanded="false"><span class="icon mdi mdi-settings"></span></a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon mdi mdi-notifications"></span><span class="indicator"></span></a>
                <ul class="dropdown-menu be-notifications">
                  <li>
                    <div class="title">Notifications<span class="badge badge-pill">3</span></div>
                    <div class="list">
                      <div class="be-scroller-notifications ps">
                        <div class="content">
                          <ul>
                            <li class="notification notification-unread"><a href="#">
                                <div class="image"><img src="<?=asset("img/avatar2.png")?>" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">Jessica Caruso</span> accepted your invitation to join the team.</div><span class="date">2 min ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="<?=asset("img/avatar3.png")?>" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">Joel King</span> is now following you</div><span class="date">2 days ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="<?=asset("img/avatar4.png")?>" alt="Avatar"></div>
                                <div class="notification-info">
                                  <div class="text"><span class="user-name">John Doe</span> is watching your main repository</div><span class="date">2 days ago</span>
                                </div></a></li>
                            <li class="notification"><a href="#">
                                <div class="image"><img src="<?=asset("img/avatar5.png")?>" alt="Avatar"></div>
                                <div class="notification-info"><span class="text"><span class="user-name">Emily Carter</span> is now following you</span><span class="date">5 days ago</span></div></a></li>
                          </ul>
                        </div>
                      <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                    </div>
                    <div class="footer"> <a href="#">View all notifications</a></div>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span class="icon mdi mdi-apps"></span></a>
                <ul class="dropdown-menu be-connections">
                  <li>
                    <div class="list">
                      <div class="content">
                        <div class="row">
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/github.png")?>" alt="Github"><span>GitHub</span></a></div>
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/bitbucket.png")?>" alt="Bitbucket"><span>Bitbucket</span></a></div>
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/slack.png")?>" alt="Slack"><span>Slack</span></a></div>
                        </div>
                        <div class="row">
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/dribbble.png")?>" alt="Dribbble"><span>Dribbble</span></a></div>
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/mail_chimp.png")?>" alt="Mail Chimp"><span>Mail Chimp</span></a></div>
                          <div class="col"><a class="connection-item" href="#"><img src="<?=asset("img/dropbox.png")?>" alt="Dropbox"><span>Dropbox</span></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="footer"> <a href="#">More</a></div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>