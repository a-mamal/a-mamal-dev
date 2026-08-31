{{-- This is where individual articles are displayed --}}

<x-site-layout
    :title="$article->title"
    :description="$article->excerpt"
    :headerTitle="$article->title"
    :subtitle="$article->excerpt">

    <article class="article-content">
        {!! $article->content !!}
    </article>

</x-site-layout>