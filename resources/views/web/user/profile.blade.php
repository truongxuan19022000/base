@extends('web.main')
@section('contents')


name: <?php echo auth()->user()->name ?>

@endsection