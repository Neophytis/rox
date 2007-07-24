<?php
// environment
$Env = PVars::getObj('env');
// default page elements
$Page = PVars::getObj('page');
// HC widgets
$HC = new HcifController;
$MyTravelbook = new MytravelbookController;
$User = new UserController;
$Cal = new CalController;
/*echo '<?xml version="1.0" encoding="utf-8"?>'; */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=PVars::get()->lang?>" lang="<?=PVars::get()->lang?>" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
        <title><?php echo $Page->title; ?></title>
        <base id="baseuri" href="<?php echo $Env->baseuri; ?>"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Travel planning trip information discussion community Reisen, Information, Kultur, St&auml;dte, Landschaften, Land, Reiseziel, Reiseland, Traumland, Travel, Urlaub"/> 
        <meta name="description" content="Travel Community diary"/>
        <link rel="stylesheet" href="styles/YAML/main.css" type="text/css"/>
        <link rel="stylesheet" href="styles/YAML/blog.css" type="text/css"/>
        <link rel="stylesheet" href="styles/YAML/forums.css" type="text/css"/>
		<link rel="stylesheet" href="styles/YAML/bw_yaml.css" type="text/css"/>
		<!--[if lte IE 7]>
		<link rel="stylesheet" href="styles/YAML/explorer/iehacks_3col_vlines.css" type="text/css" />
		<![endif]-->

        <script type="text/javascript" src="script/main.js"></script>
    </head>
    <body>
<body>

<!-- #page_margins: Obsolete for now. If we decide to use a fixed width or want a frame around the page, we will need them aswell -->
<div id="page_margins">
<!-- #page: Used to hold the floats -->
<div id="page" class="hold_floats">

<div id="header">
	<div id="topnav">
	  <div id="navigation-functions">
	    <ul>

			<li class="icon_online"><img src="styles/YAML/images/icon_grey_online.png"/> <a href="bw/whoisonline.php">Online Members</a></li>
			<li><img src="styles/YAML/images/icon_grey_mail.png"/><a href="bw/mymessages.php">My Messages</a></li>
			<li><img src="styles/YAML/images/icon_grey_pref.png"/><a href="bw/mypreferences.php">My Preferences</a></li>
			<li><img src="styles/YAML/images/icon_grey_logout.png"/><a href="bw/main.php?action=logout" id="header-logout-link">Logout</a></li>

	    </ul>
	  </div>
	</div>
	<img src="styles/YAML/images/logo.gif" id="logo" alt="Be Welcome"/>
</div>

<!-- #nav: main navigation -->
<div id="nav">
	<div id="nav_main">
	    <ul>
		
			<li ><a href="bw/main.php"><span>Home</span></a></li>
			<li ><a href="bw/member.php?cid=<? echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"><span>My Account</span></a></li>
			<li ><a href="bw/findpeople.php"><span>Find Members</span></a></li>
			<li class="active"><a href="forums"><span>Community</span></a></li>
			<li ><a href="bw/groups.php"><span>Groups</span></a></li>
			<li ><a href="bw/aboutus.php"><span>Get Answers</span></a></li>

			<!-- #nav_flowright: This part of the main navigation floats to the right. The items have to be listed in reversed order to float properly-->			
			<span id="nav_flowright">
		    <li>
		      <form action="quicksearch.php" id="form-quicksearch">
		          <fieldset id="fieldset-quicksearch">
		          Search 
		          <input type="text" name="searchtext" size="10" maxlength="30" id="text-field" />
		          <input type="hidden" name="action" value="quicksearch" />
		          <input type="image" src="styles/YAML/images/icon_go.gif" id="submit-button" />
		        </fieldset>
		      </form>
		    </li>
			</span>
			<!-- #nav_flowright: end -->
			
	    </ul>
	</div>
</div>
<!-- #nav: - end -->

<!-- #main: content begins here -->
<div id="main">

	<!-- #teaser: the orange bar shows title and elements that summarize the content of the current page -->
	<div id="teaser_bg">	
	<div id="teaser" class="clearfix">
		<?php echo $Page->teaserBar; ?>
		<!--<p>This could be a short description, either to the title's right or below.</p>-->

		<!-- #nav: - end -->
	</div>
			<!-- #nav: sub navigation -->
	<div id="middle_nav" class="clearfix">
	<?php
	//$HC->topMenu();
	$MyTravelbook->topMenu();
	?>
	</div>
</div>

	<!-- #teaser: end -->
	


<!-- #col1: first floating column of content-area  -->
    <div id="col1">
      <div id="col1_content" class="clearfix">
<?php echo $Page->newBar; ?>

<?php $User->displayLoginForm(); ?>

	</div>
    </div>
<!-- #col1: - end -->

<!-- #col2: second floating column of content-area -->
    <div id="col2">
      <div id="col2_content" class="clearfix">

        <h3>Sponsored Links</h3>
        <p><script type="text/javascript"><!--
google_ad_client = "pub-2715182874315259";
google_ad_width = 120;
google_ad_height = 240;
google_ad_format = "120x240_as";
google_ad_type = "text_image";
google_ad_channel = "";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>     </p>

      </div>
    </div>
<!-- #col2: - end -->

<!-- #col3: static column of content-area -->
    <div id="col3">
      <div id="col3_content" class="clearfix" >

			<table>
			<tr><td class="info"><?php echo $Page->content; ?>
			</td>
			</tr>
			</table>
		<!-- page content -->
	  
      </div>
      <!-- IE Column Clearing -->
	  <div id="ie_clearing">&nbsp;</div>
      <!-- Ende: IE Column Clearing -->
    </div>
<!-- #col3: - Ende -->

</div>
<!-- #main: - Ende -->

<!-- #footer: Begin Footer -->
<div id="footer">
	
	<p>&copy;2007 <strong>BeWelcome</strong> - The Hospitality Network<br />
	Code partly based on <a href="http://sourceforge.net/projects/mytravelbook">MyTravelBook</a></p>
	The Layout is based on <a href="http://www.yaml.de/">YAML</a> 
	&copy; 2005-2006 by <a href="http://www.highresolution.info">Dirk Jesse</a></p>

	<p>Choose your language here. Don't find it? Help us to translate :)</p>
	<p>
	<span><a href="/member.php?cid=lupochen&lang=en"><img height="11px" src="images/en.png" title="English" width=16></a></span>
	<a href="/member.php?cid=lupochen&lang=fr"><img height="11px" src="images/fr.png" title="French" width=16></a>
	<a href="/member.php?cid=lupochen&lang=esp"><img height="11px" src="images/esp.png" title="Espa�ol" width=16></a>
	<a href="/member.php?cid=lupochen&lang=de"><img height="11px" src="images/de.png" title="Deutsh" width=16></a>
	</p>
</div>
<!-- #footer: End -->
</div>
</div>

<?php
if (PVars::get()->debug) {
?>
<!-- 
<?php echo 'Build: '.PVars::get()->build; ?> 
<?php echo 'Templates: '.basename(TEMPLATE_DIR); ?> 
-->
<?php
}
?>
    </body>
</html>
