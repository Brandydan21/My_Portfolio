//Brandy Dan 103864526
//Jake Grover 102583574

import * as React from "react";
import AppBar from "@mui/material/AppBar";
import Box from "@mui/material/Box";
import Toolbar from "@mui/material/Toolbar";
import IconButton from "@mui/material/IconButton";
import Typography from "@mui/material/Typography";
import Menu from "@mui/material/Menu";
import MenuIcon from "@mui/icons-material/Menu";
import Container from "@mui/material/Container";
import Avatar from "@mui/material/Avatar";
import Button from "@mui/material/Button";
import Tooltip from "@mui/material/Tooltip";
import MenuItem from "@mui/material/MenuItem";
import { Link as RouterLink } from "react-router-dom";
import Logo from "./logo.js";
import Icon_Product from "../images/icons8-product-64.png";
import Icon_Upload from "../images/icons8-upload-to-the-cloud-64.png";
import Icon_History from "../images/icons8-history-64.png";
import Icon_Checkout from "../images/icons8-checkout-64.png";

const pages = ["Products", "Upload", "Website Database", "Checkout"];
const settings = ["Sign In"];

const menuItemHoverStyle = {
  "&:hover": {
    backgroundColor: "#536c7c",
    borderRadius: "20px",
    transition: "all 0.5s ease",
    "&:hover": {
      transitionDelay: "0.2s",
    },
  },
};

export default function ResponsiveAppBar() {
  const [anchorElNav, setAnchorElNav] = React.useState(null);
  const [anchorElUser, setAnchorElUser] = React.useState(null);

  const handleOpenNavMenu = (event) => {
    setAnchorElNav(event.currentTarget);
  };
  const handleOpenUserMenu = (event) => {
    setAnchorElUser(event.currentTarget);
  };

  const handleCloseNavMenu = () => {
    setAnchorElNav(null);
  };

  const handleCloseUserMenu = () => {
    setAnchorElUser(null);
  };

  return (
    <AppBar
      position="static"
      sx={{
        background: "linear-gradient(to bottom, #0e3b4f 30%, #335365 80%)",
        height: "130px",
        boxShadow: "none",
      }}
    >
      <Container maxWidth="xl">
        <Toolbar disableGutters>
          <Typography
            variant="h6"
            noWrap
            component="a"
            href="/"
            sx={{
              mr: 2,
              display: { xs: "none", md: "flex" },
              fontFamily: "monospace",
              fontWeight: 700,
              letterSpacing: ".3rem",
              color: "inherit",
              textDecoration: "none",
            }}
          >
            <Logo />
          </Typography>

          <Box sx={{ flexGrow: 1, display: { xs: "flex", md: "none" } }}>
            <IconButton
              size="large"
              aria-label="account of current user"
              aria-controls="menu-appbar"
              aria-haspopup="true"
              onClick={handleOpenNavMenu}
              color="inherit"
            >
              <MenuIcon />
            </IconButton>
            <Menu
              id="menu-appbar"
              anchorEl={anchorElNav}
              anchorOrigin={{
                vertical: "bottom",
                horizontal: "left",
              }}
              keepMounted
              transformOrigin={{
                vertical: "top",
                horizontal: "left",
              }}
              open={Boolean(anchorElNav)}
              onClose={handleCloseNavMenu}
              sx={{
                display: { xs: "block", md: "none" },
              }}
            >
              {pages.map((page) => (
                <MenuItem key={page} onClick={handleCloseNavMenu}>
                  <Typography textAlign="center">{page}</Typography>
                </MenuItem>
              ))}
            </Menu>
          </Box>
          <Typography
            variant="h5"
            noWrap
            component="a"
            href="/"
            sx={{
              mr: 2,
              display: { xs: "flex", md: "none" },
              flexGrow: 1,
              fontFamily: "monospace",
              fontWeight: 700,
              letterSpacing: ".3rem",
              color: "inherit",
              textDecoration: "none",
            }}
          >
            <Logo />
          </Typography>
          <Box sx={{ flexGrow: 1, display: { xs: "none", md: "flex" } }}>
            <Button
              component={RouterLink}
              to="/"
              onClick={handleCloseNavMenu}
              sx={{
                my: 2,
                color: "white",
                display: "block",
                ...menuItemHoverStyle,
              }}
              style={{ fontSize: 17 }}
            >
              <div
                style={{
                  display: "flex",
                  alignItems: "center", // Center items vertically
                  justifyContent: "center", // Center items horizontally
                }}
              >
                <img src={Icon_Product} height="35" />
                Products
              </div>
            </Button>
            <Button
              component={RouterLink}
              to="/upload"
              onClick={handleCloseNavMenu}
              sx={{
                my: 2,
                color: "white",
                display: "block",
                verticalAlign: "middle",
                textAlign: "centre",
                ...menuItemHoverStyle,
              }}
              style={{ fontSize: 17 }}
            >
              <div
                style={{
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "center",
                }}
              >
                <img src={Icon_Upload} height="35" />
                Create Product
              </div>
            </Button>
            <Button
              component={RouterLink}
              to="/transaction"
              onClick={handleCloseNavMenu}
              sx={{
                my: 2,
                color: "white",
                display: "block",
                ...menuItemHoverStyle,
              }}
              style={{ fontSize: 17 }}
            >
              <div
                style={{
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "center",
                }}
              >
                <img src={Icon_History} height="35" />
                Transaction history
              </div>
            </Button>
            <Button
              component={RouterLink}
              to="/checkout"
              onClick={handleCloseNavMenu}
              sx={{
                my: 2,
                color: "white",
                display: "block",
                ...menuItemHoverStyle,
              }}
              style={{ fontSize: 17 }}
            >
              <div
                style={{
                  display: "flex",
                  alignItems: "center",
                  justifyContent: "center",
                }}
              >
                <img src={Icon_Checkout} height="35" />
                Checkout
              </div>
            </Button>
          </Box>

          <Box sx={{ flexGrow: 0 }}>
            <Tooltip title="Open settings">
              <IconButton onClick={handleOpenUserMenu} sx={{ p: 0 }}>
                <Avatar alt="Remy Sharp" src="/static/images/avatar/2.jpg" />
              </IconButton>
            </Tooltip>
            <Menu
              sx={{ mt: "45px" }}
              id="menu-appbar"
              anchorEl={anchorElUser}
              anchorOrigin={{
                vertical: "top",
                horizontal: "right",
              }}
              keepMounted
              transformOrigin={{
                vertical: "top",
                horizontal: "right",
              }}
              open={Boolean(anchorElUser)}
              onClose={handleCloseUserMenu}
            >
              <MenuItem onClick={handleCloseUserMenu}>
                <Button
                  component={RouterLink}
                  to="/signin"
                  onClick={handleCloseNavMenu}
                  sx={{ color: "80919c" }}
                >
                  sign in
                </Button>
              </MenuItem>
            </Menu>
          </Box>
        </Toolbar>
      </Container>
    </AppBar>
  );
}
