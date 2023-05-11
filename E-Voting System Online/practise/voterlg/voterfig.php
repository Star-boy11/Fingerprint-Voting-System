<?php

include('../api/connect.php');
$value = isset($_COOKIE["isotemplate"]) ? $_COOKIE["isotemplate"] : "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link type="text/css" href="../css/style.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="favicon.ico">
    <title>E-Voting System</title>
    <script src="jquery-1.8.2.js" type="text/javascript"></script>
    <script src="mfs100.js"></script>
    <script type="text/javascript">
        var quality = 60; //(1 to 100) (recommended minimum 55)
        var timeout = 10; // seconds (minimum=10(recommended), maximum=60, unlimited=0)

    // Capture a fingerprint from the MFS100 device
    function captureFingerprint() {

        var res = CaptureFinger(quality, timeout);
        if (res.httpStaus) {
            document.getElementById('txtStatus').value = "ErrorCode: " + res.data.ErrorCode + " ErrorDescription: " + res.data.ErrorDescription;
            if (res.data.ErrorCode == "0") {
                document.getElementById('fingerprintImage').src = "data:image/bmp;base64," + res.data.BitmapData;
                var imageinfo = "Quality: " + res.data.Quality + " Nfiq: " + res.data.Nfiq + " W(in): " + res.data.InWidth + " H(in): " + res.data.InHeight + " area(in): " + res.data.InArea + " Resolution: " + res.data.Resolution + " GrayScale: " + res.data.GrayScale + " Bpp: " + res.data.Bpp + " WSQCompressRatio: " + res.data.WSQCompressRatio;
                document.getElementById('txtImageInfo').value = imageinfo;
                document.getElementById('txtIsoTemplate').value = res.data.IsoTemplate;
            }
        } else {
            alert(res.err);
        }
    }
    
    // Verify the captured fingerprint with the stored ISO template
    function verifyFingerprint() {
        
        try {
            var isotemplate = "<?php echo $value; ?>";
            // Call the VerifyFinger() function to compare the templates
            var verifyResult = VerifyFinger(document.getElementById('txtIsoTemplate').value, isotemplate);
            

            if (verifyResult.httpStaus) {
                if (verifyResult.data.Status) {
                    alert("Fingerprint verified.");
                    window.location.href = "./voting.php";
                } else {
                    if (verifyResult.data.ErrorCode != "0") {
                        alert(verifyResult.data.ErrorDescription);
                    } else {
                        alert("Fingerprint not verified.");
                        window.location.href = "./voterlogin.php";
                    }
                }
            } else {
                alert(verifyResult.err);
            }
            
        } catch (e) {
            alert("Error: " + e.message);
        }
        return false;
    }
</script>
</head>
<body>          
        <h1 class="text-center mt-4"></h1><br><br><br>

        <div class="container form-body">
            <div class="row">
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Fingeprint verification</h3><br><br>
                            
                            <form class="requires-validation"  novalidate >
                                   
                                <div>
                                  <p><label  class="btn" name="capture" style="cursor: pointer;" onclick="captureFingerprint()">Capture</label></p>
                                  
                                </div>
                                <img id="fingerprintImage" src="" alt="Fingerprint Image">
                                <input type="text" id="txtImageInfo" readonly>
                                <input type="hidden" id="isotemplate" name="isotemplate" value="<?php echo $value; ?>">
                                <input id="txtStatus" type="text" rows="4" cols="50" readonly>
                                <input type="hidden" id="txtIsoTemplate" name="txtIsoTemplate" rows="4" cols="50" readonly><br><br>
                                

                                <div >
                                <p><label  class="btn" name="verify" style="cursor: pointer;" onclick="verifyFingerprint()">Verify</label></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/index.js"></script>
	  <script type="module" src="/static/app.js"></script>

</body>
</html>