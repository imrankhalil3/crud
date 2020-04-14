<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<?php 
	//include config file
	require_once "config.php";
	$sql="select * from employees";
?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
					<?php if($result=$mysqli->query($sql))
					{
						if($result->num_rows>0): ?>
                        <table class='table table-bordered table-striped'>
                        <thead>
                               <tr>
                               <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Salary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php while($row=$result->fetch_array()):?>
                                    <tr>
                                        <td> <?php echo $row['id'] ?></td>
                                        <td> <?php echo $row['name'] ?></td>
										<td> <?php echo $row['address'] ?></td>
										<td> <?php echo $row['salary'] ?></td>
                                        <td>
                                            <a href='read.php?id=<?php echo $row['id'] ?>' title="view record" data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                            <a href='update.php?id=<?php echo $row['id'] ?>' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                            <a href='delete.php?id=<?php echo $row['id'] ?>' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>
										</td>
									</tr>
								<?php endwhile?>	
						</tbody>
					</table>
					<?php $result->free(); ?>
					<?php else :?>
					<p class="lead"><em> No record found to display </em></p>
					<?php endif ?>
					<?php 
					}
					else
					{
						echo "error: could not able to execute ";
					}
					$mysqli->close(); //close connection
					?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>