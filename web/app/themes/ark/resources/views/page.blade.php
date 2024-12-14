@extends('layouts.app')

@section('content')
    PAGE
    @while (have_posts())
        @php(the_post())
    @endwhile
@endsection
