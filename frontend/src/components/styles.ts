import { Box, Paper, styled } from '@mui/material';

export const SidebarContainer = styled(Paper)({
  width: 240,
  height: '100vh',
  boxShadow: 'none',
  backgroundColor: '#EAE4D5',
});

export const MenuList = styled(Box)({
  flex: '1 1 auto',
  paddingLeft: 8,
  paddingRight: 8,
  overflowY: 'auto',
});

export const MenuIcon = styled('div')({
  '& img': {
    width: 18,
    height: 18,
    display: 'block',
  },
});
