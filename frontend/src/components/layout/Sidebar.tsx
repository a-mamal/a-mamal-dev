import { useState } from "react"
import { 
	House, 
	FolderCode, 
	UserRound,
	PanelLeftClose,
	PanelLeftOpen,
} from "lucide-react"

function Sidebar() {
	const [isCollapsed, setIsCollapsed] = useState(false)

	function toggleSidebar() {
		setIsCollapsed(!isCollapsed)
	}

	return (
		<div className={`sidebar ${isCollapsed ? 'sidebar--collapsed' : ''}`}>
			<header className="sidebar-header">
				<a href="/">a-mamal.dev</a>
			</header>

			<button
				type="button"
				className={
					`sidebar-toggle ${
						isCollapsed 
							? 'sidebar-toggle--collapsed' 
							: 'sidebar-toggle--expanded'
						}`
					}
				onClick={toggleSidebar}
				aria-label={isCollapsed ? 'Expand sidebar' : 'Collapse sidebar'}
				aria-expanded={!isCollapsed}
			>
				{isCollapsed 
					? <PanelLeftOpen aria-hidden="true" />
					: <PanelLeftClose aria-hidden="true" />
				}
			</button>

			<nav aria-label="Main navigation">
				<a href="/">
					<House aria-hidden="true" />
					<span>Home</span>
				</a>

				<a href="/projects">
					<FolderCode aria-hidden="true" />
					<span>Projects</span>
				</a>

				<a href="/about">
					<UserRound aria-hidden="true" />
					<span>About</span>
				</a>
			</nav>
		</div>
	)
}

export default Sidebar