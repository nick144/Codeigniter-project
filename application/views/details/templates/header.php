<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>


		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui/css/redmond/jquery-ui-1.8.4.custom.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui/css/ui-lightness/jquery-ui-1.8.4.custom.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui/css/smoothness/jquery-ui-1.8.4.custom.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui/css/flick/jquery-ui-1.8.4.custom.css" id="link"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/base.css" />
		
		<link href="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
		
		<script src="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>

		<script type="text/javascript" src="<?php echo base_url(); ?>assets/highlighter/codehighlighter.js"></script>	
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/highlighter/javascript.js"></script>			
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/javascript/jquery.fixheadertable.min.js"></script>		
		
		<script type="text/javascript">  
					
			$(document).ready(function() {  	

				$('div.title').each(function(i){
					$(this).prepend('<a name="ex_' + (i+1) + '" />');
					$('#links').append('<a title="' + $('span', this).html() + '" class="ui-state-default ui-corner-all" href="#ex_' + (i+1) + '"><span style="float: left; margin-right: 0.3em; margin-top : -2px;" class="ui-icon ui-icon-triangle-1-e"></span> Example #' + (i+1) + '</a>');
				});

				$('<br/><a style="cursor : pointer">[ Show code ]</a>').insertBefore('pre').click(function(){
					if($(this).html() == "[ Show code ]"){
						$(this).html("[ Hide code ]");
					}else{
						$(this).html("[ Show code ]");
					}						
					$(this).next('pre').toggle();
				});
				
				$.ajax({						
					url: 'http://localhost/Dominic/CodeIgniter/index.php/details/data',
					success: function(data) {
					$('#0').html(data).fixheadertable({ 
							caption : 'My employees (200)', 
							colratio : [100, 150, 150, 150, 220, 150], 
							height : 300, 
							width : 960, 
							zebra : true, 
							sortable : true,
							sortedColId : 1, 
							resizeCol : true,
							pager : true,
							rowsPerPage	 : 10,
							sortType : ['integer', 'string', 'string', 'string', 'string', 'date'],
							dateFormat : 'm/d/Y'
						});
					}
				});
				
				function buildtable(id, data) {
					$(id).html(data);					
					if(id == "#1")
						$('#1').fixheadertable({ height : 200, zebra : true });
					if(id == "#2")
						$('#2').fixheadertable({ caption : 'My employees', height : 200, width : 960 });
					if(id == "#3")
						$('#3').fixheadertable({ caption : 'My employees', height : 200, width : 960, minWidth : 1000 });
					if(id == "#4")
						$('#4').fixheadertable({ caption : 'My employees', colratio : [50, 150, 150, 150, 220, 150], height : 200, width : 960, zebra : true, resizeCol : true, minColWidth : 50 });
					if(id == "#5")
						$('#5').fixheadertable({ caption : 'My employees', colratio : [50, 150, 150, 150, 220, 150], height : 200, width : 960, zebra : true, sortable : true, sortedColId : 0, 
							   sortType    : ['integer', 'string', 'string', 'string', 'string', 'date'],
							   dateFormat  : 'm/d/Y' });
					if(id == "#6")
						$('#6').fixheadertable({ 
							caption : 'My employees', 
							colratio : [50, 150, 150, 150, 220, 150], 
							height : 200, 
							width : 960, 
							zebra : true, 
							sortable : true, 
							sortedColId : 2, 
							sortType : ['integer', 'string', 'string', 'string', 'string', 'date'],
							dateFormat : 'm/d/Y',
							pager : true,
							rowsPerPage	 : 10
						});
					if(id == "#7")
						$('#7').fixheadertable({ 
							caption : 'My employees', 
							colratio : [50, 150, 150, 150, 220, 150], 
							height : 200, 
							width : 960, 
							zebra : true, 
							sortable : true, 
							sortedColId : 3, 
							sortType : ['integer', 'string', 'string', 'string', 'string', 'date'],
							dateFormat : 'm/d/Y',
							pager : true,
							rowsPerPage	 : 10,
							resizeCol : true
						});
				};
				
				$("button").button();
				$("button.loadexample").click(function(){
					var button = this;
					if($(button).attr('pass')) return;
					$('span', this).append('<span class="text">loading...</span>');
					$.ajax({						
						url: 'data.php',						
						success: function(data) {
							buildtable($(button).attr('num'), data);
							$('span.text', button).remove();
							$('span.ui-button-text', button).html('Example loaded !');
							$(button).attr('pass', 'pass');
						}
					});
				});
				$("#lightness").click(function() { $('#link').attr('href', '<?php echo base_url(); ?>assets/jquery-ui/css/ui-lightness/jquery-ui-1.8.4.custom.css'); });
				$("#flick").click(function() { $('#link').attr('href', '<?php echo base_url(); ?>assets/jquery-ui/css/flick/jquery-ui-1.8.4.custom.css'); });
				$("#redmond").click(function() { $('#link').attr('href', '<?php echo base_url(); ?>assets/jquery-ui/css/redmond/jquery-ui-1.8.4.custom.css'); });
				$("#smoothness").click(function() { $('#link').attr('href', '<?php echo base_url(); ?>assets/jquery-ui/css/smoothness/jquery-ui-1.8.4.custom.css'); });
			});
		</script>		
		<style type="text/css">		
			body {
				font-family : Verdana,Arial,Geneva,Helvetica,sans-serif;
				font-size	: 10px;
			}
			
			pre {				
				padding		: 5px;	
				font-size	: 12px;
				border		: 2px solid #F0F0F0;
				background	: #F5F5F5;
				width		: 100%;
				display		: none;
				width 		: 960px
			}
			
			.javascript  .comment {
				color : green; 
			}
			
			.javascript  .string {
				color : maroon;
			}
			
			.javascript  .keywords {
				font-weight : bold;
			}
			
			.javascript  .global {
				color : blue;
				font-weight : bolder;
			}
			
			.javascript  .brackets {
				color : Gray;
			}
			
			.javascript  .thing {
				font-size : 10px;
			}			
			
			span.text {
				font-weight : normal;
				font-style	: italic;
				margin-left : 10px;			
			}		
			
			div.title {
				font-size	: 18px;
				padding 	: 15px 0;
				font-weight : bold;
			}
			
			div.title span {
				font-weight : normal;
			}
			
			div.themes {
				overflow	: hidden;
    			width		: 150px;
    			position	: fixed;
    			top			: 180px;
    			left		: 10px;
			}
			
			div.themes button {
				width		: 120px;
				margin-bottom : 5px;
			}
			
			div.themes a {
			    display			: block;
			    font-size		: 1.1em;
			    margin-bottom	: 5px;
			    text-decoration	: none;
			    padding 		: 3px;
			    width			: 120px;
			}
			
			div.themes a:focus {
				outline : none;
			}
			
			div.themes a.top {
				color : black;
			}
			
			div.themes a.top:hover {
				text-decoration : underline;
			}
			
			#data-form span {
				width: 300px;
				float: left;
				padding: 10px;
				}


				#data-form {
				width: 321px;
				float: left;
				padding: 10px;
				}

				#data-form span label {
				width: 97px;
				float: left;
				padding: 3px;
				margin-right: 8px;
				}

				.submit {
				padding: 10px;
				border: none;
				background-color: #fc3741;
				color: #fff;
				text-align: center;
				width: 87px;
				margin: 10px auto;
				}
				
		</style>

</head>

<body style="background-color : #FFFFFF; overflow-x : hidden">	