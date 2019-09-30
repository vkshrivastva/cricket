<div class="row title text-capitalize h2">
    <div class="col-lg-12">Fixture List</div>
</div>

@foreach($schedule as $index=>$round)
    <div class="row title text-capitalize h5">
        <div class="col-lg-12 bg-dark">Round {{$index+1}}</div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr class="bg-primary">
                    <th>S No.</th>
                    <th>Tournament</th>
                </tr>
                @foreach($round as $ind=>$game)
                    <tr class="bg-info">
                        <td>{{$ind + 1}}</td>
                        <td>{{$game[0].' VS '.$game[1]}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endforeach
