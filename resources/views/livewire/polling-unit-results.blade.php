{{-- <div class="container"> --}}
    <div class="row">
        <style>
            svg{
                display: none!important;
            }
        </style>

        <div class="form-group">
            <input type="search" wire:model='search' placeholder="Search . . . " class="form-control">
        </div>
        
        @foreach ($pu_results as $pu)
        <div class="col-md-6">
            <div class="card my-2">
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Unit Name</th>
                                <td>{{Str::upper($pu->pu_name->polling_unit_name)}}</td>
                            </tr>
                            <tr>
                                <th>Unit Number</th>
                                <td>{{$pu->pu_name->polling_unit_number}}</td>
                            </tr>
                            <tr>
                                <th>Ward</th>
                                <td>{{$pu->ward_name}}</td>
                            </tr>
                            <tr>
                                <th>LGA</th>
                                <td>{{$pu->lga_name}}</td>
                            </tr>
                            <tr>
                                <th>Party</th>
                                <td>{{$pu->party_abbreviation}}</td>
                            </tr>
                            <tr>
                                <th>Party Score</th>
                                <td>{{$pu->party_score}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach

        {{$pu_results->links()}}
    </div>
{{-- </div> --}}
