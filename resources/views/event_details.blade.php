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
<section class="section-select-seat-2-featured-header">
    <div class="container">
        <div class="section-content">
            @if(isset($events_details_results))
                @foreach($events_details_results as $events_details_result)
                    @php
                        $date_event = $events_details_result->event_date;
                        $day_of_week_event = date('l', strtotime($date_event));
                        $date_number_event = date('d', strtotime($date_event));
                        $month_text_event = date('M', strtotime($date_event));
                        $year_number_event = date('Y', strtotime($date_event));
                    @endphp
                    <p>{{$events_details_result->event_location}}<strong>{{$events_details_result->event_name}} CONCERT</strong> <span>{{$day_of_week_event}} {{$date_number_event}} {{$month_text_event}} {{$year_number_event}} {{$events_details_result->event_time}}</span></p>
                @endforeach
            @endif
        </div>
    </div>
</section>

<section class="section-page-header">
    <div class="container">
        <h1 class="entry-title">Select Your Seat</h1>
    </div>
</section>

<section class="section-page-content">
    <div class="container">
        @if(isset($events_details_results))
            @foreach($events_details_results as $events_details_result)
                @php
                    $tickets_available = $events_details_result->number_of_tickets_available - $events_details_result-> tickets_sold;
                @endphp
                <div class="row">
                    <div id="primary" class="col-md-8">
                        <div class="stage-name">
                            <h3>{{$events_details_result->event_name}}</h3>
                            <p>Kenya, Nairobi <br> <span>Concert Seating</span></p>
                        </div>
                        <div class="">
                            <p>{{$events_details_result->event_description}}</p>
                        </div>
                        <div class="stage-name">
                            <h3>{{$events_details_result->event_name}} Details</h3>
                        </div>
                        <div class="">
                            <p><b>EVENT TYPE: </b>{{$events_details_result->event_type}}</p>
                            <p><b>EVENT DATE: </b>{{$events_details_result->event_date}}</p>
                            <p><b>EVENT TIME: </b>{{$events_details_result->event_time}}</p>
                            <p><b>EVENT LOCATION: </b>{{$events_details_result->event_location}}</p>
                            <p><b>TICKET PRICE: </b>{{$events_details_result->price_per_ticket}}</p>
                            @if(isset($events_status_results))
                                @foreach($events_status_results as $events_status_result)
                                    @if($events_status_result->status_code==$events_details_result->event_status)
                                        <p><b>EVENT STATUS: </b>{{$events_status_result->status_name}}</p>
                                    @endif
                                @endforeach
                            @endif
                            <p><b>EVENT HOST: </b>{{$events_details_result->event_host}}</p>
                        </div>
                    </div>

                    <div id="secondary" class="col-md-4">
                        <div class="ticket-price">
                            <form action="{{route('add_to_cart')}}" method="post" >{!! csrf_field() !!}
                                <div class="tickets">
                                    <input type="hidden" name="user_id" value="{{Illuminate\Support\Facades\Auth::user()->id}}">
                                    <input type="hidden" name="event_id" value="{{$events_details_result->id}}">
                                    <input type="hidden" name="cart_status" value="1">
                                    <input type="hidden" name="price_per_tickets" value="{{$events_details_result->price_per_ticket}}">
                                    <input type="hidden" name="event_name" value="{{$events_details_result->event_name}}">
                                    <label>How many tickets?</label>
                                    <select class="selectpicker dropdown" name="cart_tickets">
                                        <option value="1">1 Ticket</option>
                                        <option value="2">2 Tickets</option>
                                        <option value="3">3 Tickets</option>
                                        <option value="4">4 Tickets</option>
                                        <option value="5">5 Tickets</option>
                                        <option value="6">6 Tickets</option>
                                        <option value="7">7 Tickets</option>
                                        <option value="8">8 Tickets</option>
                                        <option value="9">9 Tickets</option>
                                        <option value="10">10 Tickets</option>
                                    </select>
                                    <label>Price Range</label>
                                    <input id="price-range" type="text" class="span2" value="" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[10,200]"/>
                                    <br>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-shopping-cart"></i> ADD TO CART</button>
                                </div>
                            </form>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Section</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="select-seat selected">
                                        <td>Main <span>{{$tickets_available}} Tickets left</span></td>
                                        <td>Ksh. {{$events_details_result->price_per_ticket}} <span>Per seat</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
@endsection
