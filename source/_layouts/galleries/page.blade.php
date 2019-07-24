@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => $page->title,
        'ogDescription' => $page->intro ?? '',
    ])
@endsection

@section('body')
<div class="max-w-lg mx-auto">
    @php $images = $page->galls->{$page->cloud_folder} ?? collect([])  @endphp
    @php $images = $images->sortBy(function($image) { return $image->context->custom->position ?? 99999; })  @endphp
    @foreach ($images as $image)
        <img src="https://res.cloudinary.com/dy6grlu8z/image/upload/c_scale,w_800/v{{ $image->version }}/{{ $image->public_id }}" alt="" class="my-4">
    @endforeach
</div>
    

@endsection
