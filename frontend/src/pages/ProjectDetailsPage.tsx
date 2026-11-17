import { useEffect, useState } from 'react'
import { Link, useParams } from 'react-router'
import type { Project, ProjectApiResponse } from '../types/project'

function formatStatus(status: Project['status']): string {
	return status
		.split('_')
		.map((word) => word.charAt(0).toUpperCase() + word.slice(1))
		.join(' ')
}

function ProjectDetailsPage() {
	const { projectSlug } = useParams()

	const [project, setProject] = useState<Project | null>(null)
	const [isLoading, setIsLoading] = useState(true)
	const [error, setError] = useState<string | null>(null)

    useEffect(() => {
        async function fetchProject() {
            try {
                const response = await fetch(
                    `${import.meta.env.VITE_API_BASE_URL}/projects/${projectSlug}`
                )

                if (response.status === 404) {
                    setError('Project not found.')
                    return
                }

                if (!response.ok) {
                    throw new Error('Failed to fetch project.')
                }

                const result: ProjectApiResponse = await response.json()

                setProject(result.data)
            } catch {
                setError('Unable to load project. Please try again later.')
            } finally {
                setIsLoading(false)
            }
        }

        fetchProject()
    }, [projectSlug])

    if (isLoading) {
        return <p role="status">Loading project...</p>
    }

    if (error) {
        return (
            <section className="project-details">
                <p role="alert">{error}</p>
                <Link to="/projects">Back to projects</Link>
            </section>
        )
    }

    if (!project) {
        return (
            <section className="project-details">
                <p>Project not found.</p>
                <Link to="/projects">Back to projects</Link>
            </section>
        )
    }

    return (
        <section className="project-details">
            <article className="project-details__article">
                <header className="project-details__header">
                    <h1 className="project-details__name">
                        {project.name}
                    </h1>

                    <p className="project-details__status">
                        Status: {formatStatus(project.status)}
                    </p>
                </header>

                <div className="project-details__content">
                    <p className="project-details__description">
                        {project.description}
                    </p>

                    {project.highlights && project.highlights.length > 0 && (
                        <section className="project-details__highlights">
                            <h2>Highlights</h2>

                            <ul>
                                {project.highlights.map((highlight, index) => (
                                    <li key={`${project.id}-highlight-${index}`}>
                                        {highlight}
                                    </li>
                                ))}
                            </ul>
                        </section>
                    )}
                </div>

                {(project.project_url || project.github_url || project.has_documentation) && (
                    <section className="project-details__links">
                        <h2>Explore this project</h2>

                        <ul>
                            {project.project_url && (
                                <li>
                                    <a href={project.project_url} 
                                        target="_blank" 
                                        rel="noopener noreferrer"
                                    >
                                        Visit project
                                    </a>
                                </li>
                            )}

                            {project.github_url && (
                                <li>
                                    <a href={project.github_url} 
                                        target="_blank" 
                                        rel="noopener noreferrer"
                                    >
                                        View source code
                                    </a>
                                </li>
                            )}

                            {project.has_documentation && (
                                <li>
                                    <Link to={`/documentation/${project.slug}`}>
                                        Read documentation
                                    </Link>
                                </li>
                            )}
                        </ul>
                    </section>
                )}

            </article>

            <nav className="project-details__navigation">
                <Link to="/projects">Back to projects</Link>
            </nav>
        </section>
    )
}

export default ProjectDetailsPage