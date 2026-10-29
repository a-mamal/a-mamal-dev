export interface Project {
	id: number
	name: string
	slug: string
	description: string
	project_url: string | null
	github_url: string | null
	status: 'planned' | 'in_progress' | 'completed' | 'archived'
}

export interface ProjectsApiResponse {
    data: Project[]
}