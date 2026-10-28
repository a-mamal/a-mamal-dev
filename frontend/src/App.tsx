import './App.css'

import { BrowserRouter, Route, Routes } from 'react-router'

import AppLayout from './layouts/AppLayout'
import HomePage from './pages/HomePage'
import ProjectsPage from './pages/ProjectsPage'

function App() {

	return (
		<BrowserRouter>
			<Routes>
				{/* Shared layout for the nested page routes. */}
				<Route element={<AppLayout />}>
					<Route path="/" element={<HomePage />} />
					<Route path="/projects" element={<ProjectsPage />} />
				</Route>
			</Routes>
		</BrowserRouter>
	)
}

export default App
