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
        </div>
    </div>
@endsection
