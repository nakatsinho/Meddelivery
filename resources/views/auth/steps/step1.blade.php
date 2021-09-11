<div class="tab-pane" id="step1">
    <div class="row p-b-15  ">
        <h4 class="info-text"> Dados iniciais (Licença) - Alvará ou Documento compatível</h4>
        <div class="col-sm-4 col-sm-offset-1">
            <div class="picture-container">
                <div class="picture form-group{{$errors->has('imagem')?' has-error':''}}">
                    <img src="assets/img/default-property.jpg" class="picture-src" id="wizardPicturePreview" title="" />
                    <input type="file" value="default.png" name="imagem" id="wizard-picture" required>
                    @if ($errors->has('imagem'))
                    <span class="help-block">
                        <strong>{{ $errors->first('imagem') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group{{$errors->has('nome')?' has-error':''}}">
                <label>Nome da Empresa <small>(obrigatório)</small></label>
                <input name="nome" value="{{ old('nome') }}" type="text" class="form-control" placeholder="Introduza o nome empresa/farmácia" required>
                @if ($errors->has('nome'))
                <span class="help-block">
                    <strong>{{ $errors->first('nome') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group{{$errors->has('titular')?' has-error':''}}">
                <label>Titular <small>(obrigatório)</small></label>
                <input name="titular" value="{{ old('titular') }}" type="text" class="form-control" placeholder="Nome do responsável" required>
                @if ($errors->has('titular'))
                <span class="help-block">
                    <strong>{{ $errors->first('titular') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('nuit')?' has-error':''}}">
                <label>Nuit <small>(obrigatório)</small></label>
                <input name="nuit" value="{{ old('nuit') }}" type="text" class="form-control" placeholder="Nuit da empresa" required>
                @if ($errors->has('nuit'))
                <span class="help-block">
                    <strong>{{ $errors->first('nuit') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('emaill')?' has-error':''}}">
                <label>Emaill <small>(obrigatório)</small></label>
                <input name="emaill" value="{{ old('emaill') }}" type="emaill" class="form-control" placeholder="Endereço de Email" required>
                @if ($errors->has('emaill'))
                <span class="help-block">
                    <strong>{{ $errors->first('emaill') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('location')?' has-error':''}}">
                <label>Localização <small>(obrigatório)</small></label>
                <input name="location" value="{{ old('location') }}" type="text" class="form-control" placeholder="Sede da Empresa" required>
                @if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{$errors->has('numero')?' has-error':''}}">
                <label>Telefone <small>(se deixar esse campo vazio, usará o contacto padrão!)</small></label>
                <input name="numero" value="{{ old('numero') }}" type="text" class="form-control" placeholder="+258 " required>
                @if ($errors->has('numero'))
                <span class="help-block">
                    <strong>{{ $errors->first('numero') }}</strong>
                </span>
                @endif
            </div>
            <p><strong style="color:red;">NOTA:</strong> obrigatório anexar a sua esquerda na tela, uma licença compatível para o exercicio!</p>
        </div>
    </div>

</div>