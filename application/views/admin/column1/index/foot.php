
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
                author : $('#author').val(),
                id : $('#link_id').val(),
                title_css : "{\"font_size\" :\""+$('#font_size_title').val()+"\",\"font_color\" :\""+$('#color_title').val()+"\",\"hover_color\" :\""+$('#hover_title_color').val()+"\"}",
                publisher_css : "{\"font_size\" :\""+$('#font_size_pub').val()+"\",\"font_color\" :\""+$('#color_pub').val()+"\",\"hover_color\" :\""+$('#hover_pub_color').val()+"\"}",
                author_css : "{\"font_size\" :\""+$('#font_size_author').val()+"\",\"font_color\" :\""+$('#color_author').val()+"\",\"hover_color\" :\""+$('#hover_author_color').val()+"\"}",
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
            $('[id="column_num"]').val($(this).data('column_num'));
            $('[id="publisher"]').val($(this).data('pub'));
            $('[id="url"]').val($(this).data('url'));
            $('[id="priority"]').val($(this).data('priority'));
            $('[id="rating"]').val($(this).data('rating'));
            $('[id="author"]').val($(this).data('author'));
            $('[id="link_id"]').val(ID);


            var css_title = JSON.parse(JSON.stringify($(this).data('titlecss')));
            console.log(css_title);
            console.log(css_title.font_size);
            $('[id="font_size_title"]').val(css_title.font_size);
            $('[id="color_title"]').val(css_title.font_color);
            $('[id="hover_title_color"]').val(css_title.hover_color);

            var css_publisher = JSON.parse(JSON.stringify($(this).data('pubcss')));
            console.log(css_publisher);
            console.log(css_publisher.font_size);
            $('[id="font_size_pub"]').val(css_publisher.font_size);
            $('[id="color_pub"]').val(css_publisher.font_color);
            $('[id="hover_pub_color"]').val(css_publisher.hover_color);

            var css_author = JSON.parse(JSON.stringify($(this).data('authorcss')));
            console.log(css_author);
            console.log(css_author.font_size);
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