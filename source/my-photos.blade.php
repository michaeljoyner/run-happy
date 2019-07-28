@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => 'Run Happy - A Long Slow Journey',
        'ogDescription' => 'Running happy well into my twilight years is my mission- join me on my journey, as I indulge myself in loads of research and experiments to achieve just that.'
    ])
@endsection

@section('body')
<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">Photo Galleries</p>
</header>
<div class="flex flex-col lg:flex-row w-contained max-w-full mx-auto">
    

    <div class="max-w-2xl mx-auto flex-1 sm-order-1 px-8">
    @foreach($galleries->groupBy('section') as $section => $gallery)
        <h2>{{ $section }}</h2>
        @foreach($gallery as $post)
        <div class="my-12">
            <p class="mb-0"><a class="text-black text-2xl font-semibold no-underline hover:text-sunset" href="{{ $post->getPath() }}">{!! $post->title !!}</a></p>
            <p class="mt-0 mb-4 text-gray-600">{{ date('F j, Y', $post->date) }}</p>
            <p class="leading-normal">{{ $post->intro }}</p>
        </div>
        @endforeach
    @endforeach
    </div>
</div>


@endsection
