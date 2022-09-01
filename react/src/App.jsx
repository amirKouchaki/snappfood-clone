import React from 'react'
import { useRoutes } from 'react-router-dom';
import routes from './routes';
// import './App.css'


function App() {

  let router = useRoutes(routes)

  return (
    <div className="container">
      {router}
    </div>
  )
}

export default App
