@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <table class="table">
                    <tbody>
                        <tr>
                            @foreach($searchResults as $searchResult)
                                   <td>
                                       <a href="{{url('product-detail/'.$searchResult->url)}}"> {{ $searchResult->title }}</a>
                                   </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

{{--                <table class="table table-hover">--}}
{{--                    <tbody>--}}
{{--                        <tr>--}}
{{--                        @if(isset($searchResults))--}}
{{--                            @if ($searchResults-> isEmpty())--}}
{{--                                <h2>Sorry, no results found for the term.</h2>--}}
{{--                                    <b>"{{ $searchterm }}"</b>--}}

{{--                                    @foreach(--}}
{{--                                        <td>--}}
{{--                                            {{ $searchResult->title }}--}}
{{--                                            shit--}}
{{--                                        </td>--}}
{{--                                    @endforeach--}}

{{--                            @endif--}}
{{--                        @endif--}}
{{--                        </tr>--}}
{{--                    </tbody>--}}
{{--                </table>--}}

            </div>
        </div>
    </div>
@endsection
