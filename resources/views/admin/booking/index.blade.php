@extends('admin.app')
@section('title')  @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> Booking</h1>
            <p>Booking List</p>
        </div>
        {{-- <a href="{{ route('admin.booking.create')}}" class="btn btn-primary pull-right">Add New</a> --}}
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                {{-- @if (Session::get('success'))
                    <div class="alert alert-success"> {{Session::get('success')}} </div>
                @endif --}}
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th> Customer Name </th>
                                <th> Puja </th>
                                <th> Amount </th>
                                <th> Advance Amount </th>
                                <th> Date </th>
                                <th> Status </th>
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $key => $booking)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ $booking->user->fName }}</td>
                                    <td>{{ $booking->puja  ? $booking->puja->name_in_english : 'N/A' }}</td>
                                    <td>{{ $booking->amount }}</td>
                                    <td>{{ $booking->advance_amount }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                            <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-booking_id="{{ $booking['id'] }}" {{ $booking['status'] == 1 ? 'checked' : '' }}>
                                                    <div class="knobs"><span>Inactive</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.booking.details', $booking['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});</script>
@endpush