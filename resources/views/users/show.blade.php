@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View User Details</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    {{$user->email}}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <p>
                                    {{$user->phone_number}}
                                </p>
                            </div>
                            <div class="col-md-6">

                                    @if($user->is_admin)
                                     <p>
                                         <span class="badge badge-primary"> Admin User</span>
                                     </p>
                                    @else
                                    <p>
                                        <span class="badge badge-success"> Normal User</span>

                                    </p>
                                        @endif

                            </div>

                            <div class="container">
                                <div class="float-right">
                                    <a href="{{route('users.index')}}" class="btn btn-primary">Go Back</a>
                                </div>
                            </div>



                        </div>




                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
