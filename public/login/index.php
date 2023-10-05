<?php
require_once '../../server/config/CONSTANTS.php';
require_once '../../server/classes/Session.php';
$pageTitle = "Login | " . $CONSTANTS['APP_NAME'];

// Prevent logged users from accessing
$Session = new Session();
if ($Session->isLogged()) {
    // Redirect to app
    header('Location: ../index.php');
    die;
}
?>
<!doctype html>
<html lang="en">

<?php
    require_once '../../assets/includes/page-head.php';
?>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="col-sm-12 text-center logo-img">
                                <img src="../../assets/images/logos/butchery.png" width="180" alt="">
                            </div>
                            <h4 class="text-center">User Area</h4>
                            <div>
                                <div class="mb-3">
                                    <label for="input-username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="input-username">
                                </div>
                                <div class="mb-4">
                                    <label for="input-password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="input-password">
                                </div>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" id="btn-login">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once '../../assets/includes/page-scripts.php';
?>
<script src="./js/init.js" type="module"></script>
</body>

</html>
