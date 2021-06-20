@extends('common.template')

@section('heading')
    All assets
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body no-padding">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All assets</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Asset</th>
                                <th>Size (bytes)</th>
                                <th>Last Modified</th>
                                <th>MIME</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td>{{ $asset->path }}</td>
                                    <td>{{ $asset->size }}</td>
                                    <td>{{ $asset->lastModified }}</td>
                                    <td>{{ $asset->mimeType }}</td>
                                    <td>
                                        <a href="{{ $asset->url }}">Download</a>
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
