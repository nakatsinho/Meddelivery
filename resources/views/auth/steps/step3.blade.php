<div class="tab-pane" id="step3">
    <h4 class="info-text">Dê-nos algumas imagens ou vídeos de sua empresa?</h4>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group{{$errors->has('image_empresa')?' has-error':''}}">
                <label for="property-images">Escolher Imagens :</label>
                <input name="image_empresa" class="form-control" type="file" id="property-images" required>
                @if ($errors->has('image_empresa'))
                <span class="help-block">
                    <strong>{{ $errors->first('image_empresa') }}</strong>
                </span>
                @endif
                <p class="help-block" style="color:red">Selecione uma imagem sugestiva para o registro. Se inserir imagens nada a ver, seu pedido será rejeitado!</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="property-video">Links de Videos :</label>
                <input class="form-control" value="http://www.youtube.com" placeholder="Exemplo: http://www.youtube.com, http://vimeo.com" name="video_link" type="text">
            </div>

            <div class="form-group">
                <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" type="text">
            </div>

            <div class="form-group">
                <input class="form-control" value="" placeholder="http://www.youtube.com, http://vimeo.com" type="text">
            </div>
        </div>
    </div>
</div>