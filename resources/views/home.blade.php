<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>

    @auth
        <h1>Hello {{$user['name']}}, you are logged in!</h1>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="title">
                <textarea name="body" placeholder="body content..."></textarea>
                <button>Create</button>
            </form>
        </div>


        <div  style="border: 3px solid black;">
            <h2>All posts</h2>
            @foreach ($posts as $post)
                <div style="background-color: gray;pading:10px;margin:10px;">
                    <h3>{{$post['title']}}</h3>
                    <p>{{$post['body']}}</p>
                    <p>author id: {{$post->user->name}}</p>
                    <p>created at: {{$post['created_at']}}</p>
                    <p><a href="/edit-post/{{$post['id']}}">Edit</a></p>
                    <form action="/delete-post/{{$post['id']}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>

                </div>
            @endforeach
        </div>

    @else
        <div style="border: 1px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" placeholder="name" name="name">
                <input type="text" placeholder="email" name="email">
                <input type="password" name="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <div style="border: 1px solid black;">
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" placeholder="name" name="login_name">
                <input type="password" name="login_password" placeholder="password">
                <button>Log in</button>
            </form>
        </div>
        
    @endauth


</body>
</html>