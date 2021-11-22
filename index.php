<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bits</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css.css">




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
  <script> 
    $(function(){
      $("#includedContent").load("footer.php"); 
    });
    </script> 	
    <script> 
    $(function(){
      $("#includedContent2").load("header.php"); 
    });
    </script> 
</head>
<body >

<div id="includedContent2"></div>
<div class=main>










	<h1>What is bits?</h1>
<p>bits is a personal project where the goal is to have a libriary containing bits and parts of codes that can be used when creating a website.<br>
Here it will display the code as well as the result of the code.
<br><br>
As of 09/11/2021 bits is using <a href="https://getbootstrap.com/docs/5.0/getting-started/introduction/">bootstrap 5</a>.
Click on the help tab to viev more information about bits.
</p>


<div id="center">

<p>Display a div in center</p>

<pre>
  <code>

    <div id="outer">
      <div id="inner">Foo foo</div>
    </div>

    #inner {  
      border: 1px solid black;
    }

    #outer {
      border: 1px solid red;
      width:100%;
      display: flex;
      justify-content: center;
    }
  </code>
</pre>

<div id="outer">
  <div id="inner">This is centered</div>
</div>




</div>
<br><br>
    <hr>
<div id="otp">
	<h2>How to create an OTP(one time password)</h2>
	<br><br>
	<p>create 2 file:1. otp.php 2. check_otp.php
		<br><br>
		In otp.php there will be the form where the user will input the otp.<br>
		Whe the page is open a random generated code will be generated. The code is saved in the databse as well as the current time.
		<br>
		A mail will be send to the user on his email address.
		<br>
<pre>
  <code>
 


  </code>
</pre>

		<br><br>
		<hr>
		In check_otp.php there will be the code to check if the otp match from the user matches the otp in the databse. It will also check if the current time is ten minutes more than the time the otp was created.
    For added security you can hash the otp.


		<pre>
      <code>

      </code>
    </pre>
	</p>

<hr>
</div>
<div id="opentbs">
<h2>Open TBS</h2>
  <p>Open Tbs can be used to export certain values to a word document. 
    You need to have a template that is going to be filled your values.<br><br>Use the post method to send values to be use in the opentbscode.php file.
    <br>Here We are have a exemple with the input of name.</p>
  
  <pre>
    
    <code>
      <?php
    highlight_file('opentbscode.php');
?>
    </code>
  
</div>
<form action="opentbscode.php" method="post">
<input type="text" name="name">
<button class="btn btn-primary">Export to Word</button>

</form>
<p id="downloadtemplate">Click to download template: </p>
<button id="downloadtemplate" class="btn btn-primary">
<a href="demo_ms_word.docx" download="test">Download</a>
</button>



<div class="flex">
  <p></p>
  <pre></pre>
  <code></code>
</div>

<div class="neonbtn">
  <h2>Neon Button</h2><br>
  <p>This is the code for a neon button</p>
  <button class="neonButton ">The Button</button>
  <a href="#" class="neonButton "> The Button</a>
  <pre></pre>
  <code></code>
</div>

<br><br><hr>

<div class="openssl">
  <h2>How to make dev environment become https with OpenSSL.</h2>
  <br>
    <p>Follow the steps below to make your local or live web hosting become secure with a SSL certificate. <br><br>This code works perfectly fine as of 22/11/2021</p>
      <pre><code>
Download OpenSSL from: <a href="https://slproweb.com/products/Win32OpenSSL.html">https://slproweb.com/products/Win32OpenSSL.html</a>

<strong>Step 1:</strong>
In CMD:
openssl genrsa -des3 -out rootCA.key 2048

<strong>Step 2:</strong>
In CMD:
openssl req -x509 -new -nodes -key rootCA.key -sha256 -days 1024 -out rootCA.pem

<strong>Step 3:	</strong>
Create a file named server.csr.cnf and add the following:

[req]
default_bits = 2048
prompt = no
default_md = sha256
distinguished_name = dn

[dn]
C=US
ST=RandomState
L=RandomCity
O=RandomOrganization
OU=RandomOrganizationUnit
emailAddress=hello@example.com
CN = localhost


<strong>Step 4:</strong>
Create a file name v3.ext and add the following:

authorityKeyIdentifier=keyid,issuer
basicConstraints=CA:FALSE
keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment
subjectAltName = @alt_names

[alt_names]
DNS.1 = localhost

<strong>Step 5:</strong>
In CMD:
openssl req -new -sha256 -nodes -out server.csr -newkey rsa:2048 -keyout server.key -config <( cat server.csr.cnf )

<strong>Step 6:</strong>
In CMD:
openssl x509 -req -in server.csr -CA rootCA.pem -CAkey rootCA.key -CAcreateserial -out server.crt -days 500 -sha256 -extfile v3.ext

<strong>Step 7:</strong>
Copy .crt and .key file to apache/conf/ssl.key and apache/conf/ssl.crt folder

<strong>Step 8:</strong>
Edit the httpd-ssl.conf file(apache/conf/extra)
Search and modify:
SSLCertificateFile “conf/ssl.crt/server.crt”
SSLCertificateKeyFile “conf/ssl.crt/server.key”



      </code></pre>
    
  </br>
</div>



















  </div>
  <div id="includedContent"></div></body>
</html>
