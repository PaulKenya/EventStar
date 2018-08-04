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
@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {

                labels: [
                    @if(isset($events_results))
                        @foreach($events_results as $events_result)
                            "{{$events_result->event_name}}",
                        @endforeach
                    @endif
                ],
                datasets: [{
                    label: "Amount Made (Ksh.)",
                    backgroundColor: [

                        @if(isset($events_results))
                            @foreach($events_results as $events_result)
                                @php
                                    $letters = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
                                    $color = '#';
                                    for ($i = 0; $i < 6; $i++) {
                                        $count=random_int(0,15);
                                        $color= $color.$letters[$count];
                                    }
                                @endphp
                        "{{ $color }}",
                            @endforeach
                        @endif

                    ],
                    data: [
                        @if(isset($events_results))
                            @foreach($events_results as $events_result)
                                @php
                                    $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                                @endphp
                            {{$amount_made}},
                            @endforeach
                        @endif
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Amounts made in the Events'
                }
            }
        });
    </script>
    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [
                    @if(isset($events_results))
                            @foreach($events_results as $events_result)
                        "{{$events_result->event_name}}",
                    @endforeach
                    @endif
                ],
                datasets: [
                    {
                        label: "Students Attending",
                        backgroundColor: [
                            @if(isset($events_results))
                                    @foreach($events_results as $events_result)
                                    @php
                                        $letters = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
                                        $color = '#';
                                        for ($i = 0; $i < 6; $i++) {
                                            $count=random_int(0,15);
                                            $color= $color.$letters[$count];
                                        }
                                    @endphp
                                "{{ $color }}",
                            @endforeach
                            @endif
                        ],
                        data: [
                            @if(isset($events_results))
                            @foreach($events_results as $events_result)
                            @php
                                $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                            @endphp
                            {{$events_result->tickets_sold}},
                            @endforeach
                            @endif
                        ]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Students Attending Events'
                }
            }
        });
    </script>
@endsection
@section('content')
    <section class="section-page-header">
        <div class="container">
            <h1 class="entry-title">Events Reports</h1>
        </div>
    </section>
    <section class="section-page-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <canvas id="pie-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <canvas id="bar-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection