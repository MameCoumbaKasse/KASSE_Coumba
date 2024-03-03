<?php
session_start();
error_reporting(0);
// Connexion à la base de données
include('admin/includes/config.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Système de Réservation de Tables de Restaurant | Résultats de la recherche</title>

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

<body>
    <div>
        <!-- Barre de navigation -->

        <!-- Contenu principal. Contient le contenu de la page -->
        <div>
            <!-- En-tête du contenu (en-tête de page) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>Résultats de la recherche pour '<?php echo $_POST['searchdata'];?>'</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Contenu principal -->
            <section>
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Détails de la recherche</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Numéro de Réservation</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Numéro de Téléphone</th>
                                                    <th>Nombre d'Adultes</th>
                                                    <th>Nombre d'Enfants</th>
                                                    <th>Date/Heure de Réservation</th>
                                                    <th>Date de Publication</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sdata = $_POST['searchdata'];
                                                    $query = mysqli_query($con, "select * from tblbookings where bookingNo like '%$sdata%' || phoneNumber like '%$sdata%'");
                                                    $cnt = 1;
                                                    while($result = mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $cnt;?></td>
                                                    <td><?php echo $result['bookingNo']?></td>
                                                    <td><?php echo $result['fullName']?></td>
                                                    <td><?php echo $result['emailId']?></td>
                                                    <td><?php echo $result['phoneNumber']?></td>
                                                    <td><?php echo $result['noAdults']?></td>
                                                    <td><?php echo $result['noChildrens']?></td>
                                                    <td><?php echo $result['bookingDate']?>/<?php echo $result['bookingTime']?></td>
                                                    <td><?php echo $result['postingDate']?></td>
                                                    <th>
                                                        <a href="booking-details.php?bid=<?php echo $result['id'];?>" title="Voir les détails" class="btn btn-primary btn-xm" target="blank"> Voir les détails</a> 
                                                    </th>
                                                </tr>
                                                <?php $cnt++;} ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Numéro de Réservation</th>
                                                    <th>Nom</th>
                                                    <th>Email</th>
                                                    <th>Numéro de Téléphone</th>
                                                    <th>Nombre d'Adultes</th>
                                                    <th>Nombre d'Enfants</th>
                                                    <th>Date/Heure de Réservation</th>
                                                    <th>Date de Publication</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
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
            <?php include_once('includes/footer.php');?>
            <!-- Barre de contrôle latérale -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Le contenu de la barre de contrôle latérale va ici -->
            </aside>
            <!-- /.control-sidebar -->
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
        <!-- Application AdminLTE -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE pour les démonstrations -->
        <script src="dist/js/demo.js"></script>
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
    </body>
    </html>
