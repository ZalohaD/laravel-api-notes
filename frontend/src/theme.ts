import { createTheme } from '@mui/material';

export default createTheme({
  palette: {
    mode: 'dark',
    // background: {
    //   default: colors.primary.background,
    // },
    // success: {
    //   main: colors.success100,
    // },
    // warning: {
    //   main: colors.warning100,
    // },
    // error: {
    //   main: colors.error100,
    // },
    // text: {
    //   primary: colors.text100,
    //   disabled: colors.text400,
    // },
  },
  typography: {
    fontFamily: ['Noto Sans', 'sans-serif'].join(','),
  },
});
