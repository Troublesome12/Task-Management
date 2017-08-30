function fetchTask(id){
    $.ajax({
        url: base_url+'user/fetchTask',
        type: 'POST',
        data: {id: id},
        success: function(json_data){
            var task = jQuery.parseJSON(json_data);
            $('#name').text(task.name);
            $('#description').text(task.description);
            $('#created_at').text(task.created_at);
            $('#updated_at').text(task.updated_at);
            $('#taskModal').modal('show');
        }
    });
}

function deleteTask(id){
    swal({
        title: 'Are you sure?',
        text: "Do you really want to delete this task",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: false
    },
    function(isConfirm){
        if(isConfirm){
            $.ajax({
                url: base_url+'user/deleteTask',
                type: 'POST',
                data: {id: id},
                success: function(msg){
                    if(msg == 'success'){
                        swal({
                            title: "Task has been deleted successfully",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false,
                            html: true
                        });
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }else{
                        swal({
                            title: "Something went wrong",
                            type: 'warning',
                            timer: 2000,
                            showConfirmButton: false,
                            html: true
                        });
                    }
                }
            });
        }
    });
}

function editTask(id){
        $.ajax({
        url: base_url+'user/fetchTask',
        type: 'POST',
        data: {id: id},
        success: function(json_data){
            var task = jQuery.parseJSON(json_data);
            $('#edit_id').val(task.id);
            $('#edit_name').val(task.name);
            $('#edit_description').val(task.description);

            $('#editTaskModal').modal('show');
        }
    });
}
