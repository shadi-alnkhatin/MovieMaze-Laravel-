<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>

    <link rel="icon" href="{{asset('assets')}}/images/moviemaze-high-resolution-logo-transparent.png" type="image/svg+xml" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .background {
            background-image: url(./assets/images/poster-background.jpg);
            display: flex;
            flex-direction: column;
            pointer-events: all;
            min-height: 100vh;
        }

        nav {
          height: fit-content;
          background-color: rgba(0, 0, 0, 0.7);
        }

        .main-container {
          flex-grow: 1;
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: space-around;
        }
        h1 {
          font-size: 3.5rem;
          font-weight: 900;
        }
        .hero {
          margin: 25px 0;
          max-width: 600px;
          text-align: center;
          background-color: rgba(0, 0, 0, 0.7);
          padding: 20px;
          color:  white;
          border-radius: 20px;
        }

        .hero * {
          margin: 20px 0;
        }

    </style>
</head>


<body>
    <div class="background overlay">

      <div class="container main-container">
        <div class="hero">

          <h1>Unlimited movies, TV shows, and more</h1>
          <p class="fs-4">Starts at USD 3.99. Cancel anytime.</p>
          <p class="fs-5">Ready to watch? Enter your email to create or restart your membership.</p>
          <a class="btn btn-danger px-4 fs-4" href="{{route('register')}}">Sign up</a>
        </div>
      </div>
    </div>



</body>



</html>
