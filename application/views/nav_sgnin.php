<div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<p class="navbar-brand">Test App</p>
			</div>
			<ul class="nav navbar-nav navbar-left">
				<li><a href="/dashboard/admin">Dashboard</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-left">
				<li><a href="profile<?= $this->session->userdata('user_id') ?>">Profile</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/logoff">Log Off</a></li>
			</ul>
		</div>
	</nav>
</div>
