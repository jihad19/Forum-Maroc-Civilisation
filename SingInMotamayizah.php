<!doctype html>
<html lang="ar" dir="rtl">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleM.css">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="images/logo_Forum_Maroc_civilisation_Motamayizah00.png">
    <title>بيانات التسجيل</title>
  </head>

  <body>

<style>
.container {
	font-family: 'Cairo', sans-serif;
	font-size: 1.3em;
        color: #C3974C;
        display: block;
}
.form-control{
    font-size: 0.8rem;
    line-height: 1.5;
    color: #2A2541;
    border: 1px solid #2A2541;
    border-radius: .25rem;
}
.form-control::shadow{
        box-shadow: 5px 10px #2A2541;
        color: rgba(42, 37, 65, 0.658);
}
.irsal {
    color: #fff;
    background-color: #2A2541;
}
.irsal:hover {
    color: #fff;
    background-color: #C3974C;
}
</style>

<!-- ----------------------------------- Hero header --------------------------------------->

<div class="container-fluid p-0 d-flex justify-content-end" style="background-image: url('images/hero-header.svg'); background-repeat: no-repeat; background-size: cover; border-bottom: 4px solid #C3974C;">
    <div class=" p-2 mr-sm-5 mr-3" style="background-color: white;">
    <a href="https://web.facebook.com/maroc.civilisation/?_rdc=1&_rdr"><img src="images/facebook-Motamayizah.svg" alt="facebook-Motamayizah.svg" width="25em"></a>
    <a href="https://twitter.com/fmcyoussoufia"><img src="images/twitter-motamayizah.svg" alt="twitter-motamayizah.svg" width="25em"></a>
    <a href="https://instagram.com/maroc.civilisation?igshid=ks42pf0zj2g8"><img src="images/instagram-motamayizah.svg" alt="instagram-motamayizah.svg" width="25em"></a>
    <a href="https://www.youtube.com/channel/UCjuRIvJR4yF-K8SDqNWdAwg"><img src="images/youtube-motamayizah.svg" alt="youtube-motamayizah.svg" width="25em"></a>
    
    </div>
</div>

<!-- -----------------------------------  Header MD --------------------------------------->
<div class="container-fluid px-0 HeaderMmd">
    <div class=" row mx-auto ">

            <div class="logoSM d-md-none d-block col-12 text-center mt-3">
                <img src="images/logo-motamayizah-sm.png" alt="logo-motamayizah-sm.png">
            </div>

            <div class="d-md-block d-none logoMd col-md-3 col-12 mt-3 mb-2 px-5 ml-lg-3">
                <img src="images/Logo-motamayizah-MD.png" alt="Logo-motamayizah-MD.png">
            </div>

            <div class="d-md-block d-none col-md-8 col-12 px-lg-0 px-5 mt-md-3 mt-lg-5 ml-md-4 ml-lg-0 pt-4 ">
                <div class="TitreM">
                    <p class="p1">الشق النسائي للمنتدى</p>
                    <p class="p2">تكوينات مختلفة للنهوض بإمكانات المرأة المعرفية و الحرفية.</p>
                    <ul class="ulM px-0">
                        <li>
                                <a href="index.php" class="singMd">الرئيسية</a>
                                <a href="SingInMotamayizah.php" class="singMd">للتسجيل</a>
                        </li>
                    </ul>                  
                </div>
            </div>

            <div class="d-md-none d-block justify-content-center col-12 pt-2 mb-4">
                <div class="TitreS text-center">
                    <p class="p3">الشق النسائي للمنتدى</p>
                    <p class="p4">تكوينات مختلفة للنهوض بإمكانات المرأة المعرفية و الحرفية.</p>
                    <ul class="justify-content-center ulSM pl-0">
                        <li>
                                <a href="index.php" class="singMd">الرئيسية</a>
                                <a href="SingInMotamayizah.php" class="singMd">للتسجيل</a>
                        </li>
                    </ul>                  </div>
            </div>
            
            <img class="d-md-block d-none container-fluid backMd col px-0" src="images/header-motamayizah.svg" alt="header-motamayizah.svg">      
    </div>
 </div>
<!-- -----------------------------------  Content --------------------------------------->

<div class="container-fluid pt-3">
    <div class="row justify-content-center pt-4">
        <img src="images/sing_in_motamayizah_Forum_Maroc_civilisation.png" alt="بيانات التسجيل" style="width:40%;">                    
    </div>
</div>

<?php if(isset($_GET['msg']) && $_GET['msg']=='done'):?>	
			<div class="container">
				<div class="alert alert-contrast alert-success alert-dismissible" role="alert">
					<div class="icon">
						<span class="mdi mdi-check"></span>
					</div>
					<div class="message">
						<button class="close" type="button" data-dismiss="alert" aria-label="Close">
							<span class="mdi mdi-close" aria-hidden="true"></span>
						</button>
						تمت عملية التسجيل بنجاح
						<strong>جيد!</strong>
						                    </div>
				</div>
			</div>
		<?php endif; ?>

		<?php if(isset($_GET['msg']) && $_GET['msg']=='false'):?>	
			<div class="container">
				<div class="alert alert-contrast alert-danger alert-dismissible" role="alert">
					<div class="icon">
						<span class="mdi mdi-check"></span>
					</div>
					<div class="message">
						<button class="close" type="button" data-dismiss="alert" aria-label="Close">
							<span class="mdi mdi-close" aria-hidden="true"></span>
						</button>
						المرجو إعادة التسجيل
						<strong>يوجد خطأ في إدخال البيانات!</strong>
				</div>
			</div>
                <?php endif; ?>
                
