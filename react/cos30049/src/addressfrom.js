import * as React from "react";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import TextField from "@mui/material/TextField";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";

export default function AddressForm() {
  return (
    <React.Fragment>
      <Typography variant="h6" gutterBottom>
        <b>Upload Product</b>
      </Typography>
      <Grid container spacing={3}>
        <Grid item xs={12} sm={6}>
          <TextField
            required
            id="username"
            name="username"
            label="Username"
            fullWidth
            autoComplete="username"
            variant="standard"
          />
        </Grid>

        <Grid item xs={12} sm={6}>
          <TextField
            required
            id="price"
            name="price"
            label="Price (AUD)"
            fullWidth
            autoComplete="price"
            variant="standard"
          />
        </Grid>
        <Grid item xs={12} sm={12}>
          <TextField
            required
            id="productName"
            name="productName"
            label="Product Name"
            fullWidth
            autoComplete="Product Name"
            variant="standard"
          />
        </Grid>
      </Grid>
    </React.Fragment>
  );
}
