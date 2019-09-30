<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=2">
        <style>
            .selected{background-color: #f1f3f9;
                border: 2px solid #e5e5e5 !important;
                }
        </style>

        <title>Cricket Team</title>
        <!-- Fonts -->
        @if(env('APP_ENV')=='LOCAL')
            <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        @else
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        @endif
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="page-header">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/')}}">Teams</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL::to('/fixture')}}">Get Fixtures</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="row title">
                    <div class="col-lg-12 h1 text-center m ">Cricket Team DashBoard</div>
                </div>
                <div class="row">
                    @if(!empty($teams))
                        <div id="team-list-container" class="col-lg-3">
                         @include("cricket.team")
                        </div>   
                    @endif
                    @if(!empty($players))
                        <div id="player-list-container" class="col-lg-6 border border-box">
                            @include("cricket.player")
                        </div>
                        <div id="player-list-container" class="col-lg-3 border border-box">
                            @include("cricket.player_history")
                        </div>
                    @endif
                    @if(!empty($schedule))
                        <div id="fixture-container" class="col-lg-12 border border-box">
                            @include("cricket.fixture")
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">&nbsp;
                </div>
            </div>
            <div class="footer">
                @if(env('APP_ENV')=='LOCAL')
                    <script src="js/jquery.min.js" type="text/javascript"></script>
                @else
                    <script
                  src="https://code.jquery.com/jquery-3.2.1.min.js"
                  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                  crossorigin="anonymous"></script>
                @endif

                <script>

                    function getPlayers(teamId){
                        $.ajax({
                            url:'getPlayers/',
                            data: {'team_id':teamId},
                            type:'get',
                            success:function(res) {
                                $('#player-list-container').html(res);
                                $('#team-list-container .row.mark').removeClass('mark mark-success');
                                $('#'+teamId).addClass('mark');
                            },
                            dataType: "html"
                        });
                    }
                    $(document).ready(function(){
                        $('.playerobj').on('click',function(){
                            let data=JSON.parse($(this).attr('data-history'));
                            let historyData='';
                            Object.keys(data).forEach(function(key) {
                                historyData += '<div class="row">';
                                historyData +='<div class="col-lg-5 font-weight-bold text-capitalize">'+ key + '</div>'; // First Column
                                historyData +='<div class="col-lg-2 font-weight-bold">:</div>'; // Second Column
                                historyData +='<div class="col-lg-5">'+ data[key] + '</div>'; // Third Column
                                historyData +='</div>'; //Close of row div
                            });
                            // console.log(contents);
                            $('#player_history').html(historyData);
                        });
                    });
                </script>
            </div>
        </div>
    </body>
</html>
