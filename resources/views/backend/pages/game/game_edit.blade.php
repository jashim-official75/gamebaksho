@extends('backend.layouts.app')

@section('pageName')
    Games
@endsection

@section('styles')
    {{-- File Upload --}}
    <link rel="stylesheet" href="{{ asset('/assets/backend/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="box-title m-b-30">Add Game</h3>
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
                        <form action="{{ route('games.update', $game) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Game Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Gamename" name="game_name" value="{{ $game->game_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Game Categories</label>
                                        <div class="demo-checkbox">
                                            @php
                                                $gameCategory = [];
                                                foreach ($game->gameCategories as $gameCat) {
                                                    array_push($gameCategory, $gameCat->category_id);
                                                }
                                            @endphp

                                            @foreach ($categories as $category)
                                                <input type="checkbox" id="md_checkbox_{{ $loop->index + 1 }}"
                                                    class="filled-in chk-col-red" name="category_name[]"
                                                    value="{{ $category->id }}"
                                                    @if (in_array($category->id, $gameCategory)) checked @endif />
                                                <label
                                                    for="md_checkbox_{{ $loop->index + 1 }}">{{ $category->category_name }}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Is this game free?</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" type="radio" class="custom-control-input"
                                                    name="is_free" value="1"
                                                    {{ $game->is_free == 1 ? 'checked' : '' }}>
                                                <span class="custom-control-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" type="radio" class="custom-control-input"
                                                    name="is_free" value="0"
                                                    {{ $game->is_free == 0 ? 'checked' : '' }}>
                                                <span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Exclusive Game?</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio1" type="radio" class="custom-control-input"
                                                    name="is_exclusive" value="1"
                                                    {{ $game->is_exclusive == 1 ? 'checked' : '' }}>
                                                <span class="custom-control-label">Yes</span>
                                            </label>
                                        </div>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input id="radio2" type="radio" class="custom-control-input"
                                                    name="is_exclusive" value="0"
                                                    {{ $game->is_exclusive == 0 ? 'checked' : '' }}>
                                                <span class="custom-control-label">No</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Game Description</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Game Description" name="game_description"
                                            value="{{ $game->game_description }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title"
                                            value="{{ $game->meta_title }}" name="meta_title">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" rows="5" id="meta_description" name="meta_description">{{ $game->meta_description }} </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <input type="text" class="form-control" id="meta_keyword"
                                            value="{{ $game->meta_keyword }}" name="meta_keyword">
                                    </div>
                                    
                                </div>
                                <div class="offset-sm-1"></div>
                                <div class="col-sm-5 col-xs-5">
                                    <div class="card-body">
                                        <label for="prev" class="mb-4 d-block">Old Game Thumbnail</label>
                                        <img class="img-fluid d-block p-b-30 m-auto"
                                            src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                            style="width: 150px;">
                                        <label for="exampleInputEmail1" class="mb-4">Upload Game New
                                            Thumbnail</label>
                                        <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"
                                            name="game_thumbnail" />


                                        <label for="prev" class="mb-2 mt-2 d-block">Old Zip file Name</label>
                                        <h4>{{ $game->zip_file_name ?? "N/A" }}</h4>
                                        <label for="game_zip_file" class="mb-4">Upload Zip file</label>
                                        <input type="file" id="game_zip_file" class="dropify" data-max-file-size="100M" name="game_zip_file" accept=".zip,.rar" />

 
                                        <label for="prev" class="mb-4 mt-2 d-block">Old Game Banner</label>
                                        <img class="img-fluid d-block p-b-30 m-auto"
                                            src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_banner) }}"
                                            style="width: 150px;">
                                        <label for="exampleInputEmail1" class="mb-4">Upload Game New
                                            Banner</label>
                                        <input type="file" id="input-file-max-fs" class="dropify"
                                            data-max-file-size="2M" name="game_banner" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success waves-effect waves-light m-r-10 m-t-20">Submit</button>
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
@endsection
