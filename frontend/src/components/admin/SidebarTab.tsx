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
        borderRadius: 2,
        my: 1,
      }}
      >
      <ListItemIcon sx={{ minWidth: 36 }}>{icon}</ListItemIcon>
      <ListItemText primary={text} />
    </ListItemButton>
  );
};

export default SidebarTab;
