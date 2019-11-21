<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../assets/img/tb.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title> Totalbias </title>
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

                        <img src="/assets/img/tb.png" class="totalbias_logo">
                        <br><br>
                        <input type="range" class="slider" min="1" max="5" id="customRange2"  />
                        <br><br>
                        <p>Value: <span id="demo"></span></p>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <hr size="30">
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
                </div>

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

                //var slider = document.getElementById("myRange");
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

                    if( (rating_value - 1) !== 0){
                        //alert(rating_value - 1);
                    }

                    if( Number(rating_value)+1 < 6){
                        //alert(Number(rating_value)+1);
                    }
                    var ajaxdata = {
                        rating : $('#customRange2').val(),
                    };
                    //$("#columnA_data").append("");
                    //$('#columnA_data').remove();
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
                            obj.forEach(function(item){
                                if(item.column_num == 1){
                                    trHTML_left += item.title;
                                }else if(item.column_num == 2){
                                    trHTML_center += item.title;
                                }else if(item.column_num == 3){
                                    trHTML_right += item.title;
                                }
                                //alert(item.column_num);
                            });
                            //$('#records_table').load(testHtml);
                            $("#columnA_data").append(trHTML_left);
                            $("#columnB_data").append(trHTML_center);
                            $("#columnC_data").append(trHTML_right);
                            //alert("nice");
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
