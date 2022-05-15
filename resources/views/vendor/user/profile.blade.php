@extends('vendor.dashboard')
@section('contents')


    profile page
    <?php var_dump(auth()->user()->name); ?>

@endsection
