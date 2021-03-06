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
				<li class="start {{ $dashboardOpen or ''}}">
					<a href="{{URL::to('admin')}}">
					<i class="fa fa-home"></i>
					<span class="title">{{Lang::get('menu.dashboard')}}</span>
                    <span class="arrow "></span>
					</a>
				</li>
			    {{---------------------------------------/Dashboard-------------------------------}}

                {{---------------------------------------Beneficiarios-------------------------------}}
				<li class="{{ $beneficiariosOpen or ''}}">
					<a href="javascript:;">
					<i class="fa fa-users"></i>
					<span class="title">{{Lang::get('menu.beneficiarios')}}</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ $beneficiariosActive or ''}}">
							<a href="{{route('admin.beneficiarios.index')}}">
							<i class="fa fa-users"></i>
							{{Lang::get('menu.beneficiariosList')}}</a>
						</li>
					</ul>
				</li>
                {{---------------------------------------Ayudas




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
                {{---------------------------------------Actividades-------------------------------}}
                {{--<li class="{{ $actividadOpen or ''}}">--}}
                    {{--<a href="javascript:;">--}}
                        {{--<i class="fa fa-send"></i>--}}
                        {{--<span class="title">{{Lang::get('menu.actividades')}}</span>--}}
                        {{--<span class="arrow "></span>--}}
                    {{--</a>--}}
                    {{--<ul class="sub-menu">--}}
                        {{--<li class="{{ $actividadActive or ''}}">--}}
                            {{--<a href="{{route('admin.actividades.index')}}">--}}
                                {{--<i class="fa fa-calendar"></i>--}}
                                {{--{{Lang::get('menu.actividadesList')}}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{----------------------------------------------------------------------}}
                {{---------------------------------------Actividades-------------------------------}}
                <li class="{{ $actividadesOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.actividades')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $actividadesActive or ''}}">
                            <a href="{{route('admin.actividades.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.actividadesList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}
                {{---------------------------------------Asistencia--------------------------}}
                <li class="{{ $participacionOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.participaciones')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $participacionesActive or ''}}">
                            <a href="{{route('admin.participaciones.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.participacionesList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}
                {{---------------------------------------Personal-------------------------------}}
                <li class="{{ $personalOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">{{Lang::get('menu.personal')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $personalActive or ''}}">
                            <a href="{{route('admin.personal.index')}}">
                                <i class="fa fa-briefcase"></i>
                                {{Lang::get('menu.personalList')}}
                            </a>
                        </li>
                        {{--<li class="{{ $personalActive or ''}}">--}}
                            {{--<a href="{{route('admin.holidays.index')}}">--}}
                                {{--<i class="fa fa-briefcase"></i>--}}
                                {{--{{Lang::get('menu.personalAdmi')}}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="{{ $personalActive or ''}}">--}}
                            {{--<a href="{{route('admin.holidays.index')}}">--}}
                                {{--<i class="fa fa-briefcase"></i>--}}
                                {{--{{Lang::get('menu.personalRes')}}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="{{ $personalActive or ''}}">--}}
                            {{--<a href="{{route('admin.holidays.index')}}">--}}
                                {{--<i class="fa fa-briefcase"></i>--}}
                                {{--{{Lang::get('menu.personalVol')}}--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </li>
                {{----------------------------------------------------------------------}}

                <li class="{{ $personalVoluntarioOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">{{Lang::get('menu.personalVol')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $personalVoluntarioActive or ''}}">
                            <a href="{{route('admin.personalvoluntario.index')}}">
                                <i class="fa fa-briefcase"></i>
                                {{Lang::get('menu.personalList')}}
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ $personalAportanteOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-briefcase"></i>
                        <span class="title">{{Lang::get('menu.personalApor')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $personalAportanteActive or ''}}">
                            <a href="{{route('admin.personalaportante.index')}}">
                                <i class="fa fa-briefcase"></i>
                                {{Lang::get('menu.personalList')}}
                            </a>
                        </li>
                    </ul>
                </li>

                {{---------------------------------------Ayudas-------------------------------}}
                <li class="{{ $ayudasOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.ayudas')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $ayudasActive or ''}}">
                            <a href="{{route('admin.ayudas.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.ayudasList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}

                {{---------------------------------------Donaciones-------------------------------}}
                <li class="{{ $donacionesOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.donaciones')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $donacionesActive or ''}}">
                            <a href="{{route('admin.donaciones.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.donacionesList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}
                {{---------------------------------------Donaciones-------------------------------}}
                <li class="{{ $saldosOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.saldos')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $saldosActive or ''}}">
                            <a href="{{route('admin.saldos.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.saldosList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}
                {{---------------------------------------Reportes-------------------------------}}
                <li class="{{ $reportOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-send"></i>
                        <span class="title">{{Lang::get('menu.reportes')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $reporteActive or ''}}">
                            <a href="{{route('admin.reportes.index')}}">
                                <i class="fa fa-calendar"></i>
                                {{Lang::get('menu.reportesBen')}}
                            </a>
                        </li>

                    </ul>
                </li>
                {{----------------------------------------------------------------------}}
                {{---------------------------------------COnfiguraciones-------------------------------}}
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
                {{---------------------------------------Logs-------------------------------}}
                <li class="{{ $logsOpen or ''}}">
                    <a href="javascript:;">
                        <i class="fa fa-trophy"></i>
                        <span class="title">{{Lang::get('menu.logs')}}</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ $logsActive or ''}}">
                            <a href="{{route('admin.logs.index')}}">
                                <i class="fa  fa-gift"></i>
                                {{Lang::get('menu.logsList')}}</a>
                        </li>
                    </ul>
                </li>
                {{---------------------------------------------------------------------------}}
                {{---------------------------------------Administradores-------------------------------}}


                {{---------------------------------------/-------------------------------}}

				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->