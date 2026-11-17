import type { Project } from '../../types/project'

// Convert API status values into presentable labels.
function formatStatus(status: Project['status']): string {
	return status
		.split('_')
		.map((word) => word.charAt(0).toUpperCase() + word.slice(1))
		.join(' ')
}

interface ProjectCardProps {
	project: Project
}

function ProjectCard({ project }: ProjectCardProps) {
	return (
		<article>
			<h2>{project.name}</h2>

			<p>Status: {formatStatus(project.status)}</p>

			{project.highlights && project.highlights.length > 0 && (
				<ul>
					{project.highlights.map((highlight, index) => (
						<li key={`${project.id}-highlight-${index}`}>
							{highlight}
						</li>
					))}
				</ul>
			)}

			<p>{project.description}</p>
		</article>
	)
}

export default ProjectCard