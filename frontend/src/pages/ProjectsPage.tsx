import { useEffect, useState } from 'react'
import type { Project } from '../types/project'

function ProjectsPage(){

    const [projects, setProjects] = useState<Project[]>([])
    useEffect(() => { 
        async function fetchProjects() { 
            const response = await fetch('http://127.0.0.1:8000/api/projects') 
            const result = await response.json() 
            
            setProjects(result.data) 
        }

        fetchProjects()
    }, [])

    return (
        <section>
			<h1>Projects</h1>
            <p>Explore my projects, experiments, and development progress.</p>

            {projects.map((project) => ( 
                <article key={project.id}> 
                    <h2>{project.name}</h2> 
                    <p>{project.description}</p> 
                    <p>Status: {project.status}</p>
                </article>
            ))}
		</section>
    )
}

export default ProjectsPage