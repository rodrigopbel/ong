<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>


			  {{---------------------------------------Dashboard-------------------------------}}
				<li class="start {{ $dashboardActive or ''}}">
					<a href="{{URL::to('admin')}}">
					<i class="fa fa-home"></i>
					<span class="title">{{Lang::get('menu.dashboard')}}</span>
					<span class="selected"></span>
					</a>
				</li>
			     {{---------------------------------------/Dashboard-------------------------------}}


		      {{---------------------------------------Beneficiarios-------------------------------}}
				<li class="{{ $beneficiariosOpen or ''}}">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">{{Lang::get('menu.employees')}}</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ $beneficiariosActive or ''}}">
							<a href="{{route('admin.beneficairios.index')}}">
							<i class="fa fa-users"></i>
							{{Lang::get('menu.beneficiariosList')}}</a>
						</li>

						
					</ul>
				</li>
              {{---------------------------------------/-------------------------------}}


              {{---------------------------------------Destinos-------------------------------}}
				    <li class="{{ $destinosOpen or ''}}">
                					<a href="javascript:;">
                					<i class="fa fa-briefcase"></i>
                					<span class="title">{{Lang::get('menu.destinos')}}</span>
                					<span class="arrow "></span>
                					</a>
                					<ul class="sub-menu">
                						<li class="{{ $destinosActive or ''}}">
                							<a href="{{route('admin.destinos.index')}}">
                							<i class="fa fa-briefcase"></i>
                							{{Lang::get('menu.destinosList')}} </a>
                						</li>


                					</ul>
                    </li>
              {{----------------------------------------------------------------------}}


                  {{---------------------------------------Settings-------------------------------}}
                      <li class="{{ $settingOpen or ''}}">
                                 <a href="javascript:;">
                                 <i class="fa fa-cogs"></i>
                                 <span class="title">{{Lang::get('menu.settings')}}</span>
                                 <span class="arrow "></span>
                                 </a>
                                 <ul class="sub-menu">
                                     <li class="{{ $settingActive or ''}}">
                                         <a href="{{route('admin.settings.edit','setting')}}">
                                         <i class="fa  fa-cog"></i>
                                        {{Lang::get('menu.generalSetting')}}</a>
                                     </li>

                                     <li class="{{ $profileSettingActive or ''}}">
                                            <a href="{{route('admin.profile_settings.edit',Auth::admin()->get()->id)}}">
                                            <i class="fa fa-user"></i>
                                            {{Lang::get('menu.profileSetting')}}</a>
                                      </li>
                                     <li class="{{ $notificationSettingActive or ''}}">
                                         <a href="{{route('admin.notificationSettings.edit',Auth::admin()->get()->id)}}">
                                         <i class="fa fa-bell"></i>
                                         {{Lang::get('menu.notificationSetting')}}</a>
                                   </li>
                                 </ul>
                    </li>

                {{---------------------------------------/Settings-------------------------------}}


				</li>
			
		
		
		
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->