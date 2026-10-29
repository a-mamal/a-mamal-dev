import { useEffect, useState } from 'react'
import type { Project, ProjectsApiResponse } from '../types/project'

// Convert API status values into presentable labels.
function formatStatus(status: Project['status']): string {
	return status
		.split('_')
		.map((word) => word.charAt(0).toUpperCase() + word.slice(1))
		.join(' ')
}

function ProjectsPage() {

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

	return (
		<section>
			<h1>Projects</h1>
			<p>Explore my projects, experiments, and development progress.</p>

			{isLoading && <p>Loading projects...</p>}

			{error && <p role="alert">{error}</p>}

			{!isLoading && !error && projects.length === 0 && (
				<p>Where did all the projects go?</p>
			)}

			{!isLoading && !error && projects.length > 0 && (
				projects.map((project) => (
					<article key={project.id}>
						<h2>{project.name}</h2>
						<p>{project.description}</p>
						<p>Status: {formatStatus(project.status)}</p>
					</article>
				))
			)}
		</section>
	)
}

export default ProjectsPage
