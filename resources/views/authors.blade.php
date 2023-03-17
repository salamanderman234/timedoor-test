<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Popular Author</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <header>
            <h1>Top 10 Most Famous Author</h1>
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Author Name</td>
                        <td>Voter</td>
                    </tr>
                </thead>
                <tbody> 
                    @forelse ($populars as $popular)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $popular->name }}</td>
                            <td>{{ $popular->voter }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </main>
    </body>
</html>
