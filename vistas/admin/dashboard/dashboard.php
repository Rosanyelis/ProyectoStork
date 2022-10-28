<!-- Validacion de sesión va aqui  -->
<?php include '../../../controladores/validarSesionController.php' ?>

<?php include '../../layouts/cabecera.php'; ?>
<?php include '../../layouts/estilos.php'; ?>

<!-- Incluir estilos css en caso de ser necesario  -->

<?php include '../../layouts/fincabecera.php'; ?>
<?php include '../../layouts/body.php'; ?>
<?php include '../../layouts/navigation.php'; ?>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card p-4 text-center">
                                <h1>Sección en Desarrollo</h1>
                                <img class="img-fluid" src="../../../public/app-assets/images/pages/coming-soon.svg" alt="Coming soon page">
                            </div> 
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php include '../../layouts/footer.php'; ?>
<?php include '../../layouts/scripts.php'; ?>   

<!-- Incluir estilos css en caso de ser necesario  -->
<script>
    $(document).ready(function () {

        var home = localStorage.getItem("home");
        if (home == 1) {
            setTimeout(function () {
                toastr['success'](
                    'Bienvenido Querido Usuario al Sistema de Gestión Stork!',
                    {
                        closeButton: true,
                        tapToDismiss: false
                    }
                );  
            }, 2000);   
            localStorage.clear();
        }


    });
</script>
<?php include '../../layouts/finbody.php'; ?>   