@extends('admin.app')
@section('title')Booking @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Booking Details</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title"> Booking Details</h3>
                <form action="#">
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="user_name"> User Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="user_name" id="user_name" value="{{  $booking->user ? $booking->user->fName.' '.$booking->user->lName : 'N/A' }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="uniqueId"> Id <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="uniqueId" id="uniqueId" value="{{  $booking->uniqueId }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="amount"> Amount<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="amount" id="amount" value="{{  $booking->amount }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="advance_amount"> Advance Amount <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="advance_amount" id="advance_amount" value="{{  $booking->advance_amount }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="after_service"> After Service <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="after_service" id="after_service" value="{{  $booking->after_service }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="date"> Date <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="date" id="date" value="{{  $booking->date }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="time"> Time <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="time" id="time" value="{{  $booking->time }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="address"> Address <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="address" id="address" value="{{  $booking->address }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="city"> City <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="city" id="city" value="{{  $booking->city }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="landmark"> Landmark <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="landmark" id="landmark" value="{{  $booking->landmark }} readOnly"/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="pin"> Pin<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="pin" id="pin" value="{{  $booking->pin }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="mobile"> Mobile<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="mobile" id="mobile" value="{{  $booking->mobile }}" readOnly/>
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="is_paid"> Paid<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" name="is_paid" id="is_paid"@if($booking->is_paid == 1)  value="Yes" @else value="No" @endif readOnly/>
                        </div>
                    </div>
                    
                   
                    
                    <div class="tile-footer">
                        <a class="btn btn-secondary" href="{{ route('admin.booking.index') }}"><i class="fa fa-fw fa-lg "></i>Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection