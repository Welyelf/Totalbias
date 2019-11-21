
<div class="row">
    <div class="modal fade" id="edit_userdata" tabindex="-1" role="dialog" aria-labelledby="edit_userdata" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                                <form class="form-horizontal" id="submit_form">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="email_address" class="col-form-label text-md-right">Title</label>
                                            <div class="col-md-12">
                                                <input type="text"  name="title" id="title" class="form-control" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_address" class="col-form-label text-md-right">Publisher</label>
                                            <div class="col-md-12">
                                                <input type="text"  name="publisher" id="publisher" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_address" class="col-form-label text-md-right">Url</label>
                                            <div class="col-md-12">
                                                <input type="text" name="url" id="url" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_address" class="col-form-label text-md-right">Column</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="column_num" id="column_num">
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
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
                                                    ?></select>
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
    </div>
    <br>
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
                                        <table id="column1" class="display dataTable dtr-inline collapsed" role="grid">
                                            <thead>
                                            <tr>
                                                <th width="30px;">Time</th>
                                                <th width="30px;">Title</th>
                                                <th width="30px;">Column</th>
                                                <th width="5px;">Prio</th>
                                                <th width="5px;">Rate</th>
                                                <th width="10px;">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($column1 as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->datetime; ?></td>
                                                    <td>
                                                            <a target="_blank" href="<?php echo $c1->url; ?>"><strong>
                                                                <?php echo mb_strimwidth($c1->title,0,50,'...'); ?>
                                                            </strong></a><br>
                                                            <small><?php echo $c1->publisher; ?></small>
                                                    </td>
                                                    <td>
                                                         <?php
                                                                if($c1->column_num == 1){
                                                                    echo "A";
                                                                } else if($c1->column_num == 2){
                                                                    echo "B";
                                                                }else{
                                                                    echo "C";
                                                                }
                                                         ?>
                                                    </td>
                                                    <td><?php echo $c1->priority; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-pub="<?php echo $c1->publisher; ?>"
                                                        data-url="<?php echo $c1->url; ?>" data-column_num="<?php echo $c1->column_num; ?>" data-priority="<?php echo $c1->priority; ?>" data-rating="<?php echo $c1->rating; ?>"
                                                        >
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
