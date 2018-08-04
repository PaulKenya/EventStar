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
            <h1 class="entry-title">University of Nairobi Events</h1>
        </div>
    </section>

    @php
        $div_counter=1;
    @endphp
    <section class="section-full-events-schedule">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <ul class="nav nav-tabs event-tabs" role="tablist">
                        @if(isset($grouped_event_date_results))
                            @foreach($grouped_event_date_results as $grouped_event_date_result)
                                <li role="presentation"
                                    @if($div_counter==1)
                                    class="active"
                                    @else
                                            @endif
                                >
                                    <a href="#tab{{$div_counter}}" role="tab" data-toggle="tab">
                                        @php
                                            $div_counter = $div_counter+1;
                                            $date=$grouped_event_date_result->event_date;
                                            $day_of_week = date('l', strtotime($date));
                                            $date_number = date('d', strtotime($date));
                                            $month_text = date('M', strtotime($date));
                                            $year_number = date('Y', strtotime($date));
                                        @endphp
                                        <strong>{{$day_of_week}}</strong>
                                        {{$date_number}}
                                        <span>{{$month_text}} {{$year_number}}</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="section-content">
                    <div class="tab-content">
                        @php
                            $tab_counter = 0;
                            $activated_text = 0;
                        @endphp
                        @if(isset($grouped_event_date_results))
                            @foreach($grouped_event_date_results as $grouped_event_date_result)
                                @php
                                    $tab_counter=$tab_counter+1;
                                    $sort_by_date=$grouped_event_date_result->event_date;
                                @endphp
                                <div role="tabpanel"
                                     @if($tab_counter==1)
                                     class="tab-pane active"
                                     @else
                                     class="tab-pane"
                                     @endif
                                     id="tab{{$tab_counter}}">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3">
                                            <ul class="nav" role="tablist">
                                                @foreach($events_results as $events_result_a)
                                                    @if($events_result_a->event_date ==$sort_by_date)
                                                        @php
                                                            $activated_text++;
                                                            $remaining_tickets= $events_result_a->number_of_tickets_available - $events_result_a->tickets_sold;
                                                        @endphp
                                                        <li>
                                                            <a href="#det{{$events_result_a->id}}" aria-controls="tab1-hr1" role="tab" data-toggle="tab">
                                                                <span class="schedule-time">{{$events_result_a->event_time}} <strong>HRS</strong></span>
                                                                <span class="schedule-title">{{$events_result_a->event_name}}</span>
                                                                <span class="schedule-ticket-info">{{$remaining_tickets}} tickets left</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="tab-content">
                                                @foreach($events_results as $events_result_b)
                                                    @if($events_result_b->event_date ==$sort_by_date)
                                                        @php
                                                            $remaining_tickets_event= $events_result_b->number_of_tickets_available - $events_result_b->tickets_sold;
                                                            $date_event = $events_result_b->event_date;
                                                            $day_of_week_event = date('l', strtotime($date_event));
                                                            $date_number_event = date('d', strtotime($date_event));
                                                            $month_text_event = date('M', strtotime($date_event));
                                                            $year_number_event = date('Y', strtotime($date_event));
                                                        @endphp
                                                        <div role="tabpanel" class="tab-pane" id="det{{$events_result_b->id}}">
                                                            <img src="{{asset('assets/images/full-event-schedule-img.jpg')}}" alt="image">
                                                            <div class="full-event-info">
                                                                <div class="full-event-info-header">
                                                                    <h2>{{$events_result_b->event_name}}</h2>
                                                                    <span class="ticket-left-info">{{$remaining_tickets_event}} Tickets Left</span>
                                                                    <div class="clearfix"></div>
                                                                    <span class="event-date-info">{{$day_of_week_event}}, {{$month_text_event}} {{$date_number_event}} {{$year_number_event}} | {{$events_result_b->event_time}}</span>
                                                                    <span class="event-venue-info">{{$events_result_b->event_location}}</span>
                                                                </div>
                                                                <div class="full-event-info-content">
                                                                    <p>{{$events_result_b->event_description}}</p>
                                                                    <a class="book-ticket" href="/book/{{$events_result_b->id}}">Book Ticket</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
