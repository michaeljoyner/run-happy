@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => 'Run Happy - A Long Slow Journey',
        'ogDescription' => 'Running happy well into my twilight years is my mission- join me on my journey, as I indulge myself in loads of research and experiments to achieve just that.'
    ])
@endsection

@section('body')
<header class="mb-24 mt-12 overflow-hidden">
    {{-- <h1 class="my-0 text-center text-5xl lg:text-banner font-display">Run Happy</h1> --}}
    <p class="max-w-full text-center mx-auto banner-text uppercase text-gray-300 font-display font-black">
        <span class="text-sunset">run</span>eatlivesee
        be<span class="text-sunset">happy</span>thrive
    </p>
    {{-- <p class="text-xl lg:text-3xl text-center">Thoughts from the back of the pack</p> --}}
</header>
<div class="flex flex-col lg:flex-row w-contained max-w-full mx-auto">
    <div class="w-full lg:w-100 max-w-full px-8 sm-order-2 bg-black text-white lg:text-black lg:bg-white">
        <div class="w-64 max-w-full mx-auto pb-20">
            <img src="https://res.cloudinary.com/dy6grlu8z/image/upload/w_1000,c_fill,ar_1:1,g_auto,r_max,bo_5px_solid_red,b_rgb:262c35/v1558866559/faey33w1otwrk0alusn5.jpg" alt="LowlyJ" class="block w-32 h-32 rounded-full my-12 lg:ml-0 ml-auto mr-auto">
            <p class="text-xl">Hi, I'm Lowly.</p>
            <p>Running happy well into my twilight years is my mission- join me on my journey, as I indulge myself in loads of research and experiments to achieve just that. Also, my second child is by far my favourite child.</p>
        </div>
    </div>

    <div class="max-w-2xl mx-auto flex-1 sm-order-1 px-8">
    @foreach($posts->take(15) as $post)
        <div class="my-12">
            <p class="mb-0"><a class="text-black text-2xl font-semibold no-underline hover:text-sunset" href="{{ $post->getPath() }}">{!! $post->title !!}</a></p>
            <p class="mt-0 mb-4 text-gray-600">{{ date('F j, Y', $post->date) }}</p>
            <p class="leading-normal">{{ $post->intro }}</p>
        </div>
    @endforeach
    </div>
</div>


@endsection
