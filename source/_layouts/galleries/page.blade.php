@extends('_layouts.master', ['theme' => 'dark'])

@php 
$images = $page->galls->{$page->cloud_folder} ?? collect([]);
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

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => $page->title,
        'ogDescription' => $page->intro ?? '',
        'ogImage' => 'https://res.cloudinary.com/dy6grlu8z/image/upload/c_fill,h_630,w_1200/v' . $images[0]['version'] . '/' . $images[0]['public_id']
    ])
@endsection

@section('body')



<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">{{ $page->title }}</p>
    <p class="text-sm text-gray-600 text-center">{{ count($images) }} photos</p>
</header>
<div class="my-16 max-w-xl mx-auto leading-relaxed px-4 article-content">

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

@include('_layouts.partials.social-sharing', ['title' => 'share this gallery'])    

@endsection
