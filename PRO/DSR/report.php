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
    <title class="text-center">تقرير الابحاث العلمية</title>
    <link rel="stylesheet" type="text/css" href="report/css/semantic-calendar.css">
    <link rel="stylesheet" type="text/css" href="report/css/semantic.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/dataTables.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/autoFill.semanticui.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/buttons.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/colReorder.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/fixedColumns.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/fixedHeader.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/keyTable.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/responsive.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/rowGroup.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/rowReorder.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/scroller.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/select.semanticui.min.css"/>
    <link rel="stylesheet" type="text/css" href="report/css/main.css"/>
  </head>
  <body>
    <div class="ui top attached demo menu  grid">
      <!-- <a href="home.php" class="one wide item ">Home</a> -->
      <a href="form.php" class="one wide item ">Form</a>
      <?php
        include ('../login/includes/isadmin.php');
          if(isAdmin()){
            echo ' <a class="one wide item" href="dash/dashboard.php">Admin</a>';
          }
      ?>
      <div class="ui calendar  ml" id="rangestart">
        <div class="ui input left icon">
          <i class="calendar icon"></i>
          <input type="text" class="set" placeholder="Start Date" id="start_date" autocomplete="off">
        </div>
      </div>
            
      <div class="ui calendar four wide mle" id="rangeend">
        <div class="ui input left icon">
          <i class="calendar icon"></i>
          <input type="text" class="set" placeholder="End Date" id="end_date" autocomplete="off">
        </div>
      </div>
        
      <div class=" two wide">
        <input type="button" id="search-research" value="Search" class="ui button  green"> 
        <input type="button" id="search-journal" value="Search" class="ui button  green"> 
        <input type="button" id="search-discharge" value="Search" class="ui button  green"> 
        <input type="button" id="search-foreign" value="Search" class="ui button  green"> 
        <input type="button" id="search-exhibition" value="Search" class="ui button  green"> 
        <input type="button" id="search-workshop" value="Search" class="ui button  green"> 
        <input type="button" id="search-training" value="Search" class="ui button  green"> 
        <input type="button" id="search-discharge-end" value="Search" class="ui button  green"> 
      </div>
      <div class="six wide right aligned ml">
        <input type="button" id="reset-research" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-journal" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-discharge" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-foreign" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-exhibition" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-workshop" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-training" value="Reset" class="ui button   orange">  
        <input type="button" id="reset-discharge-end" value="Reset" class="ui button   orange">  
      </div>
      <?php echo "<a href='../login/includes/logout.php' class='item one wide right'>Logout</a>";?>
      <a id="sidebar" class="item right one wide"><i class="sidebar icon"></i></a>
    </div>
    <div class="ui bottom attached segment pushable">
      <div class="ui  labeled icon right inline vertical sidebar menu large" >
        <h3 class="item">التقارير</h3>
        <a name = "research" class="research item">تقرير الأبحاث العلمية</a>
        <a name = "journal" class="journal item">تقرير المجلات العلمية</a>
        <a name = "discharge" class="discharge item">التفرغ العلمي</a>
        <a name = "foreign" class="discharge item">منح الأساتذة الأجانب</a>
        <a name = "exhibition" class="exhibition item">المعارض</a>
        <a name = "workshop" class="workshop item">الورش</a>
        <a name = "training" class="training item">التدريب</a>
        <a name = "discharge-end" class="discharge-end item">انتهاء الإجازة العلمية </a>
      </div>
      <div class="pusher">
        <div class="ui basic segment">
          <h2 id="grap" class="ui header center aligned">تقرير الأبحاث العلمية</h2>
          <!--research report-->
          <div class="table research" style="width:100%">
            <table cellspacing="0" id="research" class="ui table unstackable compact selectable collapsing celled right aligned striped teal main">
              <thead class = "green">
                <tr>
                  <th>#</th>
                  <th>أسم البحث</th>
                  <th>اسم الباحث</th>
                  <th style="width:160px;padding: 5px">
                    <p id="pcollage-r" style="display:none">الكلية</p>
                    <select id="collage-r" class="ui button r" style="padding: 5px;width:100px">
                    </select>
                  </th>
                  <th>القسم</th>
                  <th>الدرجة العلمية</th>
                  <th>رقم الهاتف</th>
                  <th style="width:90px">تاريخ البداية</th>
                  <th style="width:90px">تاريح الإنتهاء</th>
                  <th style="width:150px;padding: 5px">
                    <select id="donor" class="ui button r" style="padding: 5px;width:100px">
                    </select>
                    <p class="" id="pdonor" style="display:none">الجهة المانحة</p>
                  </th>
                  <th>المبلغ المصدق</th>
                  <th>التقييم</th>
                  <th>المستخلص</th>
                  <th>الأجهزة</th>
                  <th>الحالة</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <!-- journal report -->
          <div class="table journal">
            <table cellspacing="0" id="journal" class="ui table small unstackable compact selectable collapsing celled right aligned striped orange main">
              <thead class = "teal">
                <tr>
                  <th colspan="1"></th>
                  <th colspan="2" class="center aligned">اسم المجلة</th>
                  <th colspan="1"></th>
                  <th colspan="2" class="center aligned">طريقة الصدور</th>
                  <th colspan="2" class="center aligned">لغة الصدور</th>
                  <th colspan="2" class="center aligned">طريقة النشر</th>
                  <th colspan="20"></th>
                </tr>
                <tr>
                  <th>#</th>
                  <th> عربي</th>
                  <th> انجليزي</th>
                  <th>رئيس التحرير</th>
                  <th>ورقية</th>
                  <th>الكترونية</th>
                  <th>عربي</th>
                  <th>انجليزي</th>
                  <th>ورقية</th>
                  <th>الكترونية</th>
                  <th>تاريخ اول إصدار</th>
                  <th>الاعداد المنشورة حتي الان</th>
                  <th>عدد الاوراق في كل إصدارة</th>
                  <th>عدد مرات الإصدار في السنة</th>
                  <th>تحكيم داخلي</th>
                  <th>تحكيم خارجي </th>
                  <th>عدد المحكمين </th>
                  <th>مدفوع</th>
                  <th>مجاني</th>
                  <th>اسباب و فترات توقف الاصدار</th>
                  <th>مصادر دخل ان وجدت</th>
                  <th>مجالات النشر</th>
                  <th>مقتنيات المجلة</th>
                  <th>الموار البشرية</th>
                  <th>المشاكل</th>
                  <th>الحلول</th>
                  <th>impact factor</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <!--discharge report-->
          <div class="table discharge">
            <table cellspacing="0" id="discharge" class="ui table small unstackable compact selectable collapsing celled right aligned striped green main">
              <thead class = "teal">
                <tr>
                  <th colspan="1"></th>
                  <th colspan="5" class="center aligned">الأستاذ</th>
                  <th colspan="2"></th>
                  <th colspan="3" class="center aligned">اجازة التفرغ العلمي </th>
                  <th colspan="2" class="center aligned">المؤسسه العلمية</th>
                  <th colspan="4"></th>
                </tr>
                <tr>
                  <th>#</th>
                  <th> الأسم </th>
                  <th>رقم الهاتف</th>
                  <th>الدرجة الوظيفية</th>
                  <th>
                    <p id="pcollage-d" style="display:none">الكلية</p>
                    <select id="collage-d" class="ui button r"></select>
                  </th>
                  <th>القسم</th>
                  <th>تاريخ التعيين في الوظيفة الاولي</th>
                  <th>تاريخ الترقية في حالة الأستاذ المساعد</th>
                  <th>من</th>
                  <th>الي</th>
                  <th> المدة (شهر) </th>
                  <th>الأسم</th>
                  <th>البلد </th>
                  <th>النشاط المقترح </th>
                  <th>الدعم المقدم من المؤسسه</th>
                  <th>الدعم المطلوب من الجامعة </th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="table foreign">
            <table width="100%" cellspacing="0" id="foreign" class="ui table large unstackable compact selectable collapsing celled right aligned striped violet main">
              <thead class = "teal">
                <tr>
                  <th colspan="1"></th>
                  <th colspan="3" class="center aligned">الأستاذ</th>
                  <th colspan="5" class="center aligned">تفاصيل الزيارة </th>
                </tr>
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="three wide"> الأسم </th>
                  <th class="two wide">الجامعة</th>
                  <th>الكلية</th>
                  <th style="width:160px;padding: 5px">
                    <p id="pcollage-f" style="display:none">الكلية</p>
                    <select id="collage-f" class="ui button r" style="padding: 5px;width:100px">
                    </select>
                  </th>
                  <th class="two wide">تاريخ بداية الزيارة</th>
                  <th class="two wide">تاريخ انتهاء الزيارة</th>
                  <th class="three wide">سبب الزيارة</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="table exhibition">
            <table width="100%" cellspacing="0" id="exhibition" class="ui table large unstackable compact selectable collapsing celled right aligned striped purple main">
              <thead class = "teal">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="three wide"> العنوان / الموضوع </th>
                  <th class="two wide">المكان</th>
                  <th class="one wide">عددالمشاركين</th>
                  <th class="two wide">المشرف</th>
                  <th class="two wide">الدرجة العلمية</th>
                  <th class="three wide">تاريخ البداية</th>
                  <th class="three wide">تاريخ الأنتهاء</th>
                  <th class="three wide"> المشاركين</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="table workshop">
            <table width="100%" cellspacing="0" id="workshop" class="ui table large unstackable compact selectable collapsing celled right aligned striped pink main">
              <thead class = "teal">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="three wide"> العنوان / الموضوع </th>
                  <th class="two wide">المكان</th>
                  <th class="one wide">عددالمشاركين</th>
                  <th class="two wide">المقدم</th>
                  <th class="two wide">الدرجة العلمية</th>
                  <th class="three wide">تاريخ البداية</th>
                  <th class="three wide">تاريخ الأنتهاء</th>
                  <th class="three wide"> المشاركين</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="table training">
            <table width="100%" cellspacing="0" id="training" class="ui table large unstackable compact selectable collapsing celled right aligned striped grey main">
              <thead class = "teal">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="three wide"> العنوان / الموضوع </th>
                  <th class="two wide">المكان</th>
                  <th class="one wide">عددالمشاركين</th>
                  <th class="two wide">المشرف</th>
                  <th class="two wide">الدرجة العلمية</th>
                  <th class="three wide">تاريخ البداية</th>
                  <th class="three wide">تاريخ الأنتهاء</th>
                  <th class="three wide"> المشاركين</th>
                  <th style="text-align:center">حذف</th>
                </tr>
              </thead>
            </table>
          </div>
          <div class="table discharge-end">
            <table width="100%" cellspacing="0" id="discharge-end" class="ui table large unstackable compact selectable collapsing celled right aligned striped pink main">
              <thead class = "teal">
                <tr>
                  <th style="width: 10px">#</th>
                  <th class="two wide">أسم</th>
                  <th class="two wide">الكلية</th>
                  <th class="two wide">القسم</th>
                  <th class="two wide">الدرجة العلمية</th>
                  <th class="two wide"> رقم الهاتف</th>
                  <th class="two wide">تاريخ البداية</th>
                  <th class="two wide">تاريخ الأنتهاء</th>
                  <th class="two wide">قبل (يوم)</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="form/js/jquery-3.3.1.min.js"  ></script>
  <script type="text/javascript" src="form/js/popper.min.js"  ></script>
  <script type="text/javascript" src="report/js/sematic-calendar.js"></script>
  <script type="text/javascript" src="report/js/semantic.min.js"></script>
  <script type="text/javascript" src="report/js/jszip.min.js"></script>
  <script type="text/javascript" src="report/js/pdfmake.min.js"></script>
  <script type="text/javascript" src="report/js/vfs_fonts.js"></script>
  <script type="text/javascript" src="report/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.semanticui.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.autoFill.min.js"></script>
  <script type="text/javascript" src="report/js/autoFill.semanticui.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="report/js/buttons.semanticui.min.js"></script>
  <script type="text/javascript" src="report/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="report/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="report/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="report/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.colReorder.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.fixedColumns.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.fixedHeader.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.keyTable.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="report/js/responsive.semanticui.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.rowGroup.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.rowReorder.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.scroller.min.js"></script>
  <script type="text/javascript" src="report/js/dataTables.select.min.js"></script>
  <script type="text/javascript" src="report/js/main.js"></script>  
</html>