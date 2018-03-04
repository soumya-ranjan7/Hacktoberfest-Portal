
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Hacktoberfest Portal</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>    

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
  </head>

  <body>

    

    <main role="main" class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <h1>Hacktoberfest Portal</h1>
          <div class="jumbotron">

            <p class="mb-30 mt-30 description">
                    @if ($sharingMode)
                        These are the <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> stats of {{ $user->name }}.
                    @else
                        This portal helps you to track your <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest</a> status. Below you can see how far you have already come.
                    @endif
                    </p>

                    <div class="user">
                        <img class="user__img" src="{{ $user->github_avatar }}" title="{{ $user->name }}" width="84">

                        <div class="user__info">
                            <h4 id="user__info__name"><a href="https://github.com/{{ $user->github_username }}">{{ $user->name }}</a></h4>

                            <div class="user__info__status">
                                {!! $prs->total_count >= 4 ? '<span class="complete">✔</span>' : '<span class="incomplete">✘</span>' !!} {{ $prs->total_count }} / 4 pull requests done
                            </div>
                        </div>
                    </div>

                    @if(Auth::check() && isset($message))
                        
                        <a class="display--inline-block mt-30" href="{{ url('auth/signout') }}">Sign out</a>
                    @endif

          </div>

             
          <div class="row">

            <div class="container content">
                @if ($prs->total_count == 0)
                    <div class="centered">
                        @if ($sharingMode)
                            {{ $user->name }} hasn’t started yet. Sorry, nothing too see here.
                        @else
                            <h2 class="mb-0">Seems like you didn't even start yet.</h2>
                            <p class="description">
                                Why don't you get yourself some inspiration on the <a href="https://hacktoberfest.digitalocean.com/">Hacktoberfest website</a>?
                            </p>
                        @endif
                    </div>
                @else
                    @if (!$sharingMode)
                        @if ($prs->total_count >= 4)
                            <h2 class="mb-0 centered">Congrats, you're done!</h2>
                        @elseif ($prs->total_count == 1)
                            <h2 class="mb-0 centered">A good start, just keep doing.</h2>
                        @elseif ($prs->total_count == 2)
                            <h2 class="mb-0 centered">Half-time, keep doing.</h2>
                        @else
                        <h2 class="mb-0 centered">You're almost done.</h2>
                        @endif
                        <p class="description centered">Your qualified pull requests:</p>
                    @else
                        <h3 class="mb-0 centered">{{ $user->name }}’s qualified pull requests:</h3>
                    @endif


            

            @foreach ($prs->items as $item)
                    

                    <div class="col-6 col-lg-4">

                      <h2><a href="{{ $item->html_url }}" data-title="{{ $item->title }}">{{ str_limit($item->title, 32) }}</a></h2>

                      <p >
                                    Created in <a href="{{ $item->repo->html_url }}"  data-title="{{ $item->repo->full_name }}">{{ $item->repo->name }}</a> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans() }}.
                                </p>
                                <div>
                                    <p>{{ str_limit(strip_tags($item->body), 140) }}</p>
                                </div>
                      
                    
                    
                    </div><!--/span-->
            @endforeach
            @endif





            </div><!--/span-->
        
        </div><!--/span-->

        
      <hr>

    </main><!--/.container-->

  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
