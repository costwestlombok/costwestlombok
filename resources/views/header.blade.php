<header class="main-nav clearfix">
	<div class="navbar-left pull-left">
		<div class="clearfix">
			<ul class="left-branding pull-left">
				<li><span class="left-toggle-switch"><i class="icon-menu7"></i></span></li>
				<li>
					<a href="{{ route('dashboard.index') }}">
						<img class="logo-image" src="{{ asset('images/logo-light.png') }}" />
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="navbar-right pull-right">
		<div class="clearfix">
			<ul class="pull-right top-right-icons" style="padding-right: 0 !important;">
				<li class="disable">
					<a href="#" class="right-toggle-switch" style="padding: 15px; width: auto;"><span
							style="margin-top: 15px">Administrator</span></a>
				</li>
				<li>
					<a href="{{ route('logout') }}"
						onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
							class="icon-switch"></i></a>
				</li>
			</ul>
		</div>
	</div>
</header>