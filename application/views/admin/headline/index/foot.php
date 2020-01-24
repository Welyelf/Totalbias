
<script type="text/javascript">

    $(document).ready( function () {

        $('#submit_form').submit(function(e){
            //alert("Girls Like You");
            e.preventDefault();

            var image_path="";
            var img_path_from_db = document.getElementById("image-path").innerHTML;
            image_path = img_path_from_db;

            var img = document.getElementById("img_path").value;
            if(img!==""){
                $.ajax({
                    url:'/admin/column1/upload_pic',
                    type:"post",
                    data:new FormData(this),
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        img = data;
                        console.log(data);
                    }
                });
            }else{
                img = image_path;
            }


            var ajaxdata = {
                title : $('#title').val(),
                url : $('#url').val(),
                image : img,
                rating : $('#rating').val(),
                id : $('#id').val(),
            };
            //alert(Rating);
            $.ajax({
                url:'/admin/headline/add',
                type:"post",
                data:ajaxdata,
                success: function(data){
                    if(data === "add"){
                        alert_user("Added!","New Headline has been successfully added.");
                    }else{
                        alert_user("Updated!","Headline has been successfully updated.");
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
            $('[id="title"]').val($(this).data('title'));
            $('[id="url"]').val($(this).data('url'));
            $('[id="rating"]').val($(this).data('rating'));
            $('[id="id"]').val(ID);
            $("#article_image").attr('src',$(this).data('imgpath'));

            $('[id="image-path"]').html($(this).data('imgpath'));
            document.getElementById('image_path_holder').style.display = "block";
            document.getElementById('image_holder').style.display = "block";
            document.getElementById("exampleModalLabel").innerHTML = "Edit Headline";

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
                        url: '/admin/headline/delete',
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
            $('[id="title"]').val("");
            $('[id="url"]').val("");
            $('[id="rating"]').val("1");
            $('[id="id"]').val("");
            document.getElementById('image_holder').style.display = "none";
            document.getElementById('image_path_holder').style.display = "none";
           document.getElementById("exampleModalLabel").innerHTML = "Add Headline";
        });

        function alert_user(title,txt){
            Swal.fire({
                title: title,
                text: txt,
                icon: 'success',
                showCancelButton: false,
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location = "//<?php echo $_SERVER['SERVER_NAME'];?>/administrator/headline";
            })
        }



    });
</script>