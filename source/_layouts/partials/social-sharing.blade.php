<div class="mb-12 mt-20">
    <p class="text-center mb-4">{{ $title ?? 'Share this post' }}</p>
    <div class="flex justify-center items-center">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($page->getUrl()) }}"
           class="no-underline hover:text-sunset mx-4">
            @include('_layouts.svgicons.social.facebook', ['svgClasses' => 'fill-current'])
        </a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($page->title . ' ' . $page->getUrl()) }}"
           class="no-underline text-black hover:text-sunset mx-4">
            @include('_layouts.svgicons.social.twitter', ['svgClasses' => 'fill-current'])
        </a>
        <a href="mailto:?&subject=Read&body={{ $page->getUrl() }}"
           class="no-underline hover:text-sunset mx-4">
            @include('_layouts.svgicons.social.email', ['svgClasses' => 'fill-current'])
        </a>
    </div>
</div>