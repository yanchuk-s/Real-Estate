@extends('layouts.admin')

@section('title')
    <title>{{get_string('properties') . ' - ' . get_setting('site_name', 'site')}}</title>
@endsection
@section('content')
@section('page_title')
    <h3 class="page-title mbot10">{{get_string('properties')}}</h3>
@endsection
<div class="col l6 m8 s12 left left-align mbot10">
    {{Form::open(['method' => 'post', 'url' => route('admin_property_search')])}}
    <div class="form-group col s8 autocomplete-fix">
        {{Form::text('term', null, ['class' => 'form-control', 'id' => 'term', 'placeholder' => get_string('search_properties')])}}
    </div>
    <div class="col l4 m4 s4">
        <button class="btn waves-effect" type="submit" name="action">{{get_string('filter')}}</button>
    </div>
    {{Form::close()}}
</div>
<div class="col l6 m4 s12 right right-align mbot10">
    <a href="{{route('admin.property.create')}}" class="btn waves-effect"> {{get_string('create_property')}} <i class="material-icons small">add_circle</i></a>
    <a href="#" class="mass-delete btn waves-effect btn-red"><i class="material-icons color-white">delete</i></a>
</div>
<div class="col s12">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="tab active"><a href="#sale-body" data-toggle="tab">Sale</a></li>
            <li class="tab"><a href="#rent-body" data-toggle="tab">Rent</a></li>
        </ul>
    </div>
    <div class="tab-content">
    @if($sale_properties->count())
        <div id="sale-body" class="table-responsive tab-pane active">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th>{{get_string('property')}}</th>
                    <!-- <th>{{get_string('user')}}</th> -->
                    <th>{{get_string('category')}}</th>
                    <th>{{get_string('location')}}</th>
                    <th>Type</th>
                    <th>{{get_string('featured')}}</th>
                    <th>Slider</th>
                    <th class="icon-options">{{get_string('options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sale_properties as $property)
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="{{$property->id}}" />
                            <label for="{{$property->id}}"></label>
                        </td>
                        <td>{{$property->contentDefault->name}}</td>
                        <!-- <td>@if($property->user){{$property->user->username}}@else <i class="small material-icons color-red">clear</i> @endif</td> -->
                        <td>{{$property->category->contentDefault->name}}</td>
                        <td>{{$property->prop_location->contentDefault->location}}</td>
                        <td class="page-status">{{ $property->sales == 1 ? 'Sales' : ''}} {{ $property->rentals == 1 ? 'Rentals' : '' }}</td>
                        <td class="page-featured">{{$property->featured ? get_string('yes') : get_string('no')}}</td>
                        <td>
                            <input type="checkbox" class="filled-in primary-color slider-checkbox" id="slider{{$property->id}}" data-id="{{$property->id}}" {{ $property->slider == 1 ? 'checked' : '' }}>
                            <label for="slider{{$property->id}}"></label>
                        </td>
                        <td>
                            <div class="icon-options">
                                <a href="{{url('property').'/'.$property->alias}}" title="{{get_string('view_property')}}"><i class="small material-icons color-primary">visibility</i></a>
                                <a href="{{route('admin.property.edit', $property->id)}}" title="{{get_string('edit_property')}}"><i class="small material-icons color-primary">mode_edit</i></a>
                                <!-- <a href="{{route('admin_property_date', $property->id)}}" title="{{get_string('property_availability')}}"><i class="small material-icons color-blue">date_range</i></a> -->
                                <a href="#" class="delete-button" data-id="{{$property->id}}" title="{{get_string('delete_property')}}"><i class="small material-icons color-red">delete</i></a>
                                <!-- <a href="#" class="activate-button {{$property->status ? 'hidden': ''}}" data-id="{{$property->id}}" title="{{get_string('activate_property')}}"><i class="small material-icons color-primary">done</i></a>
                                <a href="#" class="deactivate-button {{$property->status ? '': 'hidden'}}" data-id="{{$property->id}}" title="{{get_string('deactivate_property')}}"><i class="small material-icons color-primary">close</i></a> -->
                                <a href="#" class="make-featured-button make-featured-sale-button  {{$property->featured_sale ? 'hidden': ''}}" data-id="{{$property->id}}" title="{{get_string('make_featured')}}"><i class="small material-icons color-primary">grade</i></a>
                                <a href="#" class="make-default-button make-default-sale-button {{$property->featured_sale ? '': 'hidden'}}" data-id="{{$property->id}}" title="{{get_string('make_default')}}"><i class="small material-icons color-yellow">grade</i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$sale_properties->links()}}
        </div>
        
        @else
            <strong class="center-align">{{get_string('no_results')}}</strong>
        @endif
        @if($rent_properties->count())
        <div id="rent-body" class="table-responsive tab-pane">
            <table class="table bordered striped">
                <thead class="thead-inverse">
                <tr>
                    <th>
                        <input type="checkbox" class="filled-in primary-color" id="select-all" />
                        <label for="select-all"></label>
                    </th>
                    <th>{{get_string('property')}}</th>
                    <!-- <th>{{get_string('user')}}</th> -->
                    <th>{{get_string('category')}}</th>
                    <th>{{get_string('location')}}</th>
                    <th>Type</th>
                    <th>{{get_string('featured')}}</th>
                    <th>Slider</th>
                    <th class="icon-options">{{get_string('options')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rent_properties as $property)
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="{{$property->id}}" />
                            <label for="{{$property->id}}"></label>
                        </td>
                        <td>{{$property->contentDefault->name}}</td>
                        <!-- <td>@if($property->user){{$property->user->username}}@else <i class="small material-icons color-red">clear</i> @endif</td> -->
                        <td>{{$property->category->contentDefault->name}}</td>
                        <td>{{$property->prop_location->contentDefault->location}}</td>
                        <td class="page-status">{{ $property->sales == 1 ? 'Sales' : ''}} {{ $property->rentals == 1 ? 'Rentals' : '' }}</td>
                        <td class="page-featured">{{$property->featured ? get_string('yes') : get_string('no')}}</td>
                        <td>
                            <input type="checkbox" class="filled-in primary-color slider-checkbox" id="slider{{$property->id}}" data-id="{{$property->id}}" {{ $property->slider == 1 ? 'checked' : '' }}>
                            <label for="slider{{$property->id}}"></label>
                        </td>
                        <td>
                            <div class="icon-options">
                                <a href="{{url('property').'/'.$property->alias}}" title="{{get_string('view_property')}}"><i class="small material-icons color-primary">visibility</i></a>
                                <a href="{{route('admin.property.edit', $property->id)}}" title="{{get_string('edit_property')}}"><i class="small material-icons color-primary">mode_edit</i></a>
                                <!-- <a href="{{route('admin_property_date', $property->id)}}" title="{{get_string('property_availability')}}"><i class="small material-icons color-blue">date_range</i></a> -->
                                <a href="#" class="delete-button" data-id="{{$property->id}}" title="{{get_string('delete_property')}}"><i class="small material-icons color-red">delete</i></a>
                                <!-- <a href="#" class="activate-button {{$property->status ? 'hidden': ''}}" data-id="{{$property->id}}" title="{{get_string('activate_property')}}"><i class="small material-icons color-primary">done</i></a>
                                <a href="#" class="deactivate-button {{$property->status ? '': 'hidden'}}" data-id="{{$property->id}}" title="{{get_string('deactivate_property')}}"><i class="small material-icons color-primary">close</i></a> -->
                                <a href="#" class="make-featured-button make-featured-rent-button {{$property->featured_rent ? 'hidden': ''}}" data-id="{{$property->id}}" title="{{get_string('make_featured')}}"><i class="small material-icons color-primary">grade</i></a>
                                <a href="#" class="make-default-button make-default-rent-button {{$property->featured_rent ? '': 'hidden'}}" data-id="{{$property->id}}" title="{{get_string('make_default')}}"><i class="small material-icons color-yellow">grade</i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$rent_properties->links()}}
        </div>
        
        @else
            <strong class="center-align">{{get_string('no_results')}}</strong>
        @endif
    </div>

