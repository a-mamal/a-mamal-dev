import { useState } from 'react'
import { NavLink } from 'react-router'
import { 
	House, 
	FolderCode, 
	NotebookPen,
	BookOpenText,
	UserRound,
	PanelLeftClose,
	PanelLeftOpen,
} from 'lucide-react'

function Sidebar() {
	const [isCollapsed, setIsCollapsed] = useState(false)

	function toggleSidebar() {
		setIsCollapsed(!isCollapsed)
	}

	return (
		<div className={`sidebar ${isCollapsed ? 'sidebar--collapsed' : ''}`}>
			<header className="sidebar-header">
				<NavLink to="/">a-mamal.dev</NavLink>
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
				<NavLink to="/" end>
					<House aria-hidden="true" />
					<span>Home</span>
				</NavLink>

				<NavLink to="/projects">
					<FolderCode aria-hidden="true" />
					<span>Projects</span>
				</NavLink>

				<NavLink to="/logbook">
					<NotebookPen aria-hidden="true" />
					<span>Logbook</span>
				</NavLink>

				<NavLink to="/documentation">
					<BookOpenText aria-hidden="true" />
					<span>Documentation</span>
				</NavLink>

				<NavLink to="/about">
					<UserRound aria-hidden="true" />
					<span>About</span>
				</NavLink>
			</nav>
		</div>
	)
}

export default Sidebar