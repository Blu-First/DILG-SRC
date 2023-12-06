
Dropzone.autoDiscover = false;
$(function () {

  
  // Financial Dropzone
  var finangovDropzone = new Dropzone("#finangovDropzone", {
    url: "submit-action.php",
    autoProcessQueue: false,
    paramName: "file",
    parallelUploads: 20,
    maxFilesize: 20,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });

      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          alert("Please upload only PDF files.");
          finangovDropzone.removeFile(file);
        }
      });
    },
    params: { dropzoneID: "finangov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "finangov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not uploaded</div>"
        );
      }
    },
  });

  $("#submit_finangov").click(function () {
    finangovDropzone.processQueue();
  });

  // Disaster Preparedness Dropzone
  var disastgovDropzone = new Dropzone("#disastgovDropzone", {
    url: "submit-action.php",
    autoProcessQueue: false,
    paramName: "file",
    parallelUploads: 200,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });
  
      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          // Show an alert if the file has an invalid extension
          alert("Please upload only PDF files.");
          // Remove the file from Dropzone
          disastgovDropzone.removeFile(file);
        }
      });
    },
    params: { dropzoneID: "disastgov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "disastgov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not be uploaded</div>"
        );
      }
    },
  });  

  $("#submit_disastgov").click(function () {
    disastgovDropzone.processQueue();
  });

  // Safety Peace Dropzone
  var spogovDropzone = new Dropzone("#spogovDropzone", {
    url: "submit-action.php",
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads: 200,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });

      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          // Show an alert if the file has an invalid extension
          alert("Please upload only PDF files.");
          // Remove the file from Dropzone
          spogovDropzone.removeFile(file);
        }
      });
    },
    params: { dropzoneID: "spogov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "spogov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not uploaded</div>"
        );
      }
    },
  });

  $("#submit_spogov").click(function () {
    spogovDropzone.processQueue();
  });

  //Social Protection Dropzone
  var spsgovDropzone = new Dropzone("#spsgovDropzone", {
    url: "submit-action.php",
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads: 200,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });

      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          // Show an alert if the file has an invalid extension
          alert("Please upload only PDF files.");
          // Remove the file from Dropzone
          spsgovDropzone.removeFile(file);
        }
      });
    },
    params: { dropzoneID: "spsgov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "spsgov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not uploaded</div>"
        );
      }
    },
  });

  $("#submit_sps").click(function () {
    spsgovDropzone.processQueue();
  });

  //Business Friendliness Dropzone
  var bfcgovDropzone = new Dropzone("#bfcgovDropzone", {
    url: "submit-action.php",
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads: 200,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });
    
      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          // Show an alert if the file has an invalid extension
          alert("Please upload only PDF files.");
          // Remove the file from Dropzone
          bfcgovDropzone.removeFile(file);
        }
      });

    },
    params: { dropzoneID: "bfcgov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "bfcgov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not uploaded</div>"
        );
      }
    },
  });

  $("#submit_bfc").click(function () {
    bfcgovDropzone.processQueue();
  });

  //Environmental Management Dropzone
  var envgovDropzone = new Dropzone("#envgovDropzone", {
    url: "submit-action.php",
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads: 200,
    uploadMultiple: true,
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    init: function () {
      this.on("removedfile", function (file) {
        console.log("File removed: " + file.name);
      });

      this.on("addedfile", function (file) {
        // Check the file extension when a file is added
        if (!file.name.toLowerCase().endsWith(".pdf")) {
          // Show an alert if the file has an invalid extension
          alert("Please upload only PDF files.");
          // Remove the file from Dropzone
          envgovDropzone.removeFile(file);
        }
      });
    },

    params: { dropzoneID: "envgov" },
    sending: function (file, xhr, formData) {
      formData.append("dropzoneID", "envgov");
    },
    success: function (file, response) {
      if (response == "true") {
        $("#message").append(
          "<div class='alert alert-success'>Files Uploaded successfully</div>"
        );
      } else {
        $("#message").append(
          "<div class='alert alert-danger'>Files can not uploaded</div>"
        );
      }
    },
  });

  $("#submit_envgov").click(function () {
    envgovDropzone.processQueue();
  });
});
