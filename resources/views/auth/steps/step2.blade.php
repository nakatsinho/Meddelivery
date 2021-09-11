<div class="tab-pane" id="step2">
    <h4 class="info-text"> Detalhes Adicionais De Sua Empresa! </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <div class="form-group{{$errors->has('descricao')?' has-error':''}}">
                    <label>Descrição da Empresa <small>(opcional)</small>:</label>
                    <textarea name="descricao" value="{{ old('descricao') }}" class="form-control"></textarea>
                    @if ($errors->has('descricao'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descricao') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-3">
                <div class="form-group{{$errors->has('provincia_id')?' has-error':''}}">
                    <label>Provincia :</label>
                    <select name="provincia_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Selecione sua provincia">
                        @foreach($provincia as $id=>$value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('provincia_id')}}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Distrito :</label>
                    <select name="distrito_id" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Selecione o Distrito">
                        @foreach($distrito as $id=>$value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('distrito_id')}}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Bairro :</label>
                    <select name="bairro_id" id="lunchBegins" data-live-search="true" data-live-search-style="begins" class="selectpicker show-tick form-control" title="Selecione o Bairro">
                        @foreach($bairro as $id=>$value)
                        <option value="{{$id}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->first('bairro_id')}}</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Quarteirão / Av. / Rua :</label>
                    <input id="basic" name="quarteirao" type="text" class="selectpicker show-tick form-control" required>

                </div>
            </div>
        </div>
        <br>
    </div>
</div>