//Jake Grover 102583574
import React, { useState } from "react";
import Card from "@mui/material/Card";
import CardActions from "@mui/material/CardActions";
import CardContent from "@mui/material/CardContent";
import CardMedia from "@mui/material/CardMedia";
import CssBaseline from "@mui/material/CssBaseline";
import Grid from "@mui/material/Grid";
import Box from "@mui/material/Box";
import Typography from "@mui/material/Typography";
import Container from "@mui/material/Container";
import Link from "@mui/material/Link";
import { ThemeProvider } from "@mui/material/styles";
import { theme } from "../components/Theme.js";
import ResponsiveAppBar from "../components/ResponsiveAppBar.js";
import MyModal from "../components/Modal.js";
import StickyFooter from "../components/StickyFooter.js";
import { TextField } from "@mui/material";
import SearchIcon from "@mui/icons-material/Search";

const cards = [1, 2, 3, 4, 5, 6, 7, 8, 9];

export default function ProductsPage() {
  const [searchQuery, setSearchQuery] = useState("");
  const handleSearchChange = (event) => {
    setSearchQuery(event.target.value);
  };

  return (
    <ThemeProvider theme={theme}>
      <ResponsiveAppBar /> {/*responsiveAppBar component */}
      <CssBaseline />
      <main>
        <Container sx={{ py: 8 }} maxWidth="lg">
          <Box marginTop={2} marginBottom={2}>
            <Typography variant="h4" gutterBottom style={{ fontSize: "30px" }}>
              <b>Products</b> {/* heading for the products */}
            </Typography>

            <TextField
              label="Search"
              variant="outlined"
              value={searchQuery}
              onChange={handleSearchChange}
              fullWidth
              InputProps={{
                startAdornment: <SearchIcon />,
              }}
            />
          </Box>
          <Grid container spacing={4}>
            {cards.map((card) => (
              <Grid item key={card} xs={12} sm={4} md={3}>
                <Card
                  sx={{
                    height: "100%",
                    display: "flex",
                    flexDirection: "column",
                  }}
                >
                  {/* Product image */}
                  <CardMedia
                    component="div"
                    sx={{
                      pt: "56.25%",
                    }}
                    image="https://source.unsplash.com/random?wallpapers"
                  />
                  <CardContent sx={{ flexGrow: 1 }}>
                    <Typography gutterBottom variant="h5" component="h2">
                      Heading
                    </Typography>
                    <Typography>$200.45</Typography>
                  </CardContent>
                  <CardActions>
                    <MyModal />
                  </CardActions>
                </Card>
              </Grid>
            ))}
          </Grid>
        </Container>
      </main>
      <StickyFooter /> {/* Stickfooter */}
    </ThemeProvider>
  );
}
