import * as React from "react";
import Typography from "@mui/material/Typography";
import List from "@mui/material/List";
import ListItem from "@mui/material/ListItem";
import ListItemText from "@mui/material/ListItemText";
import Grid from "@mui/material/Grid";

const products = [
  {
    name: "Pixels - Farm Land",
    desc: "162367",
    price: "0.05 ETH",
  },
  {
    name: "ZED RUN",
    desc: "	162894",
    price: "2.45 ETH",
  },
  {
    name: "PlaySwoops",
    desc: "173367",
    price: "0.75 ETH",
  },
  {
    name: "Metal Tools Membership",
    desc: "198457",
    price: "0.26 ETH",
  },
  { name: "Shipping", desc: "", price: "Free" },
];

const addresses = ["1 MUI Drive", "Reactville", "Anytown", "3068", "AUS"];
const payments = [
  { name: "Payment type:", detail: "PHANTOM" },
  { name: "Payment holder:", detail: "Mr John Smith" },
  { name: "Username:", detail: "tradegod2000" },
];

export default function Review() {
  return (
    <React.Fragment>
      <Typography variant="h6" gutterBottom>
        Order summary
      </Typography>
      <List disablePadding>
        {products.map((product) => (
          <ListItem key={product.name} sx={{ py: 1, px: 0 }}>
            <ListItemText primary={product.name} secondary={product.desc} />
            <Typography variant="body2">{product.price}</Typography>
          </ListItem>
        ))}
        <ListItem sx={{ py: 1, px: 0 }}>
          <ListItemText primary="Total" />
          <Typography variant="subtitle1" sx={{ fontWeight: 700 }}>
            3.51 ETH
          </Typography>
        </ListItem>
      </List>
      <Grid container spacing={2}>
        <Grid item xs={12} sm={6}>
          <Typography variant="h6" gutterBottom sx={{ mt: 2 }}>
            Shipping
          </Typography>
          <Typography gutterBottom>John Smith</Typography>
          <Typography gutterBottom>{addresses.join(", ")}</Typography>
        </Grid>
        <Grid item container direction="column" xs={12} sm={6}>
          <Typography variant="h6" gutterBottom sx={{ mt: 2 }}>
            Payment details
          </Typography>
          <Grid container>
            {payments.map((payment) => (
              <React.Fragment key={payment.name}>
                <Grid item xs={6}>
                  <Typography gutterBottom>{payment.name}</Typography>
                </Grid>
                <Grid item xs={6}>
                  <Typography gutterBottom>{payment.detail}</Typography>
                </Grid>
              </React.Fragment>
            ))}
          </Grid>
        </Grid>
      </Grid>
    </React.Fragment>
  );
}
