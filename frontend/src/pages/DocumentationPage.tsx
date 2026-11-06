import { useEffect, useState } from 'react'
import { Link } from 'react-router'
import type { Project, ProjectsApiResponse } from '../types/project'

function DocumentationPage() {
	const [projects, setProjects] = useState<Project[]>([])
	const [isLoading, setIsLoading] = useState(true)
	const [error, setError] = useState<string | null>(null)

	useEffect(() => {
		async function fetchProjects() {
			try {
				const response = await fetch(
					`${import.meta.env.VITE_API_BASE_URL}/projects`
				)

				if (!response.ok) {
					throw new Error('Failed to fetch projects.')
				}

				const result: ProjectsApiResponse = await response.json()

				setProjects(result.data)
			} catch {
				setError('Unable to load projects. Please try again later.')
			} finally {
				setIsLoading(false)
			}
		}

		fetchProjects()
	}, [])

	// Only display projects that have documentation.
	const documentedProjects = projects.filter(
		(project) => project.has_documentation
	)

	if (isLoading) {
		return <p role="status">Loading documentation projects...</p>
	}

	if (error) {
		return <p role="alert">{error}</p>
	}

	return (
		<section>
			<h1>Documentation</h1>
			<p>
				Explore project documentation, technical notes, and development guides.
			</p>

			{documentedProjects.length === 0 ? (
				<p>No projects with documentation are available yet.</p>
			) : (
				<nav aria-label="Projects with documentation">
					<ul>
						{documentedProjects.map((project) => (
							<li key={project.id}>
								<Link to={`/documentation/${project.slug}`}>
									{project.name}
								</Link>
							</li>
						))}
					</ul>
				</nav>
			)}
		</section>
	)
}

export default DocumentationPage