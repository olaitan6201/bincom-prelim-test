<div>
    <div class="form-group">
        <select wire:model="lga_search" class="form-control">
            <option value="0">Select LGA . . .</option>
            @foreach ($lgas as $lga)
                <option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
            @endforeach
        </select>


        @if(!empty($lga_search))

        <table class="table">
            <thead>
                <tr>
                    <th>Party</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parties as $party)
                    <tr>
                        <th>{{$party}}</th>
                        <td>{{$result[$party]}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Total</th>
                    <td>{{$total}}</td>
                </tr>
            </tfoot>
        </table>
        @endif
    </div>
</div>
