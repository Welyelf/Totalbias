

<div class="row">
    <div class="modal fade" id="edit_userdata" tabindex="-1" role="dialog" aria-labelledby="edit_userdata" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Advertisements</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="submit_form">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Ad Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="ad_name" id="ad_name" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Ad Value</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" required name="ad_value" id="ad_value"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Ad Rating</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="ad_rating" id="ad_rating">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="column_num" class="col-form-label text-md-right">Ad Position</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="ad_position" id="ad_position">
                                                    <option value="Full">Full-Width (Footer)</option>
                                                    <option value="Left">Left (Footer) </option>
                                                    <option value="Center">Center (Footer)</option>
                                                    <option value="Top">Top</option>
                                                    <option value="Column">Column</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="column_num" class="col-form-label text-md-right">Ad Column</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="ad_column" id="ad_column">
                                                    <option value="1">News</option>
                                                    <option value="2">Videos</option>
                                                    <option value="3">Podcasts</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Ad Status</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="ad_status" id="ad_status">
                                                    <option value="0">Disable</option>
                                                    <option value="1">Enable</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="id" class="form-control">

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
                                                    <h3 class="pull-left">Advertisements</h3>
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
                                                <th >Ad Name</th>
                                                <th >Ad Value</th>
                                                <th >Ad Rating</th>
                                                <th >Ad Column</th>
                                                <th >Ad Position</th>
                                                <th >Ad Status</th>
                                                <th >Action</th>
                                             </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($users as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->ad_name; ?></td>
                                                    <td><?php echo htmlentities(mb_strimwidth($c1->ad_value,0,30,'...')); ?></td>
                                                    <td><?php echo $c1->ad_rating; ?></td>
                                                    <td><?php echo $c1->ad_column; ?></td>
                                                    <td><?php echo $c1->ad_position; ?></td>
                                                    <td><?php echo $c1->ad_status; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-ad_name="<?php echo $c1->ad_name; ?>" data-ad_value="<?php echo htmlentities($c1->ad_value); ?>"
                                                                data-ad_rating="<?php echo $c1->ad_rating; ?>" data-ad_column="<?php echo $c1->ad_column; ?>" data-ad_position="<?php echo $c1->ad_position; ?>" data-ad_status="<?php echo $c1->ad_status; ?>">
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
