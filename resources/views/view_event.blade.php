@extends('layouts.master')
@section('count')
    @php
        $count_cart=0;
    @endphp
    @if(isset($cart_results))
        @foreach($cart_results as $cart_result)
            @php
                $count_cart=$count_cart+1;
            @endphp
        @endforeach
    @endif
    {{$count_cart}}
@endsection
@section('content')
    <section class="section-page-header">
        <div class="container">
            <h1 class="entry-title">View Events</h1>
        </div>
    </section>
    <section class="section-page-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered " id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th><b>TITLE</b></th>
                                    <th><b>EVENT TYPE</b></th>
                                    <th><b>LOCATION</b></th>
                                    <th><b>DATE</b></th>
                                    <th><b>STUDENTS ATTENDING</b></th>
                                    <th><b>TICKETS AVAILABLE</b></th>
                                    <th><b>AMOUNT MADE</b></th>
                                    <th><b>STATUS</b></th>
                                    <th><b>EVENT HOST</b></th>
                                    <th><b></b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($events_results))
                                    @foreach($events_results as $events_result)
                                        @php
                                            $tickets_available = $events_result->number_of_tickets_available - $events_result-> tickets_sold;
                                            $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                                            $tickets_status_code = $events_result->event_status;
                                        @endphp
                                        @foreach($status_code_results as $status_code_result)
                                            @if($status_code_result->status_code==$tickets_status_code)
                                                @php
                                                $Status=$status_code_result->status_name;
                                                $color=$status_code_result->status_color;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td style="text-align: center;">{{$events_result->event_name}}</td>
                                            <td style="text-align: center;">{{$events_result->event_type}}</td>
                                            <td style="text-align: center;">{{$events_result->event_location}}</td>
                                            <td style="text-align: center;">{{$events_result->event_date}}</td>
                                            <td style="text-align: center;">{{$events_result->tickets_sold}}</td>
                                            <td style="text-align: center;">{{$tickets_available}}</td>
                                            <td style="text-align: center;">Ksh. {{$amount_made}}</td>
                                            <td style="text-align: center;"><i class="fas fa-circle" style="color: {{$color}};"></i> {{$Status}}</td>
                                            <td style="text-align: center;">{{$events_result->event_host}}</td>
                                            <td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#events{{$events_result->id}}">
                                                    Edit
                                                </button></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(isset($events_results))
        @foreach($events_results as $events_result)
            <div class="modal fade" id="events{{$events_result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{route('changeEventInfo')}}" method="post" >{!! csrf_field() !!}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">CHANGE EVENT INFO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>{{$events_result->event_name}}</strong></p>
                                <p>Change Event Status down below.</p>
                                <input type="hidden" name="event_id" value="{{$events_result->id}}">
                                <div class="form-group row">
                                    <label for="event_status" class="col-sm-3">Event Status:</label>
                                    <div class="col-sm-9">
                                        <select name="event_status" id="event_status" class="col-sm-12" style="height: 34px;">
                                            <option value="1">Cancelled</option>
                                            <option value="2">On-going</option>
                                            <option value="3">Out of Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Event Status</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection