import { useEffect, useState } from 'react'
import { useParams } from 'react-router'
import type {
	DocumentationPage,
	DocumentationPagesApiResponse,
} from '../types/documentation'

type ProjectDocumentationProps = {
	projectSlug: string
}

// Fetches and lists the documentation pages of one project.
function ProjectDocumentation({ projectSlug }: ProjectDocumentationProps) {
	const [pages, setPages] = useState<DocumentationPage[]>([])
	const [isLoading, setIsLoading] = useState(true)
	const [error, setError] = useState<string | null>(null)

	useEffect(() => {
		async function fetchPages() {
			try {
				const response = await fetch(
					`${import.meta.env.VITE_API_BASE_URL}/projects/${projectSlug}/documentation`
				)

				if (!response.ok) {
					throw new Error('Failed to fetch documentation pages.')
				}

                // The API wraps the list in a "data" property.
				const result: DocumentationPagesApiResponse = await response.json()

				setPages(result.data)
			} catch {
				setError('Unable to load the documentation. Please try again later.')
			} finally {
				setIsLoading(false)
			}
		}

		fetchPages()
	}, [projectSlug])

	return (
		<section>
			<h1>Documentation</h1>

			{isLoading && <p>Loading documentation...</p>}

			{error && <p role="alert">{error}</p>}

			{!isLoading && !error && pages.length === 0 && (
				<p>There are no documentation pages yet.</p>
			)}

			{!isLoading && !error && pages.length > 0 && (
				<ul>
					{pages.map((page) => (
						<li key={page.id}>{page.title}</li>
					))}
				</ul>
			)}
		</section>
	)
}

// Reads the project from the URL and shows its documentation.
function DocumentationProjectPage() {
	const { projectSlug } = useParams()

	if (!projectSlug) {
		return null
	}

	return <ProjectDocumentation key={projectSlug} projectSlug={projectSlug} />
}

export default DocumentationProjectPage