import { useCallback, useMemo } from 'react';
import { useNavigate } from 'react-router';

import GroupIcon from '@mui/icons-material/Group';
import DescriptionIcon from '@mui/icons-material/Description';

import { MenuIcon, MenuList, SidebarContainer } from './styles';
import SidebarTab from './SidebarTab';
import { Box, Typography } from '@mui/material';

const Sidebar = () => {
  const navigate = useNavigate();

  const menuItems = useMemo(
    () => [
      {
        text: 'Users',
        icon: (
          <MenuIcon>
            <GroupIcon />
          </MenuIcon>
        ),
        path: '/admin/users',
      },
      {
        text: 'Notes',
        icon: (
          <MenuIcon>
            <DescriptionIcon />
          </MenuIcon>
        ),
        path: '/admin/notes',
      },
    ],
    []
  );

  const handleClick = useCallback(
    (path: string) => {
      navigate(path);
    },
    [navigate]
  );

  return (
    <SidebarContainer elevation={1}>
      <Box
        sx={{
          display: 'flex',
          justifyItems: 'center',
          justifyContent: 'center',
          mt: 1,
          mx: 1,
          py: 2,
          cursor: 'pointer',
          transition: 'background-color 0.3s ease',
          '&:hover': {
            backgroundColor: '#151515',
          },
          borderRadius: 3,
        }}
        onClick={() => {navigate('/admin/')}}
      >
        <Typography>Admin panel</Typography>
      </Box>
      <MenuList>
        {menuItems.map(item => (
          <SidebarTab
            key={item.text}
            text={item.text}
            icon={item.icon}
            path={item.path}
            onClick={handleClick}
          />
        ))}
      </MenuList>
    </SidebarContainer>
  );
};

export default Sidebar;
