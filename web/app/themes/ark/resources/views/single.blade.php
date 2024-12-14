@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        SINGLE
    @endwhile
@endsection
