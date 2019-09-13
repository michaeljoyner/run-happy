@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => 'Archives - Run Happy',
        'ogDescription' => 'Browse through my thoughts and discoveries on my long, slow journey to running happy.'
    ])
@endsection

@section('body')
<header class="my-12">
    <h1 class="my-0 text-center text-3xl lg:text-banner font-display">Run Happy</h1>
    <p class="text-xl lg:text-3xl text-center">Archives</p>
</header>
<div class="flex flex-col lg:flex-row w-contained max-w-full mx-auto">
    <div class="w-100 max-w-full px-8 mb-12 mx-auto">
        <div class="w-64 max-w-full mx-auto">
            {{-- <img src="https://res.cloudinary.com/dy6grlu8z/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_red,b_rgb:262c35/v1558866559/faey33w1otwrk0alusn5.jpg" alt="LowlyJ" class="block w-32 h-32 rounded-full my-12 ml-0 mr-auto"> --}}
            <p class="text-xl mb-8">Welcome to memory lane.</p>
            <p>Just like a good run, my writing career has been long, with it's fair share of uphills and downhills. Feel free to take a browse around to see if you come across anything that tickles your fancy.</p>
        </div>
        

    </div>
    <div class="max-w-2xl mx-auto flex-1 px-8">
    @foreach($posts->groupBy(function($p) { return date('F, Y', $p->date);}) as $month => $archives)
        <div class="mb-20">
            <p class="text-lg lg:text-2xl mb-8">{{ $month }}</p>
            @foreach($archives as $post)
            <div class="my-2 pl-8">
                <p class="mb-2"><a class="text-black lg:text-lg mb-2 font-semibold no-underline hover:text-red-700" href="{{ $post->getPath() }}">{!! $post->title !!}</a></p>
                {{-- <p class="mt-0 text-gray-600">{{ date('F j, Y', $post->date) }}</p>
                <p class="leading-normal">{{ $post->intro }}</p> --}}
            </div>
            @endforeach
        </div>
        
    @endforeach
    </div>
</div>


@endsection
