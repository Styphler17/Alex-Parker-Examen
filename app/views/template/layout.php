<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once '../app/views/template/partials/_head.php'; ?>
</head>

<body>
    <!-- Preloader -->
    <?php include_once '../app/views/template/partials/_preloader.php'; ?>
    
    <!-- Main content & Sidebar -->
    <div id="main">
        <div class="container">
            <div class="row">
                <!-- Sidebar Start -->
                <?php include_once '../app/views/template/partials/_sidebar.php'; ?>
                <!-- Sidebar End -->

                <!-- Main Content Start -->
                <?php echo $content; ?>
                <!-- Main Content End -->
            </div>
        </div>
    </div>
    
    <!-- Back to Top -->
    <?php include_once '../app/views/template/partials/_back-to-top.php'; ?>

    <!-- Scripts -->
    <?php include_once '../app/views/template/partials/_scripts.php'; ?>
</body>

</html>