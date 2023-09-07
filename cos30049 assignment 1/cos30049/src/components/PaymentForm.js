import * as React from "react";
import Typography from "@mui/material/Typography";
import Grid from "@mui/material/Grid";
import TextField from "@mui/material/TextField";
import FormControlLabel from "@mui/material/FormControlLabel";
import Checkbox from "@mui/material/Checkbox";
import Button from "@mui/material/Button";
import { useState } from "react";

export default function PaymentForm() {
  const [selectedOption, setSelectedOption] = useState(null);

  const handleOptionClick = (option) => {
    // Update the selected option
    setSelectedOption(option);
  };

  return (
    <React.Fragment>
      <Typography variant="h6" gutterBottom>
        Payment method
      </Typography>
      <Grid container spacing={3}>
        <Grid item xs={12} md={6}>
          <TextField
            required
            id="username"
            label="Username"
            fullWidth
            autoComplete="username"
            variant="standard"
          />
          <OptionGrid
            handleOptionClick={handleOptionClick}
            selectedOption={selectedOption}
          />
          <FormControlLabel
            control={<Checkbox color="secondary" name="saveCard" value="yes" />}
            label="Remember wallet for next time"
            // style={{ marginLeft: "100px" }}
          />
        </Grid>
      </Grid>
    </React.Fragment>
  );
}

const OptionGrid = ({ handleOptionClick, selectedOption }) => {
  return (
    <div
      style={{
        display: "flex",
        flexDirection: "column",
        alignItems: "center",
        marginTop: "16px",
        marginLeft: "250px",
      }}
    >
      <Button
        variant={selectedOption === "Option 1" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 1")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        MetaMask
      </Button>
      <Button
        variant={selectedOption === "Option 2" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 2")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        Coinbase Wallet
      </Button>
      <Button
        variant={selectedOption === "Option 3" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 3")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        WalletConnect
      </Button>
      <Button
        variant={selectedOption === "Option 4" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 4")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        Ledger
      </Button>
      <Button
        variant={selectedOption === "Option 5" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 5")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        Phantom
      </Button>
      <Button
        variant={selectedOption === "Option 6" ? "contained" : "outlined"}
        fullWidth
        onClick={() => handleOptionClick("Option 6")}
        sx={{ mb: 1, height: 60, width: 300 }}
      >
        BitKeep
      </Button>
    </div>
  );
};
