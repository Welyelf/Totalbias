<!--
       Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
   -->

<?php
//echo $_SERVER['REQUEST_URI'];

?>

<div class="logo">
   <div class="logo-image-big">
           <img src="/assets/img/tb1.png" width="250">
        </div>

</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <?php
        if($this->auth->check_if_superadmin()){
            ?>
            <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/dashboard"){echo "active";} ?>">
                <a href="<?php echo base_url('/administrator/dashboard'); ?>">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php
        }
        ?>
        <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/column1"){echo "active";} ?>">
            <a href="<?php echo base_url('/administrator/column1'); ?>">
                <i class="nc-icon nc-tile-56"></i>
                <p>Links</p>
            </a>
        </li>
        <?php
            if($this->auth->check_if_superadmin()){
                ?>
                <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/ad"){echo "active";} ?>">
                    <a href="<?php echo base_url('/administrator/ad'); ?>">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>Advertisement</p>
                    </a>
                </li>
                <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/headline"){echo "active";} ?>">
                    <a href="<?php echo base_url('/administrator/headline'); ?>">
                        <i class="nc-icon nc-tag-content"></i>
                        <p>Headline</p>
                    </a>
                </li>
                    <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/scoring"){echo "active";} ?>">
                        <a href="<?php echo base_url('/administrator/scoring'); ?>">
                            <i class="nc-icon nc-paper"></i>
                            <p>Scoring Algorithm</p>
                        </a>
                    </li>
                    <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/settings" || $_SERVER['REQUEST_URI']== "/administrator/settings/add" || $_SERVER['REQUEST_URI']== "/administrator/settings/edit"){echo "active";} ?>">
                        <a href="<?php echo base_url('/administrator/settings'); ?>">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/users"){echo "active";} ?>">
                    <a href="<?php echo base_url('/administrator/users'); ?>">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>Users</p>
                    </a>
                </li>
                <?php
            }
        ?>


        <li class="active-pro">
            <center><span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script> Totalbias
              </span>
            </center>
        </li>
    </ul>
</div>