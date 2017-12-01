@extends('layouts.master')

@section('content')
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php
            echo $user->name.' '.
            $user->email.' '.
            $user->surname.' '.
            $user->address.' '.
            $user->civic_number.' '.
            $user->zip_code.' '.
            $user->country.' '.
            $user->telephone;
            ?>
        </div>
    </div>
</div>
@endsection
