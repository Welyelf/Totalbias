<?php
//$str = "Property Features: Great Waltham is a lovely village which is 5 miles from the commuter town of Chelmsford, Essex. Chelmsford is an affluent town with links to all the main routes and less than an hour from London. The Beehive has two separate bars: the drinking room which has a pool and darts area at the end, leading directly onto the garden area. This garden is to the rear of the pub and is tidy but has plenty more potential, there is also a nice garden at the front with a large purpose-built smoking shelter. The second bar is set up in the style of a 36 restaurant and is ideal for future food sales, functions or community meetings. This pub is in a great area and an amazing footprint and has heaps of potential. Trading Style: The pub is predominately wet-led and appeals to local people from the village, the pub has started to offer food and is beginning to utilize all aspects that the business can offer. The ideal applicants would have the ability and ambition to take this pub and maximise all types of offers that are available, as well as the ability to integrate and become an integral part of this great village community. Private Accommodation: This consists of two double bedrooms, a lounge, kitchen, bathroom with separate toilet and there is an office space on the large landing. There is the benefit of plenty of storage as there is a large attic space which is accessible from both the lounge and bedroom one.";
//
//if (strpos($str, 'Private Accommodation:') !== false) {
//    echo 'true';
//}
//
//
//
//$uid = "855FM22";
//
//
//$split_for_pf = explode("Trading Style:",$str);
//
//
//$pf = explode("Trading Style:",$str);
//echo "<br>";
//echo("Property Features:" . $pf[0]);
//$split_for_pa = explode("Private Accommodation:",$pf[1]);
//
//echo "<br>";
//echo("Trading Style:" . $split_for_pa[0]);
//
//echo "<br>";
//echo("Private Accommodation:" . $split_for_pa[1]);

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/tb.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title> <?php echo $settings->site_title; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/css/totalbias.css?v=2.0.0" rel="stylesheet" />
        <link href="/assets/demo/demo.css" rel="stylesheet" />
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    </head>

    <body class="" style="background-color: #fff !important;">
        <div class="wrapper ">
            <div class="container ">
            <div class="main-panel" >

            <div class="content" style="margin-top: 13px !important;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 range_slider" style="">
                        <img src="/assets/img/tb1.png" class="totalbias_logo">
                            <br><br>
                            <input type="range" class="slider" min="1" max="5" id="customRange2"  />
                            <br><br>
                        <p class="hidden">Value: <span id="demo"></span></p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr >
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card-stats">
                            <div class="card-body" id="columnA_data">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card-stats">
                            <div class="card-body " id="columnB_data">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card-stats">
                            <div class="card-body " id="columnC_data">

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr >
                    </div>
                </div>


            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                          <span class="copyright">
                            ©
                            <script>
                              document.write(new Date().getFullYear())
                            </script>. Totalbias
                          </span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        </div>
        </div>
        <!--   Core JS Files   -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>


        <script src="assets/demo/demo.js"></script>

        <script type="text/javascript">
            $(document).ready( function () {

                show_columnA_data();

                function sliderChange(val) {
                    document.getElementById('demo').innerHTML = val;
                }
                var x = document.getElementById("customRange2");

                document.getElementById("demo").innerHTML = x.value;
                x.oninput = function() {
                    document.getElementById("demo").innerHTML = this.value;
                    $("#columnA_data").empty();
                    $("#columnB_data").empty();
                    $("#columnC_data").empty();
                    show_columnA_data();
                }
                function show_columnA_data(){

                    var rating_value =  $('#customRange2').val();
                    fect_link_data(rating_value);
                    if( (rating_value - 1) !== 0){
                        fect_link_data(Number(rating_value)-1);
                    }

                    if( Number(rating_value)+1 < 6){
                        fect_link_data(Number(rating_value)+1);
                    }
                }

                function fect_link_data(rate){
                    var ajaxdata = {
                        rating : rate,
                    };

                    $.ajax({
                        url:'/totalbias/get_cloumnA_data',
                        type:"post",
                        data:ajaxdata,
                        success: function(data){
                            //alert(data);
                            var links_data = data;
                            var obj = JSON.parse(links_data);

                            var trHTML_left = '';
                            var trHTML_center = '';
                            var trHTML_right = '';
                            var ctr=0;
                            var ctr_col2=0;
                            var ctr_col3=0;
                            obj.forEach(function(item){
                                if(item.column_num == 1){
                                    if(ctr < Number(<?php echo $settings->column1_limit; ?>)){
                                        trHTML_left += item.title;
                                        ctr++;
                                    }
                                }else if(item.column_num == 2){
                                    if(ctr_col2 < Number(<?php echo $settings->column2_limit; ?>)){
                                        trHTML_center += item.title;
                                        ctr_col2++;
                                    }
                                }else if(item.column_num == 3){
                                    if(ctr_col3 < Number(<?php echo $settings->column3_limit; ?>)){
                                        trHTML_right += item.title;
                                        ctr_col3++;
                                    }
                                }
                                //alert(item.column_num);
                            });

                            $("#columnA_data").append(trHTML_left);
                            $("#columnB_data").append(trHTML_center);
                            $("#columnC_data").append(trHTML_right);
                        },error: function (jqXHR, textStatus, errorThrown) {
                            alert( textStatus + errorThrown + '! Contact your administrator.');
                        }
                    });
                }
            });
        </script>
    </body>

</html>

<style>
    .hover_effect:hover,.hover_effect:focus {
        color:#801212!important
    }
    hr {
        position: relative;
        border: none;
        height: 3px;
        background: black;
    }
    a {
        text-decoration: none;
        color:#000;
    }
    a:hover {
        text-decoration: underline;
    }
    #publisher{
        color:#d3d3d3;
        font-size: 16px;
    }
    @media (max-width: 991px) {
        .range_slider {
            width:100% !important;
        }
        .totalbias_logo{
            width:100% !important;
        }
        #customRange2{
            width:100% !important;
        }
    }
    .main-panel{
        width: calc(100%) !important;
    }
    .range_slider{
        width:50%;
        text-align: center !important;
        display: inline-block !important;
        margin: 0 auto;
    }
    .totalbias_logo{
        width:50%;
    }

    #customRange2{
        width:50%;
        height: 10px;
        display: inline-block !important
    }
    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        background: #003366;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        background: #4CAF50;
        cursor: pointer;
    }

</style>
