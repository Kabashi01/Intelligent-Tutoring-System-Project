$(document).ready(function(){
    if(localStorage.getItem('name') == 'notify'){
        var now = "discharge-end";
        $('.main').hide();
        $('input.green').hide();
        $('input.orange').hide();
        $('#discharge-end').show();
        $('#reset-discharge-end').show();
        $('#search-discharge-end').show();
        $('title').html('انتهاء الإجازة العلمية');
        localStorage.setItem('name'," ");
    }else{
        var now = "research";
        $('.main').hide();
        $('input.green').hide();
        $('input.orange').hide();
        $('#research').show();
        $('#reset-research').show();
        $('#search-research').show();
    }
    var navList = $('.labeled a');
    navList.click(function(){
        if($(this)[0].name != now){
            $('.main').hide();
            $('input.green').hide();
            $('input.orange').hide();
            now = $(this)[0].name;
            $('#'+now).show();
            $('#search-'+now).show();
            $('#reset-'+now).show();  
            var grap = $(this)[0].text;
            $('#grap').html(grap);
            $('title').html(grap);
            Main(now);
        }
    });
    Main(now);
    //GLOBAL FUNCTION  //get select
    function getSelect (key,now) {  
        //get order data//get collage
        $.ajax({
            url:"report/includes/fetch.php",
            type:"POST",
            dataType: "text",
            data:{
                key: key,
                now: now
            },success: function(res) {
                $('#'+key).html(res);
            }
        });
    }
    //MAIN FUNCTION 
    function Main(now){
        if(now == 'research'){
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            getSelect('collage-r',now);
            getSelect('donor',now);
            //put filter data in this object
            var research = {};   
            function fetch_data(data =""){
                var dataTable = $('#research').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    research: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide hover column'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",    
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            //stripHtml:false
                        }
                    }
                      ],
                      columnDefs: [
                          {
                              'targets': [4,5,6,13,14] ,
                              visible: false
                          },
                          { "orderable": false, "targets": [0,3,9,15] },
                      
                       ],"lengthMenu": [[-1, 50, 25, 10,5], ["All", 50, 25, 10,5]],
                       "createdRow": function (row, data, dataIndex) {
                        if (Number(data[14]) == 1)  {
                            $(row).addClass("high");
                        }
                    }
                });
            }
            fetch_data();
            $('#search-research').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                research.start_date = start_date;
                research.end_date = end_date;
                if(start_date != '' && end_date !=''){
                    $('#research').DataTable().destroy();
                    research.donor = "";
                    fetch_data(research);            
                }
                else{
                    $('#research').DataTable().destroy();
                    fetch_data();
                }
            });
            // FILTER BY SELECT
            $(document).on('change', '.research th select', function(){
                var target = $(this).val();
                var current = $(this).attr('id');
                $('#research').DataTable().destroy();
                if(current == 'donor')
                    research.donor = target;
                if(current == 'collage-r')
                        research.collage = target;
                fetch_data(research);
            });
            //Reset Filter
            $('#reset-research').click(function(){
                $('#research').DataTable().destroy();
                research = {};
                $('.set').val("");
                fetch_data(research);
                getSelect('collage-r',now);
                getSelect('donor',now);
            });

            $(document).on('click', '.deleteResearch', function(){
                var id = $(this).attr('id');
                if(confirm('are you sure?')){
                    $.ajax({
                        url:"report/includes/fetch.php",
                        method:"POST",
                        data:{
                            now: 'deleteResearch',
                            researchId:id
                        },
                        success:function(data){
                            $('#research').DataTable().destroy();
                            fetch_data();
                        }
                    })
                }
            });
            //END OF RESEARCH
            // START OF JOURNAL
        }
        else if(now == 'journal'){
            $('#research').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            var journal = {};
            function fetch_data(data =""){
                var dataJournal = $('#journal').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                select:{
                    selector: 'td:not(.deleteJournal)'
                },
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ {
                    extend: 'colvis',
                    postfixButtons: [ 'colvisRestore' ]
                },{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible:not(:last-child)'
                    }
                },{
                    extend: 'print',
                    customize:function(win){
                        $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                        $(win.document.body).css('font-size','12px');
                        //$(win.document.body).css('margin','0 auto');
                    },
                    exportOptions: {
                        columns: ':visible:not(:last-child)',
                        stripHtml:false
                    }
                }
                ],
                    columnDefs: [
                        {
                            'targets': [19,20,22,23,24,25,26,27,28] ,
                            visible: false
                        },
                        {
                        "orderable": false, "targets": [0,29] 
                    }],
                        "lengthMenu": [[-1, 50, 25, 5], ["All", 50, 25, 5]]
                });
            }
        
            fetch_data();

            //reset filter
            $('#reset-journal').click(function(){
                $('#journal').DataTable().destroy();
                journal = {};
                $('.set').val("");
                fetch_data();
             });

            $(document).on('click', '.deleteJournal', function(){
                var id = $(this).attr('id');
                if(confirm('are you sure?')){
                    $.ajax({
                        url:"report/includes/fetch.php",
                        method:"POST",
                        data:{
                            now: 'deleteJournal',
                            journalId:id
                        },
                        success:function(data){
                            $('#journal').DataTable().destroy();
                            fetch_data();
                        }
                    })
                }
            });
        }
        else if(now == 'discharge'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            getSelect('collage-d',now);
            var discharge = {};
            function fetch_data(data =""){
                var dataTable = $('#discharge').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    discharge: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            //stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [2,6,7] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,4,16] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]]
                });
            }
            fetch_data();
            //FILTER SELECT
            $(document).on('change', '.discharge th select', function(){
                var target = $(this).val();
                var current = $(this).attr('id');
                console.log(target);
                $('#discharge').DataTable().destroy();
                if(current == 'collage-d')
                    discharge.collage = target;
                fetch_data(discharge);
             });
             //reset filter
             $('#reset-discharge').click(function(){
                $('#discharge').DataTable().destroy();
                discharge = {};
                $('.set').val("");
                fetch_data();
                getSelect('collage-d',now);
             });
            //search
            $('#search-discharge').click(function(){
                console.log('search');
            });
            $(document).on('click', '.deleteDischarge', function(){
                var id = $(this).attr('id');
                if(confirm('are you sure?')){
                    $.ajax({
                        url:"report/includes/fetch.php",
                        method:"POST",
                        data:{
                            now: 'deleteDischarge',
                            dischargeId:id
                        },
                        success:function(data){
                            $('#discharge').DataTable().destroy();
                            fetch_data();
                        }
                    })
                }
            });
        }
        else if(now == 'foreign'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            getSelect('collage-f',now);
            var foreign = {};
            function fetch_data(data =""){
                var dataTable = $('#foreign').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    foreign: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            ,stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,4] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]]
                });
            }
            fetch_data();
            //FILTER SELECT
            $(document).on('change', '.foreign th select', function(){
                var target = $(this).val();
                var current = $(this).attr('id');
                $('#foreign').DataTable().destroy();
                if(current == 'collage-f')
                foreign.collage = target;
                fetch_data(foreign);
             });
             //reset filter
             $('#reset-foreign').click(function(){
                $('#foreign').DataTable().destroy();
                foreign = {};
                $('.set').val("");
                fetch_data();
                getSelect('collage-f',now);
             });
            //search
            $('#search-foreign').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                foreign.start_date = start_date;
                foreign.end_date = end_date;
                if(start_date != '' && end_date !=''){
                    $('#foreign').DataTable().destroy();
                    foreign.donor = "";
                    fetch_data(foreign);            
                }
                else{
                    $('#foreign').DataTable().destroy();
                    fetch_data();
                }
            });

            $(document).on('click', '.deleteForeign', function(){
                var id = $(this).attr('id');
                if(confirm('are you sure?')){
                    $.ajax({
                        url:"report/includes/fetch.php",
                        method:"POST",
                        data:{
                            now: 'deleteForeign',
                            foreignId:id
                        },
                        success:function(data){
                            $('#foreign').DataTable().destroy();
                            fetch_data();
                        }
                    })
                }
            });
        }
        else if(now == 'exhibition'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            //getSelect('collage-ex',now);
            var exhibition = {};
            function fetch_data(data =""){
                var dataTable = $('#exhibition').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    exhibition: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            ,stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,9] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]]
                });
            }
            fetch_data();
            //FILTER SELECT
            // $(document).on('change', '.exhibition th select', function(){
            //     var target = $(this).val();
            //     var current = $(this).attr('id');
            //     $('#exhibition').DataTable().destroy();
            //     if(current == 'collage-ex')
            //     exhibition.collage = target;
            //     fetch_data(exhibition);
            //  });
             //reset filter
             $('#reset-exhibition').click(function(){
                $('#exhibition').DataTable().destroy();
                exhibition = {};
                $('.set').val("");
                fetch_data();
                //getSelect('collage-ex',now);
             });
            //search
            $('#search-exhibition').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                exhibition.start_date = start_date;
                exhibition.end_date = end_date;
                if(start_date != '' && end_date !=''){
                    $('#exhibition').DataTable().destroy();
                    //exhibition.donor = "";
                    fetch_data(exhibition);            
                }
                else{
                    $('#exhibition').DataTable().destroy();
                    fetch_data();
                }
            });
            //delete
            $(document).on('click', '.deleteExhibition', function(){
                var id = $(this).attr('id');
                if(confirm('are you sure?')){
                    $.ajax({
                        url:"report/includes/fetch.php",
                        method:"POST",
                        data:{
                            now: 'deleteExhibition',
                            exhibitionId:id
                        },
                        success:function(data){
                            $('#exhibition').DataTable().destroy();
                            fetch_data();
                        }
                    })
                }
            });
        }
        else if(now == 'workshop'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#training').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            //getSelect('collage-ex',now);
            var workshop = {};
            function fetch_data(data =""){
                var dataTable = $('#workshop').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    workshop: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            ,stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,9] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]]
                });
            }
            fetch_data();
            //FILTER SELECT
            // $(document).on('change', '.exhibition th select', function(){
            //     var target = $(this).val();
            //     var current = $(this).attr('id');
            //     $('#exhibition').DataTable().destroy();
            //     if(current == 'collage-ex')
            //     exhibition.collage = target;
            //     fetch_data(exhibition);
            //  });
             //reset filter
             $('#reset-workshop').click(function(){
                $('#workshop').DataTable().destroy();
                workshop = {};
                $('.set').val("");
                fetch_data();
                //getSelect('collage-ex',now);
             });
            //search
            $('#search-workshop').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                workshop.start_date = start_date;
                workshop.end_date = end_date;
                if(start_date != '' && end_date !=''){
                    $('#workshop').DataTable().destroy();
                    //exhibition.donor = "";
                    fetch_data(workshop);            
                }
                else{
                    $('#workshop').DataTable().destroy();
                    fetch_data();
                }
        });
        //delete
        $(document).on('click', '.deleteWorkshop', function(){
            var id = $(this).attr('id');
            if(confirm('are you sure?')){
                $.ajax({
                    url:"report/includes/fetch.php",
                    method:"POST",
                    data:{
                        now: 'deleteWorkshop',
                        workshopId:id
                    },
                    success:function(data){
                        $('#workshop').DataTable().destroy();
                        fetch_data();
                    }
                })
            }
        });
        }
        else if(now == 'training'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#discharge-end').DataTable().destroy();
            //getSelect('collage-ex',now);
            var training = {};
            function fetch_data(data =""){
                var dataTable = $('#training').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    training: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible:not(:last-child)'
                            ,stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,9] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]]
                });
            }
            fetch_data();
            //FILTER SELECT
            // $(document).on('change', '.exhibition th select', function(){
            //     var target = $(this).val();
            //     var current = $(this).attr('id');
            //     $('#exhibition').DataTable().destroy();
            //     if(current == 'collage-ex')
            //     exhibition.collage = target;
            //     fetch_data(exhibition);
            //  });
             //reset filter
             $('#reset-training').click(function(){
                $('#training').DataTable().destroy();
                training = {};
                $('.set').val("");
                fetch_data();
                //getSelect('collage-ex',now);
             });
            //search
            $('#search-training').click(function(){
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                training.start_date = start_date;
                training.end_date = end_date;
                if(start_date != '' && end_date !=''){
                    $('#training').DataTable().destroy();
                    //exhibition.donor = "";
                    fetch_data(workshop);            
                }
                else{
                    $('#training').DataTable().destroy();
                    fetch_data();
                }
        }); 
        //delete
        $(document).on('click', '.deleteTraining', function(){
            var id = $(this).attr('id');
            if(confirm('are you sure?')){
                $.ajax({
                    url:"report/includes/fetch.php",
                    method:"POST",
                    data:{
                        now: 'deleteTraining',
                        trainingId:id
                    },
                    success:function(data){
                        $('#training').DataTable().destroy();
                        fetch_data();
                    }
                })
            }
        });
        }
        else if(now == 'discharge-end'){
            $('#research').DataTable().destroy();
            $('#journal').DataTable().destroy();
            $('#discharge').DataTable().destroy();
            $('#foreign').DataTable().destroy();
            $('#exhibition').DataTable().destroy();
            $('#workshop').DataTable().destroy();
            $('#training').DataTable().destroy();
            //getSelect('collage-ex',now);
            var dischargeEnd = {};
            function fetch_data(data =""){
                var dataTable = $('#discharge-end').DataTable({
                "processing" : true,
                "serverSide" : true,
                "orderable": true,
                "scrollX": true,
                "scrollY": true,
                "fixedColumns": true,
                "order": [[ 7, "desc" ]],
                "ajax" : {
                url:"report/includes/fetch.php",
                type:"POST",
                dataType: "JSON",
                data:{
                    now: now,
                    dischargeEnd: JSON.stringify(data)
                    }
                },dom: "<'ui stackable mt grid'"+
                "<'row p'"+
                    "<' five wide column'f>"+
                    "<' center aligned six wide column hover'B>"+
                    "<' right aligned five wide column'l>"+
                ">"+
                "<'row pt'"+
                    "<'sixsteen wide rtl mx column't>"+
                ">"+
                "<'row'"+
                    "<'center aligned  four wide column'i>"+
                    "<'seven wide center aligned  column'p>"+
                ">"+">",
                buttons: [ 
                    {
                        extend: 'colvis',
                        postfixButtons: [ 'colvisRestore' ]
                    },{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },{
                        extend: 'print',
                        customize:function(win){
                            $(win.document.body).css('direction','RTL').find('table').addClass('compact');
                            $(win.document.body).css('font-size','12px');
                            //$(win.document.body).css('margin','0 auto');
                        },
                        exportOptions: {
                            columns: ':visible'
                            ,stripHtml:false
                        }
                    }
                ],
                columnDefs: [ {
                    'targets': [] ,
                    visible: false
                },{
                     "orderable": false, "targets": [0,8] 
                },]
                ,"lengthMenu": [[-1, 50, 25, 10], ["All", 50, 25, 10]],
                "createdRow": function (row, data, dataIndex) {
                    if (Number(data[8]) < 8) {
                        $(row).addClass("high");
                    }
                }
                });
            }
            fetch_data();
                //FILTER SELECT
                // $(document).on('change', '.exhibition th select', function(){
                //     var target = $(this).val();
                //     var current = $(this).attr('id');
                //     $('#exhibition').DataTable().destroy();
                //     if(current == 'collage-ex')
                //     exhibition.collage = target;
                //     fetch_data(exhibition);
                //  });
                //reset filter
                 $('#reset-discharge-end').click(function(){
                    $('#discharge-end').DataTable().destroy();
                    dischargeEnd = {};
                    $('.set').val("");
                    fetch_data();
                    //getSelect('collage-ex',now);
                 });
                // //search
                $('#search-discharge-end').click(function(){
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    dischargeEnd.start_date = start_date;
                    dischargeEnd.end_date = end_date;
                    if(start_date != '' && end_date !=''){
                        $('#discharge-end').DataTable().destroy();
                        //exhibition.donor = "";
                        fetch_data(dischargeEnd);            
                    }
                    else{
                        $('#discharge-end').DataTable().destroy();
                        fetch_data();
                    }
                }); 
        }   
        //GLOBAL FUNCTIONS
        //hide and show select filter
        $(document).on('mouseenter','.hover',function () {
            $('#pcollage').show();
            if(now == 'research'){
                $('#collage-r').html('');
                $('#donor').html('');
            }else if(now == 'journal'){
                //
            }else if(now == 'discharge'){
                $('#collage-d').html('');
            }else if(now == 'foreign'){
                $('#collage-f').html('');
            }else if(now == 'exhibition'){
                
            }else if(now == 'workshop'){
                
            }else if(now == 'training'){
                
            }
        });
        $(document).on('mouseleave','.hover',function () {
            if(now == 'research'){
                getSelect('collage-r',now);
                getSelect('donor',now);
            }else if(now == 'journal'){
                // 
            }else if(now == 'discharge'){
                getSelect('collage-d',now);
            }else if(now == 'foreign'){
                getSelect('collage-f',now);
            }else if(now == 'exhibition'){
                
            }else if(now == 'workshop'){
                
            }else if(now == 'training'){
                
            }
        });
        //set datepicker
    $('#rangestart').calendar({
        type: 'date',
        endCalendar: $('#rangeend'),
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate() + '';
                if (day.length < 2) {
                    day = '0' + day;
                }
                var month = (date.getMonth() + 1) + '';
                if (month.length < 2) {
                    month = '0' + month;
                }
                var year = date.getFullYear();
                return year + '-' + month + '-' + day;
            }
        }
      });
    $('#rangeend').calendar({
        type: 'date',
        startCalendar: $('#rangestart'),
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate() + '';
                if (day.length < 2) {
                    day = '0' + day;
                }
            var month = (date.getMonth() + 1) + '';
            if (month.length < 2) {
                month = '0' + month;
            }
            var year = date.getFullYear();
            return year + '-' + month + '-' + day;
            }
        }
    });
}
    //set the sidebar
    $('#sidebar').click(function(){
        $('.ui.sidebar').sidebar('toggle');
    });

});
