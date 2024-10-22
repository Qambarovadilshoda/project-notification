<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Font style */
            background-color: #f9f9f9; /* Light background color */
            margin: 0;
            padding: 100px;
        }

        .container {
            max-width: 800px; /* Max width for the container */
            margin: 0 auto; /* Center the container */
            background: #fff; /* White background for the profile box */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow effect */
            padding: 20px; /* Inner padding */
            text-align: center; /* Center the text */
        }

        h1 {
            color: #333; /* Title color */
        }

        h3 {
            color: #555; /* Subtitle color */
            margin: 10px 0; /* Space above and below */
        }

        p {
            color: #666; /* Description color */
            margin: 10px 0; /* Space above and below */
        }

        .avatar {
            width: 150px; /* Set width for the avatar */
            height: 150px; /* Set height for the avatar */
            border-radius: 50%; /* Make the image circular */
            margin-bottom: 20px; /* Space below the avatar */
            object-fit: cover; /* Maintain aspect ratio while covering the box */
        }

        button {
            background-color: #007bff; /* Button background color */
            color: white; /* Button text color */
            border: none; /* No border */
            padding: 10px 15px; /* Padding inside button */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
            transition: background-color 0.3s; /* Smooth background transition */
            margin-top: 20px; /* Space above the button */
        }

        button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .close-button {
            background-color: #dc3545; /* Red background for close button */
        }

        .close-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>

        <!-- User avatar with default fallback -->
        <img src="{{ asset('storage/images/istockphoto-1337144146-612x612.jpg') }}" alt="Avatar" class="avatar">

        <h3>Name: {{$user->name}}</h3>
        <h3>Username: {{$user->userName}}</h3>
        <h3>Email: {{$user->email}}</h3>
        <p>
            <b>Followers:</b> {{$user->followers->count()}} <br>
            <b>Following:</b> {{$user->following->count()}}
        </p>

        @if ($user->id != auth()->user()->id)
            @if (auth()->user()->isFollowing($user))
                <form action="{{route('unFollow', $user->id)}}" method="POST">
                    @csrf
                    <button type="submit">Unfollow</button>
                </form>
            @else
                <form action="{{route('follow', $user->id)}}" method="POST">
                    @csrf
                    <button type="submit">Follow</button>
                </form>
            @endif
        @endif

        <!-- Close button to go back -->
        <button class="close-button" onclick="goBack()">Close</button>
    </div>

    <script>
        function goBack() {
            window.history.back(); // Go back to the previous page
        }
    </script>
</body>
</html>
