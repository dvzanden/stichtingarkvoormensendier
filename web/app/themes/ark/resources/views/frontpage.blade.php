{{--
  Template Name: Frontpage
--}}

@php
    $slider = get_field('slider');
    $acf = get_fields();
    // echo '<pre>';
    // var_dump($slider);
    // echo '</pre>';
@endphp

@extends('layouts.app')
@section('content')
    {{-- hero --}}
    @include('sections/frontpage/hero')

    {{-- About --}}
    @include('sections/frontpage/about')

    {{-- Missie --}}
    @include('sections/frontpage/missie')

    <section>
    @endsection
