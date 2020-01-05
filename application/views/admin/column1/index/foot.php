
<script type="text/javascript">

    $(document).ready( function () {

        $('input[type="checkbox"]').on('change', function () {
            // if ((this).checked == true){
            //     var url = document.getElementById("url").value;
            //     console.log(url);
            //     if(url === ""){
            //        // alert_user("Error!","You must put a valid url first.");
            //         Swal.fire({
            //             title: "Error!",
            //             text: "You must put a valid url first.",
            //             icon: 'error',
            //             showCancelButton: false,
            //             confirmButtonText: 'OK'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
            //         })
            //         document.getElementById("include_image").checked = false;
            //     }else {
            //         var img_path =   document.getElementById("image-path").innerHTML;
            //
            //
            //             var ajaxdata = {
                                                                                                //                 url_data : url,
                                                                                                //             };
                                                                                                //             $.ajax({
            //                 url: '/admin/column1/get_file_content',
            //                 type: "post",
            //                 beforeSend: showProcessing,
            //                 data: ajaxdata,
            //                 success: function (data) {
            //                     showDoneProcessing();
            //                     $("#article_image").attr('src','data:image/jpeg;base64,'+data+' ');
            //                     document.getElementById('image_holder').style.display = "block";
            //                     document.getElementById("image-path").innerHTML = 'data:image/jpeg;base64,'+data+' ';
            //                     //document.getElementById('image_path_holder').style.display = "block";
            //                     //console.log(data);
            //                 }
            //             });
            //         //document.getElementById('image_holder').style.display = "block";
            //     }
            //     //document.getElementById('img_path').style.display = "block";
            // }else{
            //     document.getElementById('img_path').style.display = "none";

            //     document.getElementById('image_holder').style.display = "none";
            // }
            if ((this).checked == true){                                                                                                                                                                                                                                                                                                                                                                                                                                
                document.getElementById('img_path').style.display = "block";
            }else{
                document.getElementById('img_path').style.display = "none";
            }
        });

        function showProcessing() {
            document.getElementById('loader').style.display = "block";
        }
        function showDoneProcessing() {
            document.getElementById('loader').style.display = "none";
        }

        $('#submit_form').submit(function(e){

            e.preventDefault();
            var is_img_show;
            var image_path="";
            var img_path_from_db = document.getElementById("image-path").innerHTML;
            image_path = img_path_from_db;

            //alert("Girls Like You");
            if (document.getElementById('include_image').checked) {
                is_img_show = 1;
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
                            image_path = data;
                        }
                    });
                }
            }else{
                is_img_show = 0;
            }

            var ajaxdata = {
                title : $('#title').val(),
                publisher : $('#publisher').val(),
                url : $('#url').val(),
                rating : $('#rating').val(),
                priority : $('#priority').val(),
                column_num : $('#column_num').val(),
                author : $('#author').val(),
                id : $('#link_id').val(),
                title_css : "{\"font_size\" :\""+$('#font_size_title').val()+"\",\"font_color\" :\""+$('#color_title').val()+"\",\"hover_color\" :\""+$('#hover_title_color').val()+"\"}",
                publisher_css : "{\"font_size\" :\""+$('#font_size_pub').val()+"\",\"font_color\" :\""+$('#color_pub').val()+"\",\"hover_color\" :\""+$('#hover_pub_color').val()+"\"}",
                author_css : "{\"font_size\" :\""+$('#font_size_author').val()+"\",\"font_color\" :\""+$('#color_author').val()+"\",\"hover_color\" :\""+$('#hover_author_color').val()+"\"}",
                img_path : image_path,
                img_display : is_img_show,
            };

            $.ajax({
                url:'/admin/column1/add',
                type:"post",
                data: ajaxdata ,
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
        var table = $('#column1').DataTable({
            paginate: true,
            "lengthChange": false,
            "pageLength": 1000,
            "order": [[ 0, "desc" ]]
        });

        var table2 = $('#column2').DataTable({
            paginate: true,
            "lengthChange": false,
            "pageLength": 1000,
            "order": [[ 0, "desc" ]]
        });

        var table3 = $('#column3').DataTable({
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
            $('[id="column_num"]').val($(this).data('column_num'));
            $('[id="publisher"]').val($(this).data('pub'));
            $('[id="url"]').val($(this).data('url'));
            $('[id="priority"]').val($(this).data('priority'));
            $('[id="rating"]').val($(this).data('rating'));
            $('[id="author"]').val($(this).data('author'));
            $('[id="image-path"]').html($(this).data('imgpath'));
            $("#article_image").attr('src',$(this).data('imgpath'));

            console.log($(this).data('imgpath'));
            if($(this).data('imgdisplay')===1){
                document.getElementById("include_image").checked = true;
                document.getElementById('img_path').style.display = "block";
                document.getElementById('image_path_holder').style.display = "block";
                document.getElementById('image_holder').style.display = "block";
            }else{
                if($(this).data('imgpath') !== ""){
                    document.getElementById('img_path').style.display = "block";
                    document.getElementById('image_path_holder').style.display = "block";
                    document.getElementById('image_holder').style.display = "block";
                }else{
                    document.getElementById("include_image").checked = false;
                   document.getElementById('img_path').style.display = "none";
                    document.getElementById('image_path_holder').style.display = "none";
                }

            }

            $('[id="link_id"]').val(ID);

            var css_title = JSON.parse(JSON.stringify($(this).data('titlecss')));
            $('[id="font_size_title"]').val(css_title.font_size);
            $('[id="color_title"]').val(css_title.font_color);
            $('[id="hover_title_color"]').val(css_title.hover_color);

            var css_publisher = JSON.parse(JSON.stringify($(this).data('pubcss')));
            $('[id="font_size_pub"]').val(css_publisher.font_size);
            $('[id="color_pub"]').val(css_publisher.font_color);
            $('[id="hover_pub_color"]').val(css_publisher.hover_color);

            var css_author = JSON.parse(JSON.stringify($(this).data('authorcss')));
            $('[id="font_size_author"]').val(css_author.font_size);
            $('[id="color_author"]').val(css_author.font_color);
            $('[id="hover_author_color"]').val(css_author.hover_color);

            document.getElementById("exampleModalLabel").innerHTML = "Edit Link";


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


        $("#add_link").on( "click", function( event ) {
            $('[id="title"]').val("");
            $('[id="column_num"]').val("1");
            $('[id="publisher"]').val("");
            $('[id="url"]').val("");
            $('[id="priority"]').val("0");
            $('[id="rating"]').val("1");
            $('[id="link_id"]').val("");
            $('[id="image-path"]').val("");
            $('[id="img_path"]').val("");
            $('[id="image_holder"]').val("");
            $('[id="image_path_holder"]').val("");

            document.getElementById('image_holder').style.display = "none";
            document.getElementById('image_path_holder').style.display = "none";
            document.getElementById('img_path').style.display = "none";

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



    });
</script>