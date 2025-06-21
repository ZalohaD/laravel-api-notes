import { TextField, Button, styled } from '@mui/material';

export const InputField = styled(TextField)({
  '& .MuiOutlinedInput-root': {
    borderRadius: 12,
    backgroundColor: '#fff',
    '& fieldset': {
      borderColor: '#ccc',
    },
    '&:hover fieldset': {
      borderColor: '#999',
    },
    '&.Mui-focused fieldset': {
      borderColor: '#7C5E10',
      borderWidth: 1,
    },
  },
  '& input': {
    padding: '12px',
  },
});

export const CustomButton = styled(Button)({
  borderRadius: 12,
  backgroundColor: '#fff',
  color: '#333',
  border: '1px solid #ccc',
  padding: '10px 20px',
  textTransform: 'none',
  fontWeight: 500,

  '&:hover': {
    backgroundColor: '#f4f4f4',
    borderColor: '#999',
  },

  '&:focus': {
    borderColor: '#7C5E10',
    outline: 'none',
  },

  '&:active': {
    backgroundColor: '#ececec',
    borderColor: '#7C5E10',
  },
})
