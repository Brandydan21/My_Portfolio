//Jake Grover 102583574
//Brandy Dan 103864526
//Valentina Casoar 102167279

import "./App.css";
import ProductsPage from "./pages/ProductsPage.js";
import UploadPage from "./pages/UploadPage.js";
import TransactionHistoryPage from "./pages/TransactionHistoryPage.js";
import CheckoutCartPage from "./pages/CheckoutCartPage.js";
import SignInPage from "./pages/SignInPage";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

function App() {
  return (
    <div className="App">
      {/* Create a Router */}
      <Router>
        {/* Define the routes */}
        <Routes>
          <Route path="/" element={<ProductsPage />} />{" "}
          <Route path="/upload" element={<UploadPage />} />{" "}
          <Route path="/transaction" element={<TransactionHistoryPage />} />{" "}
          <Route path="/checkout" element={<CheckoutCartPage />} />{" "}
          <Route path="/signin" element={<SignInPage />} />{" "}
        </Routes>
      </Router>
    </div>
  );
}

export default App; // Export the App component as a default export
