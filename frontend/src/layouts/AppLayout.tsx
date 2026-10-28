import { Outlet } from 'react-router'
import Sidebar from '../components/layout/Sidebar'
import SherlockStatusReport from '../components/layout/SherlockStatusReport'

// Shared layout containing the sidebar, page content, and Sherlock's status report.
function AppLayout() {
	return (
		<div className="app-layout">
			<Sidebar />

			<main className="main-content">
				{/* Renders the page matched by the nested route. */}
				<Outlet />
			</main>
			
			<SherlockStatusReport />
		</div>
	)
}

export default AppLayout