

<div class="row">
    <div class="modal fade" id="edit_userdata" tabindex="-1" role="dialog" aria-labelledby="edit_userdata" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Headlines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <form class="form-horizontal" id="submit_form">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Title</label>
                                            <div class="col-md-12">
                                                <input type="text" name="ad_name" id="title" class="form-control" required >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Url</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" required name="url" id="url"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="file" name="file" id="img_path" accept="image/x-png,image/gif,image/jpeg" >
                                            </div>
                                            <div class="col-md-6" id="image_path_holder" style="display:none;">
                                                Image path : <small id="image-path"></small>
                                            </div>
                                            <div class="col-md-12" id="image_holder" style="display:none;">
                                                <img id="article_image" src='' alt='' class='responsive' width="200" height="150"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-form-label text-md-right">Rating</label>
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
                                                <th >Title</th>
                                                <th >Url</th>
                                                <th >Image Path</th>
                                                <th >Rating</th>
                                                <th >Action</th>
                                             </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($users as $c1) { ?>
                                                <tr>
                                                    <td><?php echo $c1->title; ?></td>
                                                    <td><?php echo $c1->url; ?></td>
                                                    <td><?php echo $c1->image; ?></td>
                                                    <td><?php echo $c1->rating; ?></td>
                                                    <td>
                                                        <button type="button" class="edit_button" id="<?php echo $c1->id; ?>" data-title="<?php echo $c1->title; ?>" data-url="<?php echo $c1->url; ?>"
                                                                data-rating="<?php echo $c1->rating; ?>" data-imgpath="<?php echo $c1->image; ?>">
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
