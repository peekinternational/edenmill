<!doctype html>
<html>
<head>
	<title>Edit In Place with CKEditor</title>
	<meta charset="utf-8" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	<!-- no related to script -->
		<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link rel="stylesheet" type="text/css" href="../no_related_to_script/css/kickstart.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../no_related_to_script/style.css" media="all" />
		<script type="text/javascript" src="../no_related_to_script/js/prettify.js"></script>
		<script type="text/javascript" src="../no_related_to_script/js/kickstart.js"></script>
	<!-- /no related to script -->
	
	<!-- ck-in-place -->
		<script type="text/javascript" src="ck/ckeditor.js"></script>
		<script type="text/javascript" src="ck/adapters/jquery.js"></script>
		<script type="text/javascript" src="ck-in-place.js"></script>
	<!-- /ck-in-place -->
</head>
<body>
	<div id="header">
		<h1>Edit In Place with CKEditor</h1>
	</div>
	<div id="body">
		<h3>Setup</h3>
		1. Include JQuery 1.3.2 or newer to &lt;head&gt;. (1.7.2 is recommended)<br/>
		<pre>&lt;script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"&gt;&lt;/script&gt;</pre>
		2. Include CKEditor after JQuery. (don't forget to check file path)
		<pre>&lt;script type="text/javascript" src="ck/ckeditor.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="ck/adapters/jquery.js"&gt;&lt;/script&gt;</pre>
		3. Include ck-in-place.js after CKEditor. (don't forget to check file path)
		<pre>&lt;script type="text/javascript" src="ck-in-place.js"&gt;&lt;/script&gt;</pre>
		<p style="font-style:italic;">
		Note: data will POST to hander in var $_POST['content']. (you can define handler url with data-handler attribute. See example for more info.)
		</p>
		
		<h3>Quick Example</h3>
		add class="editable" to div element.
		<ul class="tabs left">
			<li><a href="#example1-showcase">Example 1</a></li>
			<li><a href="#example1-html">HTML</a></li>
		</ul>

		<div id="example1-showcase" class="tab-content">
			<div class="editable">
				<p><strong>Double Click to Edit</strong></p>
				<p>You may edit this content, but it cannot save.<br/>You need to add data-handler to handle the change. See next example for more info.</p>
			</div>
		</div>
		<div id="example1-html" class="tab-content">
			<pre>&lt;div class="editable"&gt;
	&lt;p&gt;&lt;strong&gt;Double Click to Edit&lt;/strong&gt;&lt;/p&gt;
	&lt;p&gt;You may edit this content, but it cannot save.&lt;br/&gt;
	You need to add data-handler to handle the change. See next example for more info.&lt;/p&gt;
&lt;/div&gt;</pre>
		</div>
		
		<h3>Quick Example with Data Handler</h3>
		add class="editable" and data-handler="handler.php" to div element.
		<ul class="tabs left">
			<li><a href="#example2-showcase">Example 2</a></li>
			<li><a href="#example2-html">HTML</a></li>
			<li><a href="#example2-handler">handler.php</a></li>
		</ul>

		<div id="example2-showcase" class="tab-content">
			<div class="editable" data-handler="handler.php">
			<?php
				if(isset($_COOKIE['content'])){
					echo $_COOKIE['content'];
				}else{
			?>
				<p><strong>Double Click to Edit</strong></p>
				<p>You may edit this content then save.<br/>handler.php will store change to cookie. Refresh this page and see it yourself!</p>
				<p>In real use you may edit handler.php to store content in DB or do whatever you want.</p>
				<p>p.s. cookie will expire in 1 minute after save.</p>
			<?php
				}// end if
			?>
			</div>
		</div>
		<div id="example2-html" class="tab-content">
			<pre>&lt;div class="editable" data-handler="handler.php"&gt;
&lt;?php
	if(isset($_COOKIE['content'])){
		echo $_COOKIE['content'];
	}else{
?&gt;
	&lt;p&gt;&lt;strong&gt;Double Click to Edit&lt;/strong&gt;&lt;/p&gt;
	&lt;p&gt;You may edit this content then save.&lt;br/&gt;handler.php will store change to cookie. Refresh this page and see it yourself!&lt;/p&gt;
	&lt;p&gt;In real use you may edit handler.php to store content in DB or do whatever you want.&lt;/p&gt;
	&lt;p&gt;p.s. cookie will expire in 1 minute after save.&lt;/p&gt;
&lt;?php
	}// end if
?&gt;
&lt;/div&gt;</pre>
		</div>
		<div id="example2-handler" class="tab-content">
			<pre>&lt;?php
	if(isset($_POST['content'])){
		setcookie('content',$_POST['content'],time()+60); // 1 min cookie
	}
?&gt;</pre>
		</div>
		
		<h3>Simple Tools</h3>
		add class="simple editable" to div element.
		<ul class="tabs left">
			<li><a href="#example3-showcase">Example 3</a></li>
			<li><a href="#example3-html">HTML</a></li>
		</ul>

		<div id="example3-showcase" class="tab-content">
			<div class="simple editable">
				<p><strong>Double Click to Edit</strong></p>
				<p>Add simple class to show only simple tools.</p>
				<p><i>You may edit this content, but it cannot save.</i></p>
			</div>
		</div>
		<div id="example3-html" class="tab-content">
			<pre>&lt;div class="simple editable"&gt;
	&lt;p&gt;&lt;strong&gt;Double Click to Edit&lt;/strong&gt;&lt;/p&gt;
	&lt;p&gt;Add simple class to show only simple tools.&lt;/p&gt;
	&lt;p&gt;&lt;i&gt;You may edit this content, but it cannot save.&lt;/i&gt;&lt;/p&gt;
&lt;/div&gt;</pre>
		</div>
		
		<h3>All Tools</h3>
		add class="full editable" to div element.
		<ul class="tabs left">
			<li><a href="#example4-showcase">Example 4</a></li>
			<li><a href="#example4-html">HTML</a></li>
		</ul>

		<div id="example4-showcase" class="tab-content">
			<div class="full editable">
				<p><strong>Double Click to Edit</strong></p>
				<p>Add full class to show all tools.</p>
				<p><i>You may edit this content, but it cannot save.</i></p>
			</div>
		</div>
		<div id="example4-html" class="tab-content">
			<pre>&lt;div class="full editable"&gt;
	&lt;p&gt;&lt;strong&gt;Double Click to Edit&lt;/strong&gt;&lt;/p&gt;
	&lt;p&gt;Add full class to show all tools.&lt;/p&gt;
	&lt;p&gt;&lt;i&gt;You may edit this content, but it cannot save.&lt;/i&gt;&lt;/p&gt;
&lt;/div&gt;</pre>
		</div>
		
		<h3>Advance Usage</h3>
		You may custom it yourself.
		<ul class="tabs left">
			<li><a href="#example5-showcase">Example 5</a></li>
			<li><a href="#example5-html">HTML</a></li>
		</ul>

		<div id="example5-showcase" class="tab-content">
			<div id="EditMe">Click to edit<br/><p><i>You may edit this content, but it cannot save</i></p></div>
			<script>
				$('#EditMe').ckeip({
					e_url: 'index.php', // action file which handle $_POST['content']
					e_hover_color: '#ffa07a',
					ckeditor_config : { // define ckeditor configuration here
						width: '100%',
						toolbar:
						[
							['Bold','Italic','Underline','Strike','Subscript','Superscript'],
							['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
							['NumberedList','BulletedList'],
							['TextColor','BGColor' ],
							['RemoveFormat' ],'/',
							[ 'Format','Font','FontSize' ],
							['Outdent','Indent'],
							[ 'Link','Unlink','-','ShowBlocks'],'/',
							['NewPage'],
							['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar' ],
							['Cut','Copy','Paste','PasteText','PasteFromWord'],
							['Undo','Redo','-','Source','-','Maximize']
						]
					}
				});
			</script>
		</div>
		<div id="example5-html" class="tab-content">
			<pre>&lt;div id="EditMe"&gt;Click to edit&lt;br/&gt;&lt;p&gt;&lt;i&gt;You may edit this content, but it cannot save&lt;/i&gt;&lt;/p&gt;&lt;/div&gt;
&lt;script&gt;
	$('#EditMe').ckeip({
		e_url: 'index.php', // action file which handle $_POST['content']
		e_hover_color: '#ffa07a',
		ckeditor_config : { // define ckeditor configuration here
			width: '100%',
			toolbar:
			[
				['Bold','Italic','Underline','Strike','Subscript','Superscript'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['NumberedList','BulletedList'],
				['TextColor','BGColor' ],
				['RemoveFormat' ],'/',
				[ 'Format','Font','FontSize' ],
				['Outdent','Indent'],
				[ 'Link','Unlink','-','ShowBlocks'],'/',
				['NewPage'],
				['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar' ],
				['Cut','Copy','Paste','PasteText','PasteFromWord'],
				['Undo','Redo','-','Source','-','Maximize']
			]
		}
	});
&lt;/script&gt;</pre>
		</div>
	<h2>Download</h2>
	<a href="ck-in-place.js">ck-in-place.js (3.7 KB)</a><br/>
	<a href="http://ckeditor.com/download">CKEditor (go to ckeditor.com/download)</a>
	</div>
	<div id="footer">
		Copyright &copy; 2012 <a href="http://www.facebook.com/earthchie">Earthchie</a> | <a href="http://creativecommons.org/licenses/by-nc/3.0/th/">CC BY-NC 3.0</a>
	</div>
</body>
</html>