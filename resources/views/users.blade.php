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
            <h1 class="entry-title">View Users</h1>
        </div>
    </section>
    <section class="section-search-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered " id="example" style="width:100%">
                            <thead>
                            <tr>
                                <th><b>NAME</b></th>
                                <th><b>EMAIL ADDRESS</b></th>
                                <th><b>USER TYPE</b></th>
                                <th><b></b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users_results))
                                @foreach($users_results as $users_result)
                                    @foreach($user_type_results as $user_type_result)
                                        @if($user_type_result->user_type_code==$users_result->user_type)
                                            @php
                                                $type=$user_type_result->user_type_name;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td style="text-align: center;">{{$users_result->name}}</td>
                                        <td style="text-align: center;">{{$users_result->email}}</td>
                                        <td style="text-align: center;">{{$type}}</td>
                                        <td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user{{$users_result->id}}">
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
    @if(isset($users_results))
        @foreach($users_results as $users_result)
            <div class="modal fade" id="user{{$users_result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{route('changeUserPermissions')}}" method="post" >{!! csrf_field() !!}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">CHANGE PERMISSIONS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{$users_result->name}}</p>
                                <p>Change permissions of the above user down below.</p>
                                <input type="hidden" name="user_id" value="{{$users_result->id}}">
                                <div class="form-group row">
                                    <label for="user_type" class="col-sm-3">User Type:</label>
                                    <div class="col-sm-9">
                                        <select name="user_type" id="user_type" class="col-sm-12" style="height: 34px;">
                                            <option value="0">Admin</option>
                                            <option value="1">Student</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Permissions</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection