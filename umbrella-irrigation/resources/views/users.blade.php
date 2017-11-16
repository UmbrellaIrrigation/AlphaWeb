@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Users</center></div>

                <div class="panel-body">
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th><center>Name</center></th>
                                <th><center>E-mail</center></th>
                                <th><center>Permission</center></th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><center>{{$user->name}}</center></td>
                            <td><center>{{$user->email}}</center></td>
                            <td>
                                <center>
                                @if($user->isAdmin())
                                Admin
                                @elseif($user->isEmployee())
                                Employee
                                @else
                                Guest
                                @endif
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
