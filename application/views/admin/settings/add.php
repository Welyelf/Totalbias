
<div class="row">
    <div class="col-lg-12">
        <?php if (isset($setttings_data->value)) {
            echo "Edit Config";
        }else{
            echo "Add New Config";
        } ?>

        <br><br>
        <hr>
        <form method="post" >
            <div class="form-group row">
                    <div class="col-md-12">
                        <label for="name" class="col-form-label-mini">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($setttings_data->name)) {echo $setttings_data->name;} ?>">
                    </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="display_name" class="col-form-label-mini">Display Name</label>
                    <input type="text" name="display_name" id="display_name" class="form-control" value="<?php if (isset($setttings_data->display_name)) {echo $setttings_data->display_name;} ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="value" class="col-form-label-mini">Value</label>
                    <input type="text" name="value" id="value" class="form-control" value="<?php if (isset($setttings_data->value)) {echo $setttings_data->value;} ?>">
                </div>
            </div>

            <div class="row pull-right modal-footer">
                <div class="col-lg-12 ">
                    <button type="submit" class="btn btn-primary" value="Save"><span class="nc-icon nc-send"></span> Save</button>
                    <a id="cancel" href="/administrator/settings" class="btn btn-danger"><span class="nc-icon nc-simple-remove"></span> Cancel</a>
                </div>
            </div>

            <?php if (isset($setttings_data->value)) {
                ?>
                    <input type="hidden" name="id" value="<?php echo $setttings_data->id; ?>"/>
                <?php
            } ?>

        </form>
    </div>
</div>
