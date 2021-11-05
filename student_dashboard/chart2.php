<?php
  session_start();
  $con = new mysqli('localhost', 'root', NULL, 'trupendb');
  $qryst="select * from user where username='". $_SESSION["user"]."';";
  $uimg="";
  $result = $con->query($qryst);
  if ($result && $result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      if($row["img_dir"]=="" || $row["img_dir"]==NULL){
        $uimg="../profile_pic/student/user.jpg";
      }
      else{
      	$uimg="../".$row["img_dir"];
      }
  	}
  }
  if(!$_GET['sub']){
	header( "refresh:0 ; url = dashboard.php" );
  }
	$sql = "SELECT * FROM quiz where subject='".$_GET['sub']."';";
	$result = $con->query($sql) or die("Error: ". $con->error);
?>
<!DOCTYPE html>
<html lang="en" >

	<head>

		<meta charset="UTF-8">
		<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
		<meta name="apple-mobile-web-app-title" content="CodePen">

		<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />

		<link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

		<title>TruPen - Student DashBoard</title>
		<link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

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
					<img src="../Image_Components/IITDH_logo.png" height="40" width="50" alt="i_logo"></img>
					<!--<span class="app-icon"></span>-->
					<p class="app-name">Student</p>
					<div class="search-wrapper">
						<input class="search-input" type="text" placeholder="Search">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
							<defs></defs>
							<circle cx="11" cy="11" r="8"></circle>
							<path d="M21 21l-4.35-4.35"></path>
						</svg>
					</div>
				</div>
				<div class="app-header-right">
					<button class="mode-switch" title="Switch Theme">
						<svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
							<defs></defs>
							<path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
						</svg>
					</button>
					<button class="add-btn" title="Add New Project">
						<svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
							<line x1="12" y1="5" x2="12" y2="19" />
							<line x1="5" y1="12" x2="19" y2="12" />
						</svg>
					</button>
					<button class="notification-btn" onclick="oscillate();">
						<div class="d-inline dropdown mr-3">
					      <span class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      	<svg  id="rotate"xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
							<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
							<path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
							</span>
							<span style="color: var(--more-list-bg);position: absolute;width: 15px;height: 15px;top: -8px;right: -3px;background-color: red;border-radius: 50%;text-align: center;font-size: 0.625em;font-weight: 600;"> 5</span>
					      <div class="dropdown-menu dropdown-menu-right rounded-0 pt-0" aria-labelledby="notifications">
					        <div class="list-group" style="width:500px;" ">
					          <div class="lg" >
					            <!--<a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
					              <h5 class="mb-1">Real Estate Marketing Automation: 6 Simple Systems</h5>
					              <p class="mb-0">17 October 2016 | 9:32 pm</p>
					            </a>-->
					            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					              <h5 class="mb-1">How to Generate Seller Leads For $0.88 Using...</h5>
					              <p class="mb-0">3 October 2016 | 9:58 pm</p>
					            </a>
					            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					              <h5 class="mb-1">AgentFire Re-Opens For Business. New Services,...</h5>
					              <p class="mb-0">20 September 2016 | 6:28 pm</p>
					            </a>
					            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					              <h5 class="mb-1">Real Estate Blogging 101: How To Get Better...</h5>
					              <p class="mb-0">7 September 2016 | 3:03 pm</p>
					            </a>
					            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					              <h5 class="mb-1">How To Get More Listings With Strategic...</h5>
					              <p class="mb-0">16 August 2016 | 8:26 pm</p>
					            </a>
					            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					              <h5 class="mb-1">How To Find Strategic Real Estate Partners as...</h5>
					              <p class="mb-0">9 August 2016 | 6:44 pm</p>
					            </a>
					          </div> <!-- /.lg -->
					        </div> <!-- /.list group -->
					      </div> <!-- /.dropdown-menu -->
					    </div> <!-- /.dropdown -->
					</button>
					<button class="profile-btn">
						<img src='<?php echo  $uimg;?>' />
						<span><?php echo  $_SESSION["user"];?></span>
					</button>
				</div>
				<button class="messages-btn">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
						<path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
					</svg>
				</button>
			</div>
			<div class="app-content">
				<div class="app-sidebar">
					<a href="dashboard.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>
					</a>
					<a href="chart.php" class="app-sidebar-link active">
						<svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-pie-chart" viewBox="0 0 24 24">
							<defs />
							<path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
						</svg>
					</a>
					<a href="" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
							<rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
							<line x1="16" y1="2" x2="16" y2="6" />
							<line x1="8" y1="2" x2="8" y2="6" />
							<line x1="3" y1="10" x2="21" y2="10" />
						</svg>
					</a>
					<a href="print_req.php" class="app-sidebar-link">
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
					<div class="projects-section-header">
						<p><?php echo "Quizes : ".$_GET['sub']?></p>
						<p class="time"><?php echo date('F, d');?></p>
						<div class="view-actions">
							<button class="view-btn list-view" title="List View">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
									<line x1="8" y1="6" x2="21" y2="6" />
									<line x1="8" y1="12" x2="21" y2="12" />
									<line x1="8" y1="18" x2="21" y2="18" />
									<line x1="3" y1="6" x2="3.01" y2="6" />
									<line x1="3" y1="12" x2="3.01" y2="12" />
									<line x1="3" y1="18" x2="3.01" y2="18" />
								</svg>
							</button>
							<button class="view-btn grid-view active" title="Grid View">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
									<rect x="3" y="3" width="7" height="7" />
									<rect x="14" y="3" width="7" height="7" />
									<rect x="14" y="14" width="7" height="7" />
									<rect x="3" y="14" width="7" height="7" />
								</svg>
							</button>
						</div>
					</div>
					<!--<div class="projects-section-line">
						<div class="projects-status">
							<div class="item-status">
								<span class="status-number">45</span>
								<span class="status-type">In Progress</span>
							</div>
							<div class="item-status">
								<span class="status-number">24</span>
								<span class="status-type">Upcoming</span>
							</div>
							<div class="item-status">
								<span class="status-number">62</span>
								<span class="status-type">Total Projects</span>
							</div>
						</div>
					</div>-->
					<div class="project-boxes jsGridView">
						<?php 
						$colorbk=array('#fee4cb','#e9e7fd',' #4feeff','#ffd3e2','#c8f7dc','#d5deff');
						$colors=array('#ff942e','#4f3ff0','#096c86','#df3670','#34c471','#4067f9');
						$sql = "SELECT * FROM quiz where subject='".$_GET['sub']."';";
						$result = $con->query($sql) or die("Error: ". $con->error);
						if($result->num_rows > 0)
						{
							$cnt=0;
							while($row = $result->fetch_assoc())
							{
								$sql = "SELECT * FROM ".$row['subject']."_".$row['name']."_result"." WHERE user like '".$_SESSION["user"]."'";
								$result2 = $con->query($sql) or die("Error: ". $con->error);
								if($result2->num_rows > 0)
								{
									while($row2 = $result2->fetch_assoc()){
										echo '
										<div class="project-box-wrapper">
												<div class="project-box" onclick="begQa(\''.$row['name'].'\');" style="background-color: '.$colorbk[$cnt%6].';">
													<div class="project-box-header">
														<span>*Atttempted</span>
														<div class="more-wrapper">
															<button class="project-btn-more">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
																	<circle cx="12" cy="12" r="1" />
																	<circle cx="12" cy="5" r="1" />
																	<circle cx="12" cy="19" r="1" />
																</svg>
															</button>
														</div>
													</div>
													<div class="project-box-content-header">
													<form method="POST" action="chart3.php" id="myForma'.$row['name'].'">
													<input type="hidden" name="name" value="'.$row['name'].'">
													<input type="hidden" name="subject" value="'.$row["subject"].'">
													<input type="hidden" name="no" value="'.$row["no_questions"].'">
													<input type="hidden" name="total" value="'.$row["total"].'">
													</form>
														<p class="box-content-header">'.$row['name'].'</p>
														<p class="box-content-subheader">'.$row["subject"].'</p>
													</div>
													<div class="box-progress-wrapper">
														<p class="box-progress-header">* Score : '.$row2['marks']."/".$row['total'].'</p>
														<p class="box-progress-header">Submit time: '.explode(" ", $row2['time'])[1].'</p>
														<p class="box-progress-header">Submit date: '.explode(" ", $row2['time'])[0].'</p>
														<div class="box-progress-bar">
															<span class="box-progress" style="width: '.round((100*$row2['marks']/$row['total']),2).'%; background-color: '.$colors[$cnt%6].';"></span>
														</div>
														<p class="box-progress-percentage">'.round((100*$row2['marks']/$row['total']),2).'%</p>
													</div>
													<div class="project-box-footer">
														<div class="participants">
															Questions: '.$row['no_questions'].'
														</div>
														<div class="days-left" style="color: '.$colors[$cnt%6].';">
																'.$row['time_limit'].' minutes
															</div>
														</div>
												</div>
											</div>';
									}
								}
								$cnt++;
							}
						}

						?>
					</div>
				</div>
			</div>
		</div>
		<script src="oscillate.js?v=<?php echo time(); ?>"></script>
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
			function begQ(data){
				document.getElementById('myForm'+data).submit();
			}
			function begQa(data){
				document.getElementById('myForma'+data).submit();
			}
			function gotoQA(combo){
				window.location.href = "#"+combo;
			}
		</script>
<script src='../Design_Components/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>
	</body>

</html>
