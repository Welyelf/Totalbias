<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/tb.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/totalbias.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    <title>Totalbias | Admin</title>
    <?php
    $method = $this->router->fetch_directory() . '/' . $this->router->fetch_class() . '/' . $this->router->fetch_method();
    $controller = $this->router->fetch_directory() . '/' . $this->router->fetch_class();

    // Load HEAD

    $this->load->view('layout/backend/includes/head.php');    // This will load the frontend wide head file which contains required javascripts.

    if (file_exists(FCPATH . 'application/views/' . $method . '/head.php')) {
        $this->load->view($method . '/head.php');
    } elseif (file_exists(FCPATH . 'application/views/' . $controller . '/head.php')) {
        $this->load->view($controller . '/head.php');
    } elseif (file_exists(FCPATH . 'application/views/' . $this->router->fetch_directory() . '/includes/head.php')) {
        $this->load->view($this->router->fetch_directory() . '/includes/head.php');
    }
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="">
    <div id="wrapper">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <?php
            // Load The Page HEADER
            $this->load->view('layout/backend/includes/sidebar.php');

            ?>
        </div>
        <div class="main-panel" style="background-color: #f4f3ef !important;">
            <?php
            // Load The Page HEADER
                $this->load->view('layout/backend/includes/page_header.php');

            ?>

            <div class="content">
            <?php
                // Load The Page CONTENT
                if (file_exists(FCPATH . 'application/views/' . $method . '.php')) {
                    $this->load->view($method);
                } else {
                    $this->load->view('layout/errors/404.php');
                }

                // Load The Page FOOTER
               $this->load->view('layout/backend/includes/page_footer.php');

                ?>

        </div>

        <?php
        // Load FOOT

        $this->load->view('layout/backend/includes/foot.php'); // This will load the frontend wide foot file which contains required javascripts.

        if (file_exists(FCPATH . 'application/views/' . $method . '/foot.php')) {
            $this->load->view($method . '/foot.php');
        } elseif (file_exists(FCPATH . 'application/views/' . $controller . '/foot.php')) {
            $this->load->view($controller . '/foot.php');
        } elseif (file_exists(FCPATH . 'application/views/' . $this->router->fetch_directory() . '/includes/foot.php')) {
            $this->load->view($this->router->fetch_directory() . '/includes/foot.php');
        }
        ?>
        </div>
    </div>

</body>
</html>