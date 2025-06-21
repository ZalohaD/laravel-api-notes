import { useCallback, useMemo } from 'react';
import { useNavigate } from 'react-router';

import GroupIcon from '@mui/icons-material/Group';
import DescriptionIcon from '@mui/icons-material/Description';
import LogoutIcon from '@mui/icons-material/Logout';

import { MenuIcon, MenuList, SidebarContainer } from './styles';
import SidebarTab from './SidebarTab';
import { Box, Divider, Typography } from '@mui/material';

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
    <SidebarContainer elevation={2}>
      <Box
        sx={{
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          px: 2,
          py: 2,
          cursor: 'pointer',
          borderRadius: 3,
          mx: 2,
          mt: 2,
          transition: '0.3s',
          '&:hover': {
            backgroundColor: '#f4f0e5',
          },
        }}
        onClick={() => navigate('/admin')}
      >
        <Typography>
          Admin Panel
        </Typography>
      </Box>

      <Divider sx={{ my: 2, mx: 'auto', width: '85%', borderBottomWidth: 1 }} />

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

      <Divider sx={{ my: 2, mx: 'auto', width: '85%', borderBottomWidth: 1 }} />

      <MenuList>
        <SidebarTab
          key="Logout"
          text="Logout"
          icon={<MenuIcon><LogoutIcon /></MenuIcon>}
          path="/login"
          onClick={handleClick}
        />
      </MenuList>
    </SidebarContainer>
  );
};

export default Sidebar;
