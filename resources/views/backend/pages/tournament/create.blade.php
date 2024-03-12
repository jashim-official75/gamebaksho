@extends('backend.layouts.app')

@section('pageName')
    Add Game
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
                        <form action="{{ route('tournament.game.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label for="game_name">Game Name <span class="text-danger">(required)</span></label>
                                        <input type="text" class="form-control" id="game_name"
                                            placeholder="Enter Gamename" name="game_name" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="game_description">Game Description <span class="text-danger">(required)</span></label>
                                        <textarea class="form-control" id="game_description"
                                            placeholder="Enter Game Description" name="game_description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="game_control">Game Control</label>
                                        <textarea class="form-control" id="game_control"
                                            placeholder="Enter Game Control" name="game_control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="start_date">Start Date <span class="text-danger">(required)</span></label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="end_date">End Date <span class="text-danger">(required)</span></label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="game_fee">Game Fee <span class="text-danger">(required)</span></label>
                                        <input type="number" class="form-control" id="game_fee" name="game_fee" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="subscription_period">Subscription_period <span class="text-danger">(required)</span></label>
                                        <input type="text" class="form-control" id="subscription_period" name="subscription_period" value="">
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="f_price">1st Price <span class="text-danger">(required)</span></label>
                                                <input type="text" class="form-control" id="f_price" name="f_price" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="s_price">2nd Price</label>
                                                <input type="text" class="form-control" id="s_price" name="s_price" value="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="third_price">3rd Price</label>
                                                <input type="text" class="form-control" id="third_price" name="third_price" value="">
                                            </div>
                                        </div>
        
                                        <div class="col-sm-6 col-xl-6">
                                            <div class="form-group">
                                                <label for="fourth_price">4th Price</label>
                                                <input type="text" class="form-control" id="fourth_price" name="fourth_price" value="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="offset-sm-1"></div>
                                <div class="col-sm-5 col-xs-5">
                                    <div class="card-body">
                                        <label for="game_thumbnail" class="mb-4">Game Thumbnail (<span>340x210</span>) <span class="text-danger">(required)</span></label>
                                        <input type="file" id="input-file-max-fs" class="dropify"
                                            data-max-file-size="2M" name="game_thumbnail" />
                                    </div>

                                    <div class="card-body">
                                        <label for="zip" class="mb-4">Game Zip File <span class="text-danger">(required)</span></label>
                                        <input type="file" id="input-file-max-fs" class="dropify" accept=".zip,.rar" name="game_zip_file" />
                                    </div>

                                    <div class="card-body">
                                        <label for="game_banner" class="mb-4">Game Banner</label>
                                        <input type="file" id="input-file-max-fs" class="dropify" name="game_banner" />
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
