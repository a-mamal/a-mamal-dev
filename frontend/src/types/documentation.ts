// A documentation page as sent by the API.
export type DocumentationPage = {
	id: number
	title: string
	slug: string
	sort_order: number
	// Only sent for a single page, not in the sidebar list.
	body?: string
}

// The list endpoint wraps the pages in a "data" property.
export type DocumentationPagesApiResponse = {
	data: DocumentationPage[]
}

// The single page endpoint wraps one page in "data" as well.
export type DocumentationPageApiResponse = {
	data: DocumentationPage
}