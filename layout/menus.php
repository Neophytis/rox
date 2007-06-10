<?php

require_once("layouttools.php");

// This menu is the top menu
function Menu1($link = "", $tt = "") {
	
	if (isset($_SESSION['IdMember']))
		$IdMember = $_SESSION['IdMember'];
	else
		$IdMember = "";	

	echo "\n<div id=\"header\">\n";
	echo "  <div id=\"logo\">\n";
	echo "    <div id=\"logo-placeholder\">\n";
	echo "      <a href=\"".bwlink("")."\"><img alt=\"logo\" src=\"".bwlink("images/logo.png")."\" /></a>\n";
	echo "    </div>\n";
	echo "  </div>\n";
	echo "  <div id=\"navigation-functions\">\n";
	echo "    <ul>\n";
	if (isset($_SESSION['WhoIsOnlineCount'])) 	echo "      <li ", factive($link, "whoisonline.php"), "><a href=\"".bwlink("whoisonline.php")."\">", ww("NbMembersOnline", $_SESSION['WhoIsOnlineCount']), "</a></li>\n";
	echo "      <li ", factive($link, "faq.php"), "><a href=\"".bwlink("faq.php")."\">", ww('faq'), "</a></li>\n";
	echo "      <li ", factive($link, "feedback.php"), "><a href=\"".bwlink("feedback.php")."\">", ww('ContactUs'), "</a></li>\n";
	if (IsLoggedIn()) {
		echo "			<li", factive($link, "mypreferences.php?cid=" . $IdMember), "><a href=\"".bwlink("mypreferences.php")."\">", ww("MyPreferences"), "</a></li>\n";
		echo "			<li", factive($link, "aboutus.php"), "><a href=\"".bwlink("aboutus.php")."\">", ww("AboutUsPage"), "</a></li>\n";
		echo "      <li><a href=\"".bwlink("main.php?action=logout")."\" id=\"header-logout-link\">", ww("Logout"), "</a></li>\n";
	} else {
		echo "      <li", factive($link, "login.php"), "><a href=\"".bwlink("login.php")."\" >", ww("Login"), "</a></li>\n";
		echo "      <li", factive($link, "signup.php"), "><a href=\"".bwlink("signup.php")."\">", ww('Signup'), "</a></li>\n";
		echo "			<li", factive($link, "aboutus.php"), "><a href=\"".bwlink("aboutus.php")."\">", ww("AboutUsPage"), "</a></li>\n";
	}
	echo "    </ul>\n";
	echo "  </div>\n"; // navigation functions

	echo "  <br class=\"clear\"/>\n";
	echo "  <div id=\"navigation-access\">\n";
	echo "    <ul>\n";
	echo "    <li><a href=\"".bwlink("countries.php")."\">", ww('Countries'), "</a></li>\n";

	echo "    <li><a href=\"".bwlink("todo.php")."\">".ww('Map')."</a></li>\n";
	echo "    <li>\n";
	echo "      <form action=\"".bwlink("findpeople.php")."\" id=\"form-quicksearch\">\n";
	echo "		<input type=hidden name=OrUsername value=1>" ; // will be used by findpeople to also look for username matching TextToFind
	echo "          <fieldset id=\"fieldset-quicksearch\">\n";
//	echo "          <a href=\"search.php\">", ww('SearchPage'), "</a>\n"; // no earch page for now
	echo "          ",ww('SearchPage'), "\n";
	echo "          <input type=\"text\" name=\"TextToFind\" size=\"10\" maxlength=\"30\" id=\"text-field\" />\n";
	echo "          <input type=\"hidden\" name=\"action\" value=\"Find\" />\n";
	echo "          <input type=\"image\" src=\"".bwlink("images/icon_go.png")."\" id=\"submit-button\" />\n";
	echo "        </fieldset>\n";

	echo "      </form>\n";
	echo "    </li>\n";
	echo "    </ul>\n";
	echo "  </div>\n "; // navigation access

} // end of Menu1

function Menu2($link = "", $tt = "") {
	
	if (isset($_SESSION['IdMember']))
		$IdMember = $_SESSION['IdMember'];
	else
		$IdMember = "";
		
	if (isset($_SESSION['Username']))
		$Username = $_SESSION['Username'];
	else
		$Username = "";

	echo "\n";
	echo "  <div id=\"navigation-main\">\n";
	echo "    <ul>\n";
	echo "      <li ", factive($link, "index.php"), "><a href=\"".bwlink("index.php")."\"><span>", ww("Menu"), "</span></a></li>\n";

	if (IsLoggedIn()) {
	   echo "      <li ", factive($link, "member.php?cid=".$Username), "><a href=\"".bwlink("member.php?cid=".$Username)."\"><span>", ww("MyProfile"), "</span></a></li>\n";
	   if (isset ($_SESSION['NbNotRead']) and ($_SESSION['NbNotRead'] > 0)) {
		  $MyMessageLinkText = ww('MyMessagesNotRead', $_SESSION['NbNotRead']); //," ",FlagLanguage() youvegotmessage
 	   } else {
		  $MyMessageLinkText = ww('MyMessages');
	   }
	   echo "      <li ", factive($link, "mymessages.php"), "><a href=\"".bwlink("mymessages.php")."\"><span>", $MyMessageLinkText, "</span></a></li>\n";
	}
	echo "      <li ", factive($link, "members.php"), "><a href=\"".bwlink("members.php")."\"><span>", ww('Members'), "</span></a></li>\n";
	echo "      <li ", factive($link, "groups.php"), "><a href=\"".bwlink("groups.php")."\"><span>", ww('Groups'), "</span></a></li>\n";
	echo "      <li ", factive($link, "http://travelbook.bewelcome.org/newlayout/htdocs/forums"), "><a href=\"http://travelbook.bewelcome.org/newlayout/htdocs/forums\"><span>".ww("Forum")."</span></a></li>\n";
	if (IsLoggedIn()) {
			echo "      <li ", factive($link, "http://travelbook.bewelcome.org/newlayout/htdocs/blog/".$_SESSION["Username"]), "><a href=\"http://travelbook.bewelcome.org/newlayout/htdocs/blog/".$_SESSION["Username"]."\"><span>".ww("Blogs")."</span></a></li>\n";
		} else {
			echo "      <li ", factive($link, "http://travelbook.bewelcome.org/newlayout/htdocs/blog"), "><a href=\"http://travelbook.bewelcome.org/newlayout/htdocs/blog\"><span>".ww("Blogs")."</span></a></li>\n";
	} 
	echo "      <li ", factive($link, "http://travelbook.bewelcome.org/newlayout/htdocs/gallery/show"), "><a href=\"http://travelbook.bewelcome.org/newlayout/htdocs/gallery/show\"><span>".ww("Gallery")."</span></a></li>\n";
	echo "    </ul>\n";
	echo "  </div>\n";

	echo "  <div class=\"clear\" />\n";
	echo "</div>\n";
} // end of Menu2

// -----------------------------------------------------------------------------
// This is the Submenu displayed for  Messages menu
function menumessages($link = "", $tt = "") {

	//echo "\$link=".$link,"<br>";
	global $title;

	if ($tt != "")
		$title = $tt;

	echo "\n	<div id=\"columns-top\">\n";
	echo "			<ul id=\"navigation-content\">\n";

	if (IsLoggedIn()) {
		echo "				<li ", factive($link, "mymessages.php?action=NotRead"), "><a href=\"".bwlink("mymessages.php?action=NotRead")."", "\"><span>", ww('MyMessagesNotRead', $_SESSION['NbNotRead']), "</span></a></li>\n";
		echo "				<li ", factive($link, "mymessages.php?action=Received"), "><a href=\"".bwlink("mymessages.php?action=Received")."", "\"><span>", ww('MyMessagesReceived'), "</span></a></li>\n";
		echo "				<li ", factive($link, "mymessages.php?action=Sent"), "><a href=\"".bwlink("mymessages.php?action=Sent")."", "\"><span>", ww('MyMessagesSent'), "</span></a></li>\n";
		echo "				<li ", factive($link, "mymessages.php?action=Spam"), "><a href=\"".bwlink("mymessages.php?action=Spam")."", "\"><span>", ww('MyMessagesSpam'), "</span></a></li>\n";
		if (GetPreference("PreferenceAdvanced")=="Yes")
		   echo "				<li ", factive($link, "mymessages.php?action=Draft"), "><a href=\"".bwlink("mymessages.php?action=Draft")."", "\"><span>", ww('MyMessagesDraft'), "</span></a></li>\n";
	}

	echo "			</ul>\n";
	echo "	</div>\n"; // columns top

} // end of menumessages

// -----------------------------------------------------------------------------
// This is the Submenu displayed for member profile
function menumember($link = "", $m) {
	$IdMember=$m->id;
	echo "\n";
	echo "	<div id=\"columns-top\">\n";
	echo "		<ul id=\"navigation-content\">\n";
//	if ($m->CountTrad>1) { // if member has his profile translated
//	    for ($ii=0;$ii<$m->CountTrad;$ii++) { // display one tab per available translation
//			$Trad=$m->Trad[$ii];
//			echo "			<li ", factive($link, "member.php?cid=" . $IdMember,$Trad->IdLanguage), "><a href=\"".bwlink("member.php?cid=" . $IdMember)."&lang=".$Trad->ShortCode."\"><span>", ww('MemberPage')," ",FlagLanguage($Trad->IdLanguage), "</span></a></li>\n";
//		}
//	}
//	else {
		echo "			<li ", factive($link, "member.php?cid=" . $IdMember), "><a href=\"".bwlink("member.php?cid=" . $IdMember)."\"><span>", ww('MemberPage'), "</span></a></li>\n";
//	}
	if ($_SESSION["IdMember"] == $IdMember) { // if members own profile
		echo "		  <li", factive($link, "myvisitors.php"), "><a href=\"".bwlink("myvisitors.php")."\"><span>", ww("MyVisitors"), "</span></a></li>\n";
		echo "			<li", factive($link, "mypreferences.php?cid=" . $IdMember), "><a href=\"".bwlink("mypreferences.php?cid=" . $IdMember . "")."\"><span>", ww("MyPreferences"), "</span></a></li>\n";
		echo "			<li", factive($link, "editmyprofile.php"), "><a href=\"".bwlink("editmyprofile.php")."\"><span>", ww('EditMyProfile')," ",FlagLanguage(), "</span></a></li>\n";
	} else {
		//  echo "				<li",factive($link,"contactmember.php?cid=".$IdMember),"><a href=\"","contactmember.php?cid=".$IdMember,"\">",ww('ContactMember'),"</a></li>";
	}
	echo "			<li", factive($link, "viewcomments.php?cid=" . $IdMember), "><a href=\"".bwlink("viewcomments.php?cid=" . $IdMember, "")."\"><span>", ww('ViewComments'), "(", $m->NbComment, ")</span></a></li>\n";
	echo "			<li", factive($link, "http://travelbook.bewelcome.org/newlayout/htdocs/blog"), "><a href=\"http://travelbook.bewelcome.org/newlayout/htdocs/blog\"".$_SESSION["Username"]."\"><span>", ww("Blog"), "</span></a></li>\n";
	echo "			<li", factive($link, "map.php"), "><a href=\"".bwlink("todo.php")."\"><span>", ww("Map"), "</span></a></li>\n";
	echo "		</ul>\n";
	echo "	</div>\n"; // columns top
} // end of menumember

function factive($link, $value,$IdLanguage=-1) {
	if ((strpos($link, $value) === 0)and(($IdLanguage==-1)or($IdLanguage==$_SESSION["IdLanguage"]))) {
		return (" class=\"active\"");
	} else
		return ("");
} // end of factive

//------------------------------------------------------------------------------
// This build the specific menu for volunteers
function VolMenu($link = "", $tt = "") {

	$res = "";

	if (HasRight("Words")) {
		$res .= "\n<li><a";
		if ($link == "admin/adminwords.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminwords.php")."\" method=post ";
		}
		$res .= " title=\"Words management\">AdminWord</a></li>\n";
	}

	if (HasRight("Accepter")) {
		$res .= "<li><a";

		if ($link == "admin/adminaccepter.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminaccepter.php")."\" method=post ";
		}

		$AccepterScope= RightScope('Accepter');
		if (($AccepterScope == "\"All\"") or ($AccepterScope == "All") or ($AccepterScope == "'All'")) {
		   $InScope = " /* All countries */";
		} else {
		  $InScope = "and countries.id in (" . $AccepterScope . ")";
		}
	 	

		$rr=LoadRow("select SQL_CACHE count(*) as cnt from members,countries,regions,cities where members.Status='Pending' and cities.id=members.IdCity and countries.id=cities.IdCountry and cities.IdRegion=regions.id ".$InScope);
		$res .= " title=\"Accepting members (scope=".addslashes($InScope).")\">AdminAccepter(".$rr->cnt.")</a></li>\n";

		$res .= "<li><a";

		if ($link == "admin/adminmandatory.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminmandatory.php")."\" method=post ";
		}
		$AccepterScope= RightScope('Accepter');
		if (($AccepterScope == "\"All\"") or ($AccepterScope == "All") or ($AccepterScope == "'All'")) {
		   $InScope = " /* All countries */";
		} else {
		  $InScope = "and countries.id in (" . $AccepterScope . ")";
		}
	 	

		$rr=LoadRow("select SQL_CACHE count(*) as cnt from pendingmandatory,countries,regions,cities where pendingmandatory.Status='Pending' and cities.id=pendingmandatory.IdCity and countries.id=cities.IdCountry and cities.IdRegion=regions.id ".$InScope);
		$res .= " title=\"update mandatory data(scope=".addslashes($InScope).")\">AdminMandatory(".$rr->cnt.")</a></li>\n";


	}

	if (HasRight("Grep")) {
		$res .= "<li><a";
		if ($link == "admin/admingrep.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/admingrep.php")."\" method=post ";
		}
		$res .= " title=\"Greping files\">AdminGrep</a></li>\n";
	}

	if (HasRight("Group")) {
		$res .= "<li><a";
		if ($link == "admin/admingroups.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/admingroups.php")."\" method=post ";
		}
		$res .= " title=\"Grepping file\">AdminGroups</a></li>\n";
	}

	if (HasRight("Flags")) {
		$res .= "<li><a";
		if ($link == "admin/adminflags.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminflags.php")."\" method=post ";
		}
		$res .= " title=\"administration of members flags\">AdminFlags</a></li>\n";
	}

	if (HasRight("Rights")) {
		$res .= "<li><a";
		if ($link == "admin/adminrights.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminrights.php")."\" method=post ";
		}
		$res .= " title=\"administration of members rights\">AdminRights</a></li>\n";
	}

	if (HasRight("Logs")) {
		$res .= "<li><a";
		if ($link == "admin/adminlogs.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminlogs.php")."\" method=post ";
		}
		$res .= " title=\"logs of activity\">AdminLogs</a></li>\n";
	}

	if (HasRight("Comments")) {
		$res .= "<li><a";
		if ($link == "admin/admincomments.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/admincomments.php")."\" method=post ";
		}
		$res .= " title=\"managing comments\">AdminComments</a></li>\n";
	}

	if (HasRight("Pannel")) {
		$res .= "<li><a";
		if ($link == "admin/adminpanel.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminpanel.php")."\" method=post ";
		}
		$res .= " title=\"managing Panel\">AdminPanel</a></li>\n";
	}

	if (HasRight("AdminFlags")) {
		$res .= "<li><a";
		if ($link == "admin/adminflags.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminflags.php")."\" method=post ";
		}
		$res .= " title=\"managing flags\">AdminFlags</a></li>\n";
	}

	if (HasRight("Checker")) {
	    $rr=LoadRow("select count(*) as cnt from messages where Status='ToCheck' and messages.WhenFirstRead='0000-00-00 00:00:00'");
		$res .= "<li><a";
		if ($link == "admin/adminchecker.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("admin/adminchecker.php")."\" method=post ";
		}
		$res .= " title=\"Mail Checking\">AdminChecker";
	    $res .=  "(".$rr->cnt.")";
		$res .=  "</a></li>\n";
	}

	if (HasRight("Debug")) {
		$res .= "<li><a";
		if ($link == "phplog.php") {
			$res .= " id=current ";
		} else {
			$res .= " href=\"".bwlink("phplog.php?showerror=10")."\"";
		}
		$res .= " title=\"Show last 10 phps error in log\">php error log</a></li>\n";
	}

	return ($res);
} // end of VolMenu

//------------------------------------------------------------------------------
// This function display the Ads 
function ShowAds() {
	// right column 
 	echo "\n   <div id=\"col2\">\n";
	echo "     <div id=\"col2_content\" class=\"clearfix\">\n";
	echo "            <div id=\"content\"> \n"; 
	echo "              <div class=\"info\"> \n";
	echo "         <h3>", ww("Ads"), "</h3>\n";
	if (IsAdmin()) echo "<br>ADMIN<br>no ads</b>" ;

	else echo str_replace("<br />","",ww(21607)); // Google Ads entry
	/*
?>
<script type="text/javascript"><!--
google_ad_client = "pub-2715182874315259";
google_ad_width = 120;
google_ad_height = 240;
google_ad_format = "120x240_as";
google_ad_type = "text_image";
google_ad_channel = "";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<?php
	*/
	echo "     </div>\n";
	echo "   </div>\n";
	echo "     </div>\n";
	echo "   </div>\n";
} // end of ShowAds

//------------------------------------------------------------------------------
// This function display the Actions 
function ShowActions($Action = "", $VolMenu = false) {
	// MAIN left column
   echo "\n      <div id=\"col1\"> \n"; 
	echo "          <div id=\"col1_content\" class=\"clearfix\"> \n"; 
	echo "            <div id=\"content\"> \n"; 
	echo "              <div class=\"info\"> \n";
	if (($Action != "") or ($VolMenu)) {
		echo "           <h3>", ww("Actions"), "</h3>\n";

		echo "           <ul>\n";
		echo $Action;
		if ($VolMenu)
			echo VolMenu();
		echo "\n           </ul>\n";
	}
	echo "         </div>\n"; // Class info 
	echo "       </div>\n"; // content
	echo "     </div>\n"; // col1_content
	echo "    </div>\n"; // col1
} // end of Show Actions

// Function DisplayHeaderWithColumns allow to display a Header With columns
// $TitleTopContent is the content to be display in the TopOfContent
// $MessageBeforeColumnLow is the message to be display before the column area
// $ActionList is the list of eventual action
function DisplayHeaderWithColumns($TitleTopContent = "", $MessageBeforeColumnLow = "", $ActionList = "") {
	global $DisplayHeaderWithColumnsIsSet;
	echo "\n<div id=\"maincontent\">\n";
	echo "  <div id=\"topcontent\">";


	// BLUE 3-columns-part
	echo "	<div id=\"main\">";
	echo "		<h1>", $TitleTopContent, "</h1>\n"; // title in the BLUR (or orange) strip
	echo "      <div id=\"col1\">\n"; 
	echo "        <div id=\"col1_content\" class=\"clearfix\"> \n"; 
	echo "        </div>\n"; 
	echo "      </div>\n";

	echo "      <div id=\"col3\">\n"; 
	echo "        <div id=\"col3_content\" class=\"clearfix\"> \n"; 
	echo "		<p></p>\n";
	echo "        </div>\n"; 
	echo "      </div>\n";
	// IE Column Clearing 
echo "        <div id=\"ie_clearing\">&nbsp;</div>\n"; 
	// End: IE Column Clearing 

echo "      </div>\n"; // end main


	// End: BLUE 3-columns-part
	echo "        </div>\n"; 
	echo "<div id=\"columns-top\" class=\"notabs\">";
	echo "	</div>";
	echo "      </div>\n";
	echo "\n";
	echo "  <div id=\"columns\">\n";
	if ($MessageBeforeColumnLow != "")
		echo $MessageBeforeColumnLow;

	echo "    <div id=\"columns-low\">\n";

	ShowActions($ActionList); // Show the Actions
	ShowAds(); // Show the Ads

	echo "		<div id=\"columns-middle\">\n";
	echo "			<div id=\"content\">\n";
	echo "				<div class=\"info\">\n";

	$DisplayHeaderWithColumnsIsSet = true; // set this for footer function which will be in charge of calling the closing /div

} // end of DisplayHeaderWithColumns

// Function DisplayHeaderShortUserContent allow to display short header
function DisplayHeaderShortUserContent($TitleTopContent = "") {
	global $DisplayHeaderShortUserContentIsSet;

	echo "\n<div id=\"maincontent\">\n";
	echo "  <div id=\"topcontent\">";
	echo "					<h1>", $TitleTopContent, "<br /></h1>\n";
	echo "\n  </div>\n";
	echo "<div id=\"columns-top\" class=\"notabs\">";
	echo "	</div>";
	echo "</div>\n";

	echo "<div class=\"user-content\">\n";

	$DisplayHeaderShortUserContentIsSet = true; // set this for footer function which will be in charge of calling the closing /div

} // end of DisplayHeaderShortUserContent

// Function DisplayHeaderIndexPage allow to display a special header for the index page
function DisplayHeaderIndexPage($TitleTopContent = "") {
	global $DisplayHeaderIndexPageIsSet;

	echo "\n<div id=\"maincontent\">\n";
	echo "  <div id=\"topcontent\"><div id=\"col1_content\">";
	echo "					<h1>", $TitleTopContent, "<br /></h1>\n";
	echo "\n  </div></div>\n";
	echo "<div id=\"columns-top\" class=\"notabs\">";
	echo "	</div>";
	echo "</div>\n";

	echo "<div class=\"user-content\">\n";

	$DisplayHeaderIndexPageIsSet = true; // set this for footer function which will be in charge of calling the closing /div

} // end of DisplayHeaderIndexPage

?>
