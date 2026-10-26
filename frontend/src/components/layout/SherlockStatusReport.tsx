import { useState } from 'react'
import { Cat, CircleX, Construction, ExternalLink } from 'lucide-react'

function SherlockStatusReport() {
	const [isVisible, setIsVisible] = useState(true)

	if (!isVisible) {
		return null
	}

	return (
		<aside
			className="sherlock-report"
			aria-label="Site status announcement"
		>
			{/* Window title bar */}
			<header className="sherlock-report__header">
				<div className="sherlock-report__title">
					<Cat aria-hidden="true" size={18} />

					<span>Sherlock's status report</span>
				</div>

				{/* Dismiss the window */}
				<button
					type="button"
					className="sherlock-report__close"
					onClick={() => setIsVisible(false)}
					aria-label="Dismiss status report"
				>
					<CircleX aria-hidden="true" size={20} />
				</button>
			</header>

			{/* Status information */}
			<div className="sherlock-report__body">
				<dl className="sherlock-report__details">
					<div>
						<dt>Status</dt>
						<dd>
							<span className="sherlock-report__status">
								<Construction aria-hidden="true" size={16} />
								Rebuilding
							</span>
						</dd>
					</div>

					<div>
						<dt>Stack</dt>
						<dd>React + TypeScript + Laravel</dd>
					</div>

					<div>
						<dt>Supervisor</dt>
						<dd>Sherlock</dd>
					</div>
				</dl>

				{/* Sherlock's commentary */}
				<div className="sherlock-report__notes">
					<span>Notes</span>

					<p>
						The human is rebuilding the website.
						I am inspecting the cables.
					</p>
				</div>

				{/* Links to the other site versions */}
				<nav
					className="sherlock-report__links"
					aria-label="Other versions of the website"
				>
					<a href="https://a-mamal.com/">
						Professional site
						<ExternalLink aria-hidden="true" size={14} />
					</a>

					<a href="https://initial.a-mamal.dev/">
						Initial version
						<ExternalLink aria-hidden="true" size={14} />
					</a>
				</nav>
			</div>
		</aside>
	)
}

export default SherlockStatusReport