<x-site-layout
    :title="'Articles'"
    :description="'Articles on development, experiments, and learning in public'"
    :headerTitle="'Articles'"
    :subtitle="'Thoughts, experiments, and notes from the journey.'">

    <section class="articles-section">
        <h2>Latest articles</h2>

        @foreach ($articles as $article)
            <article>
                <header>
                    <h3>{{ $article->title }}</h3>

                    <p>
                        {{ $article->excerpt }}
                    </p>
                </header>
            </article>
        @endforeach

    </section>

</x-site-layout>