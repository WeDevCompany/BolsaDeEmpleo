<div class="text-center{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                                    {!! app('captcha')->display(); !!}
                                </div>
                                <div class="text-center">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif
                                </div>