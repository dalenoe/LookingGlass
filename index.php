<?php
// lazy config check/load
if (file_exists('LookingGlass/Config.php')) {
  require 'LookingGlass/Config.php';
  if (!isset($ipv4, $ipv6, $siteName, $siteUrl, $serverLocation, $testFiles, $theme)) {
    exit('Configuration variable/s missing. Please run configure.sh');
  }
} else {
  exit('Config.php does not exist. Please run configure.sh');
}

function getIp() {
  if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  return $ip_address;
}
?>
<!DOCTYPE html>
<html lang="en">
<!--
*****************************
**   Looking Glass by Telephone **
**     Modified by Dale Noe     **
*****************************
-->
	<head>
		<title><?php echo $siteName; ?> - Looking Glass</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link href="assets/css/<?php echo $theme; ?>.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">

			<div class="row" id="header">
				<div class="col-xs-12">
					<div class="page-header">
						<h1><a id="title" href="<?php echo $siteUrl; ?>"><?php echo $siteName; ?></a></h1>
					</div>
				</div>
			</div>

		  <!-- Network Information -->

			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">Network information</div>
						<div class="panel-body">
							<p>Server Location: <strong><?php echo $serverLocation; ?></strong></p>
							<p>IPv4 Address: <?php echo $ipv4; ?></p>
							<?php if (!empty($ipv6)) { echo '<p>IPv6 Address: '; echo $ipv6; echo '</p>'; } ?>
							<p>Your IP Address: <strong><a href="#tests" id="userip"><?php echo $_SERVER['REMOTE_ADDR']; ?></a></strong></p>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">Network Test Files</div>
						<div class="panel-body">
							<h4>IPv4 Download Test</h4>
							<?php
								foreach ($testFiles as $val)
								{
									echo "<a href=\"//{$ipv4}/LookingGlass/LookingGlass/dinosworkshop-com-{$val}.dltest\" class=\"btn btn-xs btn-default\">{$val}</a> ";
								}
							?>

							<?php if (!empty($ipv6))
								{
									echo "<h4>IPv6 Download Test</h4>";
									foreach ($testFiles as $val)
									{
										echo "<a href=\"//[{$ipv6}]/LookingGlass/LookingGlass/dinosworkshop-com-{$val}.dltest\" class=\"btn btn-xs btn-default\">{$val}</a> ";
									}
								}
							?>

						</div>
					</div>
				</div>
			</div>

		  <!-- Network Tests -->

			<div class="row">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Network tests</div>
						<div class="panel-body">
							<form class="form-inline" id="networktest" action="#results" method="post">

								<div id="hosterror" class="form-group">
									<div class="controls">
										<input id="host" name="host" type="text" class="form-control" placeholder="Host or IP address">
									</div>
								</div>
								<div class="form-group">
									<select name="cmd" class="form-control">
										<option value="host">host</option>
										<option value="mtr">mtr</option>
										<?php if (!empty($ipv6)) { echo '<option value="mtr6">mtr6</option>'; } ?>
										<option value="ping" selected="selected">ping</option>
										<?php if (!empty($ipv6)) { echo '<option value="ping6">ping6</option>'; } ?>
										<option value="traceroute">traceroute</option>
										<?php if (!empty($ipv6)) { echo '<option value="traceroute6">traceroute6</option>'; } ?>
                    <option value="nmap">nmap -Pn</option>
									</select>
								</div>

								<button type="submit" id="submit" name="submit" class="btn btn-success">Run Test</button>
							</form>
						</div>
					</div>

				</div>
			</div>

			<!-- Results -->
			<div class="row" id="results" style="display:none">
				<div class="col-xs-12">
					<div class="panel panel-default">
						<div class="panel-heading">Results</div>
						<div class="panel-body">

							<pre id="response" style="display:none"></pre>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<p class="pull-left">
					Powered By: <a href="https://gitlab.d1n0.link/dino/LookingGlass" target="_blank">LookingGlass</a>
				</p>
				<p class="pull-right">
					<a href="#">Back to top</a>
				</p>
			</footer>

		</div>

		<script src="assets/js/jquery-1.11.2.min.js"></script>
		<script src="assets/js/LookingGlass.min.js"></script>
		<script src="assets/js/XMLHttpRequest.min.js"></script>
	</body>
</html>
