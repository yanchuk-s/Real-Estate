@extends('layouts.admin')

@section('title')
    <title>{{get_string('faq') . ' - ' . get_setting('site_name', 'site')}}</title>
@endsection
@section('content')
@section('page_title')
    <h3 class="page-title mbot10">{{get_string('faq')}}</h3>
@endsection
    <div class="col l6 m8 s12 left left-align mbot10">
    </div>
    <div class="col l6 m4 s12 right right-align mbot10">
        <a href="{{route('admin.faq.create')}}" class="btn waves-effect"> {{get_string('create_faq')}} <i class="material-icons small">add_circle</i></a>
        <a href="#" class="mass-delete btn waves-effect btn-red"><i class="material-icons color-white">delete</i></a>
    </div>
    <div class="col s12">
        @if($faqs->count())
        <div class="table-responsive">
        <table class="table bordered striped">
            <thead class="thead-inverse">
            <tr>
                <th>
                    <input type="checkbox" class="filled-in primary-color" id="select-all" />
                    <label for="select-all"></label>
                </th>
                <th>{{get_string('question')}}</th>
                <th class="icon-options">{{get_string('options')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($faqs as $faq)
                    <tr>
                        <td>
                            <input type="checkbox" class="filled-in primary-color" id="{{$faq->id}}" />
                            <label for="{{$faq->id}}"></label>
                        </td>
                        <td>{{$faq->contentDefault->question}}</td>
                        <td>
                            <div class="icon-options">
                                <a href="{{route('admin.faq.edit', $faq->id)}}" title="{{get_string('edit_faq')}}"><i class="small material-icons color-primary">mode_edit</i></a>
                                <a href="#" class="delete-button" data-id="{{$faq->id}}"><i class="small material-icons color-red">delete</i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{$faqs->links()}}
        @else
            <strong class="center-align">{{get_string('no_results')}}</strong>
        @endif
    </div>
    {{ csrf_field() }}
@endsection

@section('footer')

<script>

    $(document).ready(function(){

        $('.delete-button').click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            var selector = $(this).parents('tr');
            var token = $('[name=_token]').val();
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
                            url: '{{ url('/admin/faq/') }}/'+id,
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

        $('.mass-delete').click(function(event){
            event.preventDefault();
            var id = [];
            var selector = [];
            $("tbody input:checkbox:checked").each(function(){
                id.push($(this).attr('id'));
                selector.push($(this).parents('tr'));
            });
            var token = $('[name=_token]').val();
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
                    if(result) {
                        $.ajax({
                            url: '{{ url('/admin/faq/massdestroy') }}',
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
    });
</script>
@endsection