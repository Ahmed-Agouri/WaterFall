<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserPolicy-acceptance</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="register-photo"> 
        <div class="form-container">
            <form method="post" action="index.html">
                <h2 class="text-center"> <div class="policy">
                    User policy and rules for <strong> Waterfall</strong>
                </div>
            </h2>
                <div class="form-group">
                    <?php
                    $filename = 'policy.txt';
                    if (file_exists($filename)) {
                        $policyText = file_get_contents($filename);
                        echo $policyText;
                    } else {
                        echo "Error: file $filename does not exist";
                    }
                ?>
                </div>
                <div class="form-group">
                </div>
              
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
