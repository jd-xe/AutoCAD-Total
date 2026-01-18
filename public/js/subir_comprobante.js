document
  .getElementById("comprobante")
  .addEventListener("change", function (event) {
    const file = event.target.files[0];
    const previewImage = document.getElementById("previewImage");
    const previewPDF = document.getElementById("previewPDF");

    if (!file) {
      previewImage.style.display = "none";
      previewPDF.style.display = "none";
      return;
    }

    const fileType = file.type;
    const fileURL = URL.createObjectURL(file);

    if (fileType.includes("image")) {
      previewImage.src = fileURL;
      previewImage.style.display = "block";
      previewPDF.style.display = "none";
    } else if (fileType === "application/pdf") {
      previewPDF.src = fileURL;
      previewPDF.style.display = "block";
      previewImage.style.display = "none";
    }
  });
