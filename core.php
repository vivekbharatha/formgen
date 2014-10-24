<!DOCTYPE html>
<html>
	<head>
		<title>
			Core
		</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				<?php
					echo '<div class="well">';
					if(isset($_FILES['file'])) {
				    	if($_FILES['file']['type']!='text/xml'){
				    		echo "<h3>Please upload xml file only !</h3>";
				    	} else {
					    	$dir = 'uploads/';
					    	$fileName = explode('.',$_FILES['file']['name']);
					    	$fileName = uniqid(time(),true) . "." . end($fileName);
					    	$target = $dir . $fileName;
					    	if(move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
					    		echo "<h3>The file ".$_FILES['file']['name']." has been uploaded</h3>";
					    		echo "<h4>Please click generate button!</h4>";
					    	} else {
					    		echo "<h3>There was some problem in uploading file.Pleas try again later</h3>";
					    	}
				    	}
				    }

				    if(isset($target)) {
						$file = $target;
						if(file_exists($file)) {
							$xml = simplexml_load_file($target);
							$formGen = process($xml);
							echo "<form style='margin-left:40%' method='post' action='generated.php'> <input type='hidden' name='form' value=\"$formGen\" />";
							echo "<input class='btn btn-success' type='submit' value='Generate' />";
							echo "</form>";
						}
						else
							echo 'File couldn\'t be loaded';
					}

					echo "</div>";
					function process($xml) {
						$form = form_init();
							foreach ($xml as $field) {
								if($field->getName()=="select"){ //<-------- Select Tag Start
									$form .=  "<select name='".$field->name ."' class='form-control ".$field->class."'>\n";
									foreach($field->options as $options) {
										foreach ($options as $option) {
											$form .= "<option value='".$option->value."'>".$option->getName()."</option>\n";
										}
									}

									$form .= "</select></br>\n"; //<--------Select Tag End
								}
								elseif($field->getName()=="textarea"){
									$form .=  "<textarea name='".$field->name ."' placeholder='".$field->placeholder."' class='form-control ".$field->class."'></textarea></br>\n";
								}
								elseif($field->getName()=="radio"){
									$form .= "<label class='radio-inline'>\n";
									$form .= "<input type='".$field->getName()."' name='".$field->name ."' value='".$field->value."' class='".$field->class."' />\n";
									$form .= $field->text."\n</label>\n";
								}
								elseif($field->getName()=="checkbox"){
									$form .= "<label class='checkbox-inline'>\n";
									$form .= "<input type='".$field->getName()."' name='".$field->name ."' value='".$field->value."' class='".$field->class."' />\n";
									$form .= $field->text."\n</label><br>\n";
								}
								elseif($field->getName()=="submit") {
										$form .=  "<input type='".$field->getName()."' name='".$field->name ."' placeholder='".$field->placeholder."' class='".$field->class."' /></br>\n";
								}
								else {
										$form .=  "<input type='".$field->getName()."' name='".$field->name ."' placeholder='".$field->placeholder."' class='form-control ".$field->class."' /></br>\n";
								}
							}

						$form = form_close($form);
						return $form;
					}

					function form_init() {
						$form = "<form role='form' method='post' action=''>\n";
						return $form;
					}

					function form_close($form) {
						$form .= "</form>\n";
						return $form;
					}
				?>
				</div>
			</div>
		</div>
	</body>
</html>




