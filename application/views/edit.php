<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/toastr.min.css'; ?>">
   <script type="text/javascript" src="<?php echo base_url().'assets/js/toastr.min.js'; ?>"></script>
	
</head>
<body>

    <div class="navbar navbar-dark bg-dark">
        <div class="container">
        <a href="#" class="navbar-brand">Update  User</a>
    </div>
</div>
	

<form name="createUser" method="post" action="<?php echo base_url().'index.php/User/edit/'.$user['user_id'];?>" >
  



  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <div class="form-group">
  <label ><b>Name</b></label>
  <input type="text" placeholder="Enter Name" name="name" value="<?php echo set_value('name',$user['name']); ?>" >
    <?php echo  form_error('name');?> 
   
  <label ><b>Email</b></label>
  <input type="text" placeholder="Enter Email" name="email" value="<?php echo set_value('email',$user['email']); ?>">
    <?php echo  form_error('email');?> 
    
  
  <button type="submit"onclick="success_toast()" >Update</button>
  <a href="<?php echo base_url().'index.php/User/index'; ?>" class="btn-secondary btn "onclick="warning_toast()">Cancel </a>
    
 </div>
 </div>
 </div>
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