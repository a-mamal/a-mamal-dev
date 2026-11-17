export interface Project {
	id: number
	name: string
	slug: string
	description: string
	highlights: string[] | null
	project_url: string | null
	github_url: string | null
	status: 'planned' | 'in_progress' | 'completed' | 'archived'
	is_featured: boolean
	has_documentation: boolean
}

export interface ProjectsApiResponse {
    data: Project[]
}

export interface ProjectApiResponse {
    data: Project
}
