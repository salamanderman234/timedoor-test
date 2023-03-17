<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Insert Rating</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <main>
            <form id="form" action="/rate/save" method="POST">
                @csrf
                <div>
                    <label for="shown">Book Author :</label>
                    <select name="author_id" id="author">
                        @forelse ($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $authorId ? "selected" : "" }}>{{ $author->name }}</option>
                        @empty
                            <option value="-">Tidak ada author</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label for="shown">Book Name :</label>
                    <select name="book_id" id="book">
                        @forelse ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->name }}</option>
                        @empty
                            <option value="-">Tidak ada buku</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label for="shown">Rating :</label>
                    <select name="rate" id="shown">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
            <form action="/rate" id="hidden-form" hidden>
                <input type="text" name="id" id="hidden-author" hidden>
            </form>
        </main>
        <script>
            const authorInput = document.getElementById("author")
            const hiddenAuthorInput = document.getElementById('hidden-author')
            const hiddenForm = document.getElementById("hidden-form")
            authorInput.addEventListener("change", (e) => {
                hiddenAuthorInput.value = e.target.value
                hiddenForm.submit()
            })
        </script>
    </body>
</html>
