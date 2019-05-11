@extends('layouts.app')

<!--Reviews List-->

@section('title', __('Reviews'))

@section('content')
    
    @if ($reviews->total() == 0)
        <div class="container-fluid text-center">
            <div class="jumbotron jumbotron-fluid rounded">
                <div class="container">
                    <h1 class="display-4">{{__('There are no reviews at this time')}} <i class="fa fa-frown-o"></i> </h1>
                    <div class="dropdown-divider my-4"></div>
                    
                    <p class="lead">{{__('Do you want to make one?')}}</p>

                    @guest
                        <a class="btn btn-warning btn-lg" href="/register" role="button">{{__('Register')}}</a>
                    @endguest

                    @auth
                        <a class="btn btn-warning btn-lg" href="/reviews/create" role="button">{{__('Click here!')}}</a>
                    @endauth
                </div>
            </div>
        </div>
    @else

        <div id="reviews-table-container" class="table-responsive table-sm container-fluid text-center">

            <table id="reviews-table" class="table table-dark table-hover table-bordered">
                <thead>
                    <th scope="col" style="width:10%">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Game</th>
                    <th scope="col">Votes</th>
                    <th scope="col">User</th>
                    <th scope="col">Language</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <a href="">
                            <tr>
                                
                                <td class="align-middle"><img class="img-fluid" src="{{ asset($review->image) }}" alt="review-image"></td>
                                <td class="align-middle">{{Str::limit($review->title,'60')}}</td>
                                <td class="align-middle">{{Str::limit($review->game_title,'20')}}</td>
                                <td class="align-middle">{{$review->votes}}</td>
                                <td class="align-middle">{{$review->user->name}}</td>
                                <td class="align-middle">{{$review->language}}</td>
                                <td class="align-middle">{{$review->created_at}}</td>
                                <td class="align-middle"><a href='{{route('home')}}' class="btn btn-warning fa fa-eye"></a></td>
                            </tr>
                        </a>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="paginator-container" class="container-fluid col-sm-mt-3">
            {{ $reviews->links() }}
        </div>

    @endif

@endsection