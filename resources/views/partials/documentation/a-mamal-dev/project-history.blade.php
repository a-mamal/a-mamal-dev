<section class="project-history" aria-labelledby="project-history-title">
    <h2 id="project-history-title">Project History</h2>

    <div class="project-history-timeline">
        <article class="project-history-entry">
            <time datetime="2026-09-15">September 15, 2026</time>
            <h3>Early a-mamal.dev structure</h3>
            
            <div class="project-history-entry-content">

                <div class="project-history-entry-text">
                    

                    <p>
                        The project began taking shape across its main sections, including
                        the home page, about page, articles, documentation, lab, and projects.
                    </p>
                </div>


                <div class="project-history-media">
                    {{-- Home --}}
                    <section class="project-history-media-group">
                        <h4>Home</h4>
                        <div 
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/home/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev home page in desktop day mode">
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/home/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev home page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>

                    </section>

                    {{-- Projects --}}
                    <section class="project-history-media-group">
                        <h4>Projects</h4>

                        <div 
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >
                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/projects/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev projects page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/projects/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev projects page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

                    
                    {{-- Articles --}}
                    <section class="project-history-media-group">
                        <h4>Articles page</h4>
                        <div 
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>
                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/articles/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev articles page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/articles/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev articles page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

        
                    {{-- Article --}}
                    <section class="project-history-media-group">
                        <h4>Article page</h4>
                        <div                         
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/article/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev article page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/article/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev article page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

                    {{-- Lab --}}
                    <section class="project-history-media-group">
                        <h4>Lab page</h4>
                        <div                         
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/lab/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev lab page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/lab/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev lab page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

                    {{-- About --}}
                    <section class="project-history-media-group">
                        <h4>About page</h4>
                        <div                         
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/about/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev about page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/about/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev about page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

                    {{-- Documentation --}}
                    <section class="project-history-media-group">
                        <h4>Documentation page</h4>
                        <div                         
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/documentation/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev documentation page in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/documentation/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev documentation page in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>

                    {{-- Documentation for a-mamal-dev --}}
                    <section class="project-history-media-group">
                        <h4>Documentation for a-mamal.dev page</h4>
                        <div                         
                            class="project-history-media-items"
                            x-data="{ active: 'day' }"
                        >

                            <div class="project-history-media-toggle">
                                <button type="button" @click="active = 'day'">
                                    Day
                                </button>

                                <button type="button" @click="active = 'night'">
                                    Night
                                </button>
                            </div>

                            <figure x-show="active === 'day'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/documentation/a-mamal-dev/2026-09-15-desktop-day.png') }}"
                                    alt="a-mamal.dev project documentation in desktop day mode"
                                >
                                <figcaption>Day mode</figcaption>
                            </figure>

                            <figure x-show="active === 'night'">
                                <img
                                    src="{{ asset('history-media/a-mamal-dev/documentation/a-mamal-dev/2026-09-15-desktop-night.png') }}"
                                    alt="a-mamal.dev project documentation in desktop night mode"
                                >
                                <figcaption>Night mode</figcaption>
                            </figure>
                        </div>
                    </section>                    
                </div>{{-- class="project-history-media" --}}
            </div> {{-- class="project-history-entry-content" --}}
        </article> {{-- class="project-history-entry" --}}
    </div> {{-- class="project-history-timeline" --}}
</section>