<div class="col-md-4">
    <div class="box">
        <div class="box-header">
            Details
        </div>
        <div class="box-body no-padding">
            <table class="table table-responsive">
                <tbody>
                    {{-- Audit Type --}}
                    <tr>
                        <th width="20%">Audit Type</th>
                        <td>{{ $type[count($type)-1] }}</td>
                    </tr>
                    {{-- Audit Event --}}
                    <tr>    
                        <th>Event</th>
                        <td>{{ title_case($audit->event) }}</td>
                    </tr>
                    {{-- Audit IP Address--}}
                    <tr>    
                        <th>IP Address</th>
                        <td>{{ $audit->ip_address }}</td>
                    </tr>
                    {{-- Audit User Agent --}}
                    <tr>    
                        <th>Agent</th>
                        <td>{{ $audit->user_agent }}</td>
                    </tr>
                    {{-- Audit Time --}}
                    <tr>    
                        <th>Created At</th>
                        <td>{{ $audit->created_at->toDateTimeString() }}</td>
                    </tr>
                    <tr>    
                        <th>Updated At</th>
                        <td>{{ $audit->updated_at->toDateTimeString() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>