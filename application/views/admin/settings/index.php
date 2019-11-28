
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <a href="/administrator/settings/add"><button type="button" class="btn btn-primary pull-right"> Add
                </button></a>
        </div>
        <br><br>
        <hr>
         <form method="post">
            <?php foreach ($setting as $settings) {
                ?>
                    <div class="form-group row">
                       <div class="col-md-12">
                           <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                           <input type="text" name="<?php echo $settings->name; ?>" value="<?php echo $settings->value; ?>" id="url" class="form-control" >

                           <a href="/administrator/settings/add/<?php echo $settings->id; ?>"><span class="fa fa-edit pull-right"></span></a>
                       </div>
                    </div>
                <?php
                }
                ?>
            <div class="row pull-right modal-footer">
               <div class="col-lg-12 ">
                   <button type="submit" class="btn btn-primary" value="Save"><span class="nc-icon nc-send"></span> Save</button>
                    <a id="cancel" href="/admin/settings" class="btn btn-danger"><span class="nc-icon nc-simple-remove"></span> Cancel</a>
               </div>
            </div>
         </form>
    </div>
</div>