<form action='admin/woman/save.php' method="post">
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="lastname">النسب</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
</div>
</div>

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="birthday">تاريخ الازدياد</label>
                <input type="text" class="form-control" id="birthday"  name="birthday" >
        </div>
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="place">مكان الازدياد</label>
                <input type="text" class="form-control" id="place" name="place">
        </div>
</div>
</div>

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="level">المستوى الدراسي</label>
                <input type="text" class="form-control" id="level"  name="level">
        </div>
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="job">المهنة</label>
                <input type="text" class="form-control" id="job" name="job">
        </div>
</div>
</div>

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="tele">رقم الهاتف</label>
                <input type="text" class="form-control" id="tele"  name="tele">
        </div>
        <div class="col-md-6 col-12 py-3 px-6">
                <label for="cni">رقم البطاقة الوطنية</label>
                <input type="text" class="form-control" id="cni" name="cni">
        </div>
</div>
</div>

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-6 col-12 py-3 ">
                        <label for="address">العنوان</label>
                        <input type="text" class="form-control" id="address"  name="address">
                </div>
                <div class="col-md-6 col-12 py-3">
                        <label for="city">المدينة</label>
                        <select class="form-control" id="city" name="city">
                                <option selected>اختاري المدينة</option>
                                <option value="1">اليوسفية</option>
                        </select>
                </div>
        </div>
</div>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-12 py-3 px-6">
                    <label for="club">نادي</label>
                <select class="form-control" id="club" name="club" onchange="genClubPrice()">
                        <option selected>اختاري النادي</option>
                        <option value="القرآن الكريم" data-price='0'>القرآن الكريم</option>
                        <option value="الراندة و الكروشي" data-price='50'>الراندة و الكروشي</option>
                        <option value="فن الحلويات" data-price='100'>فن الحلويات</option>
                </select>
            </div>
            <div class="col-md-6 col-12 py-3 px-6 d-none">
                    <label for="cni">رقم البطاقة الوطنية</label>
                    <input type="text" class="form-control" id="cni" name="cni">
            </div>
        </div>
</div>


<div class="container">
                <div class="row justify-content-center">
                <div class=" col-md-6 col-12 py-3">
                        <label for="price">الأداء الشهري</label>
                        <div class="d-flex">
                        <input type="text" class="form-control mr-2" id="price" name="price">
                        <div class="custom-control custom-checkbox ml-1 py-md-2 pt-2">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                <label class="custom-control-label" for="customControlAutosizing"></label>
                        </div>
                        </div>
                </div>
        </div>
</div>

<button type="submit" class="irsal row justify-content-center  px-3 mb-4 mx-auto">إرسال</button>
</form>

<script>
        function genClubPrice(){
                var getPrice = club.options[club.options.selectedIndex].dataset.price;
                price.value = getPrice + ' درهم';
        }
</script>
<!-- ------------------ Début du Footer --------------------- -->

<div class="container-fluid footer pt-md-4 t-2">

  <img src="images/logo-Forum.png" class="rounded mx-auto justify-content-center mt-3 d-block col-md-3 col-lg-2 col-5" alt="...">

  <!-- ------ ul MD ------- -->
  <ul class="d-sm-flex d-none nav ul2 justify-content-center mt-3">
    <li class="nav-item nav2">
        <a class="nav-link" href="index.php">الرئيسية</a>
    </li>
    <li class="nav-item nav2">
      <a class="nav-link" href="motamayizah.php">متميزة</a>
    </li>
    <li class="nav-item nav2">
        <a class="nav-link" href="contact.php">اتصل بنا</a>
      </li>
  </ul> 

  <!-- ------ ul SM ------- -->
  <ul class="d-sm-none d-flex nav ul3 justify-content-center mt-3">
    <li class="nav-item nav2">
        <a class="nav-link" href="index.php">الرئيسية</a>
    </li>
    <li class="nav-item nav2">
      <a class="nav-link" href="motamayizah.php">متميزة</a>
    </li>
    <li class="nav-item nav2">
        <a class="nav-link" href="contact.php">اتصل بنا</a>
      </li>
  </ul> 
   
 

  <div class="row mt-4 justify-content-center">

      <div class="col-sm-8 col-12 pl-sm-3 pl-3 all">
          <p class="p11">حي السمارة (العرصة)، زنقة إنزكان رقم: 51-( فوق نادي التيكواندو)</p>
          <p class="p22">46300 <br> اليوسفية - المغرب</p>
          <p class="p33">+212 6 90 70 50 00</p>
      </div>
      
      <div class="col-sm-4 col-lg-4 col-xl-2 col-5 mt-md-4 ml-sm-0 ml-5 address1"></div>
  </div>
</div>
</body>
<!-- fin du Footer -->   
              
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>

</html>