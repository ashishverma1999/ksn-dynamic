@extends('layouts.app')

@section('content')
    @include('public.partials.topbar')
    @include('public.partials.navigation')
    @include('public.partials.side-shortcuts')

    <main id="home">
        @include('public.partials.hero')
        @include('public.partials.about')
        @include('public.partials.director-message')
        @include('public.partials.facilities')
        @include('public.partials.gallery')
        @include('public.partials.reviews')
        @include('public.partials.achievements-birthdays')
        @include('public.partials.admissions')
        @include('public.partials.faq')
    </main>

    @include('public.partials.footer')
    @include('public.partials.back-to-top')
@endsection
