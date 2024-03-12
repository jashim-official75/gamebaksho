@extends('backend.layouts.app')

@section('pageName')
    Edit Blog
@endsection

@section('styles')
    {{-- File Upload --}}
    <link rel="stylesheet" href="{{ asset('/assets/backend/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.blogs') }}" class="btn btn-sm btn-primary d-inline-block mb-3">Back</a>
            <div class="card card-body">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="title">Tilte</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sub_title">Sub Tilte</label>
                                        <textarea class="form-control" id="sub_title" name="sub_title">{{ $blog->sub_title }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Tilte</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ $blog->meta_title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description">{{ $blog->meta_description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <textarea class="form-control" id="meta_keyword" name="meta_keyword">{{ $blog->meta_keyword }}</textarea>
                                    </div>

                                </div>

                                <div class="offset-sm-1"></div>

                                <div class="col-sm-5 col-xs-5">
                                    <div class="card-body">
                                        <label for="thumbnail" class="mb-4">Thumbnail
                                            (<span>340x210</span>)</label>
                                        <input type="file" id="thumbnail" class="dropify" data-max-file-size="2M"
                                            name="thumbnail" />
                                            @if ($blog->thumbnail)
                                                <img class="mt-3" src="{{ asset('uploads/Blogs/thumbnail/'.$blog->thumbnail) }}" width="320" height="200">
                                            @endif
                                    </div>

                                    <div class="card-body">
                                        <label for="banner" class="mb-4">Banner
                                            (<span>719x400</span>)</label>

                                        <input type="file" id="banner" class="dropify" data-max-file-size="2M"
                                            name="banner" />
                                            @if ($blog->banner)
                                                <img class="mt-3" src="{{ asset('uploads/Blogs/banner/'.$blog->banner) }}" width="320" height="200">
                                            @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description">{!! $blog->description !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10 m-t-20">Update Blog</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- File Upload --}}
    <script src="{{ asset('/assets/backend/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    {{-- Multiple Select --}}

    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })

        });
    </script>

<script>
    tinymce.init({
        selector: '#description',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [{
                title: 'My page 1',
                value: 'https://www.codexworld.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.codexqa.com'
            }
        ],
        image_list: [{
                title: 'My page 1',
                value: 'https://www.codexworld.com'
            },
            {
                title: 'My page 2',
                value: 'http://www.codexqa.com'
            }
        ],
        image_class_list: [{
                title: 'None',
                value: ''
            },
            {
                title: 'Some class',
                value: 'class-name'
            }
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
                callback('https://www.google.com/logos/google.jpg', {
                    text: 'My text'
                });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
                callback('https://www.google.com/logos/google.jpg', {
                    alt: 'My alt text'
                });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
                callback('movie.mp4', {
                    source2: 'alt.ogg',
                    poster: 'https://www.google.com/logos/google.jpg'
                });
            }
        },
        templates: [{
                title: 'New Table',
                description: 'creates a new table',
                content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
            },
            {
                title: 'Starting my story',
                description: 'A cure for writers block',
                content: 'Once upon a time...'
            },
            {
                title: 'New list with dates',
                description: 'New List with dates',
                content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
            }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 400,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
</script>
@endsection
