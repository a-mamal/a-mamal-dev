import { useEffect, useState } from 'react'
import { Link } from 'react-router'
import type { Project, ProjectsApiResponse } from '../../types/project'
import ProjectCard from './ProjectCard'

const MAX_FEATURED_PROJECTS = 3

function FeaturedProjects() {
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
				setError('Unable to load featured projects. Please try again later.')
			} finally {
				setIsLoading(false)
			}
		}

		fetchProjects()
	}, [])

	// Derived from existing state during render, so it needs no state of its own.
	const featuredProjects = projects
		.filter((project) => project.is_featured)
		.slice(0, MAX_FEATURED_PROJECTS)

	return (
		<section
			className="featured-projects"
			aria-labelledby="featured-projects-title"
		>
			<h2 id="featured-projects-title">Featured projects</h2>

			{isLoading && <p role="status">Loading featured projects...</p>}

			{error && <p role="alert">{error}</p>}

			{!isLoading && !error && featuredProjects.length === 0 && (
				<p>
					No projects are featured right now.{' '}
					<Link to="/projects">Browse all projects</Link>.
				</p>
			)}

			{!isLoading && !error && featuredProjects.length > 0 && (
				<>
					<div className="featured-projects__grid">
						{featuredProjects.map((project) => (
							<ProjectCard
								key={project.id}
								project={project}
								headingLevel="h3"
								showHighlights={false}
							/>
						))}
					</div>

					<Link className="featured-projects__link" to="/projects">
						View all projects
					</Link>
				</>
			)}
		</section>
	)
}

export default FeaturedProjects