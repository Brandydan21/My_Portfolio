// Valentina Casoar 102167279

import React, { useState } from "react";
import Paper from "@mui/material/Paper";
import Table from "@mui/material/Table";
import TableBody from "@mui/material/TableBody";
import TableCell from "@mui/material/TableCell";
import TableContainer from "@mui/material/TableContainer";
import TableHead from "@mui/material/TableHead";
import TablePagination from "@mui/material/TablePagination";
import TableRow from "@mui/material/TableRow";
import TextField from "@mui/material/TextField";
import SearchIcon from "@mui/icons-material/Search";
import Box from "@mui/material/Box";
import Grid from "@mui/material/Grid";
import ResponsiveAppBar from "./appbar.js";
import StickyFooter from "./footer.js";
import { ThemeProvider, createTheme } from "@mui/material/styles";
import Typography from "@mui/material/Typography";

// Define columns for the table
const columns = [
  { id: "transactionID", label: "Transaction ID", minWidth: 170 },
  { id: "code", label: "Product Code", minWidth: 100 },
  {
    id: "productName",
    label: "Product Name",
    minWidth: 170,
    align: "right",
    format: (value) => value,
  },
  {
    id: "price",
    label: "Price",
    minWidth: 170,
    align: "right",
    format: (value) => value,
  },
  {
    id: "sellerName",
    label: "Seller Name",
    minWidth: 170,
    align: "right",
    format: (value) => value,
  },
  {
    id: "transactionDate",
    label: "Transaction Date",
    minWidth: 170,
    align: "right",
  },
];

// Data rows created using the createData function
const rows = [
  createData(
    1,
    162367,
    "Pixels - Farm Land",
    "0.05 ETH",
    "POP2023",
    "06/11/2005"
  ),
  createData(2, 162894, "ZED RUN", "2.45 ETH", "ENS: AmazeQueen", "12/12/2006"),
  createData(
    3,
    173367,
    "PlaySwoops",
    "0.75 ETH",
    "HollywoodStar",
    "04/06/2006"
  ),
  createData(
    4,
    182683,
    "Artist Impression",
    "0.46 ETH",
    "OpenSourceror",
    "28/11/2010"
  ),
  createData(
    5,
    182356,
    "Amazing Photography",
    "0.25 ETH",
    "Kaizan",
    "30/02/2010"
  ),
  createData(
    6,
    198457,
    "Metal Tools Membership",
    "0.26 ETH",
    "Albert11",
    "16/04/2016"
  ),
  createData(7, 162345, "PyschAid", "16 ETH", "UserXAmazing", "17/05/2017"),
  createData(
    8,
    172456,
    "Consortium",
    "1.26 ETH",
    "fastlightning101",
    "22/10/2018"
  ),
  createData(9, 123789, "GroundUp", "26 ETH", "AlexanderTheRail", "10/12/2020"),
  createData(10, 167824, "DeeDee", "6 ETH", "BoB", "03/08/2021"),
  createData(
    11,
    126723,
    "AfterParty Utopians",
    "1.27 ETH",
    "Boatman",
    "16/08/2021"
  ),
  createData(12, 172357, "PIXELATED", "1.78 ETH", "ilovesushi", "17/03/2022"),
  createData(
    13,
    178789,
    "OMGKIRBY",
    "0.78 ETH",
    "cryptoking1655",
    "12/08/2022"
  ),
  createData(14, 172334, "BT x Gala", "0.97 ETH", "ihavenolife", "28/08/2023"),
  createData(15, 189996, "LoudPunx", "3.12 ETH", "mindyourown", "28/08/2023"),
];

// Function to create data rows
function createData(
  transactionID,
  code,
  productName,
  price,
  sellerName,
  transactionDate
) {
  return {
    transactionID,
    code,
    productName,
    price,
    sellerName,
    transactionDate,
  };
}

// Functional component for rendering the table
function StickyHeadTable() {
  const [page, setPage] = useState(0);
  const [rowsPerPage, setRowsPerPage] = useState(10);
  const [searchQuery, setSearchQuery] = useState("");

  const handleChangePage = (_, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = (event) => {
    setRowsPerPage(+event.target.value);
    setPage(0);
  };

  const handleSearchChange = (event) => {
    setSearchQuery(event.target.value);
  };

  // Filter rows based on search query
  const filteredRows = rows.filter((row) => {
    const lowerCaseQuery = searchQuery.toLowerCase();
    return (
      row.transactionID.toString().includes(lowerCaseQuery) ||
      row.code.toString().includes(lowerCaseQuery) ||
      row.productName.toLowerCase().includes(lowerCaseQuery) ||
      row.sellerName.toLowerCase().includes(lowerCaseQuery) ||
      row.price.includes(lowerCaseQuery) ||
      row.transactionDate.includes(lowerCaseQuery)
    );
  });

  const darkTheme = createTheme({
    palette: {
      mode: "dark",
    },
  });

  return (
    <ThemeProvider theme={darkTheme}>
      <Paper sx={{ width: "100%", overflow: "hidden" }}>
        <Box marginTop={2} marginBottom={2}>
          <div>
            <ResponsiveAppBar></ResponsiveAppBar>
            <br></br>
          </div>
          <Typography variant="h4" gutterBottom>
            <b>Transaction History</b>
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

        <TableContainer sx={{ maxHeight: 440 }}>
          <Table stickyHeader aria-label="sticky table">
            <TableHead>
              <TableRow>
                {columns.map((column) => (
                  <TableCell
                    key={column.id}
                    align={column.align}
                    style={{ minWidth: column.minWidth }}
                  >
                    {column.label}
                  </TableCell>
                ))}
              </TableRow>
            </TableHead>
            <TableBody>
              {filteredRows
                .slice(page * rowsPerPage, page * rowsPerPage + rowsPerPage)
                .map((row) => (
                  <TableRow hover role="checkbox" tabIndex={-1} key={row.code}>
                    {columns.map((column) => {
                      const value = row[column.id];
                      return (
                        <TableCell key={column.id} align={column.align}>
                          {column.format && typeof value === "number"
                            ? column.format(value)
                            : value}
                        </TableCell>
                      );
                    })}
                  </TableRow>
                ))}
            </TableBody>
          </Table>
        </TableContainer>
        <br />
        <div>
          <StickyFooter></StickyFooter>
        </div>
        <TablePagination
          rowsPerPageOptions={[10, 25, 100]}
          component="div"
          count={rows.length}
          rowsPerPage={rowsPerPage}
          page={page}
          onPageChange={handleChangePage}
          onRowsPerPageChange={handleChangeRowsPerPage}
        />
      </Paper>
    </ThemeProvider>
  );
}

export default StickyHeadTable;
