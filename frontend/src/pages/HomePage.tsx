import { ExternalLink } from 'lucide-react'
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

			<section className="home-portfolio" aria-labelledby="portfolio-title">
				<h2 id="portfolio-title">My professional portfolio</h2>

				<p>
					a-mamal.dev documents the journey. a-mamal.com is the curated
					version: selected projects, skills and experience.
				</p>

				<a
					className="home-portfolio__link"
					href="https://a-mamal.com/"
					target="_blank"
					rel="noopener noreferrer"
				>
					Visit a-mamal.com
					<ExternalLink aria-hidden="true" size={16} />
					<span className="visually-hidden">(opens in a new tab)</span>
				</a>
			</section>
		</section>
	)
}

export default HomePage