import { useEffect, useState } from 'react'
import { Link, Navigate, useParams } from 'react-router'
import ReactMarkdown from 'react-markdown'
import remarkGfm from 'remark-gfm'
import type {
	DocumentationPage,
	DocumentationPageApiResponse,
	DocumentationPagesApiResponse,
} from '../types/documentation'

type ProjectDocumentationProps = {
	projectSlug: string
	pageSlug?: string
}

// Fetches and displays the documentation pages belonging to a project.
function ProjectDocumentation({
	projectSlug,
	pageSlug,
}: ProjectDocumentationProps) {
	const [pages, setPages] = useState<DocumentationPage[]>([])
	const [isLoading, setIsLoading] = useState(true)
	const [error, setError] = useState<string | null>(null)
	const [selectedPage, setSelectedPage] = useState<DocumentationPage | null>(null)
	const [isPageLoading, setIsPageLoading] = useState(false)
	const [pageError, setPageError] = useState<string | null>(null)

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

	useEffect(() => {
		if (!pageSlug) {
			return
		}

		async function fetchPage() {
			setIsPageLoading(true)
			setPageError(null)
			setSelectedPage(null)

			try {
				const response = await fetch(
					`${import.meta.env.VITE_API_BASE_URL}/projects/${projectSlug}/documentation/${pageSlug}`
				)

				if (response.status === 404) {
					throw new Error('Documentation page not found.')
				}

				if (!response.ok) {
					throw new Error('Failed to fetch documentation page.')
				}

				const result: DocumentationPageApiResponse = await response.json()

				setSelectedPage(result.data)
			} catch (error) {
				setPageError(
					error instanceof Error
						? error.message
						: 'Unable to load this documentation page.'
				)
			} finally {
				setIsPageLoading(false)
			}
		}

		fetchPage()
	}, [projectSlug, pageSlug])

	if (isLoading) {
		return <p>Loading documentation...</p>
	}

	if (error) {
		return <p role="alert">{error}</p>
	}

	if (pages.length === 0) {
		return <p>There are no documentation pages yet.</p>
	}

	// Redirect to the first available page when no article is specified.
	if (!pageSlug) {
		return (
			<Navigate
				to={`/documentation/${projectSlug}/${pages[0].slug}`}
				replace
			/>
		)
	}

	return (
		<section className="project-documentation">
			<nav aria-label="Project documentation navigation">
				<ul>
					{pages.map((page) => (
						<li key={page.id}>
							<Link
								to={`/documentation/${projectSlug}/${page.slug}`}
								aria-current={page.slug === pageSlug ? 'page' : undefined}
							>
								{page.title}
							</Link>
						</li>
					))}
				</ul>
			</nav>

			{isPageLoading && <p>Loading article...</p>}

			{pageError && <p role="alert">{pageError}</p>}

			{selectedPage && (
				<article>
					<header>
						<h1>{selectedPage.title}</h1>
					</header>

					<ReactMarkdown remarkPlugins={[remarkGfm]}>
						{selectedPage.body ?? ''}
					</ReactMarkdown>
				</article>
			)}
		</section>
	)
}

// Retrieves the project and optional article slugs from the current URL.
function DocumentationProjectPage() {
	const { projectSlug, pageSlug } = useParams()

	if (!projectSlug) {
		return null
	}

	return (
		<ProjectDocumentation
			key={projectSlug}
			projectSlug={projectSlug}
			pageSlug={pageSlug}
		/>
	)
}

export default DocumentationProjectPage
