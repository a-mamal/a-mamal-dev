import { House, FolderCode, UserRound } from "lucide-react"

function Sidebar() {
	return (
		<div className="sidebar">
			<header className="sidebar-header">
				<a href="/">a-mamal.dev</a>
			</header>

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