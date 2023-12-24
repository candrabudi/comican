<div class="section" style="margin-top: 18px;">
    <ul class='genre'>
        @foreach (genres() as $genre)
            <li>
                <a href="{{ route('reader.genre.page', ['slug'=>lcfirst($genre->slug), 'page' => 1]) }}" title="Lihat semua komik di genre {{ $genre->name }}">{{ $genre->name }}</a>
            </li>
        @endforeach
    </ul>
</div>