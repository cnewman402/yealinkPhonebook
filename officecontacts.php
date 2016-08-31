<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Gana Phonebook - Offices</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.html">
                	Back to Selection Page
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="https://www.youtube.com">Tutorials</a>
                    </li>
                    <li>
                        <a href="/phonelist.html">Phones</a>
                    </li>
                    <li class="active">
                        <a href="https://portal.2600hz.com">PBX Login</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Content -->
    <div class="container">

        <!-- Heading -->
        <div class="row">
            <div class="col-lg-12">
                <img src="images/logo.png" width="131" height="90" alt=""/>
                <h1 class="page-header">Phone System
                    <small>Phonebook Entry Site</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-6 portfolio-item col-lg-12">
                <a href="#">
                    
                </a>
                <h3>
                    <a href="#">Office Contact Entry Form</a>
                </h3>
                <p>Please fill in the below form to add a contact to the phone system.</p>
<?php 
if (isset($_REQUEST['ok'])) { 
$xml = new DOMDocument("1.0","UTF-8"); 
$xml->load("offices.xml"); 
$rootTag = $xml->getElementsByTagName("YealinkIPPhoneDirectory")->item(0); 
$dataTag = $xml->createElement("DirectoryEntry"); 
$aTag = $xml->createElement("Name",$_REQUEST['a']); 
$bTag = $xml->createElement("Telephone",$_REQUEST['b']); 
$cTag = $xml->createElement("Telephone",$_REQUEST['c']);
$dTag = $xml->createElement("Telephone",$_REQUEST['d']);
$dataTag->appendChild($aTag); 
$dataTag->appendChild($bTag); 
$dataTag->appendChild($cTag);
$dataTag->appendChild($dTag);
$rootTag->appendChild($dataTag); 
$xml->save("offices.xml");
 } 
 ?> 
 <form class="form-horizontal" action="officecontacts.php" method="post">
  <form class="form-horizontal" action="officecontacts.php" method="post">
<fieldset>

<!-- Form Name -->
<legend> </legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Full Name</label>  
  <div class="col-md-5">
 <input class="form-control input-md" required="" type="text" name="a" /> 
 <span class="help-block">Required</span>  
  </div>
</div>
 
 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Extension</label>  
  <div class="col-md-4">
 <input class="form-control input-md" required="" type="text" name="b" /> 
 <span class="help-block">Required at least enter a space</span>  
  </div>
</div>
 
 <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Direct Phone Line</label>  
  <div class="col-md-4">
 <input class="form-control input-md" required="" type="text" name="c" /> 
 <span class="help-block">Required at least enter a space</span>  
  </div>
</div>
 
 <!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Cellular Phone</label>  
  <div class="col-md-4">
 <input class="form-control input-md" required="" value=" " type="text" name="d" />
 <span class="help-block">Required at least enter a space</span>  
  </div>
</div>
 
 <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <input class="btn btn-primary" input type="submit" name="ok" value="Submit Entry" >
    
  </div>
</div>

</fieldset>
 </form>

            </div>
</div>
<!-- delete form -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-md-6 portfolio-item col-lg-12">
                <a href="#">
                    
                </a>
                <h3>
                    <a href="#">Office Contact Delete Form</a>
                </h3>
                <p>Please fill in the below form to REMOVE a contact from the phone system.</p>
                
<?php 
if (isset($_REQUEST['ok2'])) { 
$xml = new DOMDocument("1.0","UTF-8"); 
$xml->load("offices.xml"); 
$aTag = $_POST['a'];
$xpath = new DOMXPATH($xml);
foreach($xpath->query("/YealinkIPPhoneDirectory/DirectoryEntry[Name = '$aTag']") as $node)
{
	$node->parentNode->removeChild($node);
}
$xml->formatoutput = true;
$xml->save("offices.xml");
 } 
 ?> 
 <form class="form-horizontal" action="officecontacts.php" method="post">
<fieldset>

<!-- Form Name -->
<legend> </legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Full Name</label>  
  <div class="col-md-5">
 <input class="form-control input-md" required="" type="text" name="a" /> 
 <span class="help-block">Required</span>  
  </div>
</div>

 <!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <input class="btn btn-primary" input type="submit" name="ok2" value="Delete Entry" >
    
    
  </div>
</div>

</fieldset>
 </form>

            </div>
</div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row"> </div>


        <!-- Projects Row -->
        <div class="row"> </div>
        <!-- Pagination -->
        <div class="row text-center"> </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
	
	<footer>
		<div class="footer-blurb">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 footer-blurb-item">
						<img class="img-circle" src="/images/youtube.jpg" alt="" width="100" height="100">
						<h3>Tutorials</h3>
						<p>Hosted videos on how to use your telephone</p>
						<p><a class="btn btn-primary" href="https://www.youtube.com">Tutorials</a></p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<img class="img-circle" src="/images/phones100.jpeg" alt="" width="100" height="100">
						<h3>Phone Login</h3>
						<p>List of phones to login to for administration</p>
						<p><a class="btn btn-primary" href="/phonelist.html">Admin Local</a></p>
					</div>
					<div class="col-sm-4 footer-blurb-item">
						<img class="img-circle" src="/images/pbx.png" alt="" width="100" height="100">
						<h3>PBX Login</h3>
						<p>PBX Login for administrators to work on phone system</p>
						<p><a class="btn btn-primary" href="https://portal.2600hz.com">Admin Cloud</a></p>
					</div>

				</div>
				<!-- /.row -->	
			</div>
        </div>
        
        <div class="copyright">
        	<div class="container">
        		<p>Copyright &copy; Network Newman 2016</p>
        	</div>
        </div>
	</footer>

	
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
