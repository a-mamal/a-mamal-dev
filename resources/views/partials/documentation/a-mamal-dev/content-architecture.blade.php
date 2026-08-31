<section class="docs-section" id="content-architecture">
    <h2>Content Architecture</h2>

    <p>
        a-mamal.dev separates its written content into two main areas:
        Articles and Documentation. Although both contain written material,
        they serve different purposes and are handled differently.
    </p>


    <h3>Articles</h3>

    <p>
        Articles are intended for publishable content that can stand on its own, 
        separate from the project's documentation. They are
        written in Markdown and imported into the database, where their content
        and metadata can be managed by the application.
    </p>

    <p>
        Storing articles in the database provides structured information such
        as titles, slugs, publication status, publication dates, timestamps,
        and authors. It also provides a foundation for features such as
        searching and filtering as the site develops.
    </p>

    <p>
        The Markdown files remain the source used to seed the articles, while
        the database provides the structure needed by the application to
        manage and display them.
    </p>


    <h3>Documentation</h3>

    <p>
        Documentation is handled differently. 
        Project documentation is stored directly in the site's repository 
        and is written using Blade views and reusable partials 
        rather than being stored in the database.
    </p>

    <p>
        Each project has its own documentation page, 
        while individual sections of that documentation are kept as partials. 
        This keeps the documentation close to the project itself
        and makes it easy to add, remove, or rearrange sections as the project evolves.
    </p>

    <p>
        Documentation may cover project structure, development setup,
        deployment, technical decisions, and other information that is useful
        when understanding or maintaining a project.
    </p>

    <p>
        Technical decisions may be documented where useful, but the
        documentation does not attempt to record the entire thought process
        behind every decision. Its purpose is to provide useful context and
        reference material rather than a complete development diary.
    </p>


    <h3>Why Keep Them Separate?</h3>

    <p>
        Articles and documentation can sometimes cover related subjects, but
        they have different roles. Articles are published pieces of content,
        while documentation is reference material tied to the projects
        themselves.
    </p>

    <p>
        Keeping them separate allows each to use the structure that best suits
        its purpose without forcing the same content model onto both.
    </p>

</section>
