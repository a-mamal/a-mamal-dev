import { ArrowRight, ExternalLink } from 'lucide-react'
import { Link } from 'react-router'
import FeaturedProjects from '../components/projects/FeaturedProjects'


function HomePage() {
	return (
		<div className="home">
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

			<FeaturedProjects />

			<div className="home-panels">
				<section
					className="home-panel home-panel--documentation"
					aria-labelledby="documentation-title"
				>
					<h2 id="documentation-title">Documentation</h2>

					<p>
						How this site is built: setup, architecture and the decisions
						behind it, written as I go.
					</p>

					<Link className="home-panel__link" to="/documentation">
						Browse all documentation
						<ArrowRight aria-hidden="true" />
					</Link>
				</section>

				<section
					className="home-panel home-panel--logbook"
					aria-labelledby="logbook-title"
				>
					<h2 id="logbook-title">Logbook</h2>

					<p>
						Thoughts, experiments, mistakes and lessons learned, plus Sherlock's Journal.
						The first entries are on their way.
					</p>

					<Link className="home-panel__link" to="/logbook">
						Open the Logbook
						<ArrowRight aria-hidden="true" />
					</Link>
				</section>
			</div>

			<section className="home-info" aria-labelledby="portfolio-title">
				<h2 id="portfolio-title">My professional portfolio</h2>

				<p>
					a-mamal.dev documents the journey. a-mamal.com is the curated
					version: selected projects, skills and experience.
				</p>

				<a
					className="home-info__link"
					href="https://a-mamal.com/"
					target="_blank"
					rel="noopener noreferrer"
				>
					Visit a-mamal.com
					<ExternalLink aria-hidden="true" size={16} />
					<span className="visually-hidden">(opens in a new tab)</span>
				</a>
			</section>


		</div>
	)
}

export default HomePage