{{-- test admin dashboaqrd. --}}



@extends('admin.app')
@section('title') Dashboard @endsection
@section('content')

<style type="text/css">
    .row-md-body.no-nav {
    margin-top: 70px;
}
</style>
<div class="fixed-row">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
    </div>
</div>
    <div class="row section-mg row-md-body no-nav">
        <div class="col-md-3 dash-card-col">
            <a href="{{route('admin.category.index')}}">
                <div class="card card-body mb-0">
                    <h5 class="mb-2">Category ({{count($data->categories)}})</h5>
                    <p class="small mb-0">
                        @foreach ($data->categories as $key=> $category)
                            {{($loop->first ? '' : ', ').($category->name_in_english)}}
                            @php if ($key == 2) {echo '...';break;} @endphp
                        @endforeach
                    </p>
                    {{-- <i class="fas fa-list-alt app-menu__icon fa fa-group"></i> --}}
                </div>
            </a>
        </div>
        <div class="col-md-3 dash-card-col">
            <a href="{{route('admin.puja.index')}}">
                <div class="card card-body mb-0">
                    <h5 class="mb-2">Puja ({{count($data->pujas)}})</h5>
                    <p class="small mb-0">
                        @foreach ($data->pujas as $key=> $puja)
                            {{($loop->first ? '' : ', ').($puja->name_in_english)}}
                            @php if ($key == 2) {echo '...';break;} @endphp
                        @endforeach
                    </p>
                    {{-- <i class="fas fa-list-alt"></i> --}}
                </div>
            </a>
        </div>
        <div class="col-md-3 dash-card-col">
            <a href="{{route('admin.puja-service.index')}}">
                <div class="card card-body mb-0">
                    <h5 class="mb-2">Puja Service ({{count($data->pujaServices)}})</h5>
                    <p class="small mb-0">
                        @foreach ($data->pujaServices as $key=> $pujaService)
                            {{($loop->first ? '' : ', ').($pujaService->service_name)}}
                            @php if ($key == 2) {echo '...';break;} @endphp
                        @endforeach
                    </p>
                    {{-- <i class="fas fa-list-alt"></i> --}}
                </div>
            </a>
        </div>
        <div class="col-md-3 dash-card-col">
            <a href="{{route('admin.customer.index')}}">
                <div class="card card-body mb-0">
                    <h5 class="mb-2">Customer ({{count($data->customers)}})</h5>
                    <p class="small mb-0">
                        @foreach ($data->customers as $key=> $customer)
                            {{($loop->first ? '' : ', ').($customer->fName). ''.($customer->lName)}}
                            @php if ($key == 2) {echo '...';break;} @endphp
                        @endforeach
                    </p>
                    {{-- <i class="fas fa-list-alt"></i> --}}
                </div>
            </a>
        </div>
        <div class="col-md-3 dash-card-col">
            <a href="{{route('admin.booking.index')}}">
                <div class="card card-body mb-0">
                    <h5 class="mb-2">Booking ({{count($data->bookings)}})</h5>
                    <p class="small mb-0">
                        @foreach ($data->bookings as $key=> $booking)
                            {{($loop->first ? '' : ', ').( $booking->puja  ? $booking->puja->name_in_english : 'N/A')}}
                            @php if ($key == 2) {echo '...';break;} @endphp
                        @endforeach
                    </p>
                    {{-- <i class="fas fa-list-alt"></i> --}}
                </div>
            </a>
        </div>
        {{-- <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Category Leve One</h4>
                    <p><b> {{count($categoryLvlOne)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Category Leve Two</h4>
                    <p><b>{{count($categoryLvlTwo)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Category Leve Three</h4>
                    <p><b>{{count($categoryLvlThree)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Category Leve Four</h4>
                    <p><b>{{count($categoryLvlFour)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Category Leve Five</h4>
                    <p><b>{{count($categoryLvlFive)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Brand</h4>
                    <p><b>{{count($brands)}} </b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon">
            <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>product</h4>
                    <p><b>{{count($products)}} </b></p>
                </div>
            </div>
        </div> --}}
       
       
    </div>
@endsection