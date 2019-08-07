@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => $page->title,
        'ogDescription' => $page->intro ?? '',
    ])
@endsection

@section('body')

@php $images = $page->galls->{$page->cloud_folder} ?? collect([])  @endphp
@php
$images = $images
            ->sortBy(function($image) {
                 return $image->context->custom->position ?? 99999; 
            })
            ->map(function($image) {
                return [
                    'position' => $image->context->custom->position ?? 99999,
                    'version' => $image->version,
                    'public_id' => $image->public_id,
                    'caption' => $image->context->custom->caption
                ];
            })->values()->all();

@endphp

<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">{{ $page->title }}</p>
    <p class="text-sm text-gray-600 text-center">{{ count($images) }} photos</p>
</header>
<div class="my-16 max-w-xl mx-auto leading-relaxed px-4 article-content">

    {{-- @yield('content') --}}
    {!! $page->getContent() !!}

</div>
<div class="max-w-2xl mx-auto">
    
    {{-- @foreach ($images as $image)
        <div class="my-8">
            <img src="https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_800/v{{ $image->version }}/{{ $image->public_id }}" alt="" class="block">
            <p class="mt-4 px-4">{{ $image->context->custom->caption }}</p>
        </div>
        
    @endforeach --}}
    <photo-gallery :images='@json($images)'></photo-gallery>
</div>
    

@endsection
