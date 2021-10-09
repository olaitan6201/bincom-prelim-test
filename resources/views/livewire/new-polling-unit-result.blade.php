<div>
    @if(Session::has('message'))
    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
    @endif
    <form wire:submit.prevent="addPollResult">
        <div class="form-group my-2">
            <div class="row">
                <label class="col-md-4">Unit Name</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" wire:model="unit_name"/>
                </div>
            </div>
        </div>
        <div class="form-group my-2">
            <div class="row">
                <label class="col-md-4">Ward</label>
                <div class="col-md-8">
                    <select wire:model="ward_id" class="form-control">
                        <option value="">Select ward . . .</option>
                        @foreach ($wards as $ward)
                        <option value="{{$ward->ward_id}}">{{$ward->ward_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group my-2">
            <div class="row">
                <label class="col-md-4">LGA</label>
                <div class="col-md-8">
                    <select wire:model="lga_id" class="form-control">
                        <option value="">Select LGA . . .</option>
                        @foreach ($lgas as $lga)
                            <option value="{{$lga->lga_id}}">{{$lga->lga_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        @for($i=0; $i<$num; $i++)
        <div class="form-group my-2">
            <div class="row">
                <div class="col-md-4">
                    <label>{{$parties[$i]['partyname']}}</label>
                </div>
                <div class="col-md-8">
                    <input type="number" class="form-control" wire:model="unitCount.{{$i}}" min="0">
                </div>
            </div>
        </div>
        @endfor

        <div class="form-group my-2">
            <div class="row">
                <div class="col-md-12 text-right">
                    <input type="submit" value="Submit" class="btn btn-success btn-block btn-sm pull-right"/>
                </div>
            </div>
        </div>

    </form>
    {{-- {{print_r($unitCount)}} --}}
</div>
