<?php
session_start(); 
date_default_timezone_set('Asia/Kolkata');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trupendb";
$uimg=$_SESSION["uimg"];
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT time, time_limit FROM quiz WHERE name = '".$_POST["quiz_name"]."' AND subject = '".$_POST["quiz_subject"]."'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc())
{
	$to_time = strtotime(implode(" ", explode("T", $row["time"])));
	$time_limit = $row["time_limit"];
	$from_time = strtotime(date('Y-m-d H:i:s'));
	$t = $from_time - $to_time;
}
if($t<0)
{
	header("location:javascript://history.go(-1)");
	exit();
}
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$_SESSION["quiz_name"] = $_POST["quiz_name"];
$_SESSION["quiz_subject"] = $_POST["quiz_subject"];
$qryst="select * from ".$_SESSION["quiz_subject"].'_'.$_SESSION["quiz_name"];
     $result = $conn->query($qryst);
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


		<title>TruPen - Student DashBoard</title>

		<style>
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
			.project-boxes.jsGridView .project-box-wrapper {
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
			.project-box-wrapper {
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
				.project-boxes.jsGridView .project-box-wrapper {
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
				.project-boxes.jsGridView .project-box-wrapper {
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
			}
		</style>
<style>
  * {box-sizing: border-box}
      body {
        font-family: Verdana, sans-serif; margin:0;
        background: #f4ffff;
      }
      .mySlides {
        display: none;
        height: 500px;
      }
      .main-container {
        display:flex;
        /*flex-flow: row wrap;*/
        padding: 20px;
        margin: 0px;
        margin-left: 100px;
        height:80%;
        max-width:1300px;
      }
      /* Slideshow container */
      .slideshow-container {
        float: left;
        max-width: 700px;
        min-width: 600px;
        max-height: 500px;
        min-height: 400px;
      }
      .slideshow-container form {
        max-width: 700px;
        min-width: 600px;
        max-height: 500px;
        min-height: 400px;
      }
      .slideshow-container .navstp{
        display: inline-block;
        padding: 3px;
        background-color: #f1f1f1;
        width:100%;
        height:63px;
      }
      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        background-color: rgba(0,0,0,0.1);
        margin-left: 5px;
        margin-right: 5px;
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 10%;
        user-select: none;
      }
      .first{
        cursor: pointer;
        float: left;
        background-color: rgba(100,0,0,0.5);
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 10%;
        user-select: none;
      }
      .last {
        cursor: pointer;
        float: right;
        background-color: rgba(0,100,0,0.5);
        width: auto;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 10%;
        user-select: none;
      }
      /* Position the "next button" to the right */
      .next {
        float: right;
      }
      .prev {
        float: left;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        border: 2px solid rgba(200,250,250,0.8);
      }
      .first:hover{
        background-color: rgba(100,0,0,0.8);
        border: 2px solid rgba(200,150,200,0.8);
      }
      .last:hover {
        background-color: rgba(0,100,0,0.8);
        border: 2px solid rgba(200,150,200,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        background-color: rgba(0,0,0,0.6);
        font-size: 15px;
        padding: 8px 12px;
        position: relative;
        bottom: -70px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        background-color: rgba(0,0,0,0.4);
        font-size: 12px;
        padding: 8px 12px;
        text-align: center;
        margin-left:85%;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }

      .quiz-container{
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
        width: 100%;
        height: 100%;
        overflow: hidden;
      }
      .quiz-header{
        padding: 4rem;
      }
      h2{
        padding: 1rem;
        margin: 0;
      }

      ul{
        list-style-type: none;
        padding: 0;
      }
      ul li{
        font-size: 1.2rem;
        margin: 1.3rem 1rem;
      }
      ul li label{
        cursor: pointer;
      }

      .container {
          position: relative;
          padding: 50px;
          width: 260px;
          min-height: 30px;
          display: flex;
          justify-content: center;
          align-items: center;
          background: rgba(255, 255, 255, 0.2);
          backdrop-filter: blur(5px);
          border-radius: 10px;
          box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
      }

      .openbtn1 {
        font-size: 20px;
        cursor: pointer;
        background-color: #111;
        color: white;
        padding: 10px 15px;
        border: none;
      }

      .openbtn1:hover {
        background-color:#444;
      }

      .circlestyle{
        border:none;
        background-color:cyan;
        box-shadow: 10px;
        border-radius: 50%;
        padding:5px;
      }
      .exitit{
        background-color: #455d80;
          border: none;
          color: white;
          padding: 10px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
      }
      .exitit:hover {
          background-color: #2a384d;
          border: none;
          color: white;
          padding: 10px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
      }


      .navboxd {
			  display: block;
        float: right;
			  height: 90%;
			  width: 275px;
			  align-content: center;
			  background-color: rgba(235,235,235,0.13);
			  border-radius: 10px;
			  backdrop-filter: blur(10px);
			  border: 2px solid rgba(255,255,255,0.1);
			  box-shadow: 0 0 40px rgba(8,7,16,0.6);
			}
			.flexbox {
			  display: flex;
			  padding-left: 5px;
			  padding-right: 5px;
        margin: 5px;
			  flex-flow: row wrap;
			  width: 260px; /* 4 items * item width(100+5+5) = 440 */
			  background-color: rgba(235,235,235,0.13);
			  border-radius: 10px;
			  backdrop-filter: blur(10px);
			  border: 2px solid rgba(255,255,255,0.1);
			  box-shadow: 0 0 40px rgba(8,7,16,0.6);
			}

			.flexbox .flex-item {
			  padding: 5px;
			  margin: 5px;
			  width: 45px;
        cursor: pointer;
			  height: 45px;
			  align-content: center;
			  vertical-align: center;
			  border-radius: 35% 60%;
			  background-color:  #999999;
			}
      .flexbox .act {
			  /*background-color: #999999;*/
        border-radius: 25%;
        color: #0000ff;
        font-size:22px;
        border-color:#ffffff;
			}
      .flexbox .flex-item .act{
			  display: block;
			  padding: 0 auto;
			  margin: 0 auto;
        height:32px;
			  border-color: black;
        font-size:18px;
        border-radius: 25%;
			  background: #555;
			  box-shadow: 5px;
			  text-align: center;
        justify-content: center;
			}
      .flexbox .lft {
			  display: block;
			  padding: 5px;
			  margin: 5px;
			  border-color:#ff00af;
			  background-color: #da0000;
			  box-shadow: 5px;
			  text-align: center;
			}

      .flexbox .atm {
			  display: block;
			  padding: 5px;
			  margin: 5px;
			  border-color:#00ff00;
			  background-color: #00da00;
			  box-shadow: 5px;
			  text-align: center;
			}
			.flexbox .flex-item .con {
			  display: block;
			  padding: 5px;
			  margin: 5px;
        height: 25px;
			  border-radius: 50%;
			  border-color: black;
			  background-color: #fff;
			  box-shadow: 5px;
			  text-align: center;
			}
			.flexbox .flex-item-rev .con {
			  display: block;
			  padding: 5px;
			  margin: 5px;
			  border-radius: 50%;
			  border-color: black;
			  background-color: #fff;
			  box-shadow: 5px;
			  text-align: center;
			}
			.flexbox .flex-item-attempt .con {
			  display: block;
			  padding: 5px;
			  margin: 5px;
			  border-radius: 50%;
			  border-color: black;
			  background-color: #fff;
			  box-shadow: 5px;
			  text-align: center;
			}
			.flexbox .flex-item-leftb .con {
			  display: block;
			  padding: 5px;
			  margin: 5px;
			  border-radius: 50%;
			  border-color: black;
			  background-color: #ff0000;
			  box-shadow: 5px;
			  text-align: center;
			}
      .flexbox .flex-item-rev {
			  padding: 5px;
			  margin: 5px;
			  width: 45px;
			  height: 45px;
			  align-content: center;
			  vertical-align: center;
			  border-radius: 50%;
			  background-color: #aa00aa;
			}
			.flexbox .flex-item-leftb {
			  padding: 5px;
			  margin: 5px;
			  width: 45px;
			  height: 45px;
			  align-content: center;
			  vertical-align: center;
			  border-radius: 50%;
			  background-color: #a00;
			}
			.flexbox .flex-item-attempt {
			  padding: 5px;
			  margin: 5px;
			  width: 45px;
			  height: 35px;
			  align-content: center;
			  vertical-align: center;
			  border-radius: 50%;
			  background-color: #0f0;
			}
      
			.head {
			  padding: 5px;
			  margin: 5px;
			  text-align: center;
			  background-color: rgba(235,235,235,0.13);
			  border-radius: 10px;
			  backdrop-filter: blur(10px);
			  border: 2px solid rgba(255,255,255,0.1);
			  box-shadow: 0 0 40px rgba(8,7,16,0.6);
			}
			.botm{
				  padding: 5px;
			    margin: 5px;
          position: absolute;
          bottom: 0;
          width:96%;
			    text-align: center;
			    background-color: rgba(0,0,255,0.23);
			    border-radius: 10px;
			    backdrop-filter: blur(10px);
			    border: 2px solid rgba(255,255,255,0.1);
			    box-shadow: 0 0 40px rgba(8,7,16,0.6);
          background-color: #03cae4;
			}
			.botm .btn { 
			  border-radius: 5px;
			  border: 4px solid rgba(255,255,255,0.2);
        color: #fff;
        border: none;
        display:inline-flex;
        width: 100%;
        font-size: 1 rem;
        font-family: sans-serif;
        padding: 1rem;
        background-color: rgba(20,25,235,0.13);
    }
    .btn:hover {
      border: 4px solid rgba(255,255,255,0.8);
      background-color: rgba(200,25,25,0.4);
    }

    .btn:focus {
      outline: none;
      background-color: rgba(200,250,235,0.13);
  }
  .timer-container {
			  display: block;
        float: right;
			  width: 275px;
			  align-content: center;
			  background-color: rgba(235,235,235,0);
			  border-radius: 10px;
			  backdrop-filter: blur(10px);
			  border: 1px solid rgba(255,255,255,0);
			  box-shadow: 0 0 40px rgba(8,7,16,0);
  }
  .base-timer {
        position: relative;
        width: 100px;
        height: 100px;
    }
    
    .base-timer__svg {
        transform: scaleX(-1);
    }
    
    .base-timer__circle {
        fill: none;
        stroke: none;
    }
    
    .base-timer__path-elapsed {
        stroke-width: 7px;
        stroke: grey;
    }
    
    .base-timer__path-remaining {
        stroke-width: 7px;
        stroke-linecap: round;
        transform: rotate(90deg);
        transform-origin: center;
        transition: 1s linear all;
        fill-rule: nonzero;
        stroke: currentColor;
    }
    
    .base-timer__path-remaining.green {
        color: rgb(65, 184, 131);
    }
    
    .base-timer__path-remaining.orange {
        color: orange;
    }
    
    .base-timer__path-remaining.red {
        color: red;
    }
    
    .base-timer__label {
        position: absolute;
        width: 100px;
        height: 100px;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 25px;
    }
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
						<svg id="rotate" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
							<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
							<path d="M13.73 21a2 2 0 0 1-3.46 0" />
						</svg>
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
				<a href="dashboard.php" class="app-sidebar-link active">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
							<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
							<polyline points="9 22 9 12 15 12 15 22" />
						</svg>
					</a>
				</div>
				<div class="projects-section">
					<div class="projects-section-header">
					</div>
						<div class="project-boxes jsGridView">
							<div class="main-container">
								<div class="slideshow-container">
									<form method="post" action="evaluation.php" id="myform">
											<?php
												$x=0;
												if ($result && $result->num_rows > 0) {
												global $x;
												for ($x = 0;$row = $result->fetch_assoc(); $x++) {
													echo '<div class="mySlides fade" id="'.$x.'">
															<div class="quiz-container" id="quiz">
															<div class="quiz-header">
																<div class="numbertext">'.($x+1).' /'.$result->num_rows.'</div>
																<h2>'.$row["question"].'</h2>
																<ul>
																<li><input type="radio" name="answer'.$x.'" id="a" onclick="check_select()" class="answer" value="a_'.$x.'"><label for="a" id="a_text">'.$row["option_a"].'</label></li>
																<li><input type="radio" name="answer'.$x.'" id="b" onclick="check_select()" class="answer" value="b_'.$x.'"><label for="b" id="b_text">'.$row["option_b"].'</label></li>
																<li><input type="radio" name="answer'.$x.'" id="c" onclick="check_select()" class="answer" value="c_'.$x.'"><label for="c" id="c_text">'.$row["option_c"].'</label></li>
																<li><input type="radio" name="answer'.$x.'" id="d" onclick="check_select()" class="answer" value="d_'.$x.'"><label for="d" id="d_text">'.$row["option_d"].'</label></li>
																</ul>
															</div>
															</div>
														</div>';
												}
												}
											?>
									<button type="submit" id="s">Submit</button>
									<a class="next" onclick="plusSlides(1)">Next</a>
									</form>
									<br>
									<br>
									<br>
									<div class="navstp">
									<a  class="prev" onclick="plusSlides(-1)">&#10094;</a>
									<a class="first" onclick="firstSlide()">&#10094;&#10094;</a>
									<a class="next" onclick="plusSlides(1)">&#10095;</a>
									<a class="last" onclick="lastSlide()">&#10095;&#10095;</a>
									</div>
								</div>
							
									
							</div>
						</div>
					
				</div>
				<div class="messages-section">
							<button class="messages-close">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
									<circle cx="12" cy="12" r="10" />
									<line x1="15" y1="9" x2="9" y2="15" />
									<line x1="9" y1="9" x2="15" y2="15" />
								</svg>
							</button>
							<div class="projects-section-header">
								<?php
									echo'
									<div class="timer-container" style="margin-right: 10pt;">
										<p id="app"></p>
									</div>'
								?>
							</div>
							<div class="messages">
							<?php
									echo'
									<div class="navboxd">
										<h3 class="head">Quiz Navigation</h3>
										<hr noshade="2">
										<div class="flexbox">';
										//echo"<a style='color:#f1f1f1'>QUESTIONS</a>";
										for($i=1;$i<=$x;$i++){
											$i1=$i-1;
											//echo '<a onclick="currentSlide('.$i1.')">'.$i.'</a>';
											echo'<div class="flex-item">
													<a onclick="currentSlide('.$i1.')">
													<h6 class="con">'.$i.'</h6></a>
												</div>';
										}
										echo '</div>
										<form action="../loggedin.php">
												<center><input type="submit" value="Exit Quiz" class="exitit"></center>
											</form>
									</div>';
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
			function gotoC(combo){
				window.location.href = "#"+combo;
			}
		</script>
		 <?php
              $max = max(60*$time_limit-$t, 0);
                echo "
                <script> let TIME_LIMIT =$max;
                  let TL =$t;  
                </script>";
              ?>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function firstSlide() {
  showSlides(slideIndex =1);
}

function lastSlide() {
  showSlides(slideIndex =-200);
}

function currentSlide(n) {
  showSlides(slideIndex = n+1);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("flex-item");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  check_select();
  for (i = 0; i < dots.length; i++) {
    if(dots[i].className.includes(" act") && !dots[i].className.includes(" lft") && !dots[i].className.includes(" atm")){
      dots[i].className += " lft"; //dots[i].className.replace(" act", "");
    }
      dots[i].className = dots[i].className.replace(" act", "");
  }
  slides[slideIndex-1].style.display = "block";  
  if(dots[slideIndex-1].className.includes(" lft")){
      dots[slideIndex-1].className.replace(" lft", "");
  }
  dots[slideIndex-1].className += " act";
}
function check_select() { 
            let k='input[name= "answer'+String(slideIndex-1)+'"]:checked';
            var checkRadio = document.querySelector(k);
            var dots = document.getElementsByClassName("flex-item");
            if(checkRadio != null) {
              if(dots[slideIndex-1].className.includes(" lft")){
                dots[slideIndex-1].className = dots[slideIndex-1].className.replace(" lft", "");
              }
              if(!dots[slideIndex-1].className.includes(" atm")){
                dots[slideIndex-1].className += " atm";
              }
            }
            else {

            }
            
        }
function toggle() {
                var x = document.getElementById("mySidePanel");
                var y = document.getElementById("rotation");
                if (x.style.width === "250px") {
                    y.classList.add("rotation");
                    closeNav();
                } else {
                    y.classList.add("rotation");
                    openNav();
                }
                setTimeout(() => {
                    y.classList.remove("rotation");
                }, 1050);
            }

            function openNav() {
                document.getElementById("mySidePanel").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidePanel").style.width = "0";
            }
  // code for timer :
    const FULL_DASH_ARRAY = 283;
        const WARNING_THRESHOLD = 30;
        const ALERT_THRESHOLD = 10;

        const COLOR_CODES = {
            info: {
                color: "green"
            },
            warning: {
                color: "orange",
                threshold: WARNING_THRESHOLD
            },
            alert: {
                color: "red",
                threshold: ALERT_THRESHOLD
            }
        };
        //const TIME_LIMIT = 100;
        //TIME_LIMIT = window.sessionStorage.getItem("Time");
        let timePassed = 0;
        let timeLeft = TIME_LIMIT;
        let timerInterval = null;
        let remainingPathColor = COLOR_CODES.info.color;

        document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        stroke-dashoffset="0"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(timeLeft)}</span>
</div>
`;

        startTimer();

        function onTimesUp() {
            clearInterval(timerInterval);
        }

        function startTimer() {
            timerInterval = setInterval(() => {
                timePassed = timePassed += 1;
                timeLeft = TIME_LIMIT - timePassed;
                //window.sessionStorage.setItem("time",timeLeft);
                document.getElementById("base-timer-label").innerHTML = formatTime(
                    timeLeft
                );
                setCircleDasharray();
                setRemainingPathColor(timeLeft);

                if (timeLeft <= 0) {
                    onTimesUp();
                    location.reload();
                    document.getElementById("myform").submit();
                    //window.sessionStorage.setItem("time",0);
                    return ;
                }
            }, 1000);
        }
        function formatTime(time) {
            const minutes = Math.floor(time / 60);
            let seconds = time % 60;

            if (seconds < 10) {
                seconds = `0${seconds}`;
            }

            return `${minutes}:${seconds}`;
        }

        function setRemainingPathColor(timeLeft) {
            const {
                alert,
                warning,
                info
            } = COLOR_CODES;
            if (timeLeft <= alert.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(warning.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(alert.color);
            } else if (timeLeft <= warning.threshold) {
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.remove(info.color);
                document
                    .getElementById("base-timer-path-remaining")
                    .classList.add(warning.color);
            }
        }

        function calculateTimeFraction() {
            const rawTimeFraction = timeLeft / TIME_LIMIT;
           // return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
          return rawTimeFraction;
        }

        function setCircleDasharray() {
            //const circleDasharray = `${(calculateTimeFraction() * FULL_DASH_ARRAY).toFixed(0)} 360`;
            const circleDasharray = ((TIME_LIMIT-timeLeft)/TIME_LIMIT*283).toString();;
            document.getElementById("base-timer-path-remaining").setAttribute("stroke-dashoffset", circleDasharray);
        }
</script>
<script type="text/javascript">
function forcesubmit() {
  document.getElementById("myform").submit();
}
</script>
	</body>

</html>
