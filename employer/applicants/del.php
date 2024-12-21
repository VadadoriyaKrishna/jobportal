<?php
session_start();

if (!isset($_SESSION['ADMIN_USERID'])){
    header("Location: " . web_root . "admin/index.php");
    exit; // Prevent further execution
}

// Include necessary files and initialize objects


// Check if employee ID is set
$empid = isset($_GET['id']) ? $_GET['id'] : '';
if(empty($empid)){
    header("Location: index.php");
    exit; // Prevent further execution
}

$employee = new Employee();
$emp = $employee->single_employee($empid);

// Handle delete action
if(isset($_POST['delete'])) {
    $empid = $_POST['EMPLOYEEID'];
    $result = $employee->delete_employee($empid);

    if($result) {
        // Handle successful deletion, redirect or display success message
        $_SESSION['message'] = "Employee deleted successfully.";
        header("Location: index.php");
        exit; // Prevent further execution
    } else {
        // Handle deletion failure, redirect or display error message
        $_SESSION['message'] = "Failed to delete employee.";
        header("Location: index.php");
        exit; // Prevent further execution
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
    <!-- Include your CSS and JavaScript files here -->
</head>
<body>
    <div class="center wow fadeInDown">
        <h2 class="page-header">Delete Employee</h2>
    </div>

    <form class="form-horizontal span6 wow fadeInDown" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $empid; ?>" method="POST"> 
        <input id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->EMPLOYEEID;?>"  >

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="FNAME">Firstname:</label>
                <div class="col-md-8"> 
                    <p><?php echo $emp->FNAME;?></p>
                </div>
            </div>
        </div>

        <!-- Repeat the above pattern for other fields you want to display -->

        <div class="form-group">
            <div class="col-md-8">
                <label class="col-md-4 control-label" for="idno"></label>
                <div class="col-md-8">
                    <button class="btn btn-danger btn-sm" name="delete" type="submit">
                        <span class="fa fa-trash fw-fa"></span> Delete
                    </button> 
                </div>
            </div>
        </div> 
    </form>
</body>
</html>
