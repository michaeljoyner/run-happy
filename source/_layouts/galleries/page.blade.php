@extends('_layouts.master')

@section('head')
    @include('_layouts.partials.ogmeta', [
        'ogTitle' => $page->title,
        'ogDescription' => $page->intro ?? '',
    ])
@endsection

@section('body')
<div>
    @php $images = $page->galls->{$page->cloud_folder} ?? collect([])  @endphp
    @php $images = $images->sortBy(function($image) { return $image->context->custom->position ?? 99999; })  @endphp
    @foreach ($images as $image)
        <img src="{{ $image->secure_url }}" alt="">
    @endforeach
</div>
    

@endsection
