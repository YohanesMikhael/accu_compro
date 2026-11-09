@extends('layouts.frontend')

@section('title', 'PT. ABHINAYA CITRA CAKRA UTAMA')

@section('content')

    @foreach ($sections as $section)

        @if ($section->section_key === 'hero')
            @if ($hero?->hero_type === 'video' && $hero?->video)
                @include('frontend.sections.hero-video')
            @else
                @include('frontend.sections.hero-image')
            @endif

        @elseif ($section->section_key === 'our-profile')
            @include('frontend.sections.profile')

        @elseif ($section->section_key === 'vision-mission')
            @include('frontend.sections.vision-mission')

        @elseif ($section->section_key === 'company-values')
            @include('frontend.sections.values')

        @elseif ($section->section_key === 'products-services')
            @include('frontend.sections.services')

        @elseif ($section->section_key === 'operational-facilities')
            @include('frontend.sections.facilities')

        @elseif ($section->section_key === 'clients')
            @include('frontend.sections.clients')

        @elseif ($section->section_key === 'product-catalog')
            @include('frontend.sections.catalog')

        @elseif ($section->section_key === 'gallery')
            @include('frontend.sections.gallery')

        @elseif ($section->section_key === 'contact')
            @include('frontend.sections.contact')
        @endif

    @endforeach

@endsection