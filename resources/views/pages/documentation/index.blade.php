<x-site-layout
    :title="'Documentation'"
    :description="'Development documentation, technical notes, and project documentation.'"
    :headerTitle="'Documentation'"
    :subtitle="'Documentation, structure, development notes, and contribution guidelines.'">

    <section class="docs-section">
        <h2>Where did I land?</h2>

        <p>
            This is where I document how projects are
            structured, developed, and maintained.
        </p>

        <p> 
            Most documentation will be specific to a project. 
            Other notes will cover development concepts, tools, workflows, 
            technical decisions, and problems I have encountered along the way. 
        </p>

        <p> 
            Not everything here is meant to be a polished tutorial. 
            Sometimes the point is simply to record why something was done a particular way, 
            what I learned from it, 
            or what I might need to remember later. 
        </p>

        <p> 
            This documentation will grow alongside the projects, the experiments, 
            and everything else I learn along the way. 
        </p>
    </section>

    <section class="docs-section">
        <h2>Projects</h2>

        <p> 
            Each project has its own documentation 
            covering its structure, development, technical decisions, 
            and other project-specific notes. 
        </p>

        <h3> 
            <a href="{{ route('documentation.a-mamal-com') }}"> a-mamal.com </a> 
        </h3> 
        
        <p> 
            Documentation for the main a-mamal.com project. 
        </p> 
        
        <h3> 
            <a href="{{ route('documentation.a-mamal-dev') }}"> a-mamal.dev </a> 
        </h3> 

        <p> 
            Documentation for the a-mamal.dev development space. 
        </p> 
    </section>
    
</x-site-layout>