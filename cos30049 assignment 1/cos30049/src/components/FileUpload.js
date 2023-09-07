//Brandy Dan 103864526
import React, { useCallback } from "react";
import { useDropzone } from "react-dropzone";

const FileUploadComponent = () => {
  const onDrop = useCallback((acceptedFiles) => {
    // Do something with the uploaded files, e.g., send them to a server
    console.log(acceptedFiles);
  }, []);

  const { getRootProps, getInputProps, isDragActive } = useDropzone({ onDrop });

  return (
    <div
      className="file-upload-container"
      style={{ color: "#80919c", border: "2px dashed #80919c" }}
    >
      <div
        {...getRootProps()}
        className={`dropzone ${isDragActive ? "active" : ""}`}
        style={{ border: "2px dashed #80919c" }}
      >
        <input {...getInputProps()} />
        {isDragActive ? (
          <p>Product Image Upload</p>
        ) : (
          <p>Product Image Upload</p>
        )}
      </div>
    </div>
  );
};

export default FileUploadComponent;