</div>
@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('.delete-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('delete_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/') }}/'+id,
                                type: 'post',
                                data: {_method: 'delete', _token :token},
                                success:function(msg) {
                                    selector.remove();
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.activate-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-status');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('activate_property_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/activate/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.activate-button').addClass('hidden');
                                    thisBtn.children('.deactivate-button').removeClass('hidden');
                                    status.html('{{get_string('active')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.deactivate-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-status');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('deactivate_property_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/deactivate/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.deactivate-button').addClass('hidden');
                                    thisBtn.children('.activate-button').removeClass('hidden');
                                    status.html('{{get_string('pending')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.make-featured-sale-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('make_featured_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/makefeaturedsale/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.make-featured-sale-button').addClass('hidden');
                                    thisBtn.children('.make-default-sale-button').removeClass('hidden');
                                    status.html('{{get_string('yes')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.make-default-sale-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('make_default_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/makedefaultsale/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.make-default-sale-button').addClass('hidden');
                                    thisBtn.children('.make-featured-sale-button').removeClass('hidden');
                                    status.html('{{get_string('no')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.make-featured-rent-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('make_featured_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/makefeaturedrent/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.make-featured-rent-button').addClass('hidden');
                                    thisBtn.children('.make-default-rent-button').removeClass('hidden');
                                    status.html('{{get_string('yes')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });

            $('.make-default-rent-button').click(function(event){
                event.preventDefault();
                var id = $(this).data('id');
                var selector = $(this).parents('tr');
                var thisBtn = $(this).parents('.icon-options');
                var status = selector.children('.page-featured');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('make_default_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/makedefaultrent/') }}/'+id,
                                type: 'post',
                                data: {_token :token},
                                success:function(msg) {
                                    thisBtn.children('.make-default-rent-button').addClass('hidden');
                                    thisBtn.children('.make-featured-rent-button').removeClass('hidden');
                                    status.html('{{get_string('no')}}');
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });


            $('.mass-delete').click(function(event){
                event.preventDefault();
                var id = [];
                var selector = [];
                $("tbody input:checkbox:checked").each(function(){
                    id.push($(this).attr('id'));
                    selector.push($(this).parents('tr'));
                });
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('delete_confirm_bulk')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/massdestroy') }}',
                                type: 'post',
                                data: {id: id, _token :token},
                                success:function(msg) {
                                    $.each(selector, function(index, item){
                                        $(this).remove();
                                    });
                                    $('#select-all').prop('checked', false);
                                    toastr.success(msg);
                                },
                                error: function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });
            $('#term').autocomplete({
                source: '{{ url('/admin/property/autocomplete') }}',
                minLength: 0,
                delay: 0,
                focus: function( event, ui ) {
                    $('#term').val( ui.item.name );
                    return false;
                },
                select: function( event, ui ) {
                    $('#term').val( ui.item.name).attr('data-id', ui.item.id);
                    return false;
                }}).data("ui-autocomplete")._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                        .append( "<a href='#'>" + item.name + "</a>" )
                        .appendTo( ul );
            };

            $('.slider-checkbox').on('change', function () {
                var value = $(this).is(':checked') ? 1 : 0;
                var id = $(this).data('id');
                var token = $('[name="_token"]').val();
                bootbox.confirm({
                    title: '{{get_string('confirm_action')}}',
                    message: '{{get_string('make_featured_confirm')}}',
                    onEscape: true,
                    backdrop: true,
                    buttons: {
                        cancel: {
                            label: '{{get_string('no')}}',
                            className: 'btn waves-effect'
                        },
                        confirm: {
                            label: '{{get_string('yes')}}',
                            className: 'btn waves-effect'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            $.ajax({
                                url: '{{ url('/admin/property/slider/') }}/'+id,
                                type: 'post',
                                data: {_token :token, value: value},
                                success:function(msg) {
                                    toastr.success(msg);
                                },
                                error:function(msg){
                                    toastr.error(msg.responseJSON);
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection