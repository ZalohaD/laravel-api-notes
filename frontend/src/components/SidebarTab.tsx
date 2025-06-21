import { ListItemButton, ListItemIcon, ListItemText } from '@mui/material';
import { useLocation } from 'react-router-dom';

interface SidebarTabProps {
  text: string;
  icon: React.ReactNode;
  path: string;
  onClick: (path: string) => void;
}

const SidebarTab = ({ text, icon, path, onClick }: SidebarTabProps) => {
  const location = useLocation();
  const isActive = location.pathname === path;

  return (
    <ListItemButton
      selected={isActive}
      onClick={() => onClick(path)}
      sx={{
        px: 3,
        py: 1.5,
        borderRadius: 3,
        my: 1,
        transition: '0.3s ease',
        '&.Mui-selected': {
          backgroundColor: '#f4f0e5',
        },
        '&.Mui-selected:hover': {
          backgroundColor: '#f4f0e5',
        },
        ':hover': {
          backgroundColor: '#f4f0e5',
        },
        ':active': {
          backgroundColor: '#ede6d7',
        },
      }}
    >
      <ListItemIcon sx={{ minWidth: 36, color: '#7C5E10' }}>{icon}</ListItemIcon>
      <ListItemText primary={text} />
    </ListItemButton>
  );
};

export default SidebarTab;
