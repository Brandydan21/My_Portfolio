import * as React from "react";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Paper from "@mui/material/Paper";
import Grid from "@mui/material/Grid";
import ResponsiveAppBar from "./appbar.js";
import AddressForm from "./addressfrom.js";
import { ThemeProvider, createTheme } from "@mui/material/styles";
import CssBaseline from "@mui/material/CssBaseline";
import FileUploadComponent from "./fileupload.js";
import CheckboxComponent from "./checkbox.js";
import IconLabelButtons from "./submitbutton.js";
import StickyFooter from "./footer.js";

const darkTheme = createTheme({
  palette: {
    mode: "dark",
  },
});

const Item = styled(Paper)(({ theme }) => ({
  backgroundColor: theme.palette.mode === "dark" ? "#1A2027" : "#fff",
  ...theme.typography.body2,
  padding: theme.spacing(1),
  textAlign: "center",
  color: theme.palette.text.secondary,
}));

export default function BasicGrid() {
  return (
    <ThemeProvider theme={darkTheme}>
      <CssBaseline />
      <Box sx={{ flexGrow: 1 }}>
        <Grid container spacing={3}>
          <Grid item xs={12}>
            <Item>
              <ResponsiveAppBar></ResponsiveAppBar>
            </Item>
          </Grid>

          <Grid container alignItems="center" justifyContent="center">
            <Grid item xs={4}>
              <br />
              <AddressForm></AddressForm>
              <br />
              <FileUploadComponent></FileUploadComponent>
              <br />
              <CheckboxComponent></CheckboxComponent>
              <br />
              <IconLabelButtons></IconLabelButtons>
            </Grid>
          </Grid>
        </Grid>
      </Box>
      <StickyFooter></StickyFooter>
    </ThemeProvider>
  );
}
