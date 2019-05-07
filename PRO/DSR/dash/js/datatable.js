$(document).ready(function(){
    var dataTable = $('#user_data').DataTable({
        "processing":true,
        "serverSide":true,
        "autoWidth":false,
        "order":[],
        dom: 'ti',
        "ajax":{
            url:"user/fetch.php",
            type:"POST"
            },
            "columnDefs":[
                {
                    "targets": [0,1,2,3],"orderable":false
               },{
                    
                }
            ],
    });

    $(document).on('click', '.view', function(){
        var id = $(this).attr('id');
        var options = {
        ajaxPrefix: '',
        ajaxData: {id:id},
        ajaxComplete:function(){
            this.buttons([{
            type: Dialogify.BUTTON_PRIMARY
            }]);
            }
        };
        new Dialogify('user/fetch_single.php', options)
        .title('View Employee Details')
        .showModal();
    });
    
    $('#add_data').click(function(){
        var options = {
        ajaxPrefix:''
        };
        new Dialogify('user/add_data_form.php', options)
        .title('Add New User')
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
                form_data.append('name', $('#name').val());
                form_data.append('gender', $('#gender').val());
                form_data.append('designation', $('#designation').val());
                $.ajax({
                    method:"POST",
                    url:'user/insert_data.php',
                    data:form_data,
                    dataType:'json',
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        if(data.error != ''){
                            $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
                        }else{
                            $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
                            dataTable.ajax.reload();
                            }
                        }
                    });
                }
            }
        ]).showModal();
    });

    $(document).on('click', '.update', function(){
        console.log('update');
        var id = $(this).attr('id');
                var options = {
                        ajaxPrefix:''
                        };
                        new Dialogify('user/add_data_form.php', options)
                        .title('Edit User Data')
                        .buttons([{
                            text:'Cancle',
                            click:function(e){
                                this.close();
                            }
                        },{
                            text:'Edit',
                            type:Dialogify.BUTTON_PRIMARY,
                            click:function(e){
                                //var image_data = $('#images').prop("files")[0];
                                var form_data = new FormData();
                                
                                form_data.append('name', $('#name').val());
                                form_data.append('password', $('#designation').val());
                                
                                form_data.append('role', $('#gender').val());
                                
                                form_data.append('id', id);
                                $.ajax({
                                    method:"POST",
                                    url:'user/update_user.php',
                                    data:form_data,
                                    dataType:'json',
                                    contentType:false,
                                    cache:false,
                                    processData:false,
                                    success:function(data){
                                        if(data.error != ''){
                                            $('#form_response').html('<div class="alert alert-danger">'+data.error+'</div>');
                                        }else{
                                            $('#form_response').html('<div class="alert alert-success">'+data.success+'</div>');
                                            dataTable.ajax.reload();
                                        }
                                    }
                                });
                            }
                        }
                    ]).showModal();
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr('id');
            Dialogify.confirm("<h5 class='text-danger'><b>?Are you sure you want to remove this User</b></h5>", {
            ok:function(){
                $.ajax({
                    url:"user/delete_data.php",
                    method:"POST",
                    data:{id:id},
                    success:function(data){
                        Dialogify.alert('<h5 class="text-success text-center"><b>User has been deleted</b></h5>');
                        dataTable.ajax.reload();
                    }
                })
            },
            cancel:function(){
                this.close();
            }
        });
    });
});        