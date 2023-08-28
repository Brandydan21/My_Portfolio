import * as React from "react";
import Button from "@mui/material/Button";
import DeleteIcon from "@mui/icons-material/Delete";
import SendIcon from "@mui/icons-material/Send";
import Stack from "@mui/material/Stack";
import PublishIcon from "@mui/icons-material/Publish";

export default function IconLabelButtons() {
  return (
    <Button variant="outlined" endIcon={<PublishIcon />}>
      Publish Product
    </Button>
  );
}
