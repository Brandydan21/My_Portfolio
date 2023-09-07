//Jake Grover 102583574

import { createTheme } from "@mui/material/styles";
import { green, amber } from "@mui/material/colors";

export const theme = createTheme({
  palette: {
    mode: "light",

    // Primary color settings
    primary: {
      main: "#0d3749",
      light: "#bac3c8",
      text: "#80919c",

      typography: {
        fontFamily: "Roboto, Helvetica, Arial, sans-serif",
        fontSize: "2rem",
      },
    },

    // Secondary color settings
    secondary: {
      main: "#496271",
      light: "#f7f7f7",
    },
  },
});
