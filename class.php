<?php
   $data = json_decode($_POST['data'],true);
?>
<html >

<head>

	<script src="js/jquery-1.9.1.js" type="text/javascript" language="javascript"></script>
	<script src="js/advancedtable_v2.js" type="text/javascript" language="javascript"></script>
	<script src="js/jquery-ui.js" type="text/javascript" language="javascript"></script>
	<script src="js/home.js" type="text/javascript" language="javascript"></script>
	<script src="js/is_loading.js" type="text/javascript" language="javascript"></script>

	<link href="css/advancedtable.css" rel="stylesheet" type="text/css" />

	<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$('select').children().remove();
		$("#searchtable").show();

		$("table#class").advancedtable({searchField: "#search", loadElement: "#loader", searchCaseSensitive: false, ascImage: "css/images/up.png", descImage: "css/images/down.png", searchOnField: "#searchOn"});
	});
	</script>

</head>

<body>
    <table>
		<tr>
			<td><a class="btn_edit btn btn-default" id="add_class" style="margin-bottom: 7px;"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New Class</a></td>
		</tr>
	</table>
	<table class="normal" id="searchtable" border="0" cellspacing="4" cellpadding="0" style="display:none; width: 100%; margin-bottom: 10px;">
		<tr>
			<td width="80%">
				Search / Filter:  <select id="searchOn" name="searchOn" style="display:none;"/>&nbsp;&nbsp;<input name="search" type="text" id="search" style="display:none;" />
			</td>
			<td width="20%">
				<div id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Laoder" /></div>
			</td>
		</tr>
	</table><!-- /searchtable -->

	<table width="100%" id="class" class="advancedtable" border="0" cellspacing="0" cellpadding="0">

		<thead>
			<tr>
				<th>Id</th>
				<th>Class</th>
				<th>Enable</th>
				<th>Disable</th>
				<th>Delete</th>
			</tr>
		</thead>

		<tbody>

			<?php
				foreach($data as $info){
			?>
			<tr id = "<?php echo $info['class_id']; ?>">
				<td>
					<?php echo $info['class_id']; ?>
				</td>
				<td>
					<?php echo $info['class_desc']; ?>
				</td>
				<td>
					<input type="radio" name="<?php echo $info['class_id']; ?>" />
				</td>
				<td>
					<input type="radio" name="<?php echo $info['class_id']; ?>" />
				</td>
				<td>
					<input type="checkbox" name="delete" />
				</td>
			</tr>

			<?php
			} 
			?>

		</tbody>

	</table><!-- /staff -->

	<div id='dialog_add_class'  title="Add New Class"></div>
	

	<div id='dialog_new_class_confirm' style='display:none;' >
		<table>
			<tr>
				<td>
					<img src='https://d2g691qpj752hh.cloudfront.net/AcrestaPhilippines/phil1/thumbsUpOrange.png'>
				</td>
				<td>
					Your have successfully added a class.
				</td>
			</tr>
		</table>
	</div><!-- /confirm_add -->
	
</body>

</html>
 