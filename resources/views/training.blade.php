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

    <section class="section-featured-header all-sports-events">
        <div class="container">
            <div class="section-content">
                <h1>All Training Events</h1>
            </div>
        </div>
    </section>

    <section class="section-search-content">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-md-12">

                    <div class="search-result-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>All Sports Events at San Francisco</h2>
                                @php
                                    $count=0;
                                    if(isset($events_details_results)){
                                        foreach ($events_details_results as $result){
                                            $count=$count+1;
                                        }
                                    }
                                @endphp
                                <span>Showing 1-{{$count}} of {{$count}} Results</span>
                            </div>
                        </div>
                    </div>
                    @if(isset($events_details_results))
                        @foreach($events_details_results as $events_details_result)
                            @php
                                $date=$events_details_result->event_date;
                                $day_of_week = date('l', strtotime($date));
                                $date_number = date('d', strtotime($date));
                                $month_text = date('M', strtotime($date));
                                $year_number = date('Y', strtotime($date));
                            @endphp
                            <div class="search-result-item">
                                <div class="row">
                                    <div class="search-result-item-info col-sm-9">
                                        <h3>{{$events_details_result->event_name}}</h3>
                                        <ul class="row">
                                            <li class="col-sm-5 col-lg-6">
                                                <span>Venue</span>
                                                {{$events_details_result->event_location}}
                                            </li>
                                            <li class="col-sm-4 col-lg-3">
                                                <span>{{$day_of_week}}</span>
                                                {{$month_text}}. {{$date_number}}th, {{$year_number}}
                                            </li>
                                            <li class="col-sm-3">
                                                <span>Time</span>
                                                {{$events_details_result->event_time}} HRS
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="search-result-item-price col-sm-3">
                                        <span>Price From</span>
                                        <strong>Ksh. {{$events_details_result->price_per_ticket}}</strong>
                                        <a href="/book/{{$events_details_result->id}}">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection