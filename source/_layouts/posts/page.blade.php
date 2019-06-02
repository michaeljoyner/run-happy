@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => $page->title,
        'ogDescription' => $page->intro ?? ''
    ])
@endsection

@section('body')
<article class="max-w-xl lg:max-w-3xl mx-auto leading-normal px-4 pt-12">
    <header class="mb-12">
    <p class="uppercase text-gray-600 text-xs">{{ $page->categories }}</p>
        <h1 class="text-3xl lg:text-4xl font-body font-bold">{!! $page->title !!}</h1>
        <p class="text-gray-600 mt-2">{{ date('j F, Y', $page->date) }}</p>
        
    </header>
    
    <div class="font-body text-lg article-content">
        @yield('content')
    </div>
    <footer>
        @include('_layouts.partials.social-sharing')
    </footer>
</article>
    

@endsection
