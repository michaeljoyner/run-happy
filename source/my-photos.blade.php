@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => 'My Photos | Run Happy',
        'ogDescription' => 'If you have been foloowing closely, you will know I have a passion for photography. This is a collection of photos I want to keep a record of, organised into categories and galleries.'
    ])
@endsection

@section('body')
<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">Photo Galleries</p>
</header>
<div class="flex flex-col lg:flex-row w-contained max-w-full mx-auto">
    

    <div class="max-w-3xl mx-auto flex-1 sm-order-1 px-8">
    @foreach($galleries->groupBy('section') as $section => $gallery)

    @php $total_galleries = $gallery->count() @endphp

    <div class="flex flex-col md:flex-row md:shadow-lg my-12">
        <div class="w-full md:w-1/2 order-2 md:order-1 p-4 bg-gray-100 flex flex-col justify-between">
            <div>
                <a class="no-underline text-black hover:text-red-400" href="/galleries/{{ $section }}"><h2 class="font-display font-bold uppercase text-3xl mb-8">{{ $section }}</h2></a>
                <p>{{ $page->photo_categories[$section]['description'] }}</p>
            </div>
            <div>
                <p class="text-sm uppercase tracking-wide">{{ $total_galleries }} galleries.</p>
            </div>
        </div>
        <a href="/galleries/{{ $section }}" class="w-full md:w-1/2 order-1 md:order-2">
            <img src="{{ $page->photo_categories[$section]['cover_image'] }}" alt="" >
        </a>
            

        
        
        
    </div>
    @endforeach
    </div>
</div>


@endsection
