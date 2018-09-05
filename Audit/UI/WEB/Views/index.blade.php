@extends('layouts.app') 

@section('title','Audit/History')
@section('page-header')
    <i class="fa fa-clock-o"></i>
    Audit/History
@endsection

@section('content')

<div class="box">

    <div class="box-body">
        {{ $audits->links() }}
    </div>
        
    <div class="box-body no-padding">
    <table class="table table-responsive">
            <tbody>
                <tr>
                    <th>Date</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>IP</th>
                    <th>Action</th>
                </tr>
                @foreach ($audits as $audit)
                    @php  
                        $type = explode('\\',$audit->auditable_type);
                        $url = explode('/',$audit->url);
                        $domain = explode('.',$url[2]);
                        $admin_domain = $url[0].'//'.env('ADMIN_PREFIX_URL','backend').'.'.$domain[1].'.'.$domain[2];
                    @endphp
                    <tr>
                        <td>{{ $audit->created_at->toDateTimeString() }}</td>
                        <td>{{ $audit->event }}</td>
                        <td>{{ $type[count($type)-1] }}</td>
                        <td>{{ $audit->ip_address }}</td>
                        <td><a href="{{ route('audit.show', getHashKey($audit->id)) }}" class="btn btn-xs btn-primary">View Details</a></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div class="box-body">
        {{ $audits->links() }}
    </div>
    
</div>


@endsection

@push('after-styles')
@endpush

@push('after-scripts')    
@endpush
