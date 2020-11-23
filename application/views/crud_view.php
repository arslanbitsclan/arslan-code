 <html>  
 <head>  
   <title><?php echo $title; ?></title>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'; ?>">  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
   <style>  
           body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
           }  
           .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           }  
      </style>  
 </head>  
 <body>  

      <div class="container box">  
           <h3 align="center"><?php echo $title; ?></h3><br />  
           <div class="table-responsive">  
                <br />  
               
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  

                          <tr>  
                               <th width="10%">ID</th>  
                               <th width="35%">Name</th>  
                               <th width="35%">Email</th>  
                               <th width="10%">Edit</th>  
                               <th width="10%">Delete</th>  

                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>  
 </body>  
 </html>  
 <div class="modal" id="userModel" >
  <div class="modal-dialog">

    <form method="post" id="user_form">
       <div class="modal-content">
      <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Add user</h4>
   </div>
   <div class="modal-body">
    <label><strong>Enter Name</label>
    <input type="text" name="name" id="name" class="form-control">
    <br/>
    <label><strong>Enter Your Email</label>
    <input type="Email" name="email" id="email" class="form-control">
  </div>
</div>
<div class="model-footer">
  <input type="submit" name="action" value="Add"/>
        <button type="button" class="bt btn-default" data-dismiss="model">Close</button>
      </div>
     
     </form>
    
      </div>
      
      
    </div>
  
 <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){ 

$('.add').click(function(){

   
        $('#userModel').toggle();



});

      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'crud/fetch_user'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  

      $(document).on('submit','#user_form',function(event){
      event.preventDefault();
      var name = $('#name').val();
      var email = $('#email').val();
      if(name !='' && email !='')
      {
        $.ajax({
        url:"<?php  echo base_url().'crud/user_action'?>",
        method:'POST',
        data:new FormData(this),
        contenType:false,
        processData:false,
        success:function(data)
        {
          alert(data);
          $('#user_form')[0].reset();
          $('#userModel').model('hide');
          dataTable.ajax.reload();

        }


        });

      }
      else
      {

        alert("Both fields are required ");
      }


      });
 });  
 </script>  