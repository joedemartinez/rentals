<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/buttons.html5.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="assets/bower_components/raphael/raphael.min.js"></script> -->
<!-- <script src="assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- ChartJS -->
<script src="assets/bower_components/chart.js/Chart.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/bower_components/select2/dist/js/select2.min.js"></script>


<script src="assets/bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/jszip.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/buttons.print.min.js"></script>
<script src="assets/dist/js/printThis.js"></script>


<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>

 <script type="text/javascript">      
    //select2 working in modal
      // Do this before you initialize any of your modals
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>

<!-- select2 function -->
<script type="text/javascript">
  $(document).ready(function() {
  $('select').select2({
    dropdownAutoWidth : true,
    width: '100%'
  });
});
</script>

<!-- aauto logout -->
<script>  
setInterval(Check_user, 2000);

function Check_user(){
    $.ajax({
      url:'Check_user.php',
      method:'POST',        
      data:'type=type',
      dataType: 'json',
      success:function(response){ 
        if(response) {
          if ("logout" in response) {
            alert("Auto logout in 10 secs - User Inactivity. Refresh page to cancel");
            setTimeout(function(){
                  window.location.assign("logout.php");
              }, 10000);    
          }   
        }        
      }
   });
} 

</script>

<script>
  $(document).ready(function() {
    $('#example1').DataTable({
      "scrollX": true,
       "scrollY": 300,
      // "autoWidth": false,
      "sort": true,
      "select": true,
      'stateSave': true,
      dom: 'Bfrtip',
        lengthMenu: [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
      ],
      buttons: [
          'pageLength', 'excel', 'csv', 'pdf', 'print'
      ]
    })
    $('#example2').DataTable({
      "scrollX": true,
      "scrollY": 300,
      // "autoWidth": true,
      "sort": true,
      "select": true,
      'stateSave': true,
      dom: 'Bfrtip',
        lengthMenu: [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
      ],
      buttons: [
          'pageLength','excel', 'csv', 'pdf', 'print'
      ]
    })
    $('#example3').DataTable({
       "scrollX": true,
       "scrollY": 300,
      // "autoWidth": true,
      "sort": true,
      "select": true,
      'stateSave': true,
      dom: 'Bfrtip',
        lengthMenu: [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
      ],
      buttons: [
          'pageLength','excel', 'csv', 'pdf', 'print'
      ]
    })
  });
</script>
<script>
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;

  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
     return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
     return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
  
});
</script>
<script>
$(function(){
	//Date picker
  $('.date_input').datepicker({
    autoclose: true,
    //format: 'dd-mm-yyyy'
    format: 'yyyy-mm-dd'
  })

});
</script>

<!-- alert messages fading -->
<script type="text/javascript">
  $(function() {
    $(".alert:visible").fadeOut(20000);
  });
</script>

<!-- show/hide password -->
<script type="text/javascript">
    //toggle password
    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });


  //new and confirm password
  //  $("#confirm_password").keyup(function( event ) {
  //   if( $('#new_password').val() != $('#confirm_password').val() ) {
  //     document.getElementById('passworderror').style.display='block';
  //     document.getElementById('Updatebtn').setAttribute("disabled", "true");
  //     document.getElementById('passwordsucess').style.display='none';
  //     event.preventDefault();

  //   }else if ($('#new_password').val() == "" && $('#confirm_password').val() == "") {
  //     document.getElementById('Updatebtn').removeAttribute("disabled");
  //     document.getElementById('passworderror').style.display='none';
  //   }
  //   else{
  //     document.getElementById('passwordsucess').style.display='block';
  //     document.getElementById('Updatebtn').removeAttribute("disabled");
  //     document.getElementById('passworderror').style.display='none';
  //     event.preventDefault();

  //   }
  // });

//    //getting users fullname
// $('#empid').keyup(function(){  
//      var id = $('#empid').val();  
//      if(id != '')  
//      {  
//       $.ajax({  
//            url: 'process/employee_row.php', 
//            method:"POST",  
//            data:{id:id},  
//            dataType: 'json',
//            success:function(data){
//             //if data is found in database
//             if (data != null){
//               $('#emp_name').val(data.emp_firstname+' '+data.emp_middlename+' '+data.emp_surname);  
//             }else{//else display nothing
//               $('#emp_name').val(''); 
//             }
//            }
//       });  
//      }  
// }); 


//   //checking staff id
//   $('.useridcheck').keyup(function(){  
//      var emp_id = $('.useridcheck').val();  
//      if(emp_id != '')  
//      {  
//       $.ajax({  
//            url: 'process/userIDcheck.php', 
//            method:"POST",  
//            data:{emp_id:emp_id},
//            success:function(data){
//             //if data is found in database
//             if (data != null){
//               $('.usermessage').html(data);  
//             }else{//else display nothing
//               $('.usermessage').html(data); 
//             }
//            }
//       });  
//      }  
// });


  </script>