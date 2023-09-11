<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script type="text/javascript" src="js/vendor/jquery-1.11.3.min.js"></script>
    <title>Student Form Fill UP</title>

    <script type="text/javascript">
  $(document).ready(function()
  {
   
        var checking_html = '<img src="search_group/loading.gif" /> Checking...';
        $('#className').change(function()
        {
            $('#item_result').html(checking_html);
                check_availability();
        }); 

        $('#groupname').change(function()
        {
            $('#check_section').html(checking_html);
                check_compolsary_subject();
                check_selective_subject();
                check_optional_subject();
        }); 
  });
//function to check compolsary subject availability   
function check_compolsary_subject()
{
        var class_name = $('#className').val();
       var group_name = $('#groupname').val();
        $.post("admin/check_compolsary_subject.php", { className: class_name, groupname:group_name},
            function(result){
                //if the result is 1
                if(result != 0 )
                {
                    //show that the username is available
                    $('#compolsarysubject').html(result);
                    
                    $('#check_compol_name').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_compol_name').style.color='RED';
                    $('#check_compol_name').html('No Compolsary Subject Name Found');
                   
                    $('#compolsarysubject').html('');
                }
        });

}  
//function to check selective subject availability   
function check_selective_subject()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
       
        $.post("admin/check_selective_subject.php", { className: class_name,group_name:group_name},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#selectivesubject').html(result);
                    
                    $('#check_selectivenae').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_selectivenae').style.color='RED';
                    $('#check_selectivenae').html('No Group Subject Name Found');
                    
                    $('#selectivesubject').html('');
                }
        });

} 
//function to check selective subject availability   
function check_optional_subject()
{
        var class_name = $('#className').val();
        var group_name = $('#groupname').val();
       
        $.post("admin/check_optional_subject.php", { className: class_name,group_name:group_name},
            function(result){
                //if the result is 1
                if(result !=0 )
                {
                    //show that the username is available
                    $('#select_optional_subject').html(result);

                    $('#check_optional_name').html('');

                }
                else
                {
                    //show that the username is NOT available
                    document.getElementById('check_optional_name').style.color='RED';
                    $('#check_optional_name').html('No optional Subject Name Found');
                    
                    $('#select_optional_subject').html('');
                }
        });

}  

function saveInfo()
{
        var Name=$("#Name").val();
          if(Name=="")
          {
            alert("Enter Your Name");
            return 0;
          } 

          var fathersName=$("#fathersName").val();
          if(fathersName=="")
          {
             alert("Enter Your Father's Name");
            return 0;
          }   

          var mothersName=$("#fathersName").val();
          if(mothersName=="")
          {
             alert("Enter Your Mother's Name");
            return 0;
          } 

         var studentMobile=$("#studentMobile").val();
          if(studentMobile=="")
          {
             alert("Enter Student Mobile Number");
            return 0;
          } 

           var guardianMobile=$("#guardianMobile").val();
          if(guardianMobile=="")
          {
             alert("Enter Guardian Mobile Number");
            return 0;
          }  

           var roll=$("#roll").val();
          if(roll=="")
          {
             alert("Enter You Roll No");
            return 0;
          }    

          var regNumber=$("#regNumber").val();
          if(regNumber=="")
          {
             alert("Enter You Reg. No");
            return 0;
          } 

          var className=$("#className").val();
          if(className=="Select One")
          {
             alert("Select Your Class");
            return 0;
          }   

          var groupname=$("#groupname").val();
          if(groupname=="")
          {
             alert("Select Your Group");
            return 0;
          } 

          var Session=$("#Session").val();
          if(Session=="")
          {
             alert("Select Your Session");
            return 0;
          } 

         
                 

 



    var cmsubject = [];
      $('.cmsub').each(function(){
        if($(this).is(":checked"))
        {
          cmsubject.push($(this).val());
        }
      
      });
      if(cmsubject.length!=3)
      {
        alert('Select Three Compulsory Subject');
        return;

      }
      
      //var cmlent=$('.cmsub').length;
      //alert(cmlent);
      
      var slsubject = [];
      $('.slsub').each(function(){
        if($(this).is(":checked"))
        {
          slsubject.push($(this).val());
        }
      
      });

      if(slsubject.length!=3)
      {
        alert('Select Three Group  Subject');
        return;
      }

       var optional_subject=$(".opSub").val();
          if(optional_subject=="")
          {
             alert("Select Optional Subject");
            return 0;
          } 

      var form = $('form')[0];
      var formData=new FormData(form);
      

       $.ajax({
              url:"save_reg_info.php",
              type:"POST",
              data:formData,
              contentType: false,
              processData: false,
              success:function(result){
                  
                   alert(result);
                   location.reload();

              }
          });


}

    </script>
  </head>
  <body>
    <div class="jumbotron bg-success text-white" style="padding:10px;">
      <div class="container">
    <label class="checkbox-inline">
          <img src="https://fgc.gov.bd/admin/all_image/shortcurt_iconSDMS2015.png" style="height: 100px; text-align: right;" class="img-responsive" >
    </label>

  <label style="padding-left:10px;">
  <h3 style="text-shadow:  0px 3px 3px #999;">  Feni Govt. College</h3>

   <h5>          
   Student's Form Fill Up (HSC Exam. - 2021) </h5>
 </label>

