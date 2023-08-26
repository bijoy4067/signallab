@extends('admin.layouts.app')

@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Price')</th>
                            <th>@lang('Validity')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($packages as $package)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ __($package->name) }}</span>
                                    </td>
                                    <td>
                                        <span>{{ showAmount($package->price) }} {{ __($general->cur_text) }}</span>
                                    </td>
                                    <td>
                                        {{ $package->validity }} @lang('Days')
                                    </td>
                                    <td>
                                       @php echo $package->statusBadge; @endphp
                                    </td>
                                    <td>
                                       <div class="justify-content-end d-flex flex-wrap gap-1">
                                            <button class="btn btn-sm btn-outline--primary editBtn" data-data="{{ $package }}">
                                                <i class="la la-pencil"></i> @lang('Edit')
                                            </button>
                                            @if($package->status == Status::DISABLE)
                                                <button class="btn btn-sm btn-outline--success ms-1 confirmationBtn" data-question="@lang('Are you sure to enable this package?')" data-action="{{ route('admin.package.status',$package->id) }}">
                                                    <i class="la la-eye"></i> @lang('Enable')
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-outline--danger ms-1 confirmationBtn" data-question="@lang('Are you sure to disable this package?')" data-action="{{ route('admin.package.status',$package->id) }}">
                                                    <i class="la la-eye-slash"></i> @lang('Disable')
                                                </button>
                                            @endif
                                       </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if ($packages->hasPages())
                <div class="card-footer py-4">
                    {{ paginateLinks($packages) }}
                </div>
            @endif
        </div>
    </div>
</div>

{{-- NEW MODAL --}}
<div id="createModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">@lang('Add New Package')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.package.add') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('Name')" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('Price')</label>
                        <div class="input-group">
                            <input type="number" step="any" class="form-control" name="price" placeholder="@lang('Price')" required value="{{old('price')}}">
                            <span class="input-group-text">{{ __($general->cur_text) }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('Validity')</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="validity" placeholder="@lang('Validity')" required value="{{old('validity')}}">
                            <span class="input-group-text">@lang('Days')</span>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="features">@lang('Features')</label>
                        <select name="features[]" id="features" class="form-control select2-auto-tokenize" multiple required>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">@lang('Update Package')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('admin.package.update') }}">
                @csrf
                <input type="hidden" name="id" required>
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" class="form-control" name="name" placeholder="@lang('Name')" required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Price')</label>
                        <div class="input-group">
                            <input type="number" step="any" class="form-control" name="price" placeholder="@lang('Price')" required>
                            <span class="input-group-text">{{ __($general->cur_text) }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>@lang('Validity')</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="validity" placeholder="@lang('Validity')" required>
                            <span class="input-group-text">@lang('Days')</span>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group">
                        <label for="editFeatures">@lang('Features')</label>
                        <select name="features[]" id="editFeatures" class="form-control select2-auto-tokenize" multiple required>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-sm btn-outline--primary addBtn"><i class="las la-plus"></i>@lang('Add New')</button>
@endpush

@push('script')
    <script>
        (function($){
            "use strict";

            $('.addBtn').on('click', function () {
                var modal = $('#createModal');
                modal.modal('show');
            });

            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                var select = $('#editFeatures');
                var data = $(this).data('data');
                var features = data.features;
                select.empty();

                modal.find('input[name=name]').val(data.name);
                modal.find('input[name=id]').val(data.id);
                modal.find('input[name=price]').val(data.price);
                modal.find('input[name=validity]').val(data.validity);

                for(var i = 0; i < features.length; i++) {
                    select.append($(`<option selected>`).val(features[i]).text(features[i]));
                }

                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush

