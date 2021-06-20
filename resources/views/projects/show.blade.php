@extends('common.template')

@section('heading')
    {{ $project->name }}
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body no-padding">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Description</h3>
                </div>
                <div class="panel-body">
                    <p>
                        {{ $project->description }}
                    </p>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Upload Asset</h3>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('projects.asset.upload', ['project' => $project]) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="file" name="asset" />
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Assets</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Asset</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project->assets as $asset)
                                <tr>
                                    <td>{{ $asset->path }}</td>
                                    <td>
                                        <a href="{{ $asset->download_url }}">Download</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
