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
        <link href="/assets/demo/rangeslider.css" rel="stylesheet" />

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>

    <body class="" style="background-color: #fff !important;">
        <div class="wrapper">
            <div class="container-fluid">

            <div class="main-panel">

            <div class="content" style="margin-top: 13px !important;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 range_slider" style="text-align: center;">
                        <img src="/assets/img/tb1.png" class="totalbias_logo">
                            <br> <br>
                        <div>
                        <small id="more_liberal" style="color:#036;padding-left: 40px;font-size: 14px;">More Liberal << </small>
                            <input type="range" class="slider" min="1" step="1" max="5" id="customRange2" data-rangeslider>
                        <small id="more_conservative" style="color:#900;font-size: 14px;">>> More Conservative</small>
                        </div>
                        <br><br>

                    </div>
                    <div class="col-md-12 current-date">
                       <!-- <div><?php echo date("F d, Y"); ?></div>
                        <div ><hr></div>-->
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" id="mobile_view">
                        <div class="warpper">
                            <input class="radio" id="one" name="group" type="radio" checked>
                            <input class="radio" id="two" name="group" type="radio">
                            <input class="radio" id="three" name="group" type="radio">
                            <div class="tabs">
                                <label class="tab" id="one-tab" for="one">NEWS</label>
                                <label class="tab" id="two-tab" for="two">VIDEOS</label>
                                <label class="tab" id="three-tab" for="three">PODCASTS</label>
                                <br><br>
                            </div>
                            <div class="panels">
                                <div class="panel" id="one-panel">
                                    <div class="card-stats">
                                        <div class="card-body" id="columnA_data2">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel" id="two-panel">
                                    <div class="card-stats">
                                        <div class="card-body " id="columnB_data2">

                                        </div>
                                    </div>
                                </div>
                                <div class="panel" id="three-panel">
                                    <div class="card-stats">
                                        <div class="card-body " id="columnC_data2">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="desktop_view">

                        <div class="col-lg-4 col-md-12 col-sm-12" id="one-panel">
                            <img src="/assets/img/News.png" class="header_column">
                            <div class="card-stats">
                                <div class="card-body" id="columnA_data">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12" id="two-panel">
                            <img src="/assets/img/Videos.png" class="header_column">
                            <div class="card-stats">
                                <div class="card-body " id="columnB_data">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12" id="three-panel">
                            <img src="/assets/img/Podcasts.png" class="header_column">
                            <div class="card-stats">
                                <div class="card-body " id="columnC_data">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr >
                    </div>
                </div>
                <div id="amzn-assoc-ad-8d82f34b-639e-41fd-995d-a27047080e80"></div>
                <script async src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US&adInstanceId=8d82f34b-639e-41fd-995d-a27047080e80"></script>


                <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                          <span class="copyright">
                            ©
                            <script>
                              document.write(new Date().getFullYear())
                            </script>. TotalBias.com
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
        <script src="assets/demo/rangeslider.min.js"></script>

        <script type="text/javascript">


            $(document).ready( function () {

                show_columnA_data();

                function sliderChange(val) {
                    document.getElementById('demo').innerHTML = val;
                }
                var x = document.getElementById("customRange2");

                //document.getElementById("demo").innerHTML = x.value;
                x.oninput = function() {
                    //document.getElementById("demo").innerHTML = this.value;
                    $("#columnA_data").empty();
                    $("#columnA_data2").empty();
                    $("#columnB_data").empty();
                    $("#columnB_data2").empty();
                    $("#columnC_data").empty();
                    $("#columnC_data2").empty();
                    show_columnA_data()
                    //alert(this.value);
                    if(this.value == 4 || this.value == 4){
                        document.getElementById('customRange2').className = 'red_slider';
                    }else if(this.value == 3){
                        document.getElementById('customRange2').className = 'slider';
                    }else if(this.value == 1 || this.value == 2){
                        document.getElementById('customRange2').className = 'blue_slider';
                    }
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
                            $("#columnA_data2").append(trHTML_left);
                            $("#columnB_data").append(trHTML_center);
                            $("#columnB_data2").append(trHTML_center);
                            $("#columnC_data").append(trHTML_right);
                            $("#columnC_data2").append(trHTML_right);
                        },error: function (jqXHR, textStatus, errorThrown) {
                            alert( textStatus + errorThrown + '! Contact your administrator.');
                        }
                    });
                }
                $('input[type="range"]').rangeslider(
                    {
                        polyfill: true,
                        // Default CSS classes
                        rangeClass: 'rangeslider',
                        disabledClass: 'rangeslider--disabled',
                        horizontalClass: 'rangeslider--horizontal',
                        verticalClass: 'rangeslider--vertical',
                        fillClass: 'rangeslider__fill',
                        handleClass: 'rangeslider__handle',
                    }
                );
            });


        </script>
    </body>

