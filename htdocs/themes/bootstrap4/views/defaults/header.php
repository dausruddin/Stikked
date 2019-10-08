<!doctype html>
<?php
$page_title = '';
if(isset($title))
{
    $page_title .= $title . ' - ';
}
$page_title .= $this->config->item('site_name');
$theme = $this->config->item('theme');
?>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $page_title; ?></title>
		<link rel="shortcut icon" href="<?php echo base_url() . 'favicon.ico'; ?>" />
<?php

//Carabiner
$this->carabiner->config(array(
    'script_dir' => 'themes/default/js/',
    'style_dir'  => 'themes/' . $theme . '/css/',
    'cache_dir'  => 'static/asset/',
    'base_uri'	 => $this->config->item('base_url'),
    'combine'	 => true,
    'dev'		 => !$this->config->item('combine_assets'),
));

// CSS
// $this->carabiner->css('reset.css');
// $this->carabiner->css('jquery-ui.min.css');
// $this->carabiner->css('fonts.css');
$this->carabiner->css('main.css');
// $this->carabiner->css('print.css', 'print');
// $this->carabiner->css('codemirror.css');
// $this->carabiner->css('diff.css');

$this->carabiner->display('css'); 

$searchparams = ($this->input->get('search') ? '?search=' . $this->input->get('search') : '');
$searchparams = str_replace('"', '&quot;', $searchparams);

?>
	<script type="text/javascript">
	//<![CDATA[
	var base_url = '<?php echo base_url(); ?>';
	//]]>
	</script>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- Line Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    
	</head>
	<body>
		<div id="container">	
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
                <div class="container">	
                    <a class="navbar-brand" href="<?php echo base_url(); ?>" class="title"><?php echo $this->config->item('site_name'); ?></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <!-- Create -->
                            <a class="nav-item nav-link active" href="<?php echo base_url(); ?>"><i data-feather="circle"></i> Create</a>
                            <!-- Recent -->
                            <?php if ($this->config->item('private_only') || $this->config->item('disable_recent')) {}else{ ?>
                            <a class="nav-item nav-link" href="<?php echo site_url('lists'); ?>">Recent</a>
                            <?php } ?>
                            <!-- Trending -->
                            <?php if ($this->config->item('private_only') || $this->config->item('disable_trends')) {}else{ ?>
                            <a class="nav-item nav-link" href="<?php echo site_url('trends'); ?>">Trending</a>
                            <?php } ?>
                            <!-- API -->
                            <?php if ($this->config->item('disable_api')) {}else{ ?>
                            <a class="nav-item nav-link" href="<?php echo site_url('api'); ?>">Disabled</a>
                            <?php } ?>
                            <!-- About -->
                            <?php if ($this->config->item('private_only') || $this->config->item('disable_about')) {}else{ ?>
                            <a class="nav-item nav-link" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>

				<div class="content">
					<div class="container">
						<?php if(isset($status_message)){?>
						<div class="alert alert-danger">
							<div class="container">
								<?php echo $status_message; ?>
							</div>
						</div>
						<?php }?>
