<div class="row title text-capitalize h5">
    <div class="col-lg-12">List of Cricket Teams</div>
</div>

<div class="row">
    <div class="col-lg-12">&nbsp;</div>
</div>
<div class="row title text-capitalize header">
    <div class="col-lg-1">#</div>
    <div class="col-lg-4">Photo</div>
    <div class="col-lg-3">Team Name</div>
</div>
@foreach($teams as $key=>$team)
    <a href="javascript:void(0);" onclick="javascript:getPlayers({{$team->id}});">
    <div id={{$team->id}} class="row {{$selectedTeam->id==$team->id ? 'mark':'' }}">
        <div class="col-lg-1">{{$key+1}}</div>
        <div class="col-lg-4">

                <img class="thumbnail pull-left img-thumbnail" alt="{{ $team->name }}" src="images/teams/{{ $team->logo_uri }}" style="width:100px;height:75px;" />

        </div>
        <div class="col-lg-3"> {{ $team->name }}</div>
    </div>
    </a>
@endforeach