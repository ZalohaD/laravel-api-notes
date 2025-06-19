import { Route, Routes } from 'react-router-dom';
import AdminLayout from './layouts/admin/AdminLayout';
import AdminMain from './pages/admin/AdminMain';

function App() {
  return (
    <Routes>
      <Route path='/admin' element={<AdminLayout />}>
        <Route index element={<AdminMain />}/>
      </Route>
    </Routes>
  )
}

export default App
