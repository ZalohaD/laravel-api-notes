import { Box, Typography } from "@mui/material";
import { CustomButton, InputField } from "./styles";
import { useNavigate } from "react-router";


const Login = () => {
  const navigate = useNavigate();

  return (
    <Box
      display="flex"
      justifyContent="center"
      alignItems="center"
      height="100vh"
    >
      <Box
        display="flex"
        flexDirection="column"
        alignItems="center"
        justifyContent="center"
        width="300px"
        gap={2}
      >
        <Typography>Login</Typography>
        <InputField
          variant="outlined"
          placeholder="Email"
          fullWidth
        />
        <InputField
          variant="outlined"
          placeholder="Password"
          fullWidth
        />
        <CustomButton
          fullWidth
          onClick={() => {navigate("/admin")}}
        >
          Login
        </CustomButton>
      </Box>
    </Box>
  );
};

export default Login;
