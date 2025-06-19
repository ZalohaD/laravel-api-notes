import { Route, Routes } from 'react-router-dom';
import AdminLayout from './layouts/admin/AdminLayout';
import AdminMain from './pages/admin/AdminMain';
import Users from './pages/admin/Users';
import Notes from './pages/admin/Notes';

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
