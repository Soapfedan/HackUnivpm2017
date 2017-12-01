@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php
            echo $user->name;
            echo $user->email;
            echo $user->surname;
            echo $user->address;
            echo $user->civic_number;
            echo $user->zip_code;
            echo $user->country;
            echo $user->telephone;
            ?>
        </div>
    </div>
</div>
@endsection
