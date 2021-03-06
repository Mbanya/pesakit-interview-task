@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-condensed">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->phone_number}}
                                        </td>
                                        <td>
                                            {{$user->created_at}}
                                        </td>

                                        <td>
                                            <a class="btn btn-primary" href="{{route('users.show',$user->id)}}">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>



                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $users->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
