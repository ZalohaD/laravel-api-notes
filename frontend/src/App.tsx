import { Route, Routes } from 'react-router-dom';
import AdminLayout from './layouts/AdminLayout';
import AdminMain from './pages/AdminMain';
import Users from './pages/Users';
import Notes from './pages/Notes';

function App() {
  return (
    <Routes>
      <Route path='/admin' element={<AdminLayout />}>
        <Route index element={<AdminMain />}/>
        <Route path='users' element={<Users />}/>
        <Route path='notes' element={<Notes />}/>
      </Route>
    </Routes>
  )
}

export default App
