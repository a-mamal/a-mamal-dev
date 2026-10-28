import './App.css'

import { BrowserRouter, Route, Routes } from 'react-router'

import AppLayout from './layouts/AppLayout'
import AboutPage from './pages/AboutPage'
import DocumentationPage from './pages/DocumentationPage'
import HomePage from './pages/HomePage'
import LogbookPage from './pages/LogbookPage'
import ProjectsPage from './pages/ProjectsPage'

function App() {
	return (
		<BrowserRouter>
			<Routes>
				{/* Shared layout for the nested page routes. */}
				<Route element={<AppLayout />}>
					<Route path="/" element={<HomePage />} />
					<Route path="/about" element={<AboutPage />} />
					<Route path="/documentation" element={<DocumentationPage />} />
					<Route path="/logbook" element={<LogbookPage />} />
					<Route path="/projects" element={<ProjectsPage />} />
				</Route>
			</Routes>
		</BrowserRouter>
	)
}

export default App
