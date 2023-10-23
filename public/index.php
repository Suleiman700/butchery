<?php
require_once '../server/config/CONSTANTS.php';
require_once '../server/classes/Session.php';
$pageTitle = "Job Selection | " . $CONSTANTS['APP_NAME'];
?>
<!doctype html>
<html lang="en">

<?php
require_once '../assets/includes/page-head.php';
?>

<body class="radial-gradient">
    <div class="container page-wrapper min-vh-100" id="app-container"></div>


    <?php
        require_once '../assets/includes/page-scripts.php';
    ?>

    <script src="./js/init.js" type="module"></script>
    <script type="module">
        import App from './app/App.js';
        const AppInstance = new App();

        AppInstance.setAppContainer(document.querySelector('#app-container'))
        AppInstance.setCurrentView('jobSelection');
        AppInstance.renderView()
    </script>

</body>

</html>
