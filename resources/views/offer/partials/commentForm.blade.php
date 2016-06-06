                    <div class="control-group">
                        <div class="row">
                            <div class="input-field col-md-12">
                                <i class="material-icons prefix">account_circle</i>
                                {{ Form::text('title', null,['id' => "title"]) }}
                                {{ Form::label('title', 'Título(*)') }}
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="row">
                            <div class="input-field col-md-12">
                                {{ Form::textarea('body', null,['id' => "body", 'class' => 'ckeditor']) }}
                            </div>
                        </div>
                    </div>