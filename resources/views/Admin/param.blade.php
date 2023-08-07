
@extends('Layouts/admin')

@section('content')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <div class="container">
        <div>
            <form method="POST" enctype="multipart/form-data" action="/admin/params">
                <div class="modal-body">
                    @csrf
                  <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{ $param->email }}" required placeholder="email" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">IMAGE DE LA PAGE A PROPOS </label>
                            <input type="file" name="about_photo" class="form-control-file">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="">NOMBRE D'ENTREPRISES AUDITEES</label>
                            <input type="number" name="nb_entreprises" value="{{ $param->nb_entreprises }}" required  class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="">NOMBRE DE PARTENAIRE</label>
                            <input type="number" name="nb_partenaires" value="{{ $param->nb_partenaires }}" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="">NOMBRE DE RAPPORTS PRODUITS</label>
                            <input type="number" name="nb_rapports" value="{{ $param->nb_rapports }}" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">TEXTE DE PRESENTATION DE LA PAGE A PROPOS</label>
                            <textarea name="about_text" id="editor" class="form-control" cols="30" rows="5">{{ $param->about_text }}</textarea>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="">
                  <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
                </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'blockQuote', 'insertTable', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                language: 'fr',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
