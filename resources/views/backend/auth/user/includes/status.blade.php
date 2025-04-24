@if($user->isActive())
    <span class='badge badge-success'>@lang('active')</span>
@else
    <span class='badge badge-danger'>@lang('Inactive')</span>
@endif
