<x-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CRFS Test</h1>
    <form action="/55" method="post">
        @csrf
        @method("put")
        <label>PUT method_@method_55</label>
        {{-- <input type="hidden" name ="_method" value="put">    --}}
        <input type="text" name="username">
        <button>Submit</button>
    </form>    
    <form action="/22" method="post">
        @csrf
        <label>PUT method (_method)_22</label>
        <input type="hidden" name ="_method" value="put">   
        <input type="text" name="username">
        <button>Submit</button>
    </form>
        <form action="/" method="post">
        @csrf
        <label>POST method</label>
        <input type="text" name="username">
        <button>Submit</button>
    </form>
    <form action="/150" method="post">
        @csrf
        @method('delete')
        <label>delete method_150</label>
        {{-- <input type="text" name="username"> --}}
            <button>Submit</button>
    </form>
</body>
</html>

</x-layout>