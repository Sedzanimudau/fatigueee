<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['etmsaid']==0)) {
  header('location:logout.php');
  } else{

}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Smart Inspector System</title>
    
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    h1 {
      color: #007bff;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      margin-right: 10px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    #qrcode {
      margin-top: 20px;
    }

    #downloadLink,
    #viewInfoLink {
      display: none;
      color: #007bff;
      text-decoration: none;
      margin-top: 10px;
    }

    #qrCodeDetails {
      display: none;
      margin-top: 20px;
      border-top: 1px solid #ccc;
      padding-top: 15px;
    }

    #qrCodeText {
      text-align: left;
      white-space: pre-wrap;
    }
  </style>


     
   </head>
   <body class="inner_page general_elements">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
           <?php include_once('includes/sidebar.php');?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include_once('includes/header.php');?>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>QR Code Generator</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>QR Code Generator</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form method="post">
                        <fieldset>
                            <div class="field">
                            <label class="label_field">Asset Name</label>
                            <select type="text" name="asset_name" id="asset_name"  class="form-control" readonly>
                              <option value="">Select an Asset</option>
                            </select>
                            </div>
                            
                        </fieldset>


                        <br>
                           <div class="field">
                              <div class="field">
                              <label class="label_field">Asset ID</label>
                              <input type="text" id="asset_id" value="" class="form-control" readonly>
                              
                              </input>
                           </div>
                           <fieldset>
                            <div class="field">
                            <label class="label_field">Inpection form</label>
                            <select type="text" name="url" id="url"  class="form-control" readonly>
                              <option value="">Select form</option>
                            </select>
                            </div>
                            
                        </fieldset>
                           <button onclick="generateQRCode()">Generate QR Code</button>
                           <button onclick="showQRCodeDetails()">View QR Code Details</button>

                           <div id="qrcode"></div>
                           <a id="downloadLink" download="qrcode.png">Download QR Code</a>

                              <div id="qrCodeDetails" style="display: none;">
                                 <h2>QR Code Details</h2>
                                 <p id="qrCodeText"></p>
                              </div>

                           <a id="viewInfoLink" href="#" target="_blank" style="display: none;">View QR
                           Code Information</a>
        
                     </form></div>
                     
                     

                    
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       

                     
                     </div>
                     
                  </div>
                  <!-- footer -->
                
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
         <!-- model popup -->
    
      </div>
      <!-- jQuery -->
<script>      
var qrCodeData = "";

function generateQRCode() {
    var assetId = document.getElementById('asset_id').value;
    var selectedUrl = document.getElementById('url').value;

    if (assetId.trim() === "") {
        alert("Please enter the Asset ID.");
        return;
    }

    if (selectedUrl.trim() === "") {
        alert("Please select an Inspection form URL.");
        return;
    }

    var assetData = "Asset ID: " + assetId + "\nInspection Form URL: " + selectedUrl;
    qrCodeData = assetData;

    var qrCodeContainer = document.getElementById("qrcode");
    qrCodeContainer.innerHTML = ""; // Clear the QR code container

    // Generate the QR code without asset ID text
    var qrcode = new QRCode(qrCodeContainer, {
        text: selectedUrl,
        width: 256,
        height: 256
    });

    // Create a canvas for overlaying asset ID on QR code
    var canvas = document.createElement("canvas");
    canvas.width = 256;
    canvas.height = 256 + 30; // Add additional height for the asset ID
    var context = canvas.getContext("2d");

    // Draw the QR code on the canvas
    qrcode.makeCode(selectedUrl);
    var qrCodeImage = new Image();
    qrCodeImage.src = qrcode._el.childNodes[0].toDataURL();
    qrCodeImage.onload = function () {
        context.drawImage(qrCodeImage, 0, 0);

        // Overlay asset ID below the QR code
        context.font = "16px Arial";
        context.fillStyle = "#000000";
        context.textAlign = "center";
        context.fillText("Asset ID: " + assetId, canvas.width / 2, canvas.height - 10);

        // Create an image element with the canvas data
        var combinedImage = new Image();
        combinedImage.src = canvas.toDataURL();

        // Display the combined image in the QR code container
        qrCodeContainer.innerHTML = "";
        qrCodeContainer.appendChild(combinedImage);

        var qrCodeDetailsDiv = document.getElementById("qrCodeDetails");
        qrCodeDetailsDiv.style.display = "none";

        var downloadLink = document.getElementById('downloadLink');
        downloadLink.style.display = 'block';
    };
}


function prepareDownload() {
    var canvas = document.createElement("canvas");
    canvas.width = 256;
    canvas.height = 256 + 30; // Add additional height for the asset ID
    var context = canvas.getContext("2d");

    // Get the QR code image
    var qrCodeImage = new Image();
    qrCodeImage.src = document.getElementById("qrcode").getElementsByTagName("img")[0].src;

    // Draw the QR code image on the canvas
    context.drawImage(qrCodeImage, 0, 0);

    // Overlay asset ID below the QR code
    var assetId = document.getElementById('asset_id').value;
    context.font = "16px Arial";
    context.fillStyle = "#000000";
    context.textAlign = "center";
    context.fillText("Asset ID: " + assetId, canvas.width / 2, canvas.height - 10);

    // Create a data URL from the canvas
    var dataUrl = canvas.toDataURL("image/png");

    // Set the download link's href attribute to the data URL
    var downloadLink = document.getElementById("downloadLink");
    downloadLink.href = dataUrl;
}

// Trigger download when the link is clicked
document.getElementById("downloadLink").addEventListener("click", prepareDownload);


    // Use AJAX to fetch assets and populate the dropdown
    $(document).ready(function () {
        $.ajax({
            url: "get_assets.php",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var dropdown = $("#asset_name");
                $.each(data, function (index, asset) {
                    dropdown.append($("<option>").text(asset.asset_name).val(asset.asset_id));
                });

                // Update the Asset ID text input when an option is selected
                dropdown.on('change', function () {
                    $("#asset_id").val($(this).val());
                });
            },
            error: function (xhr, status, error) {
                console.log("Error: " + error);
            }
        });

        // Prevent form submission on button click
        $("form").on("submit", function (e) {
            e.preventDefault();
        });
    });
    // Use AJAX to fetch assets and populate the dropdown
    // Use AJAX to fetch URLs and populate the dropdown
    $(document).ready(function () {
            $.ajax({
                url: "get_urls.php",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var dropdown = $("#url");
                    $.each(data, function (index, urlObj) {
                        dropdown.append($("<option>").text(urlObj.url).val(urlObj.url));
                    });
                },
                error: function (xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        });
    
</script>

    
  
      <script src="script.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js">
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>