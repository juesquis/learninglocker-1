@extends('layouts.master')

@section('sidebar')
  @include('partials.lrs.sidebars.lrs')
@stop


@section('content')

	@include('partials.client.forms.create')

  @include('partials.site.elements.page_title', array('page' => Lang::get('lrs.client.manageclients')))

  <div class="col-md-10">
    <p>{{ Lang::get('lrs.client.manageclients_intro') }}</p>
     <div class="alert alert-success clearfix">
      <div class="col-sm-10">
        <b>Endpoint for all clients:</b> <span class="break-words">{{ URL() }}/data/xAPI/</span>
      </div>
    </div>
    <div>

    @if ( isset($clients) && !empty($clients) )

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>{{Lang::get('site.name')}}</th>
            <th>Type</th>
            <th>{{Lang::get('lrs.client.authority.ifi')}}</th>
            <th>{{Lang::get('site.username')}}</th>
            <th>{{Lang::get('site.password')}}</th>
            <th>{{ Lang::get('site.edit') }}</th>
            <th>{{ Lang::get('site.delete') }}</th>
          <tr>
        </thead>
        <tbody>
          @foreach( $clients as $client )
              @include('partials.client.item', array( 'client' => $client ))
          @endforeach
        </tbody>
      </table>

    @endif

    @if ( count($clients) == 0 )
      <div class="col-xs-12 col-sm-12 col-lg-12">
        <p class="bg-warning">{{ Lang::get('lrs.client.none') }}</p>
      </div>
    @endif

  </div>
  </div>

@stop