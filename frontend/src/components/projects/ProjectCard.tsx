import { Link } from 'react-router'
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
		<article className="project-card">
            <header className="project-card__header">
                <h2 className="project-card__name">
                    {project.name}
                </h2>
                
                <p className="project-card__status">
                    Status: {formatStatus(project.status)}
                </p> 
            </header>

			{project.highlights && project.highlights.length > 0 && (
				<ul className="project-card__highlights">
					{project.highlights.map((highlight, index) => (
						<li key={`${project.id}-highlight-${index}`}>
							{highlight}
						</li>
					))}
				</ul>
			)}

			<p className="project-card__description">
                {truncateDescription(project.description)}
            </p>

            <Link 
                className="project-card__link"
                to={`/projects/${project.slug}`}
            >
                View project
            </Link>
		</article>
	)
}

export default ProjectCard