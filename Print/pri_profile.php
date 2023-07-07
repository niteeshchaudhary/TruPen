<?php
  session_start();
  $con = new mysqli('localhost', 'root', NULL, 'trupendb');
  $qryst="select * from office where username='". $_SESSION["user"]."';";
  $uimg="";
  $result = $con->query($qryst);
  if ($result && $result->num_rows > 0) {
    if($row = $result->fetch_assoc()){
      if($row["img_dir"]=="" || $row["img_dir"]==NULL){
        $uimg="../profile_pic/office/".$_SESSION["user"].".jpg";
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


		<title>TruPen - Print DashBoard</title>
        <link rel="stylesheet" href="styles.css?v=<?php echo time();?>">
		<style>/*
			@charset "UTF-8";
			@import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");
			* {
				box-sizing: border-box;
			}

			:root {
				--app-container: #f3f6fd;
				--main-color: #1f1c2e;
				--secondary-color: #4A4A4A;
				--link-color: #1f1c2e;
				--link-color-hover: #c3cff4;
				--link-color-active: #fff;
				--link-color-active-bg: #1f1c2e;
				--projects-section: #fff;
				--message-box-hover: #fafcff;
				--message-box-border: #e9ebf0;
				--more-list-bg: #fff;
				--more-list-bg-hover: #f6fbff;
				--more-list-shadow: rgba(209, 209, 209, 0.4);
				--button-bg: #1f1c24;
				--search-area-bg: #fff;
				--star: #1ff1c2e;
				--message-btn: #fff;
			}

			.dark:root {
				--app-container: #1f1d2b;
				--app-container: #111827;
				--main-color: #fff;
				--secondary-color: rgba(255,255,255,.8);
				--projects-section: #1f2937;
				--link-color: rgba(255,255,255,.8);
				--link-color-hover: rgba(195, 207, 244, 0.1);
				--link-color-active-bg: rgba(195, 207, 244, 0.2);
				--button-bg: #1f2937;
				--search-area-bg: #1f2937;
				--message-box-hover: #243244;
				--message-box-border: rgba(255,255,255,.1);
				--star: #ffd92c;
				--light-font: rgba(255,255,255,.8);
				--more-list-bg: #2f3142;
				--more-list-bg-hover: rgba(195, 207, 244, 0.1);
				--more-list-shadow: rgba(195, 207, 244, 0.1);
				--message-btn: rgba(195, 207, 244, 0.1);
			}

			html, body {
				width: 100%;
				height: 100vh;
				margin: 0;
			}

			body {
				font-family: "DM Sans", sans-serif;
				overflow: hidden;
				display: flex;
				justify-content: center;
				background-color: var(--app-container);
			}

			button, a {
				cursor: pointer;
			}

			.app-container {
				width: 100%;
				display: flex;
				flex-direction: column;
				height: 100%;
				background-color: var(--app-container);
				transition: 0.2s;
				max-width: 1800px;
			}
			.app-container button, .app-container input, .app-container optgroup, .app-container select, .app-container textarea {
				font-family: "DM Sans", sans-serif;
			}
			.app-content {
				display: flex;
				height: 100%;
				overflow: hidden;
				padding: 16px 24px 24px 0;
			}
			.app-header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				width: 100%;
				padding: 16px 24px;
				position: relative;
			}
			.app-header-left, .app-header-right {
				display: flex;
				align-items: center;
			}
			.app-header-left {
				flex-grow: 1;
			}
			.app-header-right button {
				margin-left: 10px;
			}
			.app-icon {
				width: 26px;
				height: 2px;
				border-radius: 4px;
				background-color: var(--main-color);
				position: relative;
			}
			.app-icon:before, .app-icon:after {
				content: "";
				position: absolute;
				width: 12px;
				height: 2px;
				border-radius: 4px;
				background-color: var(--main-color);
				left: 50%;
				transform: translatex(-50%);
			}
			.app-icon:before {
				top: -6px;
			}
			.app-icon:after {
				bottom: -6px;
			}
			.app-name {
				color: var(--main-color);
				margin: 0;
				font-size: 20px;
				line-height: 24px;
				font-weight: 700;
				margin: 0 32px;
			}
			.mode-switch {
				background-color: transparent;
				border: none;
				padding: 0;
				color: var(--main-color);
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.search-wrapper {
				border-radius: 20px;
				background-color: var(--search-area-bg);
				padding-right: 12px;
				height: 40px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				width: 100%;
				max-width: 480px;
				color: var(--light-font);
				box-shadow: 0 2px 6px 0 rgba(136, 148, 171, 0.2), 0 24px 20px -24px rgba(71, 82, 107, 0.1);
				overflow: hidden;
			}
			.dark .search-wrapper {
				box-shadow: none;
			}
			.search-input {
				border: none;
				flex: 1;
				outline: none;
				height: 100%;
				padding: 0 20px;
				font-size: 16px;
				background-color: var(--search-area-bg);
				color: var(--main-color);
			}
			.search-input:placeholder {
				color: var(--main-color);
				opacity: 0.6;
			}
			.add-btn {
				color: #fff;
				background-color: var(--button-bg);
				padding: 0;
				border: 0;
				border-radius: 50%;
				width: 32px;
				height: 32px;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.notification-btn {
				color: var(--main-color);
				padding: 0;
				border: 0;
				background-color: transparent;
				height: 32px;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.profile-btn {
				padding: 0;
				border: 0;
				background-color: transparent;
				display: flex;
				align-items: center;
				padding-left: 12px;
				border-left: 2px solid #ddd;
			}
			.profile-btn img {
				width: 32px;
				height: 32px;
				-o-object-fit: cover;
				object-fit: cover;
				border-radius: 50%;
				margin-right: 4px;
			}
			.profile-btn span {
				color: var(--main-color);
				font-size: 16px;
				line-height: 24px;
				font-weight: 700;
			}

			.page-content  {
				flex: 1;
				width: 100%;
			}
			.app-sidebar {
				padding: 40px 16px;
				display: flex;
				flex-direction: column;
				align-items: center;
			}
			.app-sidebar-link {
				color: var(--main-color);
				color: var(--link-color);
				margin: 16px 0;
				transition: 0.2s;
				border-radius: 50%;
				flex-shrink: 0;
				width: 40px;
				height: 40px;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			.app-sidebar-link:hover {
				background-color: var(--link-color-hover);
				color: var(--link-color-active);
			}
			.app-sidebar-link.active {
				background-color: var(--link-color-active-bg);
				color: var(--link-color-active);
			}

			.projects-section {
				flex: 2;
				background-color: var(--projects-section);
				border-radius: 32px;
				padding: 32px 32px 0 32px;
				overflow: hidden;
				height: 100%;
				display: flex;
				flex-direction: column;
			}
			.projects-section-line {
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding-bottom: 32px;
			}
			.projects-section-header {
				display: flex;
				justify-content: space-between;
				align-items: center;
				margin-bottom: 24px;
				color: var(--main-color);
			}
			.projects-section-header p {
				font-size: 24px;
				line-height: 32px;
				font-weight: 700;
				opacity: 0.9;
				margin: 0;
				color: var(--main-color);
			}
			.projects-section-header .time {
				font-size: 20px;
			}

			.projects-status {
				display: flex;
			}

			.item-status {
				display: flex;
				flex-direction: column;
				margin-right: 16px;
			}
			.item-status:not(:last-child) .status-type:after {
				content: "";
				position: absolute;
				right: 8px;
				top: 50%;
				transform: translatey(-50%);
				width: 6px;
				height: 6px;
				border-radius: 50%;
				border: 1px solid var(--secondary-color);
			}

			.status-number {
				font-size: 24px;
				line-height: 32px;
				font-weight: 700;
				color: var(--main-color);
			}

			.status-type {
				position: relative;
				padding-right: 24px;
				color: var(--secondary-color);
			}

			.view-actions {
				display: flex;
				align-items: center;
			}

			.view-btn {
				width: 36px;
				height: 36px;
				display: flex;
				justify-content: center;
				align-items: center;
				padding: 6px;
				border-radius: 4px;
				background-color: transparent;
				border: none;
				color: var(--main-color);
				margin-left: 8px;
				transition: 0.2s;
			}
			.view-btn.active {
				background-color: var(--link-color-active-bg);
				color: var(--link-color-active);
			}
			.view-btn:not(.active):hover {
				background-color: var(--link-color-hover);
				color: var(--link-color-active);
			}

			.messages-section {
				flex-shrink: 0;
				padding-bottom: 32px;
				background-color: var(--projects-section);
				margin-left: 24px;
				flex: 1;
				width: 100%;
				border-radius: 30px;
				position: relative;
				overflow: auto;
				transition: all 300ms cubic-bezier(0.19, 1, 0.56, 1);
			}
			.messages-section .messages-close {
				position: absolute;
				top: 12px;
				right: 12px;
				z-index: 3;
				border: none;
				background-color: transparent;
				color: var(--main-color);
				display: none;
			}
			.messages-section.show {
				transform: translateX(0);
				opacity: 1;
				margin-left: 0;
			}
			.messages-section .projects-section-header {
				position: sticky;
				top: 0;
				z-index: 1;
				padding: 32px 24px 0 24px;
				background-color: var(--projects-section);
			}

			.message-box {
				border-top: 1px solid var(--message-box-border);
				padding: 16px;
				display: flex;
				align-items: flex-start;
				width: 100%;
			}
			.message-box:hover {
				background-color: var(--message-box-hover);
				border-top-color: var(--link-color-hover);
			}
			.message-box:hover + .message-box {
				border-top-color: var(--link-color-hover);
			}
			.message-box img {
				border-radius: 50%;
				-o-object-fit: cover;
				object-fit: cover;
				width: 40px;
				height: 40px;
			}

			.message-header {
				display: flex;
				align-items: center;
				justify-content: space-between;
				width: 100%;
			}
			.message-header .name {
				font-size: 16px;
				line-height: 24px;
				font-weight: 700;
				color: var(--main-color);
				margin: 0;
			}

			.message-content {
				padding-left: 16px;
				width: 100%;
			}

			.star-checkbox input {
				opacity: 0;
				position: absolute;
				width: 0;
				height: 0;
			}
			.star-checkbox label {
				width: 24px;
				height: 24px;
				display: flex;
				justify-content: center;
				align-items: center;
				cursor: pointer;
			}
			.dark .star-checkbox {
				color: var(--secondary-color);
			}
			.dark .star-checkbox input:checked + label {
				color: var(--star);
			}
			.star-checkbox input:checked + label svg {
				fill: var(--star);
				transition: 0.2s;
			}

			.message-line {
				font-size: 14px;
				line-height: 20px;
				margin: 8px 0;
				color: var(--secondary-color);
				opacity: 0.7;
			}
			.message-line.time {
				text-align: right;
				margin-bottom: 0;
			}

			.project-boxes {
				margin: 0 -8px;
				overflow-y: auto;
			}
			.project-boxes.jsGridView {
				display: flex;
				flex-wrap: wrap;
			}
			.project-boxes.jsGridView .   {
				width: 33.3%;
			}
			.project-boxes.jsListView .project-box {
				display: flex;
				border-radius: 10px;
				position: relative;
			}
			.project-boxes.jsListView .project-box > * {
				margin-right: 24px;
			}
			.project-boxes.jsListView .more-wrapper {
				position: absolute;
				right: 16px;
				top: 16px;
			}
			.project-boxes.jsListView .project-box-content-header {
				order: 1;
				max-width: 120px;
			}
			.project-boxes.jsListView .project-box-header {
				order: 2;
			}
			.project-boxes.jsListView .project-box-footer {
				order: 3;
				padding-top: 0;
				flex-direction: column;
				justify-content: flex-start;
			}
			.project-boxes.jsListView .project-box-footer:after {
				display: none;
			}
			.project-boxes.jsListView .participants {
				margin-bottom: 8px;
			}
			.project-boxes.jsListView .project-box-content-header p {
				text-align: left;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.project-boxes.jsListView .project-box-header > span {
				position: absolute;
				bottom: 16px;
				left: 16px;
				font-size: 12px;
			}
			.project-boxes.jsListView .box-progress-wrapper {
				order: 3;
				flex: 1;
			}

			.project-box {
				--main-color-card: #dbf6fd;
				border-radius: 30px;
				padding: 16px;
				background-color: var(--main-color-card);
				cursor: pointer;
			}
			.project-box-header {
				display: flex;
				align-items: center;
				justify-content: space-between;
				margin-bottom: 16px;
				color: var(--main-color);
			}
			.project-box-header span {
				color: #4A4A4A;
				opacity: 0.7;
				font-size: 14px;
				line-height: 16px;
			}
			.project-box-content-header {
				text-align: center;
				margin-bottom: 16px;
			}
			.project-box-content-header p {
				margin: 0;
			}
			.   {
				padding: 8px;
				transition: 0.2s;
			}

			.project-btn-more {
				padding: 0;
				height: 14px;
				width: 24px;
				height: 24px;
				position: relative;
				background-color: transparent;
				border: none;
				flex-shrink: 0;
			}

			.more-wrapper {
				position: relative;
			}

			.box-content-header {
				font-size: 16px;
				line-height: 24px;
				font-weight: 700;
				opacity: 0.7;
			}

			.box-content-subheader {
				font-size: 14px;
				line-height: 24px;
				opacity: 0.7;
			}

			.box-progress {
				display: block;
				height: 4px;
				border-radius: 6px;
			}
			.box-progress-bar {
				width: 100%;
				height: 4px;
				border-radius: 6px;
				overflow: hidden;
				background-color: #fff;
				margin: 8px 0;
			}
			.box-progress-header {
				font-size: 14px;
				font-weight: 700;
				line-height: 16px;
				margin: 0;
			}
			.box-progress-percentage {
				text-align: right;
				margin: 0;
				font-size: 14px;
				font-weight: 700;
				line-height: 16px;
			}

			.project-box-footer {
				display: flex;
				justify-content: space-between;
				padding-top: 16px;
				position: relative;
			}
			.project-box-footer:after {
				content: "";
				position: absolute;
				background-color: rgba(255, 255, 255, 0.6);
				width: calc(100% + 32px);
				top: 0;
				left: -16px;
				height: 1px;
			}

			.participants {
				display: flex;
				align-items: center;
			}
			.participants img {
				width: 20px;
				height: 20px;
				border-radius: 50%;
				overflow: hidden;
				-o-object-fit: cover;
				object-fit: cover;
			}
			.participants img:not(:first-child) {
				margin-left: -8px;
			}
			.add-participant {
				width: 20px;
				height: 20px;
				border-radius: 50%;
				border: none;
				background-color: rgba(255, 255, 255, 0.6);
				margin-left: 6px;
				display: flex;
				justify-content: center;
				align-items: center;
				padding: 0;
			}
			.days-left {
				background-color: rgba(255, 255, 255, 0.6);
				font-size: 12px;
				border-radius: 20px;
				flex-shrink: 0;
				padding: 6px 16px;
				font-weight: 700;
			}
			.mode-switch.active .moon {
				fill: var(--main-color);
			}
			.messages-btn {
				border-radius: 4px 0 0 4px;
				position: absolute;
				right: 0;
				top: 58px;
				background-color: var(--message-btn);
				border: none;
				color: var(--main-color);
				display: flex;
				justify-content: center;
				align-items: center;
				padding: 4px;
				display: none;
			}

			@media screen and (max-width: 980px) {
				.project-boxes.jsGridView .   {
					width: 50%;
				}

				.status-number, .status-type {
					font-size: 14px;
				}

				.status-type:after {
					width: 4px;
					height: 4px;
				}

				.item-status {
					margin-right: 0;
				}
			}
			@media screen and (max-width: 880px) {
				.messages-section {
					transform: translateX(100%);
					position: absolute;
					opacity: 0;
					top: 0;
					z-index: 2;
					height: 100%;
					width: 100%;
				}
				.messages-section .messages-close {
				display: block;
				}

				.messages-btn {
				display: flex;
				}
			}
			@media screen and (max-width: 720px) {
				.app-name, .profile-btn span {
					display: none;
				}

				.add-btn, .notification-btn, .mode-switch {
					width: 20px;
					height: 20px;
				}
				.add-btn svg, .notification-btn svg, .mode-switch svg {
					width: 16px;
					height: 16px;
				}

				.app-header-right button {
					margin-left: 4px;
				}
			}
			@media screen and (max-width: 520px) {
				.projects-section {
					overflow: auto;
				}
				.project-boxes {
					overflow-y: visible;
				}
				.app-sidebar, .app-icon {
					display: none;
				}
				.app-content {
					padding: 16px 12px 24px 12px;
				}
				.status-number, .status-type {
					font-size: 10px;
				}
				.view-btn {
					width: 24px;
					height: 24px;
				}
				.app-header {
					padding: 16px 10px;
				}
				.search-input {
					max-width: 120px;
				}
				.project-boxes.jsGridView .   {
					width: 100%;
					cursor: pointer;
				}
				.projects-section {
					padding: 24px 16px 0 16px;
				}
				.profile-btn img {
					width: 24px;
					height: 24px;
				}
				.app-header {
					padding: 10px;
				}
				.projects-section-header p, .projects-section-header .time {
						font-size: 18px;
					}
				.status-type {
					padding-right: 4px;
				}
				.status-type:after {
					display: none;
				}

				.search-input {
				font-size: 14px;
				}

				.messages-btn {
				top: 48px;
				}

				.box-content-header {
					font-size: 12px;
					line-height: 16px;
				}

				.box-content-subheader {
					font-size: 12px;
					line-height: 16px;
				}

				.project-boxes.jsListView .project-box-header > span {
					font-size: 10px;
				}

				.box-progress-header {
					font-size: 12px;
				}

				.box-progress-percentage {
					font-size: 10px;
				}

				.days-left {
					font-size: 8px;
					padding: 6px 6px;
					text-align: center;
				}

				.project-boxes.jsListView .project-box > * {
					margin-right: 10px;
				}

				.project-boxes.jsListView .more-wrapper {
					right: 2px;
					top: 10px;
				}
			}*/
		</style>

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
					<img src="../Image_Components/truPen Better Logo.png" height="40" width="50" alt="i_logo"></img>
					<!--<span class="app-icon"></span>-->
					<p class="app-name">Print</p>
					  
				</div>
				<div class="app-header-right">
					 
					<button class="notification-btn" onclick="oscillate();">
						<div class="d-inline dropdown mr-3">
					      <span class="dropdown-toggle" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					      	<svg  id="rotate"xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
							<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
							<path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
							</span>
							<?php $qryst="select * from notifications where type_to='".$_SESSION["table"]."_".$_SESSION["user"]."' or type_to='".$_SESSION["table"]."_all' order by No desc;";
									$result5 = $con->query($qryst);?>
							<span style="color: var(--more-list-bg);position: absolute;width: 15px;height: 15px;top: -8px;right: -3px;background-color: red;border-radius: 50%;text-align: center;font-size: 0.625em;font-weight: 600;">  <?php  echo mysqli_num_rows($result5);?></span>
					      <div class="dropdown-menu dropdown-menu-right rounded-0 pt-0 dpp" aria-labelledby="notifications">
					        <div class="list-group" style="width:500px;">
					          <div class="lg" >
					            <!--<a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
					              <h5 class="mb-1">Real Estate Marketing Automation: 6 Simple Systems</h5>
					              <p class="mb-0">17 October 2016 | 9:32 pm</p>
					            </a>-->
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
				<a href="pri_dashboard.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>
					</a>
					<!--
					<a href="print_req.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-printer">
							<polyline points="6 9 6 2 18 2 18 9"/>
							<path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
							<rect x="6" y="14" width="12" height="8"/>
						</svg>
					</a>-->
					<a href="notif.php" class="app-sidebar-link">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
							<rect x="2" y="4" width="20" height="18" rx="2" ry="2" />
							<line x1="3" y1="4" x2="12" y2="16" />
							<line x1="12" y1="16" x2="21" y2="4" />
							<line x1="3" y1="16" x2="21" y2="16" />
						</svg>
					</a>
					<a href="pri_profile.php" class="app-sidebar-link  active">
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
						<iframe src="second_form_pri.php" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" style="height:750px;width:100%;border-radius:20px;" >
						</iframe>
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
			function gotoC(combo){
				window.location.href = "#"+combo;
			}
		</script>
<script src='../Design_Components/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'></script>
	</body>

</html>
