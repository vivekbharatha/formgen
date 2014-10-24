<DOCTYPE html>
<html>
<head>
<title>Upload file</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <div class="row" style="margin-top: 100px;">
	    <div class="col-sm-6 col-sm-offset-3 well">
	    <h1>Upload the xml file</h1>
	    	<form class="form" role="form" action="core.php" method="post" enctype="multipart/form-data">
				<input style="float: left;" type="file" name="file" />
				<input  style="float: left;" class="btn btn-info" type="submit" value="Upload File" />
			</form>
	    </div>
    </div>
   </div>
    </body>
    </html>