$(document).ready(function(){
    $('#dept').click(function(){
        localStorage.setItem('current','dept');
    });
    $('#dept_data').DataTable().destroy();
    var dataDept = $('#dept_data').DataTable({
        "processing" : true,
        "serverSide" : true,
        "autoWidth":false,
        "order":[],
        dom: 'ti',
        columnDefs: [
            { "orderable": false, "targets": [0,1,2] },
        
         ],"lengthMenu": [[-1, 50, 25, 10,5], ["All", 50, 25, 10,5]],
        "ajax" : {
        url:"fetch.php",
        type:"POST",
            data:{
                key:'dept'
            },
        }
    });
            
    $('#add_dept').click(function(){
        var options = {
        ajaxPrefix:''
        };
        new Dialogify('form/add_dept_form.php', options)
        .title('Add New Department')
        .buttons([{
            text:'Cancle',
            click:function(e){
            this.close();
            }
        },
        {
            text:'Insert',
            type:Dialogify.BUTTON_PRIMARY,
            click:function(e){
                var form_data = new FormData();
                form_data.append('deptname', $('#deptname').val());
                $.ajax({
                    method:"POST",
                    url:'insert/insert_dept.php',
                    data:form_data,
                    dataType:'json',
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.success != ''){
                            $('#dept_res').html('<div class="alert alert-danger">'+data.success+'</div>');
                            dataDept.ajax.reload();
                            window.setTimeout(function(){
                                $('#dept_res').html('');
                            },2000);
                            }
                        }
                    });
                        }
                    }
                ]).showModal();
    });
        
    $(document).on('click', '.updateDept', function(){
    var id = $(this).attr('id');
    var x = $(this).parent().parent();
                var ddata = Array();
                    x.find('td').each(function(){
                        var curr = ($(this).text());
                        ddata.push(curr);
                    });
                var dept_name = ddata[0];
                console.log(dept_name);
        var options = {
            ajaxPrefix:''
        };
        new Dialogify('form/add_dept_form.php?dept_name='+dept_name, options)
            .title('Edit Department Name')
                .buttons([{
                    text:'Cancle',
                        click:function(e){
                            this.close();
                        }
                    },{
                        text:'Edit',
                        type:Dialogify.BUTTON_PRIMARY,
                        click:function(e){
                            var form_data = new FormData();
                            
                            form_data.append('deptname', $('#deptname').val());
                            
                            form_data.append('deptId', id);
                            $.ajax({
                                method:"POST",
                                url:'update/update_dept.php',
                                data:form_data,
                                dataType:'json',
                                contentType:false,
                                cache:false,
                                processData:false,
                                success:function(data){
                                    if(data.success != ''){
                                        $('#dept_res').html('<div class="alert alert-danger">'+data.success+'</div>');
                                        dataDept.ajax.reload();
                                        window.setTimeout(function(){
                                        $('#dept_res').html('');
                                    },2000);
                                }
                            }
                            });
                        }
                    }
                ]).showModal();
    });
        
    $(document).on('click', '.deleteDept', function(){
        var id = $(this).attr('id');
        Dialogify.confirm("<h5 class='text-danger'><b>?Are you sure you want to remove</b></h5>", {
        ok:function(){
            $.ajax({
                url:"delete/delete_dept.php",
                method:"POST",
                data:{deptId:id},
                success:function(data){
                    dataDept.ajax.reload();
                }
            })
        },
        cancel:function(){
            this.close();
        }
        });
    });
});