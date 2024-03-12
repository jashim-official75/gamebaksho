@extends('backend.layouts.app')

@section('pageName')
    Edit Game
@endsection

@section('styles')
    {{-- File Upload --}}
    <link rel="stylesheet" href="{{ asset('/assets/backend/plugins/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <h3 class="box-title m-b-30">Edit Game</h3>
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
                        <form action="{{ route('tournament.game.update', $t_game->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="game_name">Game Name <span class="text-danger">(required)</span></label>
                                        <input type="text" class="form-control" id="game_name"
                                            placeholder="Enter Gamename" name="game_name" value="{{ $t_game->game_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="game_link">Game Link</label>
                                        <input type="text" class="form-control" id="game_link"
                                            placeholder="Enter Gamename" readonly value="{{ $t_game->game_link }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="game_description">Game Description <span class="text-danger">(required)</span></label>
                                        <textarea class="form-control" id="game_description" placeholder="Enter Game Description" name="game_description">{{ $t_game->description }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="game_control">Game Control</label>
                                        <textarea class="form-control" id="game_control" placeholder="Enter Game Control" name="game_control">{{ $t_game->control }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date">Start Date <span class="text-danger">(required)</span></label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $t_game->start_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date">End Date <span class="text-danger">(required)</span></label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $t_game->end_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="game_fee">Game Fee <span class="text-danger">(required)</span></label>
                                        <input type="number" class="form-control" id="game_fee" name="game_fee" value="{{ $t_game->game_fee }}">
                                    </div>

                                     <div class="form-group">
                                        <label for="subscription_period">Subscription_period <span class="text-danger">(required)</span></label>
                                        <input type="text" class="form-control" id="subscription_period" name="subscription_period" value="{{ $t_game->subscription_period }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="f_price">1st Price <span class="text-danger">(required)</span></label>
                                                <input type="text" class="form-control" id="f_price" name="f_price" value="{{ $t_game->first_price }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="s_price">2nd Price</label>
                                                <input type="text" class="form-control" id="s_price" name="s_price" value="{{ $t_game->second_price }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="third_price">3rd Price</label>
                                                <input type="text" class="form-control" id="third_price" name="third_price" value="{{ $t_game->third_price }}">
                                            </div>
                                        </div>
        
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="fourth_price">4th Price</label>
                                                <input type="text" class="form-control" id="fourth_price" name="fourth_price" value="{{ $t_game->fourth_price }}">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="offset-sm-1"></div>
                                <div class="col-sm-5 col-xs-5">
                                    <div class="card-body">
                                        <label for="game_thumbnail" class="mb-4">Game Thumbnail
                                            (<span>340x210</span>) </label>
                                        <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M"
                                            name="game_thumbnail" />
                                        <label for="prev" class="mb-4 d-block">Old Game Thumbnail</label>
                                        <img class="img-fluid d-block p-b-30 m-auto"
                                            src="{{ asset('uploads/Tournamant/GameImage/' . $t_game->image) }}"
                                            style="width: 150px;">
                                    </div>

                                    <div class="card-body">
                                        <label for="zip" class="mb-4">Game Zip File</label>
                                        <input type="file" id="input-file-max-fs" class="dropify" accept=".zip,.rar"
                                            name="game_zip_file" />
                                            <label for="prev" class="mb-3 mt-3 d-block">Old Game File</label>
                                            <p>{{ $t_game->game_zip_file }}</p>
                                    </div>

                                    <div class="card-body">
                                        <label for="game_banner" class="mb-4">Game Banner</label>
                                        <input type="file" id="input-file-max-fs" class="dropify" name="game_banner" />

                                        <label for="prev" class="mb-3 mt-3 d-block">Old Game Banner</label>
                                        @if ($t_game->game_banner)
                                        <img class="img-fluid d-block p-b-30 m-auto"
                                        src="{{ asset('uploads/Tournamant/GameBanner/' . $t_game->game_banner) }}"
                                        style="width: 150px;">
                                        @endif
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
