<?php
   session_start();
   if(!isset($_SESSION['user'])){
    header('location:../index.php');
     exit();
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="form/css/bootstrap.min.css" >
    <link href="form/css/main.css" rel="stylesheet"/>
    <title>Forms</title>
  </head>
  <body>
    <div class="container-fluid color">
        <nav class="navbar navbar-expand-lg navbar-dark row p-0">
            <div class="col-sm-4 ml-3">
                <a class="navbar-brand p-0" href="#">
                    <img src="form/images/logo.png" class="img-fluid img-logo pr-2"  alt="">
                    <h2 class="d-inline align-middle">DSR</h2>
                </a>
            </div>
            <!-- sidenave in mobel & tab -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pl-4 " id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="form.php">Forms </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="report.php">Reports</a>
                    </li>
                    <?php
                        include ('../login/includes/isadmin.php');
                        if(isAdmin()){
                        echo '<li class="nav-item">
                            <a class="j nav-link text-white" href="dash/dashboard.php">Admin</a>
                        </li>';
                        }
                    ?>
                    <li id="notification_li nav-item" style="margin-left:90%">
                        <a href="#" id="notificationLink" class="nav-link text-white">Notifications</a>
                        <span id="notification_count"></span>
                            <div id="notificationContainer">
                                <div id="notificationTitle">اساتذة انتهت إجازتهم العلمية</div>
                                <div id="notificationsBody" class="notifications">
                                    <div id="notifydata"class="list-group text-right">
                                    
                                    </div>
                                </div>
                                <div id="notificationFooter"><a id="all" href="report.php">See All</a></div>
                            </div>
                    </li>
                </ul>
            </div>
            <?php echo "<h6 class='mr-3'>(".$_SESSION['user']['username'].")</h6><a href='../login/includes/logout.php' class='text-white mr-5' style='text-decoration:none'></h6>Logout</h6></a>";?>
        </nav>
    </div>   
    <div class="container-fluid">
        <div class="row" >       
            <!-- The main section -->
            <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5  align-middle" role="main">
                <!-- استمارة تسجيل المجلات العلمية   -->
                <!--journal-->
                <div id="journal" class="journal main">
                    <h5 class="text-center mb-2">المجلات العلمية</h5>
                    <div class="container-fluid">
                        <div class="stepwizard rtl mx-auto">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step ">
                                    <a href="#step-1" type="button" class="btn one btn-primary btn-circle ">الجزء الأول</a>  
                                </div>
                                <div class="stepwizard-step ">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled"> الجزء الثاني</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row mt-4">
                            <span class="journals-add  mx-auto"></span>
                        </div>
                        <div class="clearfix"></div>
                        <form id="journals" role="form" action="" method="post" class="mt-4 needs-validation" novalidate autocomplete="off">
                            <!--section one-->
                            <div class="setup-content" id="step-1">
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <label for="name-ar">الأسم (عربي) :</label>
                                        <input type="text" class="form-control complete" id="name-ar"   placeholder="" pattern="(?!^ +$)^.+$" required>
                                        <div id="name-ar-response" class="response"></div>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="name-en">الأسم (انجليزي) :</label>
                                        <input type="text" class="form-control " style="direction:ltr" id="name-en"  placeholder="" pattern="(?!^ +$)^[ a-zA-Z]+$" required>
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="editor-name"> اسم رئيس التحرير :</label>
                                        <input type="text" class="form-control " id="editor-name"  placeholder="" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                    </div>
                                    <div class="col-4 row">
                                        <div class="form-group col-12 font-weight-bold mb-0">
                                            <label>طريقة الصدور :</label>
                                        </div>
                                        <div class="form-group col-5 ">
                                            <label for="publish-paper">ورقية :</label>   
                                            <select class="custom-select form-control" id="publish-paper" >
                                                <option value="" >Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="publish-electronic">الكترونية :</label>   
                                            <select class="custom-select form-control" id="publish-electronic">
                                                <option value="">Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                    </div>
                                    <div class="col-4 row">
                                        <div class="form-group col-12 font-weight-bold mb-0">
                                            <label>لغة الصدور :</label>
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="publish-ar form-control">عربي :</label>   
                                            <select class="custom-select" id="publish-ar">
                                                <option value="">Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="publish-en"> انجليزي :</label>   
                                            <select class="custom-select form-control" id="publish-en">
                                                <option value="">Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                    </div>
                                    <div class="col-4 row">
                                        <div class="form-group col-12 font-weight-bold mt-0">
                                            <label>طريقة النشر :</label>
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="spread-paper">ورقية :</label>   
                                            <select class="custom-select form-control" id="spread-paper">
                                                <option value="">Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="spread-electronic"> الكترونية :</label>   
                                            <select class="custom-select form-control" id="spread-electronic">
                                                <option value="">Choose...</option>
                                                <option value="1">نعم</option>
                                                <option value="2">لا</option>
                                                <option value="4">غير معلوم</option>
                                            </select>                                                        
                                        </div>
                                    </div>
                                    <div class="form-group col-2 ">
                                        <label for="first-publish-date">تاريخ اول إصدار :</label>
                                        <input type="text" class="form-control" id="first-publish-date" placeholder="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="current-publish-paper">الاعداد المنشورة حتي الان :</label>
                                        <input type="number" class="form-control" id="current-publish-paper" placeholder="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="num-paper-in-publish">عدد الاوراق في كل إصدارة :</label>
                                        <input type="text" class="form-control" id="num-paper-in-publish" placeholder="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="num-paper-in-year">عدد مرات الإصدار في السنة :</label>
                                        <input type="text" class="form-control" id="num-paper-in-year" placeholder="">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="internal-arbitration">تحكيم داخلي :</label>   
                                        <select class="custom-select form-control" id="internal-arbitration">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                            <option value="3">احيانا</option>
                                            <option value="4">غير معلوم</option>
                                        </select>                                                        
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="external-arbitration"> تحكيم خارجي :</label>   
                                        <select class="custom-select form-control" id="external-arbitration">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                            <option value="3">احيانا</option>
                                            <option value="4">غير معلوم</option>
                                        </select>                                                        
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="num-arbitrator">عدد المحكمين :</label>
                                        <input type="text" class="form-control" id="num-arbitrator" placeholder="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="paid-arbitration"> مدفوع :</label>
                                        <input type="text" class="form-control" id="paid-arbitration" placeholder="">
                                    </div>
                                    <div class="form-group col-2">
                                        <label for="free-arbitration">مجاني :</label>
                                        <select class="custom-select" id="free-arbitration">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                            <option value="3">احيانا</option>
                                            <option value="4">غير معلوم</option>
                                        </select>   
                                    </div>
                                </div>
                                <div class="col-12 row mt-2">
                                    <button class="btn btn-primary nextBtn mx-auto " type="button">Next</button>
                                </div>
                            </div>  
                            <div class="setup-content" id="step-2">
                                <div class="form-row">
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="publish-area"> مجالات النشر :</label></div>
                                        <div class="col-12"><textarea name="publish-area" id="publish-area" class="form-control col-12" ></textarea></div>
                                    </div>
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="stop-reason">اسباب و فترات توقف الاصدار :</label></div>
                                        <div class="col-12"><textarea name="stop-reason" id="stop-reason" class="form-control col-12"></textarea></div>
                                    </div>
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="income-resource">مصادر دخل ان وجدت :</label></div>
                                        <div class="col-12"><textarea name=income-resource" id="income-resource" class="form-control col-12"></textarea></div>
                                    </div> 
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="journal-assets">مقتنيات المجلة :</label></div>
                                        <div class="col-12"><textarea name="journal-assets" id="journal-assets" class="form-control col-12"></textarea></div>
                                    </div>  
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="journal-hr">الموار البشرية (العاملين بالمجلة) :</label></div>
                                        <div class="col-12"><textarea name="journal-hr" id="journal-hr" class="form-control col-12"></textarea></div>
                                    </div> 
                                    <div class="form-group col-4 row">
                                        <div class="col-12"><label for="journal-problem">المشاكل :</label></div>
                                        <div class="col-12"><textarea name="journal-problem" id="journal-problem" class="form-control col-12"></textarea></div>
                                    </div>
                                    <div class="form-group col-5 row">
                                        <div class="col-12"><label for="journal-solution">الحلول :</label></div>
                                        <div class="col-12"><textarea name="journal-solution" id="journal-solution" class="form-control col-12"></textarea></div>
                                    </div>                
                                    <div class="form-group col-7 row mt-1">
                                        <div class="form-group col-3">
                                            <label for="impact-factor">impact factor</label>
                                            <input type="number" class="form-control ltr" id="impact-factor"  placeholder="">
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="journal-email ">البريد الألكتروني :</label>
                                            <input type="email" class="form-control ltr " id="journal-email"  placeholder="">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="journal-phone">التلفون :</label>
                                            <input type="tel" class="form-control ltr " id="journal-phone" placeholder="Ex : 249912788430" pattern="[0-9]+$"  maxlength="18" minlength="4">
                                        </div>
                                    </div>                     
                                </div>
                                <div class="col-12 row mt-2">
                                    <input class="btn color text-white mx-auto " name="journal" value="حفظ" type="submit">   
                                </div>    
                            </div>
                        </form>
                    </div>
                </div>
                <!------------->
                <!--اجازة التفرغ العلمي-->
                <!--discharge-->
                <div id="discharge" class="discharge main">
                    <h5 class="text-center mb-4 ">استمارة التقديم للتفرغ العلمي</h5>
                    <div class="container-fluid">
                        <div class="stepwizard rtl mx-auto">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-11" type="button" class="btn two btn-primary btn-circle ">الجزء الأول</a>  
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-21" type="button" class="btn btn-default btn-circle "disabled="disabled" >الجزء الثاني</a>  
                                </div>
                                <div class="stepwizard-step ">
                                    <a href="#step-31" type="button" class="btn btn-default btn-circle" disabled="disabled">الجزء الثالث</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 row mt-2">
                            <span class="discharges-add  mx-auto"></span>
                        </div>
                        <div class="clearfix"></div>
                        <form id="discharges" role="form" action="" method="post" class="mt-2 needs-validation" novalidate autocomplete="off">
                            <!--section one-->        
                            <div class="setup-content " id="step-11">
                                <div id="mindate" class="form-row">
                                    <div class="form-group col-4">
                                        <label for="dis-name">الأسم (رباعي) :</label>
                                        <input type="text" class="form-control complete" id="dis-name" placeholder="" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                        <div id="dis-name-response" class="response"></div>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="dis-phone"> رقم الهاتف :</label>
                                        <input type="tel"  class="form-control" id="dis-phone"  placeholder="Ex : 249912788430" pattern="[0-9]+$"  maxlength="18" minlength="4">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="dis-degree">الدرجة الوظيفية : </label>
                                        <select class="custom-select " id="dis-degree" required>
                                            <option value="">Choose...</option>
                                            <option value="1">أستاذ مساعد</option>
                                            <option value="2">أستاذ مشارك</option>
                                            <option value="3">مساعد تدريس</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3 ">
                                        <label for="dis-collage">الكلية :</label>
                                        <input type="text" class="form-control complete" id="dis-collage"  pattern="(?!^ +$)^.+$" required>
                                        <div id="dis-collage-response" class="response"></div>
                                    </div>
                                    <div class="form-group col-2 ">
                                        <label for="dis-dept">القسم :</label>
                                        <select class="custom-select" id="dis-dept" required="true">
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="designation-date"> تاريخ التعيين في الوظيفة الاولي :</label>
                                        <input type="date" class="form-control w-90 date" id="designation-date" placeholder="">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="promotion-date"> تاريخ الترقية في حالة الأستاذ المساعد : </label>
                                        <input type="date" class="form-control w-80 " id="promotion-date" placeholder="">
                                    </div>
                                    <div class="form-group col-12 font-weight-bold mb-0">
                                        <label>اذا كنت في اعارة أو انتداب أو اجازة بدون مرتب :</label>
                                    </div>
                                    <div class="form-group col-xl-3 ">
                                        <label for="loan-type">النوع :</label>
                                        <input type="text" class="form-control" id="loan-type" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-3">
                                        <label for="loan-date-from">من :</label>
                                        <input type="date" class="form-control loan" id="loan-date-from" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-3">
                                        <label for="loan-date-to">الي :</label>
                                        <input type="date" class="form-control loan" id="loan-date-to" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-3">
                                        <label for="loan-place">المكان :</label>
                                        <input type="text" class="form-control" id="loan-place" placeholder="">
                                    </div>
                                    <div class="form-group col-12 font-weight-bold mb-0">
                                        <label> أذا كنت قد تمتعت باجازة تفرغ علمي :</label>
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="vacation-date-from">من :</label>
                                        <input type="date" class="form-control vacation" id="vacation-date-from" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="vacation-date-to">الي :</label>
                                        <input type="date" class="form-control vacation" id="vacation-date-to" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="vacation-place">المكان :</label>
                                        <input type="text" class="form-control" id="vacation-place" placeholder="">
                                    </div>
                                    <button class="btn color nextBtn mx-auto text-white" type="button">Next</button>
                                </div>
                            </div>
                            <div class="setup-content " id="step-21">
                                <div class="form-row">
                                    <div class="form-group col-12 font-weight-bold mb-0">
                                        <label>  أذا كنت قد تمتعت بمنح قصيرة أو طويلة المدي خلال السنوات الخمس الماضية :</label>
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-date-from-1">من :</label>
                                        <input type="date" class="form-control grant1" id="grant-date-from-1" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-date-to-1">الي :</label>
                                        <input type="date" class="form-control grant1" id="grant-date-to-1" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-place-1">المكان :</label>
                                        <input type="text" class="form-control" id="grant-place-1" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-date-from-2">من :</label>
                                        <input type="date" class="form-control grant2" id="grant-date-from-2" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-date-to-2">الي :</label>
                                        <input type="date" class="form-control grant2" id="grant-date-to-2" placeholder="">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="grant-place-2">المكان :</label>
                                        <input type="text" class="form-control" id="grant-place-2" placeholder="" >
                                    </div>
                                    <div class="col-12 row" id="request">
                                        <div class="form-group col-12 font-weight-bold mb-0">
                                            <label>  اجازة التفرغ العلمي المطلوبة :</label>
                                        </div>
                                        <div class="form-group col-xl-4">
                                            <label for="request-vacation-date-from">من :</label>
                                            <input type="date" class="form-control request" id="request-vacation-date-from" placeholder="" required>
                                        </div>
                                        <div class="form-group col-xl-4">
                                            <label for="request-vacation-date-to">الي :</label>
                                            <input type="date" class="form-control request" max="" min="" id="request-vacation-date-to" placeholder="" required>
                                        </div>
                                        <div class="form-group col-xl-4">
                                            <label for="request-vacation-num">عدد الشهور المطلوبة :</label>
                                            <input type="number" class="form-control" step="0.01" id="request-vacation-num" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group col-12 font-weight-bold mb-0">
                                        <label>  المؤسسه العلمية لقضاء الاجازة بها :</label>
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="edu-name">الأسم :</label>
                                        <input type="text" class="form-control" id="edu-name" placeholder="" pattern="(?!^ +$)^.+$">
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="edu-country">البلد :</label>
                                        <input type="text" class="form-control complete" id="edu-country">
                                        <div id="edu-country-response" class="response"></div>
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="edu-confirm">هل لديك موافقه من المؤسسة العلمية المعنية ؟ </label>   
                                        <select class="custom-select" id="edu-confirm">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                        </select>                                                        
                                    </div>
                                    <div class="mx-auto" style="position: relative;">
                                        <button class="btn btn-primary nextBtn mx-auto " type="button">Next</button>
                                        <button class="btn btn-primary prevBtn mx-auto " type="button">Prev</button>
                                    </div>
                                </div>    
                            </div>  
                            <div class="setup-content" id="step-31">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="activity">النشاط العلمي او البحثي او المهني المقترح لقضاء اجازة التفرغ العلمي :</label>
                                        <input type="text"  class="form-control" id="activity"  placeholder="" pattern="(?!^ +$)^.+$">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="support-edu">الدعم المقدم من المؤسسه العلمية التي وافقت علي الاستضافة :</label>
                                        <input type="text"  class="form-control" id="support-edu" placeholder="" pattern="(?!^ +$)^.+$">
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="request-support">الدعم المطلوب من الجامعة :</label>
                                        <input type="text" class="form-control" id="request-support" placeholder="" pattern="(?!^ +$)^.+$">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="department-confirm">هل يوصي القسم بالموافقه ؟</label>   
                                        <select class="custom-select" id="department-confirm">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                        </select>                                                        
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="confirm-coverage">اذا كانت الاجابة نعم هل يلتزم القسم بتغطية اعبائه التدريسية و الاشرافية اثناء فترة اجازة التفرغ العلمي ؟ </label>   
                                        <select class="custom-select " id="confirm-coverage" disabled>
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                        </select>                                                        
                                    </div>
                                        <div class="form-group col-xl-4">
                                            <label for="collage-confirm">هل توصي الكلية بالموافقه ؟</label>   
                                            <select class="custom-select" id="collage-confirm">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                        </select>                                                        
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <label for="board-confirm">هل يوصي مجلس إدارة البحث بالموافقه ؟</label>   
                                        <select class="custom-select" id="board-confirm">
                                            <option value="">Choose...</option>
                                            <option value="1">نعم</option>
                                            <option value="2">لا</option>
                                        </select>                                                        
                                    </div>
                                </div>
                                <div class="col-12 row mt-2">
                                    <input name="discharge" class="btn color text-white mx-auto" name="discharge" value="حفظ" type="submit">                   
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
                <!--الابحاث العلمية الجارية حاليا بالجامعة-->
                <!--current researches-->
                <div id="research" class="research main mx-4">
                    <h5 class="text-center mb-2 mx-auto "> الأبحاث العلمية الجارية في الجامعة</h5>
                    <div class="container-fluid">
                        <form id="researches" role="form" action="" method="post" class="mt-4 needs-validation " novalidate autocomplete="off">
                            <div class="form-row mt-5">
                                <div class="form-group col-5">
                                    <label for="research-name"> اسم المشروع / البحث :</label><!--(?!^ +$)^[ a-zA-Z\u0621-\u064A0-9]+$ arabic + english + numbers-->
                                    <input autofocus type="text" class="form-control" id="research-name" name="research-name" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-4 ui-widget  " >
                                    <label for="researcher-name">اسم الباحث :</label>
                                    <input type="text" class="form-control complete" id="researcher-name" name="researcher-name" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                    <div id="researcher-name-response" class="response"></div>
                                </div>
                                <div class="form-group col-3">
                                    <label for="start-date"> تاريخ البداية :</label>
                                    <input type="date" class="form-control date date-r" id="start-date" name="start-date">
                                </div>
                                <div class="form-group col-3">
                                    <label for="end-date">تاريخ الإنتهاء :</label>
                                    <input type="date" class="form-control date-r" id="end-date" name="end-date">
                                </div>
                                <div class="form-group col-4">
                                    <label for="donor">الجهة المانحه :</label>
                                    <input type="text" class="form-control complete" id="donor" name="donor" pattern="(?!^ +$)^.+$">
                                    <div id="donor-response" class="response"></div>
                                </div>
                                <div class="form-group col-2 ">
                                    <label for="amount">المبلغ المصدق :</label>
                                    <input type="number" class="form-control text-center" name="amount" id="amount" min="0" >
                                </div>
                                <div class="form-group col-2">   
                                    <label for="currency"> العملة :</label>
                                    <select id="currency" class="custom-select w-70=" name="currency" >
                                        <option value="" >Choose...</option>
                                        <option value="1">جنيه</option>
                                        <option value="2">دولار</option>
                                    </select>                                                        
                                </div>
                                <div class="form-group col-3">
                                    <label for="degree">الدرجة الوظيفية : </label>
                                    <select class="custom-select " id="degree" name="degree" required>
                                        <option value="">Choose...</option>
                                        <option value="1">أستاذ مساعد</option>
                                        <option value="2">أستاذ مشارك</option>
                                        <option value="3">مساعد تدريس</option>
                                    </select>
                                </div>
                                <div class="form-group col-4 ">
                                    <label for="collage">الكلية :</label>
                                    <input type="text" class="form-control complete" id="collage" name="collage" pattern="(?!^ +$)^.+$" required>
                                    <div id="collage-response" class="response"></div>
                                </div>
                                <div class="form-group col-3 ">
                                    <label for="department">القسم :</label>
                                    <select class="custom-select" id="department" name="department" required="true">
                                        <option value="">Choose...</option>
                                    </select>
                                </div>
                                <div class="form-group col-2" >
                                    <label for="rate"> التقييم :</label>
                                    <input type="number" class="form-control w-80" id="rate" name="rate" min="0" max="100">
                                </div>
                                <div class="form-group col-6 row">
                                    <div class="col-12"><label for="abstract">مستخلص المشروع :</label></div>
                                    <div class="col-12"><textarea name="abstract" id="abstract" class="form-control col-12 " rows="3"  ></textarea></div>
                                </div>
                                <div  class="form-group col-6 row device">
                                    <div class="col-12"><label for="device">الأجهزة المطلوبة :</label></div>
                                    <div class="input-group control-group after-add-more col-6 mb-1">
                                        <input type="text" name="device[]"  class="form-control" placeholder="" pattern="(?!^ +$)^.+$">
                                        <div class="input-group-btn"> 
                                            <button id="device" class="btn btn-success add-more" type="button"><i class="">+</i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 row mt-4">
                                    <span class="researches-add  mx-auto"></span>
                                </div>
                                <div class="col-12 row mt-4">
                                    <input form="researches" class="btn btn-success btn mx-auto" name="research" type="submit" value="حفظ">
                                </div>
                            </div>  
                        </form>
                        <div class="copy collapse device">
                            <div class="control-group  input-group col-6 mb-1">
                                <input type="text" name="device[]" class="form-control " placeholder="other device" pattern="(?!^ +$)^.+$">
                                <div class="input-group-btn"> 
                                    <button id="rdevice" class="btn btn-danger remove" type="button"><i class="">-</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--منح الاساتذة الاجانب-->
                <!--foreign-->
                <div id="foreign" class="foreign main mx-4">
                    <h5 class="text-center my-3 mx-auto ">منح الاساتذة الاجانب</h5>
                    <div class="container">
                        <form id="foreigns" role="form" action="foreign.php" method="post" class="needs-validation" novalidate>
                            <div class="form-row  mt-5">
                                <div class="form-group col-4 px-3">
                                    <label for="foreign-name"> اسم الأستاذ :</label>
                                    <input type="text" class="form-control ltr" id="foreign-name" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="foreign-edu"> الجامعة :</label>
                                    <input type="text" class="form-control ltr" id="foreign-edu" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="foreign-collage">  الكلية :</label>
                                    <input type="text" class="form-control ltr" id="foreign-collage" pattern="(?!^ +$)^.+$" >
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="foreign-receive">الكلية المستقبلة :</label>
                                    <input type="text" class="form-control complete" id="foreign-receive" pattern="(?!^ +$)^.+$"  required autocomplete="off">
                                    <div id="foreign-receive-response" class="response" style="width:100%"></div>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="foreign-start-date">  تاريخ بداية الزيارة :</label>
                                    <input type="date" class="form-control fore_date" id="foreign-start-date">
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="foreign-end-date">  تاريخ انتهاء الزيارة :</label>
                                    <input type="date" class="form-control fore_date" id="foreign-end-date">
                                </div>
                                <div class="form-group col-7 px-3">
                                    <label for="foreign-reason"> سبب الزيارة :</label>
                                    <input type="text" class="form-control " id="foreign-reason" pattern="(?!^ +$)^.+$" required>
                                </div>
                            </div>
                            <div class="col-12 row mt-4">
                                <span class="foreigns-add  mx-auto"></span>
                            </div>
                            <div class="col-12 row mt-4">
                                <input form="foreigns" class="btn btn-success btn mx-auto" name="foreign" type="submit" value="حفظ">
                            </div>
                        </form>
                    </div>
                </div>
                <!--  الورش -->
                <!-- workshops -->
                <div id="workshop" class="workshop main mx-4">
                    <h5 class="text-center my-3 mx-auto ">الورش</h5>
                    <div class="container">
                        <form id="workshops" role="form" action="" method="post" class="needs-validation" novalidate>
                            <div class="form-row  mt-5">
                                <div class="form-group col-5 px-3">
                                    <label for="workshop-name">العنوان / الموضوع :</label>
                                    <input type="text" class="form-control " id="workshop-name" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="workshop-place"> المكان :</label>
                                    <input type="text" class="form-control" id="workshop-place" pattern="(?!^ +$)^.+$">
                                </div>
                                <div class="form-group col-2 px-3">
                                    <label for="participant-num">  عددالمشاركين :</label>
                                    <input type="number" class="form-control text-center" id="participant-num">
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="presenter"> المقدم :</label>
                                    <input type="text" class="form-control" id="presenter" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="presenter-degree">الدرجة العلمية : </label>
                                    <select class="custom-select " id="presenter-degree" >
                                        <option value="">Choose...</option>
                                        <option value="1">أستاذ مساعد</option>
                                        <option value="2">أستاذ مشارك</option>
                                        <option value="3">مساعد تدريس</option>
                                    </select>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="workshop-start-date">تاريح البداية :</label>
                                    <input type="date" class="form-control wo_date" id="workshop-start-date">
                                </div>
                                <div class="form-group  col-3 px-3">
                                    <label for="workshop-end-date">تاريخ الإنتهاء :</label>
                                    <input type="date" class="form-control wo_date" id="workshop-end-date">
                                </div>
                                <div class="form-group col-8 row participant">
                                    <div class="col-12"><label for="participant">المشاركين :</label></div>
                                    <div class="input-group control-group after-add-more col-6 mb-1">
                                        <input type="text" name="participant[]"  class="form-control" placeholder="" pattern="(?!^ +$)^.+$">
                                        <div  class="input-group-btn"> 
                                            <button id="participant" class="btn btn-success add-more" type="button"><i class="">+</i></button>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                            <div class="col-12 row mt-4">
                                <span class="workshops-add  mx-auto"></span>
                            </div>
                            <div class="col-12 row mt-4">
                                <input form="workshops" class="btn btn-success btn mx-auto" name="workshop" type="submit" value="حفظ">
                            </div>
                            <div class="copy collapse participant">
                                <div class="control-group input-group col-6 mb-1">
                                    <input type="text" name="participant[]" class="form-control " placeholder="other" pattern="(?!^ +$)^.+$">
                                    <div class="input-group-btn"> 
                                        <button id="wparticipant" class="btn btn-danger remove" type="button"><i class="">-</i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--المعارض-->
                <!-- exhibitions -->
                <div id="exhibition" class="exhibition main mx-4">
                    <h5 class="text-center my-3 mx-auto ">المعارض</h5>
                    <div class="container">
                        <form id="exhibitions" role="form" action="" method="post" class="needs-validation" novalidate>
                            <div class="form-row  mt-5 mr-5">
                                <div class="form-group col-4 px-3">
                                    <label for="e-name">العنوان / الموضوع :</label>
                                    <input type="text" class="form-control " id="e-name" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="e-place"> المكان :</label>
                                    <input type="text" class="form-control" id="e-place" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-2 px-3">
                                    <label for="e-participant-num">  عددالمشاركين :</label>
                                    <input type="number" class="form-control text-center" id="e-participant-num">
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="e-presenter"> المشرف :</label>
                                    <input type="text" class="form-control" id="e-presenter"  pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="e-presenter-degree">الدرجة العلمية : </label>
                                    <select class="custom-select " id="e-presenter-degree">
                                        <option value="">Choose...</option>
                                        <option value="1">أستاذ مساعد</option>
                                        <option value="2">أستاذ مشارك</option>
                                        <option value="3">مساعد تدريس</option>
                                    </select>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="e-start-date">تاريخ البداية :</label>
                                    <input type="date" class="form-control ex_date" id="e-start-date">
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="e-end-date">تاريخ الإنتهاء :</label>
                                    <input type="date" class="form-control ex_date" id="e-end-date">
                                </div>
                                <div  class="form-group col-8 row eparticipant">
                                    <div class="col-12"><label for="eparticipant"> المشاركين :</label></div>
                                    <div class="input-group control-group after-add-more col-6 mb-1">
                                        <input type="text" name="eparticipant[]"  class="form-control" placeholder="" pattern="(?!^ +$)^.+$">
                                        <div class="input-group-btn"> 
                                            <button id="eparticipant" class="btn btn-success add-more" type="button"><i class="">+</i></button>
                                        </div>
                                    </div>
                                </div>          
                            </div>
                            <div class="col-12 row mt-4">
                                <span class="exhibitions-add  mx-auto"></span>
                            </div>
                            <div class="col-12 row mt-4">
                                 <input form="exhibitions" class="btn btn-success btn mx-auto" name="exhibition" type="submit" value="حفظ">
                            </div>
                        </form>
                        <div class="copy collapse eparticipant">
                            <div class="control-group  input-group col-6 mb-1">
                                <input type="text" name="eparticipant[]" class="form-control "   placeholder="other device" pattern="(?!^ +$)^.+$">
                                <div class="input-group-btn"> 
                                    <button id="erparticipant" class="btn btn-danger remove" type="button"><i class="">-</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- التدريب -->
                 <!--training-->
                <div id="training" class="training main mx-4">
                    <h5 class="text-center my-3 mx-auto ">التدريب</h5>
                    <div class="container">
                        <form id="trainings" role="form" action="training.php" method="post" class="needs-validation" novalidate>
                            <div class="form-row  mt-5">
                                <div class="form-group col-4 px-3">
                                    <label for="t-name">العنوان / الموضوع :</label>
                                    <input type="text" class="form-control " id="t-name" pattern="(?!^ +$)^.+$" required>
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="t-place"> المكان :</label>
                                    <input type="text" class="form-control" id="t-place" pattern="(?!^ +$)^.+$">
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="t-participant-num">  عددالمشاركين :</label>
                                    <input type="number" class="form-control ltr" id="t-participant-num">
                                </div>
                                <div class="form-group col-4 px-3">
                                    <label for="t-presenter"> المشرف :</label>
                                    <input type="text" class="form-control" id="t-presenter" pattern="(?!^ +$)^[ a-zA-Z\u0621-\u064A]+$" required>
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="t-presenter-degree">الدرجة العلمية : </label>
                                    <select class="custom-select form-control" id="t-presenter-degree">
                                        <option value="">Choose...</option>
                                        <option value="1">أستاذ مساعد</option>
                                        <option value="2">أستاذ مشارك</option>
                                        <option value="3">مساعد تدريس</option>
                                    </select>
                                </div>
                                <div class="form-group col-3 px-3 mx-auto">
                                    <label for="t-start-date">تاريح البداية :</label>
                                    <input type="date" class="form-control tr_date" id="t-start-date">
                                </div>
                                <div class="form-group col-3 px-3">
                                    <label for="t-end-date">تاريح الانتهاء :</label>
                                    <input type="date" class="form-control tr_date" id="t-end-date">
                                </div>
                                <div class="form-group col-8 row t-participant">
                                    <div class="col-12"><label for="t-participant">المشاركين :</label></div>
                                    <div class="input-group control-group after-add-more col-6 mb-1">
                                        <input type="text" name="t-participant[]"  class="form-control" placeholder="" pattern="(?!^ +$)^.+$">
                                        <div id="t" class="input-group-btn"> 
                                            <button id="t-participant" class="btn btn-success add-more" type="button"><i class="">+</i></button>
                                        </div>
                                    </div>
                                </div>                    
                            </div>
                            <div class="col-12 row mt-4">
                                <span class="trainings-add  mx-auto"></span>
                            </div>
                            <div class="col-12 row mt-4">
                                <input form="trainings" class="btn btn-success btn mx-auto" name="training" type="submit" value="حفظ">
                            </div>
                        </form>
                        <div class="copy collapse t-participant">
                            <div class="control-group input-group col-6 mb-1">
                                <input type="text" name="t-participant[]" class="form-control " placeholder="other" pattern="(?!^ +$)^.+$">
                                <div class="input-group-btn"> 
                                    <button id="rt-participant" class="btn btn-danger remove" type="button"><i class="">-</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </main>
            <!-- The Sidebar -->
            <div class="col-12= col-md-3 col-xl-2 bd-sidebar border-left">
                <form  action="" class="my-3">
                    <!-- <input type="search" class="form-control" disabled placeholder="Search.."> -->
                    <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-label="Toggle docs navigation" aria-expanded="false"></button>
                </form>
                <nav class="navbar-collapse bd-links mr-4" id="bd-docs-nav">
                    <div class="bd-toc-item active text-right">
                        <a href="#" class="bd-toc-link ">ادخال البيانات</a>
                        <div class="list-group text-center">
                            <a href="#journal" class="list-group-item list-group-item-action pt-3 font-weight-bold border-0">تسجيل المجلات العلمية</a>
                            <a href="#discharge" class="list-group-item list-group-item-action pt-3  border-0 "> استمارة التفرغ العلمي </a>
                            <a href="#research" class="list-group-item list-group-item-action pt-3 border-0">الأبحاث العلمية الجارية في الجامعة</a>
                            <a href="#foreign" class="list-group-item list-group-item-action pt-3 border-0">منح الاساتذة الاجانب</a>
                            <a href="#exhibition" class="list-group-item list-group-item-action pt-3 border-0">المعارض</a>
                            <a href="#training" class="list-group-item list-group-item-action pt-3 border-0">التدريب</a>
                            <a href="#workshop" class="list-group-item list-group-item-action pt-3 border-0">الورش</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="form/js/jquery-3.3.1.min.js"  ></script>
    <script src="form/js/popper.min.js"  ></script>
    <script src="form/js/bootstrap.min.js"></script>
    <script src="form/js/main.js"></script>
</body>
</html>