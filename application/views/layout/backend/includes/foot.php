<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/totalbias.min.js?v=2.0.0" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/demo/demo.js"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#column1').DataTable({
            paginate: true,
            "order": [[ 0, "desc" ]]
        });
        $('#column2').DataTable({
            paginate: true,
            "order": [[ 0, "desc" ]]
        });
        $('#column3').DataTable({
            paginate: true,
            "order": [[ 0, "desc" ]]
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>