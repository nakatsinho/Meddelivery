<div class="tab-pane" id="step4">
    <div class="row p-b-15  ">
        <h4 class="info-text"> Dados Pessoais (Usuario)</h4>
        <div class="col-sm-4 col-sm-offset-1">
            <div class="picture-container">
                <div class="form-group{{$errors->has('image')?' has-error':''}}">
                    <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title="Foto de Perfil" />
                    <input type="file" name="image" id="wizard-picture" required>
                    <span class="text-danger">{{$errors->first('image')}}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group{{$errors->has('name')?' has-error':''}}">
                <label>Nome Pessoal <small>(obrigatório)</small></label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Introduza seu Nome" required>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{$errors->has('surname')?' has-error':''}}">
                <label>Apelido <small>(obrigatório)</small></label>
                <input name="surname" value="{{ old('surname') }}" type="text" class="form-control" placeholder="Introduza seu Apelido" required>
                @if ($errors->has('surname'))
                <span class="help-block">
                    <strong>{{ $errors->first('surname') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('number')?' has-error':''}}">
                <label>Contacto <small>(obrigatório)</small></label>
                <input name="number" value="{{ old('number') }}" type="text" class="form-control" placeholder="+258 " required>
                @if ($errors->has('number'))
                <span class="help-block">
                    <strong>{{ $errors->first('number') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('email')?' has-error':''}}">
                <label>Email <small>(obrigatório)</small></label>
                <input name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Endereço de Email" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('password')?' has-error':''}}">
                <label>Senha <small>(obrigatório)</small></label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="******" required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('password_confirmation')?' has-error':''}}">
                <label>Repetir Senha <small>(obrigatório)</small></label>
                <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}" class="form-control" placeholder="******" required>
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
</div>