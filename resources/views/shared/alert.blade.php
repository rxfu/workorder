@foreach (['success', 'danger', 'warning', 'info'] as $status)
	@if (session()->has($status))
		<div class="alert alert-dismissible alert-{{ $status }}" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4>
				@if ('success' == $status)
					<i class="icon fa fa-check"></i> 成功!
				@elseif ('danger' == $status)
					<i class="icon fa fa-ban"></i> 错误!
				@elseif ('warning' == $status)
					<i class="icon fa fa-warning"></i> 警告!
				@elseif ('info' == $status)
					<i class="icon fa fa-info"></i> 消息!
				@endif
			</h4>
			{{ session()->get($status) }}
		</div>
	@endif
@endforeach