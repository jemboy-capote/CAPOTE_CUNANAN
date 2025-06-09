<?php
include_once 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include_once '../../configuration/header3.php';
    ?>
	<title>Settings</title>
</head>
<body>

<!-- Loader -->
<div class="loader"></div>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="" class="brand">
		<span class="text">MAGRENT</span>

		</a>
		<ul class="side-menu top">
			<li>
				<a href="./">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="user">
					<i class='bx bxs-user-plus'></i>
					<span class="text">User Account</span>
				</a>
			</li>
			<li>
				<a href="pending-user">
					<i class='bx bxs-user-account'></i>
					<span class="text">Pending User</span>
				</a>
			</li>
			<li>
				<a href="package">
					<i class='bx bxs-package' ></i>
					<span class="text">Package</span>
				</a>
			</li>
			<li>
				<a href="payment?status=?">
					<i class='bx bxs-credit-card'></i>
					<span class="text">Payment</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu top">
			<li class="active">
				<a href="settings">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="audit-trail">
					<i class='bx bxl-blogger'></i>
					<span class="text">Audit Trail</span>
				</a>
			</li>
			<li>
				<a href="authentication/admin-signout" class="btn-signout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Signout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<div class="username">
                <span>Hello, <label for=""><?php echo $user_fname ?></label></span>
            </div>
			<a href="profile" class="profile" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Profile">
				<img src="../../src/images/profile/<?php echo $user_profile ?>">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Settings</h1>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="./">Home</a>
						</li>
						<li>|</li>
						<li>
							<a href="">Settings</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3><i class='bx bxs-cog' ></i> Configuration</h3>
					</div>
                    <!-- BODY -->
					<section class="data-form">
						<div class="header"></div>
						<div class="registration">
							<form action="controller/system-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
								<div class="row gx-5 needs-validation">

								<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> System Configuration <p>Last update: <?php  echo $config->getSystemConfigLastUpdate()  ?></p></label>

									<div class="col-md-6">
										<label for="sname" class="form-label">System Name<span> *</span></label>
										<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="system_name" id="sname" required value="<?php  echo $config->getSystemName()  ?>">
										<div class="invalid-feedback">
										Please provide a System Name.
										</div>
									</div>

									<div class="col-md-6">
										<label for="cright" class="form-label">System Copyright<span> *</span></label>
										<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="system_copy_right" id="cright" required value="<?php  echo $config->getSystemCopyright() ?>">
										<div class="invalid-feedback">
										Please provide a System Copyright.
										</div>
									</div>

									<div class="col-md-6" >
										<label for="phone_number" class="form-label">Default Phone Number<span> *</span></label>
										<div class="input-group flex-nowrap">
										<span class="input-group-text" id="addon-wrapping">+63</span>
										<input type="text" class="form-control numbers"  autocapitalize="off" inputmode="numeric" autocomplete="off" name="system_phone_number" id="phone_number" minlength="10" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required value="<?php  echo $config->getSystemNumber()  ?>">
										</div>
									</div>

									<div class="col-md-6">
										<label for="email" class="form-label">Default Email<span> *</span></label>
										<input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="system_email" id="email" required value="<?php  echo $config->getSystemEmail()  ?>">
										<div class="invalid-feedback">
										Please provide a valid Email.
										</div>
									</div>

								</div>

								<div class="addBtn">
									<button type="submit" class="btn-dark" name="btn-update-system" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
								</div>
							</form>
						</div>
					</section>
					
					<!-- System Logo  -->

					<section class="data-form">
						<div class="header"></div>
						<div class="registration">
							<form action="controller/system-controller.php" method="POST" enctype="multipart/form-data" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
								<div class="row gx-5 needs-validation">

									<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Logo Configuration <p>Last update: <?php  echo $config->getSystemConfigLastUpdate()  ?></p></label>

									<div class="col-md-12">
										<label for="logo" class="form-label">Upload Logo<span> *</span></label>
										<input type="file" class="form-control" name="system_logo" id="logo" style="height: 33px ;" required  onchange="previewImage(event)">
										<div class="invalid-feedback">
										Please provide a Logo.
										</div>
									</div>

									<div class="col-md-12">
										<label for="event_poster" class="form-label">Preview</label>
										<img id="poster-preview" style="max-width: 50%; margin-top: 10px; display: none;">
									</div>

								</div>

								<div class="addBtn" style="padding-top: 2rem;">
									<button type="submit" class="btn-dark" name="btn-update-logo" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
								</div>
							</form>
						</div>
					</section>

					<!-- SMTP MAILER -->

					<section class="data-form">
						<div class="header"></div>
						<div class="registration">
							<form action="controller/system-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
								<div class="row gx-5 needs-validation">

								<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> SMTP Email Configuration <p>Last update: <?php  echo $config->getEmailConfigLastUpdate()  ?></p></label>

									<div class="col-md-6">
										<label for="email" class="form-label">Email<span> *</span></label>
										<input type="email" class="form-control" autocapitalize="off" autocomplete="off" name="email" id="email" required placeholder = "<?php  echo $config->getSmtpEmail()  ?>">
										<div class="invalid-feedback">
										Please provide a valid Email.
										</div>
									</div>

									<div class="col-md-6">
										<label for="Gpassword" class="form-label">Generated Password<span> *</span></label>
										<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="password" id="Gpassword" required placeholder ="<?php  echo $config->getSmtpPassword()  ?>">
										<div class="invalid-feedback">
										Please provide a Generated Password.
										</div>
									</div>

								</div>

								<div class="addBtn">
									<button type="submit" class="btn-dark" name="btn-update-smtp" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
								</div>
							</form>
						</div>
					</section>

					<!-- Google reCAPTCHA V3  -->

					<section class="data-form">
						<div class="header"></div>
						<div class="registration">
							<form action="controller/system-controller.php" method="POST" class="row gx-5 needs-validation" name="form" onsubmit="return validate()"  novalidate style="overflow: hidden;">
								<div class="row gx-5 needs-validation">

								<label class="form-label" style="text-align: left; padding-top: .5rem; padding-bottom: 2rem; font-size: 1rem; font-weight: bold;"><i class='bx bxs-edit'></i> Google reCAPTCHA API Configuration <p>Last update: <?php  echo $config->getGoogleRecaptchaApiLastUpdate()  ?></p></label>

								<div class="col-md-6">
										<label for="Skey" class="form-label">Site Key<span> *</span></label>
										<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="site_key" id="site_key" required placeholder ="<?php  echo $config->getSKey()  ?>">
										<div class="invalid-feedback">
										Please provide a Site Key.
										</div>
								</div>

								<div class="col-md-6">
									<label for="Sskey" class="form-label">Site Secret Key<span> *</span></label>
									<input type="text" class="form-control" autocapitalize="on" autocomplete="off" name="site_secret_key" id="site_secret_key" required placeholder ="<?php  echo $config->getSSKey()  ?>">
									<div class="invalid-feedback">
									Please provide a Site Secret Key.
									</div>
								</div>

								</div>

								<div class="addBtn">
									<button type="submit" class="btn-dark" name="btn-update-recaptcha" id="btn-update" onclick="return IsEmpty(); sexEmpty();">Update</button>
								</div>
							</form>
						</div>
					</section>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<?php
    include_once '../../configuration/footer3.php';
    ?>
    <?php include_once '../../configuration/sweetalert.php'; ?>

</body>
</html>