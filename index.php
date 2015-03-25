<?php

include 'dumpr.php';

function __autoload($class){
	include 'Classes/'.$class.'.php';
}
//page title
$page = new Page($title = "Transaction Manager");

$page -> getHeader();

$item = '';
$amount = '';
$errors = array();
$select = array('Food', 'Gas', 'PayCheck', 'Rent', 'Stock');
$resultsHeaders = array('Income/Expense', 'Item', 'Category', 'Amount');

if(file_exists('Files/file.csv')){
	//create file object
	//read write access - preserve old file
	$file = new CSV('Files/file.csv', 'a+');
}
//would load with the page
else  $errors[] = 'File to display the table does not exist';


if(isset($_POST['trans'])){
	//perform validation on stuff where necessary

	$item = $_POST['Item'];
	$amount = $_POST['Amount'];
	$arrayKeys = array_keys($_POST);

	$incexp = $_POST['incexp'];
	$category = $_POST['category'];

	//validation objects
	$numeric = new IsNumeric();
	$alpha = new IsAlpha();
	$empty = new IsEmpty();

	//validation item
	if($empty -> validate($item)){
		$errors[] = $empty -> getMessage($arrayKeys[1]);
	}
	elseif(!$alpha -> validate($item)){
		$errors[] = $alpha -> getMessage($arrayKeys[1]);
	}

	//validation amount
	if($empty -> validate($amount)){
		$errors[] = $empty -> getMessage($arrayKeys[3]);
	}
	elseif(!$numeric -> validate($amount)){
		$errors[] = $numeric -> getMessage($arrayKeys[3]);
	}

	if(empty($errors)){
		$form = new Form($incexp, $item, $category, $amount);

	}
}
?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" id="main">
				<h1>Transaction Manager</h1>
				<?php if(!empty($errors)){ ?>
					<div class="alert alert-danger col-sm-10 col-sm-offset-2" role="alert">
						<ul>
						<?php foreach ($errors as $error) { ?>
							<li><?php echo $error; ?></li>
						<?php } ?>
						</ul>
					</div>
				<?php } ?>
				<form class="form-horizontal"  novalidate="novalidate" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group">
						<label for="incexp" class="col-sm-2 control-label">Income/Expenses</label>
						<div class="col-sm-10">
  							<select class="form-control" name="incexp">
								<option>Income</option>
								<option>Expense</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="Item" class="col-sm-2 control-label">Item</label>
						<div class="col-sm-10">
  							<input type="text" class="form-control" name="Item" placeholder="Item" value="<?php echo $item; ?>">
						</div>
					</div>
					<?php if(!empty($select)) { ?>
					<div class="form-group">
						<label for="category" class="col-sm-2 control-label">Catergory</label>
						<div class="col-sm-10">
  							<select class="form-control" name="category">
  								<?php foreach ($select as $value) { ?>
									  <option><?php echo $value; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
						<label for="Amount" class="col-sm-2 control-label">Amount</label>
						<div class="col-sm-10">
  							<input type="text" class="form-control" name="Amount" placeholder="Amount" value="<?php echo $amount; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary btn-block" name="trans" value="Add Transaction">Add Transaction</button>
						</div>
  					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-sm-offset-3" id="results">
				<h1>Results Table</h1>
				<table class="table table-bordered">
					<thead>
						<tr>
							<?php foreach ($resultsHeaders as $value) { ?>
								<th><?php echo $value; ?></th>
							<?php } ?>
						</tr>
					</thead>
					<!-- i the file object exists start populating the table - may change later -->
					<?php if(isset($file)) { ?>
					<tbody>
						<?php foreach ($file -> getFile() as $row) {?>
							<tr>
								<?php foreach ($row as $col) { ?>
									<td><?php echo $col; ?></td>
								<?php } ?>
							</tr>
							<? } ?>
					</tbody>
					<?php	}	?>
				</table>
			</div>
		</div>

	</div>


<?php
$page -> getFooter();
?>