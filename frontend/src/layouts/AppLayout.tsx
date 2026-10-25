import type { ReactNode } from 'react'
import Sidebar from '../components/layout/Sidebar'

type AppLayoutProps = {
	children: ReactNode
}

function AppLayout({ children }: AppLayoutProps) {
	return (
		<div className="app-layout">
			<Sidebar />

			<main className="main-content">
				{children}
			</main>
		</div>
	)
}

export default AppLayout