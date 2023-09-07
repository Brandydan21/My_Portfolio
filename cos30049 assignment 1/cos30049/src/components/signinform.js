import * as React from "react";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import TextField from "@mui/material/TextField";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import FileUploadComponent from "./FileUpload.js";
import CheckboxComponent from "./Checkbox.js";
import IconLabelButtons from "./SubmitButton.js";
import LoginIcon from "@mui/icons-material/Login";

export default function signinform() {
  return (
    <React.Fragment>
      <Typography variant="h6" gutterBottom>
        <b>Sign In</b>
      </Typography>
      <form>
        <Grid container spacing={3}>
          <Grid item xs={12} sm={12}>
            <TextField
              required
              id="userName"
              name="userName"
              label="Username / Email"
              fullWidth
              autoComplete="Username"
              variant="standard"
            />
          </Grid>

          <Grid item xs={12} sm={12}>
            <TextField
              required
              id="Password"
              name="Password"
              label="Password"
              fullWidth
              autoComplete="Password"
              variant="standard"
            />
          </Grid>

          <Grid item xs={12} sm={12}>
            <IconLabelButtons
              endIcon={<LoginIcon />}
              label="Login"
            ></IconLabelButtons>
          </Grid>
        </Grid>
      </form>
    </React.Fragment>
  );
}
