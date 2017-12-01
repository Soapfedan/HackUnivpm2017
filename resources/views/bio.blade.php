@extends('layouts.master')

@section('content')
<br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
            <h3 style="display: inline-block;" class="align-middle"><strong>{{$user->name}} {{$user->surname}}</strong></h3>

            <ul class="pl-5">
                <li>{{$user->email}}</li>
                <li>{{$user->address}}, {{$user->civic_number}} - {{$user->zip_code}}</li>
                <li>{{$user->country}}</li>
                <li>{{$user->telephone}}</li>
            </ul>
        </div>
        <div class="col-md-8 text-right">
            <h4>Voto degli utenti: <span class="badge badge-secondary">{{$rating->rating}}</span></h4>
        </div>
    </div>
</div>
@endsection
