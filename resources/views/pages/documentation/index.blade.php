<x-site-layout
    :title="'Documentation'"
    :description="'Documentation for a-mamal.com and a-mamal.dev'"
    :headerTitle="'Documentation'"
    :subtitle="'Documentation, structure, development notes, and contribution guidelines.'">

    <section class="docs-section">
            <h2>Why Documentation?</h2>

            <p>
                This is where I document how 
                <a
                    href="https://a-mamal.com"
                    target="_blank"
                    rel="noopener">
                    a-mamal.com
                </a>
                and a-mamal.dev are
                structured, developed, and maintained.
            </p>


            <p>
                Both a-mamal.com and a-mamal.dev are projects in their own right.
                They have their own structure, decisions, problems, experiments,
                and ways of doing things.
            </p>

            <p>
                This is where I keep track of that stuff.
            </p>

            <p>
                Some of it is useful if you want to understand how the sites work.
                Some of it might be useful if you want to contribute. And some of it
                is probably here because I know future me is going to forget why
                something was done a particular way.
            </p>

            <p>
                The documentation will grow alongside the projects and cover
                everything from project structure and development setup to
                contribution guidelines and technical decisions.
            </p>

    </section>

    <section class="docs-section">
        <h2>a-mamal.com</h2>

        <p>
            Documentation for the main personal website, covering its structure,
            development process, deployment, and contribution guidelines.
        </p>
        
        <h3>
            <a href="{{ route('documentation.a-mamal-com') }}">
                Documentation
            </a>
        </h3>

        <ul>
            <li>Overview</li>
            <li>Project structure</li>
            <li>Development setup</li>
            <li>Deployment</li>
            <li>Contributing</li>
        </ul>
    </section>

    <section class="docs-section">
        <h2>a-mamal.dev</h2>

        
        <p>
            Documentation for this experimental development space, including how
            it is structured and how it evolves over time.
        </p>
        
        <h3>Topics</h3>

        <ul>
            <li>Overview</li>
            <li>Project structure</li>
            <li>Development setup</li>
            <li>Deployment</li>
            <li>Contributing</li>
        </ul>
    </section>

</x-site-layout>