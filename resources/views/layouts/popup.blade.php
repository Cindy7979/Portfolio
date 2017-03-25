@foreach ($portfolio as $p)
<div class="popup_detail_title">
	<h3>{{$p->project_title}}</h3>
</div>
<div class="popup_detail_info">
	<div class="col-md-10">
		<div class="col-md-6">
			<p class="pd_info_title">CLIENT</p>
			<p>{{$p->client}}</p>
		</div>
		<div class="col-md-6">
			<p class="pd_info_title">DATE</p>
			<p>{{$p->work_date}}</p>
		</div>
		<div class="col-md-12">
			<p class="pd_info_title">SKILL</p>
			<p>{{$p->skill}}</p>
		</div>
		<div class="col-md-12">
			<p class="pd_info_title">DESCRIPTION</p>
			<p>{{$p->detail}}</p>
		</div>	
	</div>
	<div class="col-md-2">
		
	</div>
	<div class="col-md-12">
		<img src="{{url(Config::get('app.configure.image')).$portfolio[0]->img_name}}">
	</div>
	
</div>
@endforeach