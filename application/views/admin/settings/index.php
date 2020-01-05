
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script>

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
                    if($settings->name == "title_font" || $settings->name == "publisher_font" || $settings->name == "author_font"){
                        ?>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                                    <select class="form-control" name="<?php echo $settings->name; ?>" id="rating">
                                        <?php
                                            for ($ffl=0;$ffl<font_family_list($ffl,TRUE);$ffl++){
                                                ?>
                                                <option value="<?php echo font_family_list($ffl,FALSE); ?>" <?php if(isset($settings->value) && $settings->value==font_family_list($ffl,FALSE))echo 'selected="selected"'; ?>>
                                                    <?php echo font_family_list($ffl,FALSE); ?>
                                                </option>

                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        <?php
                    }else if($settings->name == "title_font_size" || $settings->name == "publisher_font_size" ||  $settings->name =="author_font_size"  ||  $settings->name =="vertical_spacing_between_articles"  ||  $settings->name =="vertical_spacing_between_title_and_pub" ){
                            ?>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                                        <select class="form-control" name="<?php echo $settings->name; ?>">
                                            <?php
                                            for ($ffl=0;$ffl<font_size_list($ffl,TRUE);$ffl++){
                                                ?>
                                                <option value="<?php echo font_size_list($ffl,FALSE); ?>" <?php if(isset($settings->value) && $settings->value==font_size_list($ffl,FALSE))echo 'selected="selected"'; ?>>
                                                    <?php echo font_size_list($ffl,FALSE); ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <?php
                    }else if($settings->name == "title_font_color" || $settings->name =="title_font_color_hover" || $settings->name == "publisher_font_color" || $settings->name == "author_font_color"){
                        ?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                                <input type="text" name="<?php echo $settings->name; ?>" value="<?php echo $settings->value; ?>" id="<?php echo $settings->name; ?>" class="form-control" >
                                <script>
                                    $('#<?php echo $settings->name;   ?>').colorpicker({});
                                </script>
                            </div>
                        </div>
                        <?php
                    }else if($settings->name == "title_underline_on_hover" || $settings->name == "title_underline_option"){
                        ?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                                <select class="form-control" name="<?php echo $settings->name; ?>">
                                    <?php
                                    for ($ffl=0;$ffl<select_option($ffl,TRUE);$ffl++){
                                        ?>
                                            <option value="<?php echo select_option($ffl,FALSE); ?>" <?php if(isset($settings->value) && $settings->value==select_option($ffl,FALSE))echo 'selected="selected"'; ?>>
                                                <?php echo select_option($ffl,FALSE); ?>
                                            </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }else if($settings->name == "title_font_weight"){
                        ?>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="author" class="col-form-label-mini"><?php echo $settings->display_name; ?></label>
                                <select class="form-control" name="<?php echo $settings->name; ?>">
                                    <?php
                                    for ($ffl=0;$ffl<font_weight_list($ffl,TRUE);$ffl++){
                                        ?>
                                        <option value="<?php echo font_weight_list($ffl,FALSE); ?>" <?php if(isset($settings->value) && $settings->value==font_weight_list($ffl,FALSE))echo 'selected="selected"'; ?>>
                                            <?php echo font_weight_list($ffl,FALSE); ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                    }else{
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
