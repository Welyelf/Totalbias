
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">

                                                <div class="tab">
                                                    <button class="tablinks" onclick="openCity(event, 'NEWS')">News</button>
                                                    <button class="tablinks" onclick="openCity(event, 'VIDEOS')">Videos</button>
                                                    <button class="tablinks" onclick="openCity(event, 'PODCASTS')">Podcasts</button>
                                                </div>

                                                <div id="NEWS" class="tabcontent active">
                                                    <h3>NEWS | Scoring Algorithm</h3>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card card-stats">
                                                            <div class="card-body ">
                                                                <div class="col-12 col-md-12">
                                                                        <div class="panel">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4"> </div>
                                                                                    <div class="col-sm-4">
                                                                                        <form action="/administrator/scoring" method="post">
                                                                                            <div class="col-sm-12">
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-form-label text-md-right">Sort 1st</label>
                                                                                                        <select class="form-control" name="sort_first" id="news_sort_first">
                                                                                                            <option <?php if($news_data->sort_first == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                            <option <?php if($news_data->sort_first == 1){ echo "selected"; } ?> value="1">Priority</option>
                                                                                                            <option <?php if($news_data->sort_first == 2){ echo "selected"; } ?> value="2">Rating</option>
                                                                                                            <option <?php if($news_data->sort_first == 3){ echo "selected"; } ?> value="3">Column</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-form-label text-md-right">Sort 2nd</label>
                                                                                                    <select class="form-control" name="sort_second" id="sort_second">
                                                                                                        <option <?php if($news_data->sort_second == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                        <option <?php if($news_data->sort_second == 1){ echo "selected"; } ?> value="1">Date And Time</option>
                                                                                                     </select>
                                                                                                </div>
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-form-label text-md-right">Exclude rating values (separated by comma) </label>
                                                                                                    <input type="text" value="<?php echo $news_data->exc_rate_values;  ?>"  name="exc_rate_values" id="exc_rate_values" class="form-control">
                                                                                                </div>
                                                                                                <div class="form-group row">
                                                                                                    <label class="col-form-label text-md-right">Exclude dates older than (days) </label>
                                                                                                    <input type="number" value="<?php echo $news_data->exc_days_older;  ?>"  name="exc_days_older" id="exc_days_older" class="form-control">
                                                                                                </div>
                                                                                                <input type="text"  name="position" id="position" value="news" class="form-control" style="display: none;">
                                                                                                <div class="modal-footer">
                                                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel-footer">

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

                                                <div id="VIDEOS" class="tabcontent">
                                                    <h3>VIDEOS | Scoring Algorithm </h3>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card card-stats">
                                                            <div class="card-body ">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="panel">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                <div class="col-sm-4"> </div>
                                                                                <div class="col-sm-4">
                                                                                    <form action="/administrator/scoring" method="post">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Sort 1st</label>
                                                                                                <select class="form-control" name="sort_first" id="news_sort_first">
                                                                                                    <option <?php if($videos_data->sort_first == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                    <option <?php if($videos_data->sort_first == 1){ echo "selected"; } ?> value="1">Priority</option>
                                                                                                    <option <?php if($videos_data->sort_first == 2){ echo "selected"; } ?> value="2">Rating</option>
                                                                                                    <option <?php if($videos_data->sort_first == 3){ echo "selected"; } ?> value="3">Column</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Sort 2nd</label>
                                                                                                <select class="form-control" name="sort_second" id="sort_second">
                                                                                                    <option <?php if($videos_data->sort_second == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                    <option <?php if($videos_data->sort_second == 1){ echo "selected"; } ?> value="1">Date And Time</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Exclude rating values (separated by comma) </label>
                                                                                                <input type="text" value="<?php echo $videos_data->exc_rate_values;  ?>"  name="exc_rate_values" id="exc_rate_values" class="form-control">
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Exclude dates older than (days) </label>
                                                                                                <input type="number" value="<?php echo $videos_data->exc_days_older;  ?>"  name="exc_days_older" id="exc_days_older" class="form-control">
                                                                                            </div>
                                                                                            <input type="text"  name="position" id="position" value="videos" class="form-control" style="display: none;">
                                                                                            <div class="modal-footer">
                                                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                </div>
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
                                                <div id="PODCASTS" class="tabcontent">
                                                    <h3>PODCASTS | Scoring Algorithm </h3>
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card card-stats">
                                                            <div class="card-body ">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-12">
                                                                        <div class="panel">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                <div class="col-sm-4"> </div>
                                                                                <div class="col-sm-4">
                                                                                    <form action="/administrator/scoring" method="post">
                                                                                        <div class="col-sm-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Sort 1st</label>
                                                                                                <select class="form-control" name="sort_first" id="news_sort_first">
                                                                                                    <option <?php if($podcast_data->sort_first == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                    <option <?php if($podcast_data->sort_first == 1){ echo "selected"; } ?> value="1">Priority</option>
                                                                                                    <option <?php if($podcast_data->sort_first == 2){ echo "selected"; } ?> value="2">Rating</option>
                                                                                                    <option <?php if($podcast_data->sort_first == 3){ echo "selected"; } ?> value="3">Column</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Sort 2nd</label>
                                                                                                <select class="form-control" name="sort_second" id="sort_second">
                                                                                                    <option <?php if($podcast_data->sort_second == 0){ echo "selected"; } ?> value="0">None</option>
                                                                                                    <option <?php if($podcast_data->sort_second == 1){ echo "selected"; } ?> value="1">Date And Time</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Exclude rating values (separated by comma) </label>
                                                                                                <input type="text" value="<?php echo $podcast_data->exc_rate_values;  ?>"  name="exc_rate_values" id="exc_rate_values" class="form-control">
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-form-label text-md-right">Exclude dates older than (days) </label>
                                                                                                <input type="number" value="<?php echo $podcast_data->exc_days_older;  ?>"  name="exc_days_older" id="exc_days_older" class="form-control">
                                                                                            </div>
                                                                                            <input type="text"  name="position" id="position" value="podcasts" class="form-control" style="display: none;">
                                                                                            <div class="modal-footer">
                                                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                </div>
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
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel-body">


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
</div>
<style>
    body {font-family: Arial;}

    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
<script>
    document.getElementById("NEWS").style.display = "block";

    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>