<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <header>
            <form action="/">
                <div>
                    <label for="shown">List shown :</label>
                    <select name="max" id="shown">
                        @for ($i = 10; $i <= 100; $i+=10)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label for="search">Search : </label>
                    <input type="text" name="keyword" id="search">
                </div>
                <button type="submit">Submit</button>
            </form>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Book Name</td>
                        <td>Category Name</td>
                        <td>Author Name</td>
                        <td>Average Rating</td>
                        <td>Voter</td>
                    </tr>
                </thead>
                <tbody> 
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ empty($book->avg_rate) ? 0 : round($book->avg_rate, 2) }}</td>
                            <td>{{ $book->voter }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </body>
</html>
