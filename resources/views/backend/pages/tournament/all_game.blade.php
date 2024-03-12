@extends('backend.layouts.app')

@section('pageName')
    Tournamant Games
@endsection

@section('styles')
    <!-- Footable CSS -->
    <link href="{{ asset('/assets/backend/plugins/footable/css/footable.core.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tournament All Games</h4>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Game</th>
                                    <th>Banner</th>
                                    <th>Game File</th>
                                    <th>Fee</th>
                                    <th>First Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($games as $game)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/Tournamant/GameImage/' . $game->image) }}"
                                                alt="user" width="40" class="img-circle" /> {{ $game->game_name }}
                                        </td>

                                        @if ($game->game_banner)
                                        <td>
                                            <img src="{{ asset('uploads/Tournamant/GameBanner/' . $game->game_banner) }}"
                                                alt="user" width="40" class="img-circle" /> 
                                        
                                        </td>
                                        @endif
                                       
                                       

                                        <td>{{ $game->game_zip_file }}</td>
                                        <td>{{ $game->game_fee }}</td>
                                        <td>{{ $game->first_price }}</td>

                                        <td>

                                            <a href="{{ route('tournament.game.edit', $game) }}" data-toggle="tooltip"
                                                data-original-title="Edit" style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <form action="{{ route('tournament.game.destroy', $game) }}" method="post"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-toggle="tooltip" data-original-title="Delete"
                                                    style="background: transparent; border: none;"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-close text-danger"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('tournament.game.add') }}" class="btn btn-info btn-rounded">Add
                                            New
                                            Game</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Footable -->
    {{-- <script src="{{ asset('/assets/backend/plugins/footable/js/footable.all.min.js') }}"></script> --}}
    <!--FooTable init-->
    {{-- <script src="{{ asset('/assets/backend/js/footable-init.js') }}"></script> --}}
@endsection
