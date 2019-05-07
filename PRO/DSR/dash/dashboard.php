<?php
   include('../../login/includes/isadmin.php');
   session_start();

   if (!isAdmin()){
	  $_SESSION['msg'] = "You must log in first";
	  header('location: ../../index.php');
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../form/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/chart.min.css" >
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /-->
    <!-- <link rel="stylesheet" href="../form/css/dataTables.bootstrap.min.css" /> -->
    <!-- <script type="text/javascript" src="js/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="js/jquery.validate.min.js"></script> -->
    <link href="../form/css/main.css" rel="stylesheet"/>
    <title>Admin Page</title>
  </head>
  <body>
    <div class="container-fluid color">
        <nav class="navbar navbar-expand-lg navbar-dark row p-0">
            <div class="col-sm-4 ml-3">
                <a class="navbar-brand p-0" href="#">
                    <img src="../form/images/logo.png" class="img-fluid img-logo pr-2"  alt="">
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
                        <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">                   
                        <a class="nav-link text-white" href="../form.php">Forms </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../report.php">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="dashboard.php">Admin</a>
                    </li>
                </ul>
            </div>
            <?php echo "<h7 style='color:black;'>(".$_SESSION['user']['username'].")</h7><a href='../../login/includes/logout.php' class='text-white mr-5' style='text-decoration:none'> &nbsp&nbsp&nbspLogout</a>";?>
        </nav>
    </div>   
    <div class="container-fluid">
        <div class="row" >       
            <!-- The main section -->
            <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5  align-middle" role="main">
                <!-- chart   -->
                <!--charts-->
                <div id="page1" class="page1 main">
                    <div style ="width:50%; float: left; position: relative;">
                        <h6  style="position: relative; top: 0px; bottom: 200px;left:36%;width: 50%; height: 30%;"> عدد الابحاث في الكليات </h6>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div style =" width:50%;float: right; position: relative;" >
                        <h6 id='num' style="position: relative; top: 0px; bottom: 200px;left:36%;width: 50%; height: 30%;"> </h6>
                        <canvas id="myChart1" ></canvas>
                    </div>
                    <div>
                        <h6  style=" position: absolute; top: 100px; float: right; bottom: 40px;   right: 0px;  width: 50%; height: 30%; margin: auto;"> عدد الابحاث بالجهة المانحة </h6>
                        <canvas id="myChart3"  style =" float: right; position: relative; margin-top:100px;" ></canvas>
                    </div>
                </div>
                <!------------->
                <!--charts-->
                <!--current researches-->
                <div id="page2" class="page2 main mx-4" style="position:relative">
                    <div style="width: 40%;height: auto;margin-top:40px;float:left;text-align:center" >
                        <h6  style=" position: absolute; top: 20px; float: right; bottom: 20px;   width: 50%; height: 30%;"> عدد الاساتذة الاجانب في كل كلية </h6>
                        <canvas id="myChart4" ></canvas>
                    </div>      
                    <div style="width: 40%;height: auto;margin-top:40px; float:right;text-align:center" >
                        <canvas id="myChart5" ></canvas>
                        <h6  style=" position: absolute; top: 20px; float: right; bottom: 20px;   width: 50%; height: 30%;"> عدد الاساتذة الاجانب بالمؤسسة العلمية </h6>
                    </div>
                </div>
                <!--منح الاساتذة الاجانب-->
                <!--foreign-->

                <div id="page3" class="page3 main mx-4">
                    <div style="width: 40%;height: auto;margin-top:40px;float:left;" >
                        <canvas id="myChart6" ></canvas>
                        <h6  style=" position: absolute; top: 20px; float: right; bottom: 200px;  width: 50%; height: 30%;text-align:center"> عدد الإجازات لكل مؤسسة علمية  </h6>    
                    </div>
                    <div style="width: 40%;height: auto;margin-top:40px; float:right;" >
                        <canvas id="myChart7" ></canvas>
                        <h6  style=" position: absolute; top: 20px; float: right; bottom: 200px;  width: 50%; height: 30%;;text-align:center"> عدد الاعداد المنشورة لكل مجلة     </h6>
                    </div>            
                </div>

                <!--users-->
                <div id="users" class="user main">
                    <h5 class="text-center mb-4 ">المستخدمين</h5>
                    <div class="container row">
                        <div class="panel panel-default col-12 mx-auto">
                            <div class="panel-heading">
                                <div class="row">                                     
                                    <div class="col-10 mb-2">
                                        <button type="button" name="add_user" id="add_user" class="btn btn-success btn-xs float-right">Add</button>
                                    </div>
                                    <div id="user_res"></div>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive mx-auto" style="width:100%">
                                    <table id="user_data" class="table table-bordered table-striped mx-auto" style="width:100% ">
                                        <thead style="margin:0;padding:0">
                                            <tr style="margin:0;padding:0">
                                                <th style="width:16em">Name</th>
                                                <th style="width:10em">Password</th>
                                                <th style="width:7em">Role</th>
                                                <th>Delete</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                    </table>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--users table-->

                <!-- collage -->
                <div id="collage" class="collage main mx-4" style="direction:rtl">
                    <h5 class="text-center mb-4 ">الكليات</h5>
                    <div class="container row">
                        <div class="panel panel-default col-12 mx-auto">
                            <div class="panel-heading">
                                <div class="row">                                     
                                    <div class="col-7 mb-2 mx-auto">
                                        <button type="button" name="add_collage" id="add_collage" class="btn btn-success btn-xs float-right">Add</button>
                                    </div>
                                    <div id="collage_res"></div>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive " style="width:100%">
                                    <table id="collage_data" class="table table-bordered table-striped mx-auto text-right" style="width=100%">
                                        <thead style="margin:0;padding:0">
                                            <tr style="margin:0;padding:0">
                                                <th style="width:20em">أسم الكلية</th>
                                                <th>Delete</th>
                                                <th>Update</th>
                                                <th>dept</th>
                                            </tr>
                                        </thead>
                                    </table>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teacher -->
                <div id="teacher" class="teacher main mx-4" style="direction:rtl">
                    <h5 class="text-center mb-4 ">الأساتذة</h5>
                    <div class="container row">
                        <div class="panel panel-default col-12 mx-auto">
                            <div class="panel-heading">
                                <div class="row">                                     
                                    <div align="left">
                                        <button type="button" name="add_teacher" id="add_teacher" class="btn btn-success btn-xs float-right">Add</button>
                                    </div>
                                    <div id="teacher_res"></div>
                                    <div class="clear-fix"></div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive ">
                                    <table id="teacher_data" class="table table-bordered table-striped mx-auto text-right">
                                        <thead>
                                            <tr>
                                                <th style="width:20em">الأسم</th>
                                                <th style="width:20em">الكلية</th>
                                                <th style="width:20em">القسم</th>
                                                <th>الدرجة العلمية</th>
                                                <th>التلفون</th>
                                                <th>Delete</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                    </table>      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </main>
            <!-- The Sidebar -->
            <div class="col-12= col-md-3 col-xl-2 bd-sidebar border-left">
                <form  action="" class="my-3">
                    <!-- <input type="search" class="form-control " placeholder="Search.."> -->
                    <button class="btn btn-link bd-search-docs-toggle d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target="#bd-docs-nav" aria-controls="bd-docs-nav" aria-label="Toggle docs navigation" aria-expanded="false"></button>
                </form>
                <nav class="navbar-collapse bd-links mr-4" id="bd-docs-nav">
                    <div class="bd-toc-item active text-right">
                        <a href="#" class="bd-toc-link "></a>
                        <div class="list-group text-center">
                            <a href="#page1" class="list-group-item list-group-item-action pt-3 font-weight-bold border-0">إحصائيات البحث العلمي </a>
                            <a href="#page2" class="list-group-item list-group-item-action pt-3 border-0">الاساتذة الاجانب</a>
                            <a href="#page3" class="list-group-item list-group-item-action pt-3 border-0">إحصائيات اخري  </a>
                            <a href="#users" class="list-group-item list-group-item-action pt-3  border-0 "> المستخدمين  </a>
                            <a href="#collage" class="list-group-item list-group-item-action pt-3  border-0 cole"> الكليات  </a>
                            <a href="#teacher" class="list-group-item list-group-item-action pt-3  border-0 "> الأساتذة  </a>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../form/js/jquery-3.3.1.min.js"  ></script>
    <script src="../form/js/popper.min.js"  ></script>
    <script src="../form/js/bootstrap.min.js"></script>
    <!-- <script src="js/datatable.js"></script> -->

    <!-- <script src="js/jquery2.2.0.min.js"></script> -->
   
    <script src="js/dialogify.min.js"></script>
    <script src="js/Chart.bundle.js"></script>   
    <script src="js/Chart.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>  
    
</body>
</html>