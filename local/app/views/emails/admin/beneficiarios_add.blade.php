<table width="100%" border="1" style="border-collapse:collapse; border-color:white;">
		<tr>
	    	<td style="background-color:black;padding:10px;">
	    		 {{HTML::image("assets/admin/layout/img/logo-big.png",'Logo',array('class'=>'logo-default','height'=>'30px','width'=>'117px'))}}
	    	</td>
	    </tr>
	    <tr>
	    	<td style="padding:10px;">Hi!

	    	<b>{{Str::words($ben_name,1,'')}}</b> Your account is created on {{$setting->website}}<br /><br/>
			 <p>Sus credenciales de Ingreso!</p>

			  <p><strong>Email</strong>:  {{$ben_email}}</p>
			  <p><strong>Password</strong>: {{$ben_password}}</p>
			  <br />
			  <br />
			  <p>Try Logging at <a href="{{URL::to('/');}}">{{URL::to('/');}}</a></p>
<hr>
	       <b> {{$setting->website}}</b><br />
	        <font size="1"><a href="{{URL::to('/');}}">{{URL::to('/');}}</a><br />
	        </font>
	        </td>
	    </tr>
</table>
