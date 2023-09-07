//Jake Grover 102583574
import * as React from "react";
import Card from "@mui/material/Card";
import CardActions from "@mui/material/CardActions";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import Button from "@mui/material/Button";
import Typography from "@mui/material/Typography";
import { Grid } from "@mui/material";
import Paper from "@mui/material/Paper";

export default function ProductCard() {
  return (
    <Card sx={{ maxWidth: 800 }}>
      <Paper
        sx={{
          margin: "auto",
          flexGrow: 1,

          backgroundColor: (theme) =>
            theme.palette.mode === "dark" ? "#1A2027" : "#fff",
        }}
      >
        <Grid container>
          <Grid item xs={6}>
            <CardMedia
              sx={{ height: 400 }}
              image="https://source.unsplash.com/random?wallpapers"
              title="green iguana"
            />
          </Grid>

          <Grid item container xs={6}>
            <Grid item xs={12} minHeight={300}>
              <CardContent>
                {/* Product title */}
                <Typography gutterBottom variant="h5" component="div">
                  Lizard
                </Typography>
                {/* Product description */}
                <Typography variant="body2" color="text.secondary">
                  Lizards are a widespread group of squamate reptiles, with over
                  6,000 species, ranging across all continents except Antarctica
                </Typography>
              </CardContent>
            </Grid>
            {/* price and purchase button */}
            <Grid item container p={3}>
              {/* Product price */}
              <Grid item xs={6}>
                <Typography
                  variant="subtitle1"
                  component="div"
                  textAlign={"center"}
                >
                  $400.25
                </Typography>
              </Grid>
              {/* Purchase button*/}
              <Grid item xs={6}>
                <CardActions>
                  <Button variant="contained">Purchase</Button>
                </CardActions>
              </Grid>
            </Grid>
          </Grid>
        </Grid>
      </Paper>
    </Card>
  );
}
