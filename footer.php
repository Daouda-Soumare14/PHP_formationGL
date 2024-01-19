<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-secondary">@ GROUPE ISI <?php echo date('Y'); ?></span>
    </div>
</footer>
<!-- <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

<!-- pour acceder au fichier js on met un / devant les liens -->
<!-- le lien js de bootstrap qui permet d'utiliser le script js de bootstrap sans connexion internet  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable({
            "oLanguage": {
                "sSearch": "Rechercher",
                "sLengthMenu": "Afficher _MENU_ Lignes par page",
                "sInfo": "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                "oPaginate": {
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                }
            }
        });
    });
</script>
</body>

</html>