<!--
       Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
   -->

<?php
echo $_SERVER['REQUEST_URI'];

?>

<div class="logo">
    <a  class="simple-text logo-mini">

    </a>
    <a href="/administrator/dashboard" class="simple-text logo-normal">
        Totalbias
        <!-- <div class="logo-image-big">
          <img src="../assets/img/logo-big.png">
        </div> -->
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/dashboard"){echo "active";} ?>">
            <a href="<?php echo base_url('/administrator/dashboard'); ?>">
                <i class="nc-icon nc-bank"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="<?php if($_SERVER['REQUEST_URI']== "/administrator/column1"){echo "active";} ?>">
            <a href="<?php echo base_url('/administrator/column1'); ?>">
                <i class="nc-icon nc-tile-56"></i>
                <p>Links</p>
            </a>
        </li>
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