function Sidebar() {
	return (
		<div className="sidebar">
			<header className="sidebar-header">
				<a href="/">a-mamal.dev</a>
			</header>

			<nav aria-label="Main navigation">
				<a href="/">Home</a>
				<a href="/projects">Projects</a>
				<a href="/about">About</a>
			</nav>
		</div>
	)
}

export default Sidebar