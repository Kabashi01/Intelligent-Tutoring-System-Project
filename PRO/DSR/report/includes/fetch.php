<?php
//fetch.php
header('Access-Control-Allow-Origin: *');
$connect = mysqli_connect("localhost", "root", "", "dsr");
mysqli_query($connect,"SET NAMES 'utf8'");
mysqli_query($connect,'SET CHARACTER SET utf8');
if(isset($_POST['now'])){
    
    if($_POST['now']== 'research'){
        $columns = array('research.id','`research-name`','tname','cname','dname','dename','phone','`start-date`', '`end-date`',
                        'donor','amount','rate','abstract','device');
        $global = " FROM research LEFT JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id LEFT JOIN department ON `teacher`.`dept_id`=department.id 
                    LEFT JOIN collage on `department`.`collage_id` = collage.id LEFT JOIN degree on `teacher`.`degree_id` = degree.id ";
        if(isset($_POST['key'])){
            //donor
            if($_POST['key'] == "donor"){
                $response = "<option selected value=''>الجهة المانحة</option>";
                $q = "SELECT DISTINCT donor FROM research ORDER BY id ASC";
                $result = mysqli_query($connect, $q);
                while($row = mysqli_fetch_array($result)){
                    if(!empty($row["donor"]))
                        $response.= '<option value="'.$row["donor"].'">'.$row["donor"].'</option>';
                    }
                exit($response);
            }
            //collage
            if($_POST['key'] == "collage-r"){
                $response = "<option selected value=''>الكلية</option>";
                $q = "SELECT DISTINCT collage.name AS cname ".$global;
                $result = mysqli_query($connect, $q);
                while($row = mysqli_fetch_array($result)){
                    if(!empty($row["cname"]))
                        $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
                    }
                exit($response);
            }
        }
        $query = "SELECT research.id AS rid,`research-name`,teacher.phone ,`start-date`,`end-date`,donor,amount,currency,rate,abstract,device, teacher.name AS tname, department.name AS dname ,
                    degree.name AS dename , collage.name AS cname FROM research LEFT JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id 
                    LEFT JOIN department ON `teacher`.`dept_id`=department.id LEFT JOIN collage on `department`.`collage_id` = collage.id LEFT JOIN 
                    degree on `teacher`.`degree_id` = degree.id WHERE ";
        $data = json_decode($_POST['research']);

        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`end-date` BETWEEN "'.$data->start_date.'" AND "'.$data->end_date.'" AND ';
        }

        if(!empty($data->donor)){
            $query .= "donor = '".$data->donor."' AND ";
        }

        if(!empty($data->collage)){
            $query .= "collage.name = '".$data->collage."' AND ";
        }

        if(isset($_POST["search"]["value"])){
            $query .= '
                (`research-name` LIKE "%'.$_POST["search"]["value"].'%"
                OR teacher.name LIKE "%'.$_POST["search"]["value"].'%"
                OR collage.name LIKE "%'.$_POST["search"]["value"].'%"
                OR department.name LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR phone LIKE "%'.$_POST["search"]["value"].'%"
                OR `start-date` LIKE "%'.$_POST["search"]["value"].'%" 
                OR `end-date` LIKE "%'.$_POST["search"]["value"].'%" 
                OR donor LIKE "%'.$_POST["search"]["value"].'%"
                OR amount LIKE "%'.$_POST["search"]["value"].'%"
                OR rate LIKE "%'.$_POST["search"]["value"].'%"
                OR abstract LIKE "%'.$_POST["search"]["value"].'%"
                OR device LIKE "%'.$_POST["search"]["value"].'%")
                ';
        }

        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY research.id ';
        }

        $query1 = '';

        if($_POST["length"] != -1){
            $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

        $result = mysqli_query($connect, $query . $query1);

        $data = array();
        $i = 1;
        $today = date("Y-m-d");
        $status = "";
        while($row = mysqli_fetch_array($result)){
            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = $row["research-name"];
            $sub_array[] = $row["tname"];
            $sub_array[] = $row["cname"];
            $sub_array[] = $row["dname"];
            $sub_array[] = $row["dename"];
            $sub_array[] = $row["phone"];
            $sub_array[] = $row["start-date"];
            $sub_array[] = $row["end-date"];
            $sub_array[] = $row["donor"];
            if($row['currency'] == 1)
                $sub_array[] = '$ '.$row["amount"];
            else if($row['currency'] == 2)
                $sub_array[] = $row["amount"];
            else $sub_array[] = $row["amount"];
            $sub_array[] = $row["rate"];
            $sub_array[] = $row["abstract"];
            $sub_array[] = $row["device"];
            if($row["end-date"] < $today)
                $status = 1;
            else
                $status = 0;
            $sub_array[] = $status;
            $sub_array[] = '<button type="button"  id="'.$row["rid"].'" class="ui button icon small deleteResearch"><i class="trash icon"></i></button>';
            $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT `research-name`,teacher.phone ,`start-date`,`end-date`,donor,amount,rate,abstract,device, teacher.name AS tname, department.name AS dname ,
                        degree.name AS dename , collage.name AS cname FROM research LEFT JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id LEFT JOIN 
                        department ON `teacher`.`dept_id`=department.id LEFT JOIN collage on `department`.`collage_id` = collage.id LEFT JOIN degree on `teacher`.`degree_id`
                        = degree.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  get_all_data($connect),
            "recordsFiltered" => $number_filter_row,
            "data"    => $data
        );

        echo json_encode($output);
        // END OF RESEARCH
    }else if($_POST['now']== 'journal'){
        $columns = array('j.id','nameAr','nameEn','editor','pp.name','pe.name','pa.name','pen.name','sp.name','se.name','firstPublishDate','currentPublishPaper',
            'numPaperInPublish','numPaperInYear','ia.name','ea.name','numArbitrator','paidArbitration','fa.name','stopReason','incomeResource','publishArea',
            'journalAssets','journalHr','journalProblem','journalSolution','impactFactor','email','phone');
        $global = "SELECT j.id AS jid,nameAr,nameEn,editor,pp.name AS PP,pe.name AS PE,pa.name AS PA,pen.name AS PEN,sp.name AS SP,se.name AS SE,j.firstPublishDate,
            j.currentPublishPaper,j.numPaperInPublish,j.numPaperInYear,ia.name AS IA,ea.name AS EA,j.numArbitrator,j.paidArbitration,fa.name AS FA,j.stopReason,
            j.incomeResource,j.publishArea,j.journalAssets,j.journalHr,j.journalProblem,j.journalSolution,j.impactFactor,j.email,j.phone FROM journal AS j LEFT JOIN
            selector AS pp ON pp.id = j.publishPaperf LEFT JOIN selector AS pe ON j.publishElecf = pe.id LEFT JOIN selector AS pa ON j.publishArf = pa.id LEFT JOIN 
            selector AS pen ON pen.id = j.publishEnf LEFT JOIN selector AS sp ON sp.id = j.spreadPaperf LEFT JOIN selector AS se ON se.id = j.spreadElecf LEFT JOIN
            selector AS ia ON ia.id = j.internalArbitrationf LEFT JOIN selector AS ea ON ea.id=j.externalArbitrationf LEFT JOIN selector AS fa ON fa.id = j.freeArbitrationf";

        $query = $global." WHERE ";

        if(isset($_POST["search"]["value"])){
            $query .= '
                (nameAr LIKE "%'.$_POST["search"]["value"].'%"
                OR nameEn LIKE "%'.$_POST["search"]["value"].'%"
                OR editor LIKE "%'.$_POST["search"]["value"].'%"
                OR pp.name LIKE "%'.$_POST["search"]["value"].'%"
                OR pe.name LIKE "%'.$_POST["search"]["value"].'%"
                OR pa.name LIKE "%'.$_POST["search"]["value"].'%"
                OR pen.name LIKE "%'.$_POST["search"]["value"].'%"
                OR sp.name LIKE "%'.$_POST["search"]["value"].'%"
                OR se.name LIKE "%'.$_POST["search"]["value"].'%"
                OR firstPublishDate LIKE "%'.$_POST["search"]["value"].'%"
                OR currentPublishPaper LIKE "%'.$_POST["search"]["value"].'%"
                OR numPaperInPublish LIKE "%'.$_POST["search"]["value"].'%"
                OR numPaperInYear LIKE "%'.$_POST["search"]["value"].'%"
                OR ia.name LIKE "%'.$_POST["search"]["value"].'%"
                OR ea.name LIKE "%'.$_POST["search"]["value"].'%"
                OR numArbitrator LIKE "%'.$_POST["search"]["value"].'%"
                OR paidArbitration LIKE "%'.$_POST["search"]["value"].'%"
                OR fa.name LIKE "%'.$_POST["search"]["value"].'%"
                OR stopReason LIKE "%'.$_POST["search"]["value"].'%"
                OR incomeResource LIKE "%'.$_POST["search"]["value"].'%"
                OR publishArea LIKE "%'.$_POST["search"]["value"].'%"
                OR journalAssets LIKE "%'.$_POST["search"]["value"].'%"
                OR journalHr LIKE "%'.$_POST["search"]["value"].'%"
                OR journalProblem LIKE "%'.$_POST["search"]["value"].'%"
                OR journalSolution LIKE "%'.$_POST["search"]["value"].'%"
                OR impactFactor LIKE "%'.$_POST["search"]["value"].'%"
                OR email LIKE "%'.$_POST["search"]["value"].'%"
                OR phone LIKE "%'.$_POST["search"]["value"].'%"
            )';
        }

        if(isset($_POST["order"])){
            $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
        }else{
            $query .= ' ORDER BY j.id ';
        }

        $query1 = ' ';

        if($_POST["length"] != -1){
            $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

        $result = mysqli_query($connect, $query . $query1);

        $data = array();
        $i = 1;

        while($row = mysqli_fetch_array($result)){
            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = $row["nameAr"];
            $sub_array[] = $row["nameEn"];
            $sub_array[] = $row["editor"];
            $sub_array[] = $row["PP"];
            $sub_array[] = $row["PE"];
            $sub_array[] = $row["PA"];
            $sub_array[] = $row["PEN"];
            $sub_array[] = $row["SP"];
            $sub_array[] = $row["SE"];
            $sub_array[] = $row["firstPublishDate"];
            $sub_array[] = $row["currentPublishPaper"];
            $sub_array[] = $row["numPaperInPublish"];
            $sub_array[] = $row["numPaperInYear"];
            $sub_array[] = $row["IA"];
            $sub_array[] = $row["EA"];
            $sub_array[] = $row["numArbitrator"];
            $sub_array[] = $row["paidArbitration"];
            $sub_array[] = $row["FA"];
            $sub_array[] = $row["stopReason"];
            $sub_array[] = $row["incomeResource"];
            $sub_array[] = $row["publishArea"];
            $sub_array[] = $row["journalAssets"];
            $sub_array[] = $row["journalHr"];
            $sub_array[] = $row["journalProblem"];
            $sub_array[] = $row["journalSolution"];
            $sub_array[] = $row["impactFactor"];
            $sub_array[] = $row["email"];
            $sub_array[] = $row["phone"];
            $sub_array[] = '<button style="margin:0 auto" type="button"  id="'.$row["jid"].'" class="ui button icon small deleteJournal"><i class="trash icon"></i></button>';

            $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT nameAr,nameEn,editor,pp.name AS PP,pe.name AS PE,pa.name AS PA,pen.name AS PEN,sp.name AS SP,se.name AS SE,j.firstPublishDate,
            j.currentPublishPaper,j.numPaperInPublish,j.numPaperInYear,ia.name AS IA,ea.name AS EA,j.numArbitrator,j.paidArbitration,fa.name AS FA,j.stopReason,
            j.incomeResource,j.publishArea,j.journalAssets,j.journalHr,j.journalProblem,j.journalSolution,j.impactFactor,j.email,j.phone FROM journal AS j LEFT JOIN
            selector AS pp ON pp.id = j.publishPaperf LEFT JOIN selector AS pe ON j.publishElecf = pe.id LEFT JOIN selector AS pa ON j.publishArf = pa.id LEFT JOIN 
            selector AS pen ON pen.id = j.publishEnf LEFT JOIN selector AS sp ON sp.id = j.spreadPaperf LEFT JOIN selector AS se ON se.id = j.spreadElecf LEFT JOIN
            selector AS ia ON ia.id = j.internalArbitrationf LEFT JOIN selector AS ea ON ea.id=j.externalArbitrationf LEFT JOIN selector AS fa ON fa.id = j.freeArbitrationf";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  get_all_data($connect),
            "recordsFiltered" => $number_filter_row,
            "data"    => $data
        );

        echo json_encode($output);
        // END JOURNAL
    }else if($_POST['now']== 'discharge'){
        $columns = array('did', 'tname','tphone','dename','cname','deptname','DD','coname','RVDF','RVDT','RVN','EN','EN','activity','SE','RS');
        $global = "SELECT d.id AS did, country.name AS coname, activity,`request-support` AS RS,`support-edu` AS SE,`edu-name` AS EN,`request-vacation-num` AS RVN,
                    `request-vacation-date-to` AS RVDT,`request-vacation-date-from` AS RVDF,`promotion-date` AS PD,t.name AS tname,t.phone AS tphone,degree.name AS
                    dename,c.name AS cname,dept.name AS deptname,`designation-date` AS DD FROM discharge AS d LEFT JOIN teacher AS t ON  d.teacher_id = t.id
                    LEFT JOIN department AS dept ON dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN collage AS c ON dept.collage_id = c.id 
                    LEFT JOIN country ON `edu-countryf`= country.id";
        if(isset($_POST['key'])){
            //collage
            if($_POST['key'] == "collage-d"){
                $response = "<option selected value=''>الكلية</option>";
                $q = "SELECT DISTINCT c.name AS cname FROM discharge AS d LEFT JOIN teacher AS t ON  d.teacher_id = t.id LEFT JOIN department AS dept ON
                        dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN collage AS c ON dept.collage_id = c.id LEFT JOIN country ON 
                        `edu-countryf`= country.id";
                $result = mysqli_query($connect, $q);
                while($row = mysqli_fetch_array($result)){
                    if(!empty($row["cname"]))
                        $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
                    }
                exit($response);
            }
        }

        $data = json_decode($_POST['discharge']);

        $query = $global." WHERE ";

        if(!empty($data->collage)){
            $query .= "c.name = '".$data->collage."' AND ";
        }
        if(isset($_POST["search"]["value"])){
        $query .= '(
                t.name LIKE "%'.$_POST["search"]["value"].'%"
                OR t.phone LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR c.name LIKE "%'.$_POST["search"]["value"].'%"
                OR dept.name LIKE "%'.$_POST["search"]["value"].'%"
                OR country.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `designation-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `promotion-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-date-from` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-date-to` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-num` LIKE "%'.$_POST["search"]["value"].'%"
                OR `edu-name` LIKE "%'.$_POST["search"]["value"].'%"
                OR `edu-name` LIKE "%'.$_POST["search"]["value"].'%"
                OR activity LIKE "%'.$_POST["search"]["value"].'%"
                OR `support-edu` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-support` LIKE "%'.$_POST["search"]["value"].'%")';
        }
        if(isset($_POST["order"]))
            {
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
            }
        else{
            $query .= 'ORDER BY d.id ';
        }

            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result))
        {
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["tname"];
        $sub_array[] = $row["tphone"];
        $sub_array[] = $row["dename"];
        $sub_array[] = $row["cname"];
        $sub_array[] = $row["deptname"];
        $sub_array[] = $row["DD"];
        $sub_array[] = $row["PD"];
        $sub_array[] = $row["RVDF"];
        $sub_array[] = $row["RVDT"];
        $sub_array[] = $row["RVN"];
        $sub_array[] = $row["EN"];
        $sub_array[] = $row["coname"];
        $sub_array[] = $row["activity"];
        $sub_array[] = $row["SE"];
        $sub_array[] = $row["RS"];
        $sub_array[] = '<button type="button"  id="'.$row["did"].'" class="ui button icon small deleteDischarge"><i class="trash icon"></i></button>';

        $data[] = $sub_array;
        }

        function get_all_data($connect)
        {
            $query = "SELECT t.name AS tname,t.phone AS tphone,degree.name AS dename,c.name AS cname,dept.name AS deptname FROM discharge AS d LEFT JOIN teacher AS t ON  d.teacher_id = t.id LEFT JOIN department AS dept ON
            dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN collage AS c ON dept.collage_id = c.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'foreign'){
        $columns = array('fore_id', 'fname','edu','fcollage','receive_collage','startDate','endDate','reason');
        $global = "SELECT fore.id AS fore_id,fore.name AS fname,edu,collage AS fcollage,c.name AS receive_collage,`start-date` AS startDate,`end-date` AS endDate 
                    ,reason FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
        if(isset($_POST['key'])){
            //collage
            if($_POST['key'] == "collage-f"){
                $response = "<option selected value=''>الكلية المستقبلة</option>";
                $q = "SELECT DISTINCT c.name AS cname FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
                $result = mysqli_query($connect, $q);
                while($row = mysqli_fetch_array($result)){
                    if(!empty($row["cname"]))
                        $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
                    }
                exit($response);
            }
        }

        $data = json_decode($_POST['foreign']);

        $query = $global." WHERE ";
        //DATE FILTER
        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`end-date` BETWEEN "'.$data->start_date.'" AND "'.$data->end_date.'" AND ';
        }

        if(!empty($data->collage)){
            $query .= "c.name = '".$data->collage."' AND ";
        }
        if(isset($_POST["search"]["value"])){
            $query .= '(
                fore.name LIKE "%'.$_POST["search"]["value"].'%"
                OR edu LIKE "%'.$_POST["search"]["value"].'%"
                OR fore.collage LIKE "%'.$_POST["search"]["value"].'%"
                OR c.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `start-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `end-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR reason LIKE "%'.$_POST["search"]["value"].'%"
                )';
        }
        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
        }else{
            $query .= 'ORDER BY fore.id ';
        }

            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result))
        {
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["fname"];
        $sub_array[] = $row["edu"];
        $sub_array[] = $row["fcollage"];
        $sub_array[] = $row["receive_collage"];
        $sub_array[] = $row["startDate"];
        $sub_array[] = $row["endDate"];
        $sub_array[] = $row["reason"];
        $sub_array[] = '<button type="button"  id="'.$row["fore_id"].'" class="ui button icon small deleteForeign"><i class="trash icon"></i></button>';

        $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT fore.id AS fore_id,fore.name AS fname,edu,collage AS fcollage,c.name AS receive_collage,`start-date` AS startDate,`end-date` AS endDate 
                        ,reason FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'exhibition'){
        $columns = array( 'ex.id','ex_name','place','`participant-num`','presenter','de_name','startDate','endDate','participant');
        $global = "SELECT ex.id AS exid,ex.name AS ex_name,place,`participant-num`,presenter,`start-date` AS startDate ,`end-date` AS endDate ,participant,
                    degree.name AS de_name FROM exhibition AS ex LEFT JOIN degree ON `ex`.`presenter-degree`=degree.id";
        // if(isset($_POST['key'])){
        //     //collage
        //     if($_POST['key'] == "collage-f"){
        //         $response = "<option selected value=''>الكلية المستقبلة</option>";
        //         $q = "SELECT DISTINCT c.name AS cname FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
        //         $result = mysqli_query($connect, $q);
        //         while($row = mysqli_fetch_array($result)){
        //             if(!empty($row["cname"]))
        //                 $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
        //             }
        //         exit($response);
        //     }
        // }

        $data = json_decode($_POST['exhibition']);

        $query = $global." WHERE ";
        //DATE FILTER
        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`end-date` BETWEEN "'.$data->end_date.'" AND "'.$data->end_date.'" AND ';
        }

        // if(!empty($data->collage)){
        //     $query .= "c.name = '".$data->collage."' AND ";
        // }
        if(isset($_POST["search"]["value"])){
            $query .= '(
                ex.name LIKE "%'.$_POST["search"]["value"].'%"
                OR place LIKE "%'.$_POST["search"]["value"].'%"
                OR `participant-num` LIKE "%'.$_POST["search"]["value"].'%"
                OR presenter LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `start-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `end-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR participant LIKE "%'.$_POST["search"]["value"].'%"
                )';
        }
        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
        }else{
            $query .= 'ORDER BY ex.id ';
        }

            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result)){
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["ex_name"];
        $sub_array[] = $row["place"];
        $sub_array[] = $row["participant-num"];
        $sub_array[] = $row["presenter"];
        $sub_array[] = $row["de_name"];
        $sub_array[] = $row["startDate"];
        $sub_array[] = $row["endDate"];
        $sub_array[] = $row["participant"];
        $sub_array[] = '<button type="button"  id="'.$row["exid"].'" class="ui button icon small deleteExhibition"><i style="text-align:center" class="trash icon"></i></button>';

        $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT ex.id FROM exhibition AS ex LEFT JOIN degree ON `ex`.`presenter-degree`=degree.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'workshop'){
        $columns = array( 'wo.id','wo_name','place','`participant-num`','presenter','de_name','startDate','endDate','participant');
        $global = "SELECT wo.id AS woid,wo.name AS wo_name,place,`participant-num`,presenter,`start-date` AS startDate ,`end-date` AS endDate ,participant,
                    degree.name AS de_name FROM workshop AS wo LEFT JOIN degree ON `wo`.`presenter-degree`=degree.id";
        // if(isset($_POST['key'])){
        //     //collage
        //     if($_POST['key'] == "collage-f"){
        //         $response = "<option selected value=''>الكلية المستقبلة</option>";
        //         $q = "SELECT DISTINCT c.name AS cname FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
        //         $result = mysqli_query($connect, $q);
        //         while($row = mysqli_fetch_array($result)){
        //             if(!empty($row["cname"]))
        //                 $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
        //             }
        //         exit($response);
        //     }
        // }

        $data = json_decode($_POST['workshop']);

        $query = $global." WHERE ";
        //DATE FILTER
        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`end-date` BETWEEN "'.$data->end_date.'" AND "'.$data->end_date.'" AND ';
        }

        // if(!empty($data->collage)){
        //     $query .= "c.name = '".$data->collage."' AND ";
        // }
        if(isset($_POST["search"]["value"])){
            $query .= '(
                wo.name LIKE "%'.$_POST["search"]["value"].'%"
                OR place LIKE "%'.$_POST["search"]["value"].'%"
                OR `participant-num` LIKE "%'.$_POST["search"]["value"].'%"
                OR presenter LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `start-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `end-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR participant LIKE "%'.$_POST["search"]["value"].'%"
                )';
        }
        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
        }else{
            $query .= 'ORDER BY wo.id ';
        }

            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result)){
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["wo_name"];
        $sub_array[] = $row["place"];
        $sub_array[] = $row["participant-num"];
        $sub_array[] = $row["presenter"];
        $sub_array[] = $row["de_name"];
        $sub_array[] = $row["startDate"];
        $sub_array[] = $row["endDate"];
        $sub_array[] = $row["participant"];
        $sub_array[] = '<button type="button"  id="'.$row["woid"].'" class="ui button icon deleteWorkshop"><i class="trash icon"></i></button>';

        $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT wo.id FROM workshop AS wo LEFT JOIN degree ON `wo`.`presenter-degree`=degree.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'training'){
        $columns = array( 'tr.id','tr_name','place','`participant-num`','presenter','de_name','startDate','endDate','participant');
        $global = "SELECT tr.id AS trid,tr.name AS tr_name,place,`participant-num`,presenter,`start-date` AS startDate ,`end-date` AS endDate ,participant,
                    degree.name AS de_name FROM training AS tr LEFT JOIN degree ON `tr`.`presenter-degree`=degree.id";
        // if(isset($_POST['key'])){
        //     //collage
        //     if($_POST['key'] == "collage-f"){
        //         $response = "<option selected value=''>الكلية المستقبلة</option>";
        //         $q = "SELECT DISTINCT c.name AS cname FROM foreign_teacher AS fore LEFT JOIN collage AS c ON fore.receive = c.id";
        //         $result = mysqli_query($connect, $q);
        //         while($row = mysqli_fetch_array($result)){
        //             if(!empty($row["cname"]))
        //                 $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
        //             }
        //         exit($response);
        //     }
        // }

        $data = json_decode($_POST['training']);

        $query = $global." WHERE ";
        //DATE FILTER
        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`end-date` BETWEEN "'.$data->end_date.'" AND "'.$data->end_date.'" AND ';
        }

        // if(!empty($data->collage)){
        //     $query .= "c.name = '".$data->collage."' AND ";
        // }
        if(isset($_POST["search"]["value"])){
            $query .= '(
                tr.name LIKE "%'.$_POST["search"]["value"].'%"
                OR place LIKE "%'.$_POST["search"]["value"].'%"
                OR `participant-num` LIKE "%'.$_POST["search"]["value"].'%"
                OR presenter LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `start-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR `end-date` LIKE "%'.$_POST["search"]["value"].'%"
                OR participant LIKE "%'.$_POST["search"]["value"].'%"
                )';
        }
        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
        }else{
            $query .= 'ORDER BY tr.id ';
        }

            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result)){
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["tr_name"];
        $sub_array[] = $row["place"];
        $sub_array[] = $row["participant-num"];
        $sub_array[] = $row["presenter"];
        $sub_array[] = $row["de_name"];
        $sub_array[] = $row["startDate"];
        $sub_array[] = $row["endDate"];
        $sub_array[] = $row["participant"];
        $sub_array[] = '<button  id="'.$row["trid"].'" class="ui button icon small deleteTraining"><i class="trash icon"></i></button>';

        $data[] = $sub_array;
        }

        function get_all_data($connect){
            $query = "SELECT tr.id FROM training AS tr LEFT JOIN degree ON `tr`.`presenter-degree`=degree.id";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'discharge-end'){
        $today = date("Y-m-d");
        $columns = array('did', 'tname','cname','deptname','dename','tphone','RVDF','RVDT');
        $global = "SELECT d.id AS did,`request-vacation-num` AS RVN,`request-vacation-date-to` AS RVDT,`request-vacation-date-from` AS RVDF,
                    t.name AS tname,t.phone AS tphone,degree.name AS dename,c.name AS cname,dept.name AS deptname FROM discharge AS d LEFT JOIN 
                    teacher AS t ON  d.teacher_id = t.id LEFT JOIN department AS dept ON dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN
                    collage AS c ON dept.collage_id = c.id";

        // if(isset($_POST['key'])){
        //     //collage
        //     if($_POST['key'] == "collage-d"){
        //         $response = "<option selected value=''>الكلية</option>";
        //         $q = "SELECT DISTINCT c.name AS cname FROM discharge AS d LEFT JOIN teacher AS t ON  d.teacher_id = t.id LEFT JOIN department AS dept ON
        //                 dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN collage AS c ON dept.collage_id = c.id LEFT JOIN country ON 
        //                 `edu-countryf`= country.id";
        //         $result = mysqli_query($connect, $q);
        //         while($row = mysqli_fetch_array($result)){
        //             if(!empty($row["cname"]))
        //                 $response.= '<option value="'.$row["cname"].'">'.$row["cname"].'</option>';
        //             }
        //         exit($response);
        //     }
        // }

        $data = json_decode($_POST['dischargeEnd']);

        $query = $global." WHERE `request-vacation-date-to` < '$today' AND ";

        if(!empty($data->start_date)&&!empty($data->start_date)){
            $query .= '`request-vacation-date-to` BETWEEN "'.$data->start_date.'" AND "'.$data->end_date.'" AND ';
        }

        // if(!empty($data->collage)){
        //     $query .= "c.name = '".$data->collage."' AND ";
        // }
        if(isset($_POST["search"]["value"])){
        $query .= '(
                t.name LIKE "%'.$_POST["search"]["value"].'%"
                OR t.phone LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR c.name LIKE "%'.$_POST["search"]["value"].'%"
                OR dept.name LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-date-from` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-date-to` LIKE "%'.$_POST["search"]["value"].'%"
                OR `request-vacation-num` LIKE "%'.$_POST["search"]["value"].'%")';
        }
        if(isset($_POST["order"]))
            {
            $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
            ';
            }
            $query1 = '';

        if($_POST["length"] != -1){
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

            $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

            $result = mysqli_query($connect, $query . $query1);

            $data = array();
            $i = 1;

        while($row = mysqli_fetch_array($result))
        {
        $sub_array = array();

        $sub_array[] = $i++;
        $sub_array[] = $row["tname"];
        $sub_array[] = $row["cname"];
        $sub_array[] = $row["deptname"];
        $sub_array[] = $row["dename"];
        $sub_array[] = $row["tphone"];
        $sub_array[] = $row["RVDF"];
        $sub_array[] = $row["RVDT"];
        $sub_array[] = floor((strtotime($today)- strtotime($row['RVDT']))/24/3600);

        $data[] = $sub_array;
        }

        function get_all_data($connect){
            $today = date("Y-m-d");
            $query = "SELECT d.id AS did FROM discharge AS d LEFT JOIN  teacher AS t ON  d.teacher_id = t.id LEFT JOIN department AS dept
             ON dept.id = t.dept_id LEFT JOIN degree ON t.degree_id = degree.id LEFT JOIN
            collage AS c ON dept.collage_id = c.id WHERE `request-vacation-date-to` < '$today'";
            $result = mysqli_query($connect, $query);
            return mysqli_num_rows($result);
        }

        $output = array(
        "draw"    => intval($_POST["draw"]),
        "recordsTotal"  =>  get_all_data($connect),
        "recordsFiltered" => $number_filter_row,
        "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['now']== 'deleteJournal'){
        if(isset($_POST["journalId"])){
            $query = "DELETE FROM `journal` WHERE `id` = '".$_POST["journalId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteResearch'){
        if(isset($_POST["researchId"])){
            $query = "DELETE FROM `research` WHERE `id` = '".$_POST["researchId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteDischarge'){
        if(isset($_POST["dischargeId"])){
            $query = "DELETE FROM `discharge` WHERE `id` = '".$_POST["dischargeId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteExhibition'){
        if(isset($_POST["exhibitionId"])){
            $query = "DELETE FROM `exhibition` WHERE `id` = '".$_POST["exhibitionId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteForeign'){
        if(isset($_POST["foreignId"])){
            $query = "DELETE FROM `foreign_teacher` WHERE `id` = '".$_POST["foreignId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteWorkshop'){
        if(isset($_POST["workshopId"])){
            $query = "DELETE FROM `workshop` WHERE `id` = '".$_POST["workshopId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }else if($_POST['now']== 'deleteTraining'){
        if(isset($_POST["trainingId"])){
            $query = "DELETE FROM `training` WHERE `id` = '".$_POST["trainingId"]."'";
            $statement = $connect->prepare($query);
            $statement->execute();
            echo json_encode($_POST['Data Deleted']);
        }
    }
}

?>