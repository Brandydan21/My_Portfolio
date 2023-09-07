//Brandy Dan 103864526
import * as React from "react";
import { styled } from "@mui/material/styles";
import Box from "@mui/material/Box";
import Paper from "@mui/material/Paper";
import Grid from "@mui/material/Grid";
import ResponsiveAppBar from "../components/ResponsiveAppBar.js";
import UploadForm from "../components/UploadForm.js";
import { ThemeProvider, createTheme } from "@mui/material/styles";
import CssBaseline from "@mui/material/CssBaseline";
import StickyFooter from "../components/StickyFooter.js";
import { theme } from "../components/Theme.js";

const Item = styled(Paper)(({ theme }) => ({
  backgroundColor: theme.palette.mode === "dark" ? "#1A2027" : "#fff",
  ...theme.typography.body2,
  padding: theme.spacing(1),
  textAlign: "center",
  color: theme.palette.text.secondary,
}));

export default function UploadPage() {
  return (
    <ThemeProvider theme={theme}>
      <ResponsiveAppBar />
      <CssBaseline />
      <Box sx={{ flexGrow: 1 }}>
        <Grid container spacing={3} sx={{ marginTop: 7 }}>
          <Grid container alignItems="center" justifyContent="center">
            <Grid item xs={4}>
              <br />
              {/*UploadForm component. */}
              <UploadForm />
            </Grid>
          </Grid>
        </Grid>
      </Box>
      <StickyFooter></StickyFooter> {/*sticky footer. */}
    </ThemeProvider>
  );
}
