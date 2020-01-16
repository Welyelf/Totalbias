
<script type="text/javascript">

    $(document).ready( function () {

        $('#submit_form').submit(function(e){
            //alert("Girls Like You");
            e.preventDefault();
            var ajaxdata = {
                ad_name : $('#ad_name').val(),
                ad_value : $('#ad_value').val(),
                ad_rating : $('#ad_rating').val(),
                ad_position : $('#ad_position').val(),
                ad_status : $('#ad_status').val(),
                ad_column : $('#ad_column').val(),
                id : $('#id').val(),
            };
            //alert(Rating);
            $.ajax({
                url:'/admin/ad/add',
                type:"post",
                data:ajaxdata,
                success: function(data){
                    if(data === "add"){
                        alert_user("Added!","New Ad has been successfully added.");
                    }else{
                        alert_user("Updated!","Ad has been successfully updated.");
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
            $('[id="ad_name"]').val($(this).data('ad_name'));
            $('[id="ad_value"]').val($(this).data('ad_value'));
            console.log($(this).data('ad_rating'));
            $('[id="ad_rating"]').val($(this).data('ad_rating'));
            $('[id="ad_position"]').val($(this).data('ad_position'));
            $('[id="ad_status"]').val($(this).data('ad_status'));
            $('[id="ad_column"]').val($(this).data('ad_column'));
            $('[id="id"]').val(ID);
            document.getElementById("exampleModalLabel").innerHTML = "Edit Advertisement";

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
                        url: '/admin/ad/delete',
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
            $('[id="ad_name"]').val("");
            $('[id="ad_value"]').val("");
            $('[id="ad_rating"]').val("0");
            $('[id="ad_position"]').val("Left");
            $('[id="ad_status"]').val("0");
            $('[id="ad_column"]').val("1");
            $('[id="id"]').val("");
            document.getElementById("exampleModalLabel").innerHTML = "Add Advertisement";
        });

        function alert_user(title,txt){
            Swal.fire({
                title: title,
                text: txt,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location = "//<?php echo $_SERVER['SERVER_NAME'];?>/administrator/ad";
            })
        }



    });
</script>