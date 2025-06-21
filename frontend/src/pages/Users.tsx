import { Table, TableBody, TableCell, TableContainer, TableHead, TableRow, Paper } from '@mui/material';
import { useNavigate } from 'react-router';

const users = [
  { id: 1, firstName: 'John', lastName: 'Doe', email: 'user1@example.com', role: 'admin' },
];


const Users = () => {
  const navigate = useNavigate();

  return (
    <TableContainer component={Paper} sx={{ borderRadius: 3, boxShadow: 5 }}>
      <Table>
        <TableHead>
          <TableRow sx={{ backgroundColor: '#f5f5f5' }}>
            <TableCell sx={{ fontWeight: 'bold' }}>First name</TableCell>
            <TableCell sx={{ fontWeight: 'bold' }}>Last name</TableCell>
            <TableCell sx={{ fontWeight: 'bold' }}>Email</TableCell>
            <TableCell sx={{ fontWeight: 'bold' }}>Role</TableCell>
          </TableRow>
        </TableHead>
        <TableBody>
          {users.map((user) => (
            <TableRow
              key={user.id}
              sx={{
                '&:hover': { backgroundColor: '#f9f9f9' },
                transition: '0.2s ease',
              }}
              onClick={() => {navigate(`/admin/users/${user.id}`)}}
            >
              <TableCell>{user.firstName}</TableCell>
              <TableCell>{user.lastName}</TableCell>
              <TableCell>{user.email}</TableCell>
              <TableCell>{user.role}</TableCell>
            </TableRow>
          ))}
        </TableBody>
      </Table>
    </TableContainer>
  );
};

export default Users;
