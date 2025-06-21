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
        "&.Mui-selected": {
          backgroundColor: "#d9d2c1",
        },
        "&.Mui-selected:hover": {
          backgroundColor: "#B6B09F",
        },
        ":hover": {
          backgroundColor: "#B6B09F"
        },
        ":active": {
          backgroundColor: "#EAE4D5"
        },
      }}
    >
      <ListItemIcon sx={{ minWidth: 36 }}>{icon}</ListItemIcon>
      <ListItemText primary={text} />
    </ListItemButton>
  );
};

export default SidebarTab;
