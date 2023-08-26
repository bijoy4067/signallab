@extends($activeTemplate . 'layouts.master')

@section('content')
    <section class="pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <div class="custom--card">
                        <div class="card-header">
                            <h5 class="card-title text-center">{{ __($pageTitle) }}</h5>
                        </div>
                        <div class="card-body">
                            <form class="transparent-form register prevent-double-click" action="{{ route('user.verify_phone_number_submit') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Mobile Number')</label>
                                        <input class="form-control form--control" name="phone" value="{{ $user->mobile }}" required>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="col-sm-12 text-center mt-3">
                                        <button type="submit" class="btn btn-block btn--base w-100 text-center">
                                            @if (is_null($user->phone_veriry_request_at))
                                                @lang('verify')
                                            @else
                                                @lang('Resend Code')
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
