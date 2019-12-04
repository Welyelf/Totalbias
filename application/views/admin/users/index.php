

<div class="row">
    <div class="modal fade" id="edit_userdata" tabindex="-1" role="dialog" aria-labelledby="edit_userdata" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="submit_form">
                                    <div class="modal-body">

                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Fullname</label>
                                            <div class="col-md-12">
                                                <input type="text" name="fullname" id="fullname" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Username</label>
                                            <div class="col-md-12">
                                                <input type="text" name="username" id="username" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" name="password" id="password" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="column_num" class="col-form-label text-md-right">Role</label>
                                            <div class="col-md-12">
                                                <select class="form-control" name="role" id="role">
                                                    <option value="Admin">Admin</option>
                                                    <option value="SuperAdmin">SuperAdmin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" id="user_id" class="form-control">

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
                                                    <h3 class="pull-left">Users</h3>
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
                                                <th >Fullname</th>
                                                <th >Username</th>
                                                <th >Role</th>
                                                <th >Role</th>
                                             </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($users as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->fullname; ?></td>
                                                    <td><?php echo $c1->username; ?></td>
                                                    <td><?php echo $c1->role; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-fullname="<?php echo $c1->fullname; ?>" data-username="<?php echo $c1->username; ?>"
                                                                data-role="<?php echo $c1->role; ?> " data-password="<?php echo $c1->password; ?> ">
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
