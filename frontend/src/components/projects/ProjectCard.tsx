import type { Project } from '../../types/project'

// Convert API status values into presentable labels.
function formatStatus(status: Project['status']): string {
	return status
		.split('_')
		.map((word) => word.charAt(0).toUpperCase() + word.slice(1))
		.join(' ')
}

function truncateDescription(description: string, maxWords = 25): string {
	const words = description.split(/\s+/)

	if (words.length <= maxWords) {
		return description
	}

	return `${words.slice(0, maxWords).join(' ')}…`
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

			<p>{truncateDescription(project.description)}</p>
		</article>
	)
}

export default ProjectCard