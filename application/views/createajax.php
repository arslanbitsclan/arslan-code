<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/toastr.min.css'; ?>">

	
</head>
<body>
	<div class="navbar navbar-dark bg-dark">
    <div class="container">
    <a href="#" class="navbar-brand">Create  User</a>
    </div>
    </div>

  <form id="createUser" method="post" action="">
    <div class="container">
    <label ><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo set_value('name'); ?>" >
    <p class="nameError"></p> 
    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" value="<?php echo set_value('email'); ?>">
    <p class="emailError"></p>  

    <button type="submit"   class="btn btn-primary ">Submit</button>

    <a href="<?php echo base_url().'index.php/User/index'; ?>" class="btn btn-primary  "
        onclick="warning_toast()">Cancel </a>

    
    </div>


</form>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.5.1.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/toastr.min.js'; ?>"></script>
<script >
    function success_toast(){

        toastr.success("Success message");
    }
      function warning_toast(){

        toastr.warning("warning message");
    }
</script>
</body>
</html>