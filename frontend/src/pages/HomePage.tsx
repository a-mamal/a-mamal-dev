import { Link } from 'react-router'

function HomePage() {
	return (
		<section className="home">
			<section className="home-hero" aria-labelledby="home-title">
				<p className="home-hero__eyebrow">A space for learning in public</p>

				<h1 id="home-title">Becoming a better developer, in public.</h1>

				<p className="home-hero__description">
					a-mamal.dev is where I document what I build, how I make
					decisions, and what goes wrong along the way.
				</p>

				<div className="home-hero__actions">
					<Link className="home-hero__primary" to="/documentation/a-mamal-dev">
						Read the documentation
					</Link>
					<Link className="home-hero__secondary" to="/projects">
						Browse projects
					</Link>
				</div>
			</section>
		</section>
	)
}

export default HomePage