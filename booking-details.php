<?php
session_start();
// Connexion à la base de données
include('admin/includes/config.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Système de Réservation de Tables de Restaurant | Détails de la Réservation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Style du thème -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->

  <!-- Conteneur du contenu. Contient le contenu de la page -->
  <div>
    <!-- En-tête du contenu (en-tête de la page) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Détails de la Réservation</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Contenu principal -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
        
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Détails de la Réservation</h3>
              </div>
              <!-- En-tête de la carte -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
       
                  <tbody>
<?php 
$bid=intval($_GET['bid']);
$query=mysqli_query($con,"select * from tblbookings where id='$bid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>

       <tr>
                  <th>Numéro de Réservation</th>
                    <td colspan="3"><?php echo $result['bookingNo']?></td>
                  </tr>

                  <tr>
                  <th> Nom</th>
                    <td><?php echo $result['fullName']?></td>
                    <th>Email</th>
                   <td> <?php echo $result['emailId']?></td>
                  </tr>
                  <tr>
                    <th> Numéro de Téléphone</th>
                    <td><?php echo $result['phoneNumber']?></td>
                    <th>Nombre d'Adultes</th>
                    <td><?php echo $result['noAdults']?></td>
                  </tr>
                  <tr>
                    <th>Nombre d'Enfants</th>
                   <td><?php echo $result['noChildrens']?></td>
                   <th>Date / Heure de la Réservation</th>
                   <td><?php echo $date=$result['bookingDate']?>/<?php echo $btime=$result['bookingTime']?></td>
                 </tr>
                 <tr>
                  <th>Date de Publication</th>
                    <td colspan="3"><?php echo $result['postingDate']?></td>
                  </tr>

 

<?php if($result['boookingStatus']!=''):?>
            <tr>
                  <th>Statut de la Réservation</th>
                    <td><?php echo $result['boookingStatus']?></td>
                    <th>Date de Mise à Jour</th>
                    <td><?php echo $result['updationDate']?></td>
                  </tr>

      <tr>
                  <th> Remarque</th>
                    <td colspan="3"><?php echo $result['adminremark']?></td>
                  </tr>
<?php endif;?>


         <?php $cnt++;} ?>
             
                  </tbody>
     
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Script spécifique à la page -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  // Pour le fichier de rapport
  $('#rtable').hide();
  $(document).ready(function(){
    $('#status').change(function(){
      if($('#status').val()=='Accepted')
      {
        $('#rtable').show();
        jQuery("#table").prop('required',true);  
      }
      else{
        $('#rtable').hide();
      }
    })
  }) 
</script>
</body>
</html>
