/*body
	{
	margin: 50px;
	padding: 0px;
	background-color: #eeeeee;
	}*/
	
/* ==================== BAR GRAPH  ==================== */
/* ------ container ------ */
div.css_bar_graph
	{
	width: 810px;
	height: 367px;
	padding: 40px 20px 10px 50px;
	/* --- font --- */
	font-size: 13px;
	font-family: arial, sans-serif;
	font-weight: normal;
	color: #444444;
	background-color: #ffffff;
	position: relative; 
	margin-left: auto;
	margin-right: auto;	
	border: 1px solid #d5d5d5;
	/* --- css3 --- */
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	}
	
/* ------ hyperlinks ------ */
div.css_bar_graph a
	{
	color: #444444;
	text-decoration: none;
	}
	
/* ------ lists ------ */
div.css_bar_graph ul
	{
	margin: 0px;
	padding: 0px;
	list-style-type: none;
	}
	
div.css_bar_graph li
	{
	margin: 0px;
	padding: 0px;
	}

/* ==================== Y-AXIS LABELS ==================== */
/* ------ base ------ */
div.css_bar_graph ul.y_axis
	{
	width: 50px;
	position: absolute;
	top: 40px;
	left: 10px;
	text-align: right;
	}
	
/* ------ labels ------ */
div.css_bar_graph ul.y_axis li
	{
	width: 100%;
	height: 24px;	/* 50px including border */
	float: left;
	color: #888888;
	/* --- alignment correction --- */
	border-top: 1px solid transparent;
	position: relative;
	top: -13px;	/* value = font height */
	}	
	
/* ==================== X-AXIS LABELS  ==================== */
/* ------ base ------ */
div.css_bar_graph ul.x_axis
	{
	width: 100%;
	height: 50px;
	position: absolute;
	bottom: 0px;
	left: 95px;
	text-align: center;
	}
	
/* ------ labels ------ */
div.css_bar_graph ul.x_axis li
	{
	display: inline;
	width: 55px;
	float: left;
	}
	
/* ==================== GRAPH LABEL  ==================== */
/* ------ base ------ */
div.css_bar_graph div.label
	{
	width: 100%;
	height: 50px;
	float: left;
	margin-top: 20px;
	text-align: center;
	color: black;
	font-size: 20px;
	}
	
div.css_bar_graph div.label span
	{
	font-weight: bold;
	}


.totalusers
	{
	font-size: 15px;
	text-align: center;
	letter-spacing: 1px;
	margin-top: 5px;
	background-color: #FFF;
	width: 200px;
	margin-left: 350px;
	border: 1px solid #d5d5d5;

        border-radius: 5px;
	/*box-shadow: -0px -8px 7px #888888;*/
	}

.totalusers1
	{
	font-size: 30px;
	text-align: center;
	letter-spacing: 1px;
	margin-top: 5px;
	background-color: #FFF;
	width: 200px;
	margin-left: 350px;
	border: 1px solid #d5d5d5;

        border-radius: 5px;
	}

/* ==================== GRAPH  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph
	{
	width: 100%;
	height: 100%;
	float: left;
	}
	
/* ------ grid ------ */
div.css_bar_graph div.graph ul.grid
	{
	width: 100%;
	}

/* ------ IE grid ------ */
div.css_bar_graph div.graph li
	{
	width: 100%;
	height: 24px;	/* 50px including border */
	float: left;
	border-top: 1px dashed #d5d5d5;
	}
	
/* ------ other browsers grid ------ */
div.css_bar_graph div.graph li:nth-child(odd)
	{
	width: 100%;
	height: 24px;	/* 50px including border */
	float: left;
	border-top: 1px dashed #d5d5d5;

	}
	
div.css_bar_graph div.graph li:nth-child(even)
	{
	width: 100%;
	height: 24px;	/* 50px including border */
	float: left;
	border-top: 1px dashed #d5d5d5;
	}
	
/* ------ bottom grid element ------ */
div.css_bar_graph div.graph li.bottom
	{
	border-top: 1px solid #d5d5d5;
	background-color: #eeeeee;
	height: 15px;
	box-shadow: 0px 5px 5px #888888;
	}
.abcul{
	
}
/* ==================== BARS COMMON  ==================== */
/* ------ common styles ------ */

div.css_bar_graph div.graph li.bar
	{
	width: 35px;
	float: left;
	position: absolute;
	bottom: 75px;
	text-align: center;
	/* --- css3 --- */
	/* --- transitions --- */
	-webkit-transition: all 0.15s ease-in-out;
	-moz-transition: all 0.15s ease-in-out;
	-o-transition: all 0.15s ease-in-out;
	-ms-transition: all 0.15s ease-in-out;
	transition: all 0.15s ease-in-out;
	}
	
/* ------ bar top circle ------ */
div.css_bar_graph div.graph li.bar div.top
	{
	width: 100%;
	height: 13px;
	margin-top: -5px;
	/* --- css3 --- */
	-moz-border-radius: 25px/10px;
	-webkit-border-radius: 25px 10px;
	border-radius: 25px/10px;
	/* --- transitions --- */
	-webkit-transition: all 0.15s ease-in-out;
	-moz-transition: all 0.15s ease-in-out;
	-o-transition: all 0.15s ease-in-out;
	-ms-transition: all 0.15s ease-in-out;
	transition: all 0.15s ease-in-out;
	}
	
/* ------ bar bottom circle ------ */
div.css_bar_graph div.graph li.bar div.bottom
	{
	width: 100%;
	height: 13px;
	position: absolute;
	bottom: -5px;
	left: 0px;
	/* --- css3 --- */
	-moz-border-radius: 25px/10px;
	-webkit-border-radius: 25px 10px;
	border-radius: 25px/10px;
	/* --- transitions --- */
	-webkit-transition: all 0.15s ease-in-out;
	-moz-transition: all 0.15s ease-in-out;
	-o-transition: all 0.15s ease-in-out;
	-ms-transition: all 0.15s ease-in-out;
	transition: all 0.15s ease-in-out;
	}

/* ------ bar top label ------ */
div.css_bar_graph div.graph li.bar span
	{
	visibility: hidden;	/* show label on mouse over */
	position: relative;
	top: -45px;
	padding: 3px 5px 3px 5px;
	z-index: 100;
	background-color: #eeeeee;
	border: 1px solid #bebebe;
	/* --- css3 --- */
	border-radius: 3px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	/* --- gradient --- */
	background-image: linear-gradient(top, #ffffff, #f1f1f1 1px, #ebebeb); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f1f1f1', endColorstr='#ebebeb'); /* IE5.5 - 7 */
	-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f1f1f1', endColorstr='#ebebeb'); /* IE8 */
	background: -ms-linear-gradient(top, #ffffff, #f1f1f1 1px, #ebebeb); /* IE9 */
	background: -moz-linear-gradient(top, #ffffff, #f1f1f1 1px, #ebebeb); /* Firefox */ 
	background: -o-linear-gradient(top, #ffffff, #f1f1f1 1px, #ebebeb); /* Opera 11  */
	background: -webkit-linear-gradient(top, #ffffff, #f1f1f1 1px, #ebebeb); /* Chrome 11  */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ffffff), color-stop(0.05, #f1f1f1), color-stop(1, #ebebeb)); /* Chrome 10, Safari */
	/* --- shadow --- */
	text-shadow: 0px 1px 0px rgba(255,255,255,1);
	box-shadow: 0px 1px 0px rgba(0,0,0,0.1);
	-webkit-box-shadow: 0px 1px 0px rgba(0,0,0,0.1);
	-moz-box-shadow: 0px 1px 0px rgba(0,0,0,0.1);
	/* --- transitions --- */
	-webkit-transition: all 0.15s ease-in-out;
	-moz-transition: all 0.15s ease-in-out;
	-o-transition: all 0.15s ease-in-out;
	-ms-transition: all 0.15s ease-in-out;
	transition: all 0.15s ease-in-out;
	}
	
/* ------ bars positions ------ */
div.css_bar_graph div.graph li.nr_1
	{
	left: 110px;
	height: <?php echo $_GET['height1']?$_GET['height1']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_2
	{
	left: 165px;
	height: <?php echo $_GET['height2']?$_GET['height2']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_3
	{
	left: 220px;
	height: <?php echo $_GET['height3']?$_GET['height3']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_4
	{
	left: 275px;
	height: <?php echo $_GET['height4']?$_GET['height4']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_5
	{
	left: 330px;
	height: <?php echo $_GET['height5']?$_GET['height5']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_6
	{
	left: 385px;
	height: <?php echo $_GET['height6']?$_GET['height6']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_7
	{
	left: 440px;
	height: <?php echo $_GET['height7']?$_GET['height7']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_8
	{
	left: 495px;
	height: <?php echo $_GET['height8']?$_GET['height8']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_9
	{
	left: 550px;
	height: <?php echo $_GET['height9']?$_GET['height9']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_10
	{
	left: 605px;
	height: <?php echo $_GET['height10']?$_GET['height10']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_11
	{
	left: 660px;
	height: <?php echo $_GET['height11']?$_GET['height11']:0 ."px" ?>;
	}
	
div.css_bar_graph div.graph li.nr_12
	{
	left: 715px;
	height: <?php echo $_GET['height12']?$_GET['height12']:0 ."px" ?>;
	}

/* ==================== BLUE BAR  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph li.blue
	{
	background: #208faf;	/* --- IE --- */
	background: rgba(32,143,175,0.8);
	}

/* ------ top ------ */
div.css_bar_graph div.graph li.blue div.top
	{
	background: #72b8cc;
	}
	
/* ------ bottom ------ */
div.css_bar_graph div.graph li.blue div.bottom
	{
	background: #208faf;
	}
	
/* ==================== GREEN BAR  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph li.green
	{
	background: #608d00;	/* --- IE --- */
	background: rgba(96,141,0,0.8);
	}

/* ------ top ------ */
div.css_bar_graph div.graph li.green div.top
	{
	background: #a2c656;
	}
	
/* ------ bottom ------ */
div.css_bar_graph div.graph li.green div.bottom
	{
	background: #608d00;
	}
	
/* ==================== ORANGE BAR  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph li.orange
	{
	background: #ff9000;	/* --- IE --- */
	background: rgba(255,144,0,0.8);
	}

/* ------ top ------ */
div.css_bar_graph div.graph li.orange div.top
	{
	background: #ffc24c;
	}
	
/* ------ bottom ------ */
div.css_bar_graph div.graph li.orange div.bottom
	{
	background: #ff9000;
	}
	
/* ==================== PURPLE BAR  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph li.purple
	{
	background: #7d47ba;	/* --- IE --- */
	background: rgba(125,71,186,0.8);
	}

/* ------ top ------ */
div.css_bar_graph div.graph li.purple div.top
	{
	background: #b592dd;
	}
	
/* ------ bottom ------ */
div.css_bar_graph div.graph li.purple div.bottom
	{
	background: #7d47ba;
	}
	
/* ==================== RED BAR  ==================== */
/* ------ base ------ */
div.css_bar_graph div.graph li.red
	{
	background: #d23648;	/* --- IE --- */
	background: rgba(210,54,72,0.8);
	}

/* ------ top ------ */
div.css_bar_graph div.graph li.red div.top
	{
	background: #ea828e;
	}
	
/* ------ bottom ------ */
div.css_bar_graph div.graph li.red div.bottom
	{
	background: #d23648;
	}
	
/* ==================== HOVERS  ==================== */
div.css_bar_graph div.graph li.blue:hover
	{
	cursor: pointer;
	background: #208faf;
	}
	
div.css_bar_graph div.graph li.green:hover
	{
	cursor: pointer;
	background: #608d00;
	}
	
div.css_bar_graph div.graph li.orange:hover
	{
	cursor: pointer;
	background: #ff9000;
	}
	
div.css_bar_graph div.graph li.purple:hover
	{
	cursor: pointer;
	background: #7d47ba;
	}
	
div.css_bar_graph div.graph li.red:hover
	{
	cursor: pointer;
	background: #d23648;
	}
	
div.css_bar_graph div.graph li.bar:hover span
	{
	visibility: visible;
	cursor: pointer;
	top: -55px;
	margin: 0px;
	}

