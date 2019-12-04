
<script type="text/javascript">

    $(document).ready( function () {

        $('#submit_form').submit(function(e){
            //alert("Girls Like You");
            e.preventDefault();
            var ajaxdata = {
                fullname : $('#fullname').val(),
                username : $('#username').val(),
                password : $('#password').val(),
                role : $('#role').val(),
                id : $('#user_id').val(),
            };
            //alert(Rating);
            $.ajax({
                url:'/admin/users/add',
                type:"post",
                data:ajaxdata,
                success: function(data){
                    if(data === "add"){
                        alert_user("Added!","New user has been successfully added.");
                    }else{
                        alert_user("Updated!","User has been successfully updated.");
                    }
                },error: function (jqXHR, textStatus, errorThrown) {
                    alert( textStatus + errorThrown + '! Contact your administrator.');
                }
            });
        });
        var table = $('#column1').DataTable({
            paginate: true,
            "lengthChange": false,
            "pageLength": 1000,
            "order": [[ 0, "desc" ]]
        });
        // $('#column1 tbody').on('click', 'tr', function () {
        //     var data = table.row( this ).data();
        //     //alert( 'You clicked on '+data[0]+'\'s row' );
        // });
        $(".edit_button").on( "click", function( event ) {
            var ID=this.id;
            $('#edit_userdata').modal('show');
            $('[id="fullname"]').val($(this).data('fullname'));
            $('[id="username"]').val($(this).data('username'));
            $('[id="role"]').val($(this).data('role'));
            $('[id="password"]').val($(this).data('password'));
            $('[id="user_id"]').val(ID);
            document.getElementById("exampleModalLabel").innerHTML = "Edit User";

        });
        $(".delete_c1").on( "click", function( event ) {
            var ID=this.id;
            //alert_user("Added!","New link has been successfully added.");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/admin/users/delete',
                        type: 'POST',
                        data: {id : ID,},
                        success: function (data) {
                            alert_user("Deleted!","Your data has been deleted.");

                        }
                    });
                }
            })
        });


        $("#add_link").on( "click", function( event ) {
            $('[id="username"]').val("");
            $('[id="passowrd"]').val("1");
            $('[id="fullname"]').val("");
            document.getElementById("exampleModalLabel").innerHTML = "Add User";
        });

        function alert_user(title,txt){
            Swal.fire({
                title: title,
                text: txt,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location = "//<?php echo $_SERVER['SERVER_NAME'];?>/administrator/users";
            })
        }



    });
</script>