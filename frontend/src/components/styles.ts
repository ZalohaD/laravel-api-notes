import { Box, Paper, styled } from '@mui/material';

export const SidebarContainer = styled(Paper)({
  width: 240,
  height: '100vh',
  backgroundColor: '#fcfaf2',
  borderRadius: 0,
  display: 'flex',
  flexDirection: 'column',
  justifyContent: 'space-between',
  paddingBottom: 16,
});

export const MenuList = styled(Box)({
  paddingLeft: 8,
  paddingRight: 8,
  flexGrow: 1,
});

export const MenuIcon = styled('div')({
  display: 'flex',
  alignItems: 'center',
  justifyContent: 'center',
  '& svg': {
    fontSize: 20,
  },
});