</div>
   </div>
<div class="container mt-3">


<form class="row" method="post">
    <div class="col-12">
      
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name"  name="Name" autocomplete="off">
  </div>

    <div class="col-12">
    <label for="fathersName" class="form-label">Father's Name</label>
    <input type="text" class="form-control" id="fathersName"  name="fathersName" autocomplete="off" required="">
  </div>    

  <div class="col-12">
    <label for="mothersName" class="form-label">Mother's Name</label>
    <input type="text" class="form-control" id="mothersName" name="mothersName" autocomplete="off" required="">
  </div>
     <div class="col-md-6">
    <label for="studentMobile" class="form-label">Student Mobile No.</label>
    <input type="number" class="form-control" id="studentMobile" name="studentMobile" autocomplete="off" required="">
  </div>
   <div class="col-md-6">
    <label for="guardianMobile" class="form-label">Guardian Mobile No.</label>
    <input type="number" class="form-control" id="guardianMobile" name="guardianMobile" autocomplete="off" required="">
  </div>


  <div class="col-md-6">
    <label for="roll" class="form-label">Class Roll No.</label>
    <input type="number" class="form-control" id="roll" name="roll" autocomplete="off" required="">
  </div>
 <div class="col-md-6">
    <label for="regNumber" class="form-label">Registration Number</label>
    <input type="number" class="form-control" id="regNumber" name="regNumber" autocomplete="off" required="">
  </div>



  <div class="col-md-4">
    <label for="className" class="form-label">Select Class</label>
   
   <select name="className" id="className" class="form-control">
            
      <option>Select One</option>
    <option value="311611180002andTwelve">Twelve</option>
    </select>
  </div>

  <div class="col-md-4">
    <label for="groupname" class="form-label">Select Group</label>
    <select name="groupname" id="groupname" class="form-control">
      <option value="" disabled="" selected="">Select Group</option>
      <option value="321611180002andBusiness Studies">Business Studies</option>
      <option value="321611180003andHumanities ">Humanities </option>
      <option value="321611180001andScience">Science</option>
    </select>
  </div> 

  <div class="col-md-4">
    <label for="Session" class="form-label">Session</label>
    <select id="Session" name="Session" class="form-select">
      <option value="" selected>Select One</option>                          
                <option>2021-2022</option>
                <option>2020-2021</option>
                <option>2019-2020</option>
                <option>2018-2019</option>
                <option>2017-2018</option>
                <option>2016-2017</option>

                <option>2022</option>
                <option>2021</option>
                <option>2020</option>
                <option>2019</option>
                <option>2018</option>
                <option>2017</option>
                <option>2016</option>

    </select>
  </div>

<div class="col-md-4 mt-2">
    <strong>Compulsory Subject:</strong><br>
                
      <p id="compolsarysubject"></p> 


  </div>

  <div class="col-md-4 mt-2">
    <strong>Select Group Subject:</strong><br>
                
      <span id="selectivesubject"></span>


  </div>

  <div class="col-md-4 mt-2">
   <strong>Select Optional Subject &nbsp; :</strong><br>
                
      <span id="select_optional_subject"></span>


  </div>

  <div class="col-12 "><br>
    <button type="button" class="btn btn-success" onclick="return saveInfo()">Sign in</button>
  </div>
</form>
 

 </div>
  <div class="col-12  p-1 " style="text-align: right; background: #f5f5f5">
     <h5> Developed By :<a href="https://sbit.com.bd" class="text-light" target="_blank"><img src="https://sbit.com.bd/public/setting/1696451508034923.png" class="img-fluid" style="height: 50px;"> </a></h5>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>