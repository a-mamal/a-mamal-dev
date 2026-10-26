import type { ReactNode } from 'react'
import Sidebar from '../components/layout/Sidebar'
import SherlockStatusReport from '../components/layout/SherlockStatusReport'

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
			
			<SherlockStatusReport />
		</div>
	)
}

export default AppLayout