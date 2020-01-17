
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>

<div class="row">
    <div class="modal fade" id="edit_userdata" tabindex="-1" role="dialog" aria-labelledby="edit_userdata" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="submit_form">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="title" class="col-form-label-mini">Title</label>
                                                <input type="text"  name="title" id="title" class="form-control" required autofocus>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Font Size</label>
                                                <select class="form-control"  id="font_size_title">
                                                    <option value=""></option>
                                                    <?php
                                                    for($x=10;$x<=30;$x++){
                                                        ?>
                                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Color</label>
                                                <input class="form-control" type="text" id="color_title">
                                                <script>
                                                    $('#color_title').colorpicker({});
                                                </script>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Hover Color</label>
                                                <input class="form-control" type="text" id="hover_title_color">
                                                <script>
                                                    $('#hover_title_color').colorpicker({});
                                                </script>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="publisher" class="col-form-label-mini">Publisher</label>
                                                <input type="text"  name="publisher" id="publisher" class="form-control" required >
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Font Size</label>
                                                <select class="form-control"  id="font_size_pub">
                                                    <option value=""></option>
                                                    <?php
                                                    for($x=10;$x<=30;$x++){
                                                        ?>
                                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Color</label>
                                                <input class="form-control" type="text" id="color_pub">
                                                <script>
                                                    $('#color_pub').colorpicker({});
                                                </script>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Hover Color</label>
                                                <input class="form-control" type="text" id="hover_pub_color">
                                                <script>
                                                    $('#hover_pub_color').colorpicker({});
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="author" class="col-form-label-mini">Author</label>
                                                <input type="text" name="author" id="author" class="form-control" >
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Font Size</label>
                                                <select class="form-control"  id="font_size_author">
                                                    <option value=""></option>
                                                    <?php
                                                    for($x=10;$x<=30;$x++){
                                                        ?>
                                                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Color</label>
                                                <input class="form-control" type="text" id="color_author">
                                                <script>
                                                    $('#color_author').colorpicker({});
                                                </script>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="font_size" class="col-form-label-mini">Hover Color</label>
                                                <input class="form-control" type="text" id="hover_author_color">
                                                <script>
                                                    $('#hover_author_color').colorpicker({});
                                                </script>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Url</label>
                                            <div class="col-md-12">
                                                <input type="text" name="url" id="url" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="include_image" class="include_image" id="include_image"> Include Image <br>
                                            </div>
                                            <div class="col-md-12" >
                                                <div id="loader" style="display:none;"></div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="file" name="file" id="img_path" accept="image/x-png,image/gif,image/jpeg" style="display:none;" >
                                            </div>
                                            <div class="col-md-6" id="image_path_holder" style="display:none;">
                                                Image path : <small id="image-path"></small>
                                            </div>
                                            <div class="col-md-12" id="image_holder" style="display:none;">
                                                <img id="article_image" src='' alt='' class='responsive' width="200" height="150"/>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="column_num" class="col-form-label text-md-right">Column</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="column_num" id="column_num">
                                                    <option value="1">News</option>
                                                    <option value="2">Videos</option>
                                                    <option value="3">Podcasts</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="priority" class="col-form-label text-md-right">Priority</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="priority" id="priority">
                                                    <?php
                                                        for($x=0;$x<=10;$x++){
                                                            ?>
                                                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="rating" class="col-form-label text-md-right">Rating</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="rating" id="rating">
                                                    <option value="1">1</option>

                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="id" id="link_id" class="form-control">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <button type="button" id="add_link" class="btn btn-primary align-right" data-toggle="modal" data-target="#edit_userdata"> Add
        </button>

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'NEWS')">News</button>
            <button class="tablinks" onclick="openCity(event, 'VIDEOS')">Videos</button>
            <button class="tablinks" onclick="openCity(event, 'PODCASTS')">Podcasts</button>
            <button class="tablinks" onclick="openCity(event, 'Archived')">To Archive Articles</button>
        </div>

        <div id="NEWS" class="tabcontent active">
            <h3>NEWS | Link Admin</h3>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="pull-left"></h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4 class="pull-right">

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <table id="column1" class="display dataTable dtr-inline collapsed" role="grid">
                                            <thead>
                                            <tr>
                                                <th width="30px;">ID</th>
                                                <th width="30px;">Date and Time</th>
                                                <th width="30px;">Title</th>
                                                <th width="30px;">User</th>
                                                <th width="5px;">Prio</th>
                                                <th width="5px;">Rate</th>
                                                <th width="10px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($news as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->id; ?></td>
                                                    <td><?php echo date("m-d-Y h:i A",strtotime($c1->datetime));?></td>
                                                    <td>
                                                        <!--<a target="_blank" href="<?php echo $c1->url; ?>">-->
                                                        <strong>
                                                            <?php echo mb_strimwidth($c1->title,0,50,'...'); ?>
                                                        </strong><!--</a>-->
                                                        <br>
                                                        <small><?php echo $c1->publisher; ?></small>
                                                    </td>
                                                    <td>
                                                        <?php echo $c1->user_added; ?>
                                                    </td>
                                                    <td><?php echo $c1->priority; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-pub="<?php echo $c1->publisher; ?>"
                                                                data-url="<?php echo $c1->url; ?>" data-column_num="<?php echo $c1->column_num; ?>" data-priority="<?php echo $c1->priority; ?>" data-rating="<?php echo $c1->rating; ?>"
                                                                data-titlecss="<?php  echo htmlentities($c1->title_css); ?>" data-pubcss="<?php  echo htmlentities($c1->publisher_css); ?>" data-authorcss="<?php  echo htmlentities($c1->author_css); ?>"
                                                                data-author="<?php echo $c1->author; ?>" data-imgdisplay="<?php echo $c1->img_display; ?>" data-imgpath="<?php echo $c1->img_path; ?>">
                                                            <i class="fa fa-edit" style="font-size:16px"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $c1->id; ?>" class="delete_c1">
                                                            <i class="fa fa-trash-o" style="font-size:16px"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>

                    </div>
                </div>
            </div>

        </div>

        <div id="VIDEOS" class="tabcontent">
            <h3>VIDEOS | Link Admin</h3>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="pull-left">Column A</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4 class="pull-right">

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <table id="column2" class="display dataTable dtr-inline collapsed" role="grid">
                                            <thead>
                                            <tr>
                                                <th width="30px;">ID</th>
                                                <th width="30px;">Date and Time</th>
                                                <th width="30px;">Title</th>
                                                <th width="30px;">User</th>
                                                <th width="5px;">Prio</th>
                                                <th width="5px;">Rate</th>
                                                <th width="10px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($videos as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->id; ?></td>
                                                    <td><?php echo date("m-d-Y h:i A",strtotime($c1->datetime));?></td>
                                                    <td>
                                                        <!--<a target="_blank" href="<?php echo $c1->url; ?>">-->
                                                        <strong>
                                                            <?php echo mb_strimwidth($c1->title,0,50,'...'); ?>
                                                        </strong><!--</a>-->
                                                        <br>
                                                        <small><?php echo $c1->publisher; ?></small>
                                                    </td>
                                                    <td>
                                                        <?php echo $c1->user_added; ?>
                                                    </td>
                                                    <td><?php echo $c1->priority; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-pub="<?php echo $c1->publisher; ?>"
                                                                data-url="<?php echo $c1->url; ?>" data-column_num="<?php echo $c1->column_num; ?>" data-priority="<?php echo $c1->priority; ?>" data-rating="<?php echo $c1->rating; ?>"
                                                                data-titlecss="<?php  echo htmlentities($c1->title_css); ?>" data-pubcss="<?php  echo htmlentities($c1->publisher_css); ?>" data-authorcss="<?php  echo htmlentities($c1->author_css); ?>"
                                                                data-author="<?php echo $c1->author; ?>" data-imgdisplay="<?php echo $c1->img_display; ?>" data-imgpath="<?php echo $c1->img_path; ?>">
                                                            <i class="fa fa-edit" style="font-size:16px"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $c1->id; ?>" class="delete_c1">
                                                            <i class="fa fa-trash-o" style="font-size:16px"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>

                    </div>
                </div>
            </div>
        </div>

        <div id="PODCASTS" class="tabcontent">
            <h3>PODCASTS | Link Admin</h3>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="pull-left">Column A</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4 class="pull-right">

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <table id="column3" class="display dataTable dtr-inline collapsed" role="grid">
                                            <thead>
                                            <tr>
                                                <th width="30px;">ID</th>
                                                <th width="30px;">Date and Time</th>
                                                <th width="30px;">Title</th>
                                                <th width="30px;">User</th>
                                                <th width="5px;">Prio</th>
                                                <th width="5px;">Rate</th>
                                                <th width="10px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($podcasts as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->id; ?></td>
                                                    <td><?php echo date("m-d-Y h:i A",strtotime($c1->datetime));?></td>
                                                    <td>
                                                        <!--<a target="_blank" href="<?php echo $c1->url; ?>">-->
                                                        <strong>
                                                            <?php echo mb_strimwidth($c1->title,0,50,'...'); ?>
                                                        </strong><!--</a>-->
                                                        <br>
                                                        <small><?php echo $c1->publisher; ?></small>
                                                    </td>
                                                    <td>
                                                        <?php echo $c1->user_added; ?>
                                                    </td>
                                                    <td><?php echo $c1->priority; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-pub="<?php echo $c1->publisher; ?>"
                                                                data-url="<?php echo $c1->url; ?>" data-column_num="<?php echo $c1->column_num; ?>" data-priority="<?php echo $c1->priority; ?>" data-rating="<?php echo $c1->rating; ?>"
                                                                data-titlecss="<?php  echo htmlentities($c1->title_css); ?>" data-pubcss="<?php  echo htmlentities($c1->publisher_css); ?>" data-authorcss="<?php  echo htmlentities($c1->author_css); ?>"
                                                                data-author="<?php echo $c1->author; ?>" data-imgdisplay="<?php echo $c1->img_display; ?>" data-imgpath="<?php echo $c1->img_path; ?>">
                                                            <i class="fa fa-edit" style="font-size:16px"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $c1->id; ?>" class="delete_c1">
                                                            <i class="fa fa-trash-o" style="font-size:16px"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>

                    </div>
                </div>
            </div>
        </div>

        <div id="Archived" class="tabcontent">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="pull-left">Articles</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="button" id="remove_link" class="btn btn-primary pull-right"> Remove All Articles </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <table id="column4" class="display dataTable dtr-inline collapsed" role="grid">
                                            <thead>
                                            <tr>
                                                <th width="30px;">ID</th>
                                                <th width="30px;">Date and Time</th>
                                                <th width="30px;">Title</th>
                                                <th width="30px;">Column</th>
                                                <th width="30px;">User</th>
                                                <th width="5px;">Prio</th>
                                                <th width="5px;">Rate</th>
                                                <th width="10px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($archives as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->id; ?></td>
                                                    <td><?php echo date("m-d-Y h:i A",strtotime($c1->datetime));?></td>
                                                    <td>
                                                        <!--<a target="_blank" href="<?php echo $c1->url; ?>">-->
                                                        <strong>
                                                            <?php echo mb_strimwidth($c1->title,0,50,'...'); ?>
                                                        </strong><!--</a>-->
                                                        <br>
                                                        <small><?php echo $c1->publisher; ?></small>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($c1->column_num == "1"){
                                                                echo "News";
                                                            } else if($c1->column_num == "2"){
                                                                echo "Videos";
                                                            }
                                                            else if($c1->column_num == "3"){
                                                                echo "Podcasts";
                                                            }
                                                             ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $c1->user_added; ?>
                                                    </td>
                                                    <td><?php echo $c1->priority; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-pub="<?php echo $c1->publisher; ?>"
                                                                data-url="<?php echo $c1->url; ?>" data-column_num="<?php echo $c1->column_num; ?>" data-priority="<?php echo $c1->priority; ?>" data-rating="<?php echo $c1->rating; ?>"
                                                                data-titlecss="<?php  echo htmlentities($c1->title_css); ?>" data-pubcss="<?php  echo htmlentities($c1->publisher_css); ?>" data-authorcss="<?php  echo htmlentities($c1->author_css); ?>"
                                                                data-author="<?php echo $c1->author; ?>" data-imgdisplay="<?php echo $c1->img_display; ?>" data-imgpath="<?php echo $c1->img_path; ?>">
                                                            <i class="fa fa-edit" style="font-size:16px"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $c1->id; ?>" class="delete_c1">
                                                            <i class="fa fa-trash-o" style="font-size:16px"></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="panel-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
	

</div>
<style>
    body {font-family: Arial;}

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<script>
    document.getElementById("NEWS").style.display = "block";

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

</script>

<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 }
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
        from{ bottom:-100px; opacity:0 }
        to{ bottom:0; opacity:1 }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>