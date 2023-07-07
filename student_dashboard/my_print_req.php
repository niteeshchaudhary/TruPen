<?php
  session_start();
  $con = new mysqli('localhost', 'root', NULL, 'trupendb');
  $qryst="select * from user where username='". $_SESSION["user"]."';";
  $uimg="";
  $user = $_SESSION["user"];
  $result = $con->query($qryst);
  if ($result && $result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      if($row["img_dir"]=="" || $row["img_dir"]==NULL){
        $uimg="../profile_pic/student/".$_SESSION["user"].".jpg";
      }
      else{
      	$uimg=$row["img_dir"];
      }
  	}
  }
?>
<!DOCTYPE html>
<html lang="en" >

	<head>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../Chatbot/static/css/chat.css">
		<link rel = "icon" href ="../Image_Components/truPen Better Logo.png"  type = "image/x-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

		<title>TruPen - Student DashBoard</title>

		<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
		
		<style>
            @import "../Design_Components/bootstrap.min.css";
            table{
  width:100%;
  table-layout: fixed;
}
            th{
  padding: 20px 15px;
  text-align: center;
  font-weight: 500;
  font-size: 12px;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: center;
  vertical-align:middle;
  font-weight: 300;
  font-size: 12px;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}
        </style>
			<script type="text/javascript">
			function openPdf(s)
			{
				var omyFrameH = document.getElementById("myFrameholder");
				var omyFrame = document.getElementById("myFrame");
				omyFrameH.style.display="block";
				omyFrame.style.display="block";
				omyFrame.src = "../Print/"+s;
			}
			</script>
		<script>
			if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
			}
		</script>
	</head>

	<body translate="no" >
		<div class="app-container">
			<div class="app-header">
				<div class="app-header-left">
					<img src="../Image_Components/truPen Better Logo.png" height="48" width="50" alt="i_logo"></img>
					<!--<span class="app-icon"></span>-->
					<p class="app-name">Student</p>
					  
				</div>
				<div class="app-header-right">
					  
					<button class="notification-btn" onclick="oscillate();">
						<div class="d-inline dropdown mr-3">
					      <span class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      	<svg  id="rotate"xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
							<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
							<path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
							</span>
							<?php
									$qryst="select * from notifications where type_to='".$_SESSION["table"]."_".$_SESSION["user"]."' or type_to='".$_SESSION["table"]."_all' order by No desc;";
									$result5 = $con->query($qryst);?>
							<span style="color: var(--more-list-bg);position: absolute;width: 15px;height: 15px;top: -8px;right: -3px;background-color: red;border-radius: 50%;text-align: center;font-size: 0.625em;font-weight: 600;"> <?php  echo mysqli_num_rows($result5);?></span>
					      <div class="dropdown-menu dropdown-menu-right rounded-0 pt-0 dpp" aria-labelledby="notifications">
					        <div class="list-group" style="width:500px;" ">
					          <div class="lg" >
								<?php
									while($row5 = $result5->fetch_assoc())
									{
										$a = explode("_", $row5["type_to"])[0];
										$b = explode("_", $row5["type_to"])[1];
										if($a==$_SESSION["table"] && ($b==$_SESSION["user"] || $b=="all"))
										{
											echo '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
											<p class="mb-0">From '.explode("_", $row5["type_from"])[0].' '.explode("_", $row5["type_from"])[1].'</p>
											<h5>'.$row5['note'].'</h5>
											<p class="mb-0">'.$row5['time'].'</p>
										  </a>';
										}
									}
								?>
					          </div> <!-- /.lg -->
					        </div> <!-- /.list group -->
					      </div> <!-- /.dropdown-menu -->
					    </div> <!-- /.dropdown -->
					</button>
					<button class="profile-btn" style="cursor:default">
						<img src='<?php echo  $uimg;?>' />
						<span><?php echo  $_SESSION["user"];?></span>
					</button>
				</div>
				 
			</div>
			<div class="app-content">
				<div class="app-sidebar">
					<a href="dashboard.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>
					</a>
					<a href="chart.php" class="app-sidebar-link">
						<svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-pie-chart" viewBox="0 0 24 24">
							<defs />
							<path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
						</svg>
					</a>
					<a href="notif.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
						<rect x="2" y="4" width="20" height="18" rx="2" ry="2" />
							<line x1="3" y1="4" x2="12" y2="16" />
							<line x1="12" y1="16" x2="21" y2="4" />
							<line x1="3" y1="16" x2="21" y2="16" />
						</svg>
					</a>
					<a href="print_req.php" class="app-sidebar-link active">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
							<polyline points="6 9 6 2 18 2 18 9"/>
							<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
							<rect x="6" y="14" width="12" height="8"/>
						</svg>
					</a>
					<a href="student_profile.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-profile">
						<circle cx="25" cy="25" r="17" />
						<path stroke-width="1.3" d="M15.3 37.3l-1.8-.8c.5-1.2 2.1-1.9 3.8-2.7 1.7-.8 3.8-1.7 3.8-2.8v-1.5c-.6-.5-1.6-1.6-1.8-3.2-.5-.5-1.3-1.4-1.3-2.6 0-.7.3-1.3.5-1.7-.2-.8-.4-2.3-.4-3.5 0-3.9 2.7-6.5 7-6.5 1.2 0 2.7.3 3.5 1.2 1.9.4 3.5 2.6 3.5 5.3 0 1.7-.3 3.1-.5 3.8.2.3.4.8.4 1.4 0 1.3-.7 2.2-1.3 2.6-.2 1.6-1.1 2.6-1.7 3.1V31c0 .9 1.8 1.6 3.4 2.2 1.9.7 3.9 1.5 4.6 3.1l-1.9.7c-.3-.8-1.9-1.4-3.4-1.9-2.2-.8-4.7-1.7-4.7-4v-2.6l.5-.3s1.2-.8 1.2-2.4v-.7l.6-.3c.1 0 .6-.3.6-1.1 0-.2-.2-.5-.3-.6l-.4-.4.2-.5s.5-1.6.5-3.6c0-1.9-1.1-3.3-2-3.3h-.6l-.3-.5c0-.4-.7-.8-1.9-.8-3.1 0-5 1.7-5 4.5 0 1.3.5 3.5.5 3.5l.1.5-.4.5c-.1 0-.3.3-.3.7 0 .5.6 1.1.9 1.3l.4.3v.5c0 1.5 1.3 2.3 1.3 2.4l.5.3v2.6c0 2.4-2.6 3.6-5 4.6-1.1.4-2.6 1.1-2.8 1.6z"/>
						</svg>
					</a>
					<a href="../logoff.php" class="app-sidebar-link">
						<svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-logout" viewBox="0 0 24 24">
							<defs/>
							<circle cx="12" cy="13" r="10" />
							<line x1="12" y1="0" x2="12" y2="13" stroke-width="2" stroke="#f00" style="filter: drop-shadow(30px 30px 30px rgba(0, 255, 0, 1));"/>
							<!--<path xmlns="http://www.w3.org/2000/svg" d="M 7 5 C -15 28, 40 22, 17 5 S 60 10 " fill="transparent"/>-->	
						</svg>
					</a>
				</div>
				
				<div class="projects-section">
					<div class="project-boxes jsGridView">
						<div style="display:flex;flex-flow: row wrap;">
							<div style="padding:5px">
								<h3 id="head1">Pending Requests</h3>
									<table id="table1">
									<tr>
									<th>File</th>
									<th>Copies</th>
									<th>Type</th>
									<th>Comment</th>
									<th>Delete</th>
									</tr>
									<?php
									$sql = "SELECT * FROM print WHERE status LIKE '1' AND user LIKE '$user'";
									$result = $con->query($sql) or die("Error: ". $con->error);
									if($result->num_rows > 0)
									{
									while($row = $result->fetch_assoc())
									{
									?>
									<tr>
									<td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
									<td><?php echo $row['copies']; ?></td>
									<td><?php echo $row['type']; ?></td>
									<td><?php echo $row['comment']; ?></td>
									<td><a href="delete.php?id=<?php echo $row['location']; ?>">Delete</a></td>
									</tr>
									<?php
									}
									}
									?>
									</table>
							</div>
							<div style="padding:5px">
								<h3 id="head2">Accepted Requests</h3>
								<table id="table2">
								<tr>
								<th>File</th>
								<th>Copies</th>
								<th>Type</th>
								<th>Comment</th>
								</tr>
								<?php
								$sql = "SELECT * FROM print WHERE status LIKE '2' AND user LIKE '$user'";
								$result = $con->query($sql) or die("Error: ". $con->error);
								if($result->num_rows > 0)
								{
								while($row = $result->fetch_assoc())
								{
								?>
								<tr>
								<td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
								<td><?php echo $row['copies']; ?></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php echo $row['comment']; ?></td>
								</tr>
								<?php
								}
								}
								?>
								</table>
							</div>
							<div style="padding:5px">
								<h3 id="head3">Rejected Requests</h3>
								<table id="table3">
								<tr>
								<th>File</th>
								<th>Copies</th>
								<th>Type</th>
								<th>Comment</th>
								<th>Reason</th>
								</tr>
								<?php
								$sql = "SELECT * FROM print WHERE status LIKE '0' AND user LIKE '$user'";
								$result = $con->query($sql) or die("Error: ". $con->error);
								if($result->num_rows > 0)
								{
								while($row = $result->fetch_assoc())
								{
								?>
								<tr>
								<td><input type="button" value="Preview" onclick = "openPdf('<?php echo $row['location']; ?>')" /></td>
								<td><?php echo $row['copies']; ?></td>
								<td><?php echo $row['type']; ?></td>
								<td><?php echo $row['comment']; ?></td>
								<td><?php echo $row['reason']; ?></td>
								</tr>
								<?php
								}
								}
								?>
								</table>
							</div>
						</div>
						<div id="myFrameholder" style="display:none;background-color:f1f1f1;">
							<h3>Preview</h3>
								<iframe id="myFrame" style="display:none" width="1000" height="580">	
								</iframe>
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!--ChatBot Code-->
		<div class="chat-bar-collapsible">
                    <button id="chat-button" type="button" class="collapsible" onclick="toggle(1);">Chat with Tru-Bot !
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
            <div style="display:inline-block;margin-left:25%" id="rotation"><font color='black'>&#9650;</font> &#9660;</div>
        </button>

                    <div class="content">
                        <div class="full-chat-block">
                            <!-- Message Container -->
                            <div class="outer-container">
                                <div class="chat-container">
                                    <!-- Messages -->
                                    <div id="chatbox">
                                        <h5 id="chat-timestamp"></h5>
                                        <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                                    </div>

                                    <!-- User input box -->
                                    <div class="chat-bar-input-block">
                                        <div id="userInput">
                                            <input id="textInput" autocomplete="off" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message">
                                            <p></p>
                                        </div>

                                        <div class="chat-bar-icons">
                                            <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart" onclick="heartButton()"></i>
                                            <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
                                        </div>
                                    </div>

                                    <div id="chat-bar-bottom">
                                        <p></p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <script src='../Design_Components/jquery.min.js?v=<?php echo time(); ?>'></script>
            <script src="../Chatbot/static/scripts/responses.js?v=<?php echo time(); ?>"></script>
            <script src="../Chatbot/static/scripts/chat.js?v=<?php echo time(); ?>"></script>
			<script src="oscillate.js?v=<?php echo time(); ?>"></script>
            <script>
                var i = 0;

                function toggle(n) {
                    i += n;
                    var y = document.getElementById("rotation");
                    if (i % 2 != 0) {
                        y.innerHTML = "&#9650; <font color='black'> &#9660;</font>";
                    } else {
                        y.innerHTML = "<font color='black'>&#9650;</font> &#9660;";
                    }
                }
				var x1 = document.getElementById("table1");
                x1.classList.add("table")
                x1.classList.add("table-dark");
				var x2 = document.getElementById("table2");
                x2.classList.add("table")
                x2.classList.add("table-dark");
				var x3 = document.getElementById("table3");
                x3.classList.add("table")
                x3.classList.add("table-dark");
				var y1 = document.getElementById("head1");
				var y2 = document.getElementById("head2");
				var y3 = document.getElementById("head3");
                var n=0;
                function tableui(i){
                    n+=i;
                    if(n%2!=0){
                        x1.classList.remove("table-dark");
                        x1.classList.add("table-light");
						x2.classList.remove("table-dark");
                        x2.classList.add("table-light");
						x3.classList.remove("table-dark");
                        x3.classList.add("table-light");
						y1.innerHTML ="<h3 style='color:white'>Pending Requests</h3>";
						y2.innerHTML ="<h3 style='color:white'>Accepted Requests</h3>";
						y3.innerHTML ="<h3 style='color:white'>Rejected Requests</h3>";
                    }
                    else{
                        x1.classList.remove("table-light");
                        x1.classList.add("table-dark");
						x2.classList.remove("table-light");
                        x2.classList.add("table-dark");
						x3.classList.remove("table-light");
                        x3.classList.add("table-dark");
						y1.innerHTML ="<h3 style='color:black'>Pending Requests</h3>";
						y2.innerHTML ="<h3 style='color:black'>Accepted Requests</h3>";
						y3.innerHTML ="<h3 style='color:black'>Rejected Requests</h3>";
                    }
                }
            </script>
            <!--ChatBot Code-->
		<script id="rendered-js" >
			document.addEventListener('DOMContentLoaded', function () {
				var modeSwitch = document.querySelector('.mode-switch');

				modeSwitch.addEventListener('click', function () {
					document.documentElement.classList.toggle('dark');
					modeSwitch.classList.toggle('active');
				});

				var listView = document.querySelector('.list-view');
				var gridView = document.querySelector('.grid-view');
				var projectsList = document.querySelector('.project-boxes');

				listView.addEventListener('click', function () {
					gridView.classList.remove('active');
					listView.classList.add('active');
					projectsList.classList.remove('jsGridView');
					projectsList.classList.add('jsListView');
				});

				gridView.addEventListener('click', function () {
					gridView.classList.add('active');
					listView.classList.remove('active');
					projectsList.classList.remove('jsListView');
					projectsList.classList.add('jsGridView');
				});

				document.querySelector('.messages-btn').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.add('show');
				});

				document.querySelector('.messages-close').addEventListener('click', function () {
					document.querySelector('.messages-section').classList.remove('show');
				});
			});
			function gotop_req(combo){
				window.location.href = "p_req.php";
			}
		</script>
<script src='../Design_Components/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>
	</body>

</html>
