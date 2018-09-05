@extends('layouts.app') 

@section('title','Audit/History Details')
@section('page-header')
    <i class="fa fa-clock-o"></i>
    Audit/History Details [{{ $audit->getHashedKey() }}]
@endsection
@section('content')
    @php  
        $type = explode('\\',$audit->auditable_type);
        $url = explode('/',$audit->url);
        $domain = explode('.',$url[2]);
        $admin_domain = $url[0].'//'.env('ADMIN_PREFIX_URL','backend').'.'.$domain[1].'.'.$domain[2];
    @endphp

    <div class="row">
       {{-- Details --}}
        @include('audit::partials.show_details')
        {{-- Modified --}}
        @include('audit::partials.show_modified')
    </div>

@endsection

@push('after-styles')
    <style>
        .label {
            font-size: 74% !important;
        }
    </style>
@endpush

@push('after-scripts')    
@endpush
