<script type="text/javascript">
    $(document).ready( function () {
        $('#submit_form').submit(function(e){
            //alert("Girls Like You");
            e.preventDefault();
            var ajaxdata = {
                title : $('#title').val(),
                publisher : $('#publisher').val(),
                url : $('#url').val(),
                rating : $('#rating').val(),
                priority : $('#priority').val(),
                column_num : $('#column_num').val(),
                id : $('#link_id').val()
            };
            //alert(Rating);
            $.ajax({
                url:'/admin/column1/add',
                type:"post",
                data:ajaxdata,
                success: function(data){
                    if(data === "add"){
                        alert_user("Added!","New link has been successfully added.");
                    }else{
                        alert_user("Updated!","Link has been successfully updated.");
                    }

                },error: function (jqXHR, textStatus, errorThrown) {
                    alert( textStatus + errorThrown + '! Contact your administrator.');
                }
            });
        });
        $(".edit_button").on( "click", function( event ) {
            var ID=this.id;
            $('#edit_userdata').modal('show');
            $('[id="title"]').val($(this).data('title'));
            $('[id="column_num"]').val($(this).data('column_num'));
            $('[id="publisher"]').val($(this).data('pub'));
            $('[id="url"]').val($(this).data('url'));
            $('[id="priority"]').val($(this).data('priority'));
            $('[id="rating"]').val($(this).data('rating'));
            $('[id="link_id"]').val(ID);
            document.getElementById("exampleModalLabel").innerHTML = "Edit Link";
        });

        $("#add_link").on( "click", function( event ) {
            $('[id="title"]').val("");
            $('[id="column_num"]').val("1");
            $('[id="publisher"]').val("");
            $('[id="url"]').val("");
            $('[id="priority"]').val("0");
            $('[id="rating"]').val("1");
            $('[id="link_id"]').val("");
            document.getElementById("exampleModalLabel").innerHTML = "Add Link";
        });

        function alert_user(title,txt){
            Swal.fire({
                title: title,
                text: txt,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location = "//<?php echo $_SERVER['SERVER_NAME'];?>/administrator/column1";
            })
        }

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
                        url: '/admin/column1/delete',
                        type: 'POST',
                        data: {id : ID,},
                        success: function (data) {
                            alert_user("Deleted!","Your data has been deleted.");

                        }
                    });
                }
            })
        });

    });
</script>