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
                              <h2></h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column8 graph">
                      
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Support</h2>
                                 </div>
                              </div>
                              <div class="full progress_bar_inner">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="full">
                                          <div class="padding_infor_info">
                                             <div class="alert alert-primary" role="alert">
                                                <form action="send_email.php" method="post" enctype="multipart/form-data">
                                                    <label for="name">Name:</label>
                                                    <input type="text" id="name" name="name" required>
                                                    
                                                    <label for="email">Email:</label>
                                                    <input type="email" id="email" name="email" required>
                                                    
                                                    <label for="message">Message:</label>
                                                    <textarea id="message" name="message" rows="6" style="width: 1050px;" required></textarea>
                                                    
                                                    <label for="attachment">Attachment:</label>
                                                    <input type="file" id="attachment" name="attachment">
                                                    
                                                    <button type="submit">Submit</button>
        
                                                </form>
                                            </div>
                     
                     

                    
                                       
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

    // Encode the URL along with asset ID in the QR code
    var assetData = "Asset ID: " + assetId + "\nInspection Form URL: " + selectedUrl;
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: selectedUrl, // Encode the URL only
        width: 256,
        height: 256
    });

    qrCodeData = assetData;

    var qrCodeDetailsDiv = document.getElementById("qrCodeDetails");
    qrCodeDetailsDiv.style.display = "none";

    var downloadLink = document.getElementById('downloadLink');
    downloadLink.style.display = 'block';
}

// Open the URL when the QR code is scanned
function openScannedURL() {
    var scannedURL = document.getElementById("url").value;
    window.open(scannedURL, "_blank");
}

// Trigger the URL open when the QR code is clicked
document.getElementById("qrcode").addEventListener("click", openScannedURL);

function showQRCodeDetails() {
    if (qrCodeData.trim() === "") {
        alert("No QR code generated yet.");
        return;
    }

    var qrCodeDetailsDiv = document.getElementById("qrCodeDetails");
    qrCodeDetailsDiv.style.display = "block";
    document.getElementById("qrCodeText").innerText = qrCodeData.replace(/\n/g, '<br>');
}

function prepareDownload() {
    var dataUrl = document.getElementById("qrcode").getElementsByTagName("img")[0].src;
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