//Brandy Dan 103864526
import * as React from "react";
import Grid from "@mui/material/Grid";
import Typography from "@mui/material/Typography";
import TextField from "@mui/material/TextField";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import FileUploadComponent from "./FileUpload.js";
import CheckboxComponent from "./Checkbox.js";
import SubmitButton from "./SubmitButton.js";

export default function UploadForm() {
  return (
    <React.Fragment>
      <Typography variant="h6" gutterBottom style={{ fontSize: "27px" }}>
        <b>Upload Product</b> {/* heading for form */}
      </Typography>
      <form>
        <Grid container spacing={3}>
          {/* Product Name Input */}
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

          {/* Price Input */}
          <Grid item xs={12} sm={12}>
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

          {/* Item description inpuit */}
          <Grid item xs={12} sm={12}>
            <TextField
              label="Enter text"
              variant="outlined"
              fullWidth
              className="custom-text-field" // Applying a custom class for styling
            />
          </Grid>

          {/* File Upload  */}
          <Grid item xs={12} sm={12}>
            <FileUploadComponent></FileUploadComponent>{" "}
          </Grid>

          {/* Checkbox t */}
          <Grid item xs={12} sm={12}>
            <CheckboxComponent></CheckboxComponent>{" "}
          </Grid>

          {/* Submit Button */}
          <Grid item xs={12} sm={12}>
            <SubmitButton></SubmitButton> {/* Render the SubmitButton */}
          </Grid>
        </Grid>
      </form>
    </React.Fragment>
  );
}