</html>
<style>

    h2{
        color:#000;
        text-align:center;
        font-size:2em;
    }
    .warpper{
        display:flex;
        flex-direction: column;
        align-items: center;
    }
    .tab{
        cursor: pointer;
        padding:10px 10px;
        margin:0px 2px;
        background: #d3d3d3;
        display:inline-block;
        color:#fff;
        border-radius:3px 3px 0px 0px;
        box-shadow: 0 0.5rem 0.8rem #00000080;
        width:100px;
        text-align: center;
    }
    .panel{
        display:none;
        animation: fadein .8s;
    }
    @keyframes fadein {
        from {
            opacity:0;
        }
        to {
            opacity:1;
        }
    }
    .panel-title{
        font-size:1.5em;
        font-weight:bold
    }
    .radio{
        display:none;
    }
    #one:checked ~ .panels #one-panel,
    #two:checked ~ .panels #two-panel,
    #three:checked ~ .panels #three-panel{
        display:block
    }
    #one:checked ~ .tabs #one-tab,
    #two:checked ~ .tabs #two-tab,
    #three:checked ~ .tabs #three-tab{
        background:#414143;
        color:#ffffff;
    }
</style>

<style>
    .responsive:hover{
        opacity: 80%;
    }
    .header_column{
        width:95%;
    }

    .current-date{
        font-family: <?php echo $settings->title_font; ?> !important;
        font-size: <?php echo $settings->title_font_size; ?>px !important;
        color : <?php echo $settings->title_font_color; ?> !important;
    }
    .responsive {
        max-width: 230px;
        max-height: 95px;
        display: block;
        margin-left: 15px;
        width: auto;
        height: auto;
    }
    body{
        clear:both;
    }
    .link_title ,h4,.h4{
        font-family: <?php echo $settings->title_font; ?> !important;
        font-size: <?php echo $settings->title_font_size; ?>px !important;
        color : <?php echo $settings->title_font_color; ?> !important;
        margin-top: -<?php echo $settings->vertical_spacing_between_articles; ?>px !important ;
        font-weight: <?php echo $settings->title_font_weight; ?> !important; ;
    }
    .link_title:hover{
        color : <?php echo $settings->title_font_color_hover; ?> !important;
    }
    a:hover {
        text-decoration: <?php if($settings->title_underline_on_hover == "Yes"){echo "underline";}else{echo "none";} ?> ;
        color : #036;
    }

    #publisher{
        font-family: <?php echo $settings->publisher_font; ?> !important;
        font-size: <?php echo $settings->publisher_font_size; ?>px !important;
        color : <?php echo $settings->publisher_font_color; ?> !important;

    }
    #publisher2{
        margin-top: -<?php echo $settings->vertical_spacing_between_title_and_pub; ?>px !important ;
    }
    #author{
        font-family: <?php echo $settings->author_font; ?> !important;
        font-size: <?php echo $settings->author_font_size; ?>px !important;
        color : <?php echo $settings->author_font_color; ?> !important;
    }
    .hover_effect:hover,.hover_effect:focus {
        color:#801212 !important;
    }
    hr {
        position: relative;
        border: none;
        height: 1.5px;
        background: black;
        margin-top: 1px !important;
    }
    a {
        text-decoration: <?php if($settings->title_underline_option == "Yes"){echo "underline";}else{echo "none";} ?> ;;
        color:#000;
    }
    .col-sm-12{
        padding-right: 1px !important;
        padding-left: 1px !important;
    }
    @media (max-width: 768px)and (min-width: 322px)  {
        .main-panel{
            padding-left: 0 !important;
        }
    }

    @media (min-width: 992px) {
        #mobile_view{
            display: none;
        }
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
            padding-left: 0px !important;

        }
        #more_liberal{

            position: absolute;
            margin-top : 20px !important;
            padding-left: 0px !important;

        }
        #more_conservative{
            display: block;
            margin-top : 0px !important;
            float:right !important;
            text-align: center;
        }
        #desktop_view{
            display: none;
        }
        #mobile_view{
            display: block;
        }
    }
    .main-panel{
        width: calc(100%) !important;
    }
    .range_slider{
        width:40%;
        text-align: center !important;
        display: inline-block !important;
        margin: 0 auto;

    }
    .totalbias_logo{
        width:40%;
        height: 45%;
    }
    #customRange2{
        width:40%;
        height: 10px;
        display: inline-block !important;
        -webkit-transition: 2s;
        transition: width 2s;
        user-select: none;
    }
    .red_slider{
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        -webkit-transition: 5.2s;
        transition: all .5s ease-in-out;
    }

    .red_slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 25px;
        height: 25px;
        background: #900;
        cursor: pointer;
        transition: all .5s ease-in-out;
    }
    .blue_slider{
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
        -webkit-transition: 5.2s;
        transition: all .5s ease-in-out;
    }

    .blue_slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 25px;
        height: 25px;
        background: #003366;
        cursor: pointer;
        transition: all .5s ease-in-out;
    }
    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 25px;
        background: #d3d3d3;
        outline: none;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 25px;
        height: 25px;
        background: #003366;
        cursor: pointer;
        background-image: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 50%, rgba(153,0,0,1) 51%);


    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        cursor: pointer;

    }


</style>
