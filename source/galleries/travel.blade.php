@extends('_layouts.master')

@section('body')

<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">Travel Photos</p>
</header>

@php $galleries = $galleries->filter(function($g) { return $g->section === 'travel'; }) @endphp

<div class="w-contained max-w-full mx-auto">
@foreach($galleries as $gallery)

@php $images = $page->galls->{$gallery->cloud_folder} ?? collect([])  @endphp
@php $image = $images->sortBy(function($image) { return $image->context->custom->position ?? 99999; })->first()  @endphp

<div class="flex flex-col md:flex-row mx-auto max-w-2xl my-16 bg-gray-100 shadow-lg">
    <div class="w-full md:w-1/2 p-6">
        <a href="{{ $gallery->getPath() }}" class="text-black text-2xl font-semibold no-underline hover:text-sunset">{{ $gallery->title }}</a>
        <p class="text-sm text-gray-600 mb-4">{{ $images->count() }} images</p>
        <p>{{ $gallery->description }}</p>
    </div>
    <a class="block w-full md:w-1/2" href="{{ $gallery->getPath() }}">
        <img src="https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_500/v{{ $image->version }}/{{ $image->public_id }}" alt="cover image for {{ $gallery->title }} gallery" class="w-full h-full">
    </a>
    {{-- @foreach($images as $image)
        <img class="inline" src="https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_300/v{{ $image->version }}/{{ $image->public_id }}" alt="" class="my-4">
    @endforeach --}}
</div>


@endforeach
</div>
@endsection